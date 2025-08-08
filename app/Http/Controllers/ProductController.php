<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Models\Brand;
use App\Models\Photo;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use Custom;

    public function index(Request $request)
    {
        $status = self::productStatus();
        $storages = self::storage();
        $rams = self::ram();
        $brands = Brand::get();

        $products = Product::with(['brand','photos'])
                    ->whereHas('brand',function($q) use($request) {
                        return $q->where('id',$request->brand);
                    })
                    ->when($request->name,function($query) use($request){
                        $query->where('name',$request->name);
                    })
                    ->when($request->price, function($query) use($request) {
                        $query->where('price',$request->price);
                    })
                     ->when($request->battery, function($query) use($request) {
                        $query->where('battery',$request->battery);
                    })
                     ->when($request->storage, function($query) use($request) {
                        $query->where('storage',$request->storage);
                    })
                    
                    ->get();
        return view('products.index',compact('products','status','storages','rams','brands'));
    }

    public function create(){
        $product = [];
        $brands = Brand::get();
        return view('products._form',compact('brands','product'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::get();
        return view('products._form',compact('brands','product'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // $validate = $request->validate([
        //     'name'=> 'required|string|max:100',
        //     'description'=> 'required|string|max:300',
        //     'brand_id'=> 'required',
        //     'color'=> 'required',
        //     'price'=> 'required|string|max:100',
        //     'ram'=> 'required',
        //     'storage'=> 'required',
        //     'camera'=> 'required|string|max:100',
        //     'battery'=> 'required|string|max:100',
        //     'screen_size'=> 'required|string|max:100',
        //     'status' =>'required'
        // ]);

           $imageName = $request->file('image')->getClientOriginalName();
           $file = file_get_contents($request->file('image'));
           
            $imgPath = $request->file('image')->store('images', 'public');

            $product = Product::create([
                'name'=> $request->name,
                'img_name'=> $imageName,
                'img_path'=> $imgPath,
                'description'=> $request->description,
                'brand_id'=> $request->brand,
                'color'=> $request->color,
                'price'=> $request->price,
                'ram'=> $request->ram,
                'storage'=> $request->storage,
                'camera'=> $request->camera,
                'battery'=> $request->battery,
                'screen_size'=> $request->screen_size,
                'stock' => $request->stock,
                'status' =>$request->status
            ]);

            foreach($request->file('additionals') as $add){
                $filename = uniqid() . '.' . $add->getClientOriginalExtension();
                $addPath = $add->storeAs('images', $filename, 'public');

                Photo::create([
                    'path' => $addPath,
                    'product_id' => $product->id
                ]);
            }

            return redirect()->back()->with('sucess','Success');


    }

    public function update(Product $product,Request $request)
    {
        $product->update([
            'name'=> $request->name?? $product->name,
            'description'=> $request->description?? $product->description,
            'brand_id'=> $request->brand?? $product->brand_id,
            'color'=> $request->color?? $product->color,
            'price'=> $request->price?? $product->price,
            'ram'=> $request->ram?? $product->ram,
            'storage'=> $request->storage?? $product->storage,
            'camera'=> $request->camera?? $product->camera,
            'battery'=> $request->battery?? $product->battery,
            'screen_size'=> $request->screen_size?? $product->screen_size,
            'stock' => $request->stock?? $product->stock,
            'status' => $request->status?? $product->status
        ]);

        return redirect()->back()->with('success','Successfully Updated');
    }

    public function destroy(Product $product)
    {
        // if ($product->img_path && Storage::disk('public')->exists($product->img_path)) {
        //     Storage::disk('public')->delete($product->img_path);
        // }

        $product->delete();

        return redirect()->route('product.index')->with('success', 'Product deleted successfully!');
    }

    public function viewDetail(Product $product)
    {
        $product = Product::with(['brand','photos'])->first();
        return view('products.detail',compact('product'));
    }
}

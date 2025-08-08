<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $brands = Brand::when($request->name,function($query) use($request){
                        $query->where('name',$request->name);
                    })->paginate(10);
        return view('brands.index',compact('brands'));
    }

    public function create()
    {   
        $brand = [];
        return view('brands._form',compact('brand'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string'
        ]);

        $name = Brand::where('name', $request->name)->first();

        if(!$name){
            Brand::create([
                'name' => $request->name
            ]);
        
            return back()->with('success','Brand is successfully created');
        }
        return redirect()->back()->with('error','Error');
    }

    public function edit(Brand $brand)
    {
        return view('brands._form',compact('brand'));
    }

    public function update(Brand $brand, Request $request)
    {
        $brand->update([
            'name' => $request->name
        ]);

        return redirect()->route('brand.index')->with('success','Successfully Updated');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brand.index')->with('success', 'Brand deleted successfully!');
    }

}

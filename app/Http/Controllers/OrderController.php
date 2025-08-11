<?php

namespace App\Http\Controllers;

use App\Custom;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    use Custom;
    public function index(Request $request)
    {
        $status = self::orderStatus();

        $orders = Order::with(['user','admin'])
                    ->when($request->customer_name,function($q) use($request){
                        $q->whereHas('user', function($sub) use($request) {
                            return $sub->where('name',$request->customer_name);
                        });
                    })
                    ->when($request->product_name, function($q) use($request) {
                        $q->whereHas('product',function($sub) use($request) {
                            return $sub->where('name',$request->product_name);
                        });
                    })
                    ->when($request->quantity, function($query) use($request) {
                        $query->where('quantity',$request->quantity);
                    })
                    ->when($request->status, function($query) use($request) {
                        $query->where('status',$request->status);
                    })
                    ->when($request->created_at, function($query) use($request) {
                        $query->where('created_at','like','%'.$request->created_at.'%');
                    })
                    ->when($request->complete_date, function($query) use($request) {
                        $query->where('complete_date','like','%'.$request->complete_date.'%');
                    })
                    ->paginate(10)
                    ->withQueryString();
                    
        return view('orders.index',compact('orders','status'));
    }
     public function destroy(Order $order)
    {
        // if ($product->img_path && Storage::disk('public')->exists($product->img_path)) {
        //     Storage::disk('public')->delete($product->img_path);
        // }

        $order->delete();

        return redirect()->route('order.index')->with('success', 'Order deleted successfully!');
    }

    public function viewDetail(Order $order)
    {
        $order = Order::with(['user','orderItems.product'])->first();
        dd($order->id);
        return view('orders.detail',compact('order'));
    }

}

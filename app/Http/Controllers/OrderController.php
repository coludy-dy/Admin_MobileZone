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

                $orders = Order::with(['user','admin','orderItems.product'])
                        ->when($request->customer_name, function($q) use($request) {
                            $q->whereHas('user', function($sub) use($request) {
                                $sub->where('name', 'like', '%' . $request->customer_name . '%');
                            });
                        })
                        ->when($request->product_name, function($q) use($request) {
                            $q->whereHas('orderItems.product', function($sub) use($request) {
                                $sub->where('name', 'like', '%' . $request->product_name . '%');
                            });
                        })
                        ->when($request->quantity, function($q) use($request) {
                            $q->whereHas('orderItems', function($sub) use($request) {
                                $sub->where('quantity', $request->quantity);
                            });
                        })
                        ->when($request->status, function($q) use($request) {
                            $q->where('status', $request->status);
                        })
                        ->when($request->created_at, function($q) use($request) {
                            $q->whereDate('created_at', $request->created_at);
                        })
                        ->when($request->complete_date, function($q) use($request) {
                            $q->whereDate('complete_date', $request->complete_date);
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
    // Eager-load related user and products
    $order->load(['user', 'orderItems.product']);

    return view('orders.detail', compact('order'));
}


}

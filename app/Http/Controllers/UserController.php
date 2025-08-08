<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::query()
                ->when($request->name,function($query) use($request){
                    $query->where('name',$request->name);
                    })
                ->when($request->phone,function($query) use($request){
                    $query->where('phone',$request->phone);
                    })
                ->when($request->email,function($query) use($request){
                    $query->where('email',$request->email);
                    })
                ->when($request->created_at,function($query) use($request){
                        $query->where('created_at','like','%'.$request->created_at.'%');
                    })->paginate(10);
        return view('users.index',compact('users')); 
    }

    public function viewDetail(User $user)
    {
        return view('users.detail',compact('user'));
    }
     public function destroy(User $user)
    {
        // if ($product->img_path && Storage::disk('public')->exists($product->img_path)) {
        //     Storage::disk('public')->delete($product->img_path);
        // }

        $user->delete();

        return redirect()->route('user.index')->with('success', 'User deleted successfully!');
    }

}

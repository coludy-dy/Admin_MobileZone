<?php

namespace App\Models;

use App\Models\User;
use App\Models\Admin;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

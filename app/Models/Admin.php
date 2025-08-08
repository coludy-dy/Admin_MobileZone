<?php

namespace App\Models;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'name',
        'login_name',
        'password'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}

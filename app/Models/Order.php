<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class Order extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'user_id',
        'trend_id',
        'order_type_id',
        'orderno',
        'hashno',
        'price',
        'total_coin',
        'fee',
        'type',
        'status',
        'is_active',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function trends()
    {
        return $this->hasOne(User::class, 'id', 'trend_id');
    }

    public function order_types()
    {
        return $this->hasOne(User::class, 'id', 'order_type_id');
    }
}

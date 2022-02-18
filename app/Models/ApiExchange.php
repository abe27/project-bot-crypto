<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class ApiExchange extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'user_id',
        'exchange_id',
        'api_key',
        'api_secret',
        'expire_date',
        'is_active',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function exchanges()
    {
        return $this->hasOne(Exchange::class, 'id', 'exchange_id');
    }
}

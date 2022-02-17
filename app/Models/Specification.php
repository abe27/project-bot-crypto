<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class Specification extends Model
{
    use HasFactory, Nanoids;

    public $fillable = [
        'user_id',
        'exchange_id',
        'limited_investment',
        'open_order',
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

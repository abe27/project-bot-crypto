<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class Exchange extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'group_id',
        'name',
        'description',
        'currency',
        'exchange_type',
        'image_url',
        'is_active',
    ];

    public function groups()
    {
        return $this->hasOne(ExchangeGroup::class, 'id', 'group_id');
    }
}

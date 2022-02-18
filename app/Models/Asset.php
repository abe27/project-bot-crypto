<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class Asset extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'category_id',
        'symbol',
        'description',
        'image_url',
        'is_active',
    ];

    public function categories()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

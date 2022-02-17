<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class StableCoin extends Model
{
    use HasFactory, Nanoids;

    public $fillable = ['asset_id', 'is_active'];

    public function assets()
    {
        return $this->hasOne(Assets::class, 'id', 'asset_id');
    }
}

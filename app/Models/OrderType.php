<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class OrderType extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = ['title', 'description', 'is_active'];
}

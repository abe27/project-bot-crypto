<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class OrderType extends Model
{
    use HasFactory, Nanoids;

    public $fillable = ['title', 'description', 'is_active'];
}

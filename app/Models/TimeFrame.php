<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class TimeFrame extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = ['seq', 'name', 'value', 'is_active'];
}

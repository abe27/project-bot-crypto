<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class TimeFrame extends Model
{
    use HasFactory, Nanoids;

    public $fillable = ['seq', 'name', 'value', 'is_active'];
}

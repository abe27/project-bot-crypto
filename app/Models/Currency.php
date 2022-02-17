<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class Currency extends Model
{
    use HasFactory, Nanoids;

    public $fillable = ['currency', 'description', 'flag_url', 'is_active'];
}

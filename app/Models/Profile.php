<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class Profile extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'avatar',
        'is_active',
    ];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

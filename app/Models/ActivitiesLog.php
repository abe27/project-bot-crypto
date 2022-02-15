<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class ActivitiesLog extends Model
{
    use HasFactory, Nanoids;

    protected $fillable = [
        'subject',
        'urls',
        'methods',
        'address',
        'agent',
        'user_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

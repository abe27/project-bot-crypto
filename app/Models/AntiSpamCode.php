<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class AntiSpamCode extends Model
{
    use HasFactory, Nanoids;

    public $fillable = ['user_id', 'anti_spam_code', 'is_active'];

    public function users()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

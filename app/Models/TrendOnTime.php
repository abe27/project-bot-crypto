<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class TrendOnTime extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

    public $fillable = ['trend_id', 'time_frame_id', 'trend'];

    public function trends()
    {
        return $this->hasOne(Trend::class, 'id', 'trend_id');
    }

    public function time_frames()
    {
        return $this->hasOne(TimeFrame::class, 'id', 'time_frame_id');
    }
}

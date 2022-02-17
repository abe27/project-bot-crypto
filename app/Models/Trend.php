<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Nanoids;

class Trend extends Model
{
    use HasFactory, Nanoids;

    public $fillable = [
        'asset_id',
        'exchange_id',
        'currency_id',
        'trend',
        'last_price',
        'last_percent',
        'open_order',
        'is_active',
    ];

    public function assets()
    {
        return $this->hasOne(Asset::class, 'id', 'asset_id');
    }

    public function exchanges()
    {
        return $this->hasOne(Asset::class, 'id', 'exchange_id');
    }

    public function currencies()
    {
        return $this->hasOne(Asset::class, 'id', 'currency_id');
    }

    public function timeframes()
    {
        return $this->hasMany(TrendOnTime::class, 'trend_id', 'id');
    }
}

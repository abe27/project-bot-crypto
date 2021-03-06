<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\Nanoids;

class Trend extends Model
{
    use HasFactory, Nanoids, HasApiTokens;

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
        return $this->hasOne(Exchange::class, 'id', 'exchange_id');
    }

    public function currencies()
    {
        return $this->hasOne(Currency::class, 'id', 'currency_id');
    }

    public function timeframes()
    {
        return $this->hasMany(TrendOnTime::class, 'trend_id', 'id');
    }
}

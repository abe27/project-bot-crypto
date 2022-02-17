<?php

namespace Database\Seeders;

use App\Models\Exchange;
use App\Models\ExchangeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/Exchange.json');
        $data = json_decode($json);

        Exchange::truncate();
        foreach ($data as $r) {
            $img = '/storage/exchanges/'. Str::lower($r->name). '.png';
            $group = ExchangeGroup::where('title', $r->group)->first();
            $exchange = new Exchange();
            $exchange->group_id = $group->id;
            $exchange->name = Str::ucfirst($r->name);
            $exchange->description = $r->description;
            $exchange->currency = $r->currency;
            $exchange->exchange_type = 'spot';
            $exchange->image_url = $img;
            $exchange->is_active = $r->is_active;
            $exchange->save();
        }
    }
}

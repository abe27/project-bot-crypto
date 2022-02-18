<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\StableCoin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StableCoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/Asset.json');
        $data = json_decode($json);

        StableCoin::truncate();
        foreach ($data as $r) {
            if ($r->group === 'Stablecoin') {
                $asset = Asset::where('symbol', $r->symbol)->first();
                $stable = new StableCoin();
                $stable->asset_id = $asset->id;
                $stable->is_active = $r->is_active;
                $stable->save();
            }
        }
    }
}

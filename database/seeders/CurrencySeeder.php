<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/Currency.json');
        $data = json_decode($json);

        Currency::truncate();
        foreach ($data as $r) {
            $currency = new Currency();
            $currency->currency = $r->currency;
            $currency->description = $r->description;
            $currency->flag_url = $r->flag_url;
            $currency->is_active = true;
            $currency->save();
        }
    }
}

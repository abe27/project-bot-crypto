<?php

namespace Database\Seeders;

use App\Models\ExchangeGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ExchangeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/ExchangeGroup.json');
        $data = json_decode($json);

        ExchangeGroup::truncate();
        foreach ($data as $r) {
            $exchangeGroup = new ExchangeGroup();
            $exchangeGroup->title = $r->title;
            $exchangeGroup->description = $r->description;
            $exchangeGroup->is_active = $r->is_active;
            $exchangeGroup->save();
        }
    }
}

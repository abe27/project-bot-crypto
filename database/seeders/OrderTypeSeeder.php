<?php

namespace Database\Seeders;

use App\Models\OrderType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class OrderTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/OrderType.json');
        $data = json_decode($json);

        OrderType::truncate();
        foreach ($data as $r)
        {
            $orderType = new OrderType();
            $orderType->title = $r->title;
            $orderType->description = $r->description;
            $orderType->is_active = $r->is_active;
            $orderType->save();
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ApiExchange;
use App\Models\Exchange;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ApiExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/TokenApi.json');
        $data = json_decode($json);

        ApiExchange::truncate();
        foreach ($data as $r)
        {
            $user = User::where('email', $r->user_id)->first();
            $exchange = Exchange::where('name', $r->exchange_id)->first();
            $api = new ApiExchange();
            $api->user_id = $user->id;
            $api->exchange_id = $exchange->id;
            $api->api_key = $r->key;
            $api->api_secret = $r->secret;
            $api->expire_date = $r->expire_date;
            $api->is_active = $r->is_active;
            $api->save();
        }
    }
}

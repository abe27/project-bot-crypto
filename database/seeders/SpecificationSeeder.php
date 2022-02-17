<?php

namespace Database\Seeders;

use App\Models\Exchange;
use App\Models\Specification;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class SpecificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/User.json');
        $data = json_decode($json);

        Specification::truncate();
        foreach ($data as $r) {
            $user = User::where('email', $r->email)->first();
            $list = $r->exchange;
            foreach ($list as $k) {
                $exchange = Exchange::where('name', $k->name)->first();
                $spec = new Specification();
                $spec->user_id = $user->id;
                $spec->exchange_id = $exchange->id;
                $spec->limited_investment = $k->limit;
                $spec->open_order = $k->order;
                $spec->is_active = true;
                $spec->save();
            }
        }
    }
}

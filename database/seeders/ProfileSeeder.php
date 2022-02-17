<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ProfileSeeder extends Seeder
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
        Profile::truncate();
        foreach ($data as $r) {
            $user = User::where('email', $r->email)->first();
            $profile = new Profile();
            $profile->user_id = $user->id;
            $profile->first_name = $r->first_name;
            $profile->last_name = $r->last_name;
            $profile->is_active = true;
            $profile->save();
        }
    }
}

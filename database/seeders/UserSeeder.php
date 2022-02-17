<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $json = Storage::get('public/mocks/User.json');
        $data = json_decode($json);
        foreach ($data as $i) {
            $fullname = $i->first_name . ' ' . $i->last_name;
            $user = new User();
            $user->name = $fullname;
            $user->email = $i->email;
            $user->password = Hash::make($i->password);
            $user->verified = $i->verified;
            $user->save();
        }
    }
}

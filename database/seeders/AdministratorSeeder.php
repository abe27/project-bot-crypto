<?php

namespace Database\Seeders;

use App\Models\Administrator;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AdministratorSeeder extends Seeder
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

        Administrator::truncate();
        foreach ($data as $r) {
            if ($r->is_admin) {
                $user = User::where('email', $r->email)->first();
                $admin = new Administrator();
                $admin->user_id = $user->id;
                $admin->is_active = true;
                $admin->save();
            }
        }
    }
}

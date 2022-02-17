<?php

namespace Database\Seeders;

use App\Models\AntiSpamCode;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class AntiSpamCodeSeeder extends Seeder
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
        AntiSpamCode::truncate();
        foreach ($data as $r) {
            $user = User::where('email', $r->email)->first();
            $anti = new AntiSpamCode();
            $anti->user_id = $user->id;
            $anti->anti_spam_code = $r->anti_spam_code;
            $anti->is_active = true;
            $anti->save();
        }
    }
}

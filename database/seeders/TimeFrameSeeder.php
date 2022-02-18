<?php

namespace Database\Seeders;

use App\Models\TimeFrame;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class TimeFrameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/TimeFrame.json');
        $data = json_decode($json);

        TimeFrame::truncate();
        foreach ($data as $r)
        {
            $timeFrame = new TimeFrame();
            $timeFrame->seq = $r->id;
            $timeFrame->name = $r->name;
            $timeFrame->value = $r->value;
            $timeFrame->is_active = $r->is_active;
            $timeFrame->save();
        }
    }
}

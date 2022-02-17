<?php

namespace Database\Seeders;

use App\Models\Asset;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/Asset.json');
        $data = json_decode($json);

        Asset::truncate();
        foreach ($data as $r) {
            $category = Category::where('title', $r->group)->first();
            $asset = new Asset();
            $asset->category_id = $category->id;
            $asset->symbol = $r->symbol;
            $asset->description = $r->description;
            $asset->image_url = '/storage/crypto/'. Str::lower($r->symbol). '.png';
            $asset->is_active = $r->is_active;
            $asset->save();
        }
    }
}

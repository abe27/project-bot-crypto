<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get('public/mocks/Category.json');
        $data = json_decode($json);

        Category::truncate();
        foreach ($data as $r) {
            $category = new Category();
            $category->title = $r->title;
            $category->description = $r->description;
            $category->is_active = $r->is_active;
            $category->save();
        }
    }
}

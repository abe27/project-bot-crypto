<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([UserSeeder::class]);
        $this->call([ProfileSeeder::class]);
        $this->call([AntiSpamCodeSeeder::class]);
        $this->call([AdministratorSeeder::class]);
        $this->call([ExchangeGroupSeeder::class]);
        $this->call([ExchangeSeeder::class]);
        $this->call([SpecificationSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([AssetSeeder::class]);
        $this->call([CurrencySeeder::class]);
        $this->call([StableCoinSeeder::class]);
        $this->call([TimeFrameSeeder::class]);
        $this->call([OrderTypeSeeder::class]);
        $this->call([ApiExchangeSeeder::class]);
        Schema::enableForeignKeyConstraints();
    }
}

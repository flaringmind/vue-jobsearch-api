<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CompanySeeder::class,
            VuejobSeeder::class,
        ]);

//        $this->call([
//            UserSeeder::class,
//            FakeCompanySeeder::class,
//            FakeVuejobSeeder::class,
//        ]);
    }
}

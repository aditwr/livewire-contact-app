<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Database\Seeders\ContactSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\ContactCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ContactSeeder::class);

        Category::create(['name'=>'Family']);
        Category::create(['name'=>'Friend']);
        Category::create(['name'=>'Company']);
    }
}

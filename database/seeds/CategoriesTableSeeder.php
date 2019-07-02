<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Category::create([
           'name' => 'Hardtek'
       ]);
        Category::create([
            'name' => 'Tribe'
        ]);
        Category::create([
            'name' => 'Hardcore'
        ]);
        Category::create([
            'name' => 'Trance'
        ]);
        Category::create([
            'name' => 'Acidcore'
        ]);
    }
}

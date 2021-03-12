<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['general', 'fun', 'sport', 'movies', 'politics', 'automobiles'];
        foreach ($categories as $category) {
            $category_seed = new Category();
            $category_seed->topic = $category;
            $category_seed->save();
        }
    }
}
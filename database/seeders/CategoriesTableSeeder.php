<?php

namespace Database\Seeders;
use App\Models\Category;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create(['name' => 'nitin']);
        $category2 = Category::create(['name' => 'chavhan']);
        $category1_1 = Category::create(['name' => 'nitin-1']);
        $category1_2 = Category::create(['name' => 'nitin-2']);
        $category2_1 = Category::create(['name' => 'chavhan-1']);
        $category2_2 = Category::create(['name' => 'chavhan-2']);
        
        $category1_1->update(['parent_id' => $category1->id]);
        $category1_2->update(['parent_id' => $category1->id]);
        $category2_1->update(['parent_id' => $category2->id]);
        $category2_2->update(['parent_id' => $category2->id]);
    }
}

<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Food;
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
         //\App\Models\User::factory(10)->create();

         Category::create([
            'title'=>'Burger',
            'image'=>'',
            'featured'=>'Yes',
            'active'=>'Yes'
         ]);

         Food::create([
            'category_id'=>1,
            'title'=>'Burger',
            'price'=>10,
            'image'=>'',
            'description'=>'Burger',
            'featured'=>'Yes',
            'active'=>'Yes'
         ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

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
        $categories = [
            [
                'name'=>'Economic',
                'created_at' => now(),
            ],
            [
                'name'=>'Academics',
                'created_at' => now(),
            ],
            [
                'name'=>'Entrepreneurship',
                'created_at' => now(),
            ],
        ];
        Category::insert($categories);
    }
}

<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Category;

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
            ['name' => 'Kochen'],
            ['name' => 'Kuchen'],
            ['name' => 'Torten'],
            ['name' => 'Gebäck'],
            ['name' => 'Brot und Brötchen'],
            ['name' => 'Aufläufe']
        ];

        foreach($categories as $category){
            Category::firstOrCreate($category);
        }
    }
}

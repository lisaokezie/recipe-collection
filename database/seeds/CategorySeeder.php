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
            ['name' => 'Salate'],
            ['name' => 'Pasta und Nudeln'],
            ['name' => 'Kuchen'],
            ['name' => 'Kekse & Plätzchen'],
            ['name' => 'Gebäck'],
            ['name' => 'Brot und Brötchen']
        ];

        foreach($categories as $category){
            Category::firstOrCreate($category);
        }
    }
}

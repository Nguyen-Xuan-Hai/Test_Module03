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
        $category = new Category();
        $category->name = 'Cà phê gói ';
        $category->save();

        $category = new Category();
        $category->name = 'Cà phê cốc ';
        $category->save();

        $category = new Category();
        $category->name = 'Cà phê kem ';
        $category->save();
    }
}

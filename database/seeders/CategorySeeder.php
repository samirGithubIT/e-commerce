<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'Food'],
            ['name' => 'Fashion'],
            ['name' => 'Tech'],
            ['name' => 'toys']
        ];

        foreach($data as $seeder){
            
            $category = new category();
            $category->name = $seeder['name'];
            $category->save();

        };
    }
}

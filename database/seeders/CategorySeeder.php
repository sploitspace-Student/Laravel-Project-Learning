<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        category::create([
            'name' => 'Graphics Design',
            'slug' => 'DKV',
            'color' => 'bg-red-200'
        ]);
        
        category::create([
            'name' => 'Web Development',
            'slug' => 'Web',
            'color' => 'bg-green-200'
        ]);

        category::create([
            'name' => 'Artificial Intelegence',
            'slug' => 'AI',
            'color' => 'bg-blue-200'
        ]);
        
    }
}

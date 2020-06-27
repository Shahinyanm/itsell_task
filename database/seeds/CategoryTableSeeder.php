<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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
                'title' => 'Чехол',
                'slug' => 'chexol',
                'image' => '/images/chexol.png',
            ],
            [
                'title' => 'Стекло',
                'slug' => 'steklo',
                'image' => '/images/steklo.jpg',
            ],
            [
                'title' => 'Пленка',
                'slug' => 'plenka',
                'image' => '/images/plenka.webp',
            ],
            [
                'title' => 'Кабель',
                'slug' => 'cabel',
                'image' => '/images/headers.jpg',
            ],
            [
                'title' => 'Наушники',
                'slug' => 'naushniki',
                'image' => '/images/cabels.jpg',
            ],
        ];
        
        foreach ($categories as $category) {
            \App\Models\Category::firstOrCreate($category);
        }
    }
}

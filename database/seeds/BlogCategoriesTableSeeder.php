<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [];

        $cName = 'Без категории';

        $categories[] = [
            'title'    => $cName,
            'slug'     => Str::slug($cName),
            'parentId' => 0
        ];

        for ($i = 0; $i <= 10; $i++) {
            $cName = 'Категория #'.$i;
            $parentId = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = [
                'title'    => $cName,
                'slug'     => Str::slug($cName),
                'parentId' => $parentId,
            ];
        }

        \DB::table('blog_categories')->insert($categories);
    }
}

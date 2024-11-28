<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'name' => 'Lajas',
                'slug' => Str::slug('Celulares y tablet'),
                'icon' => '<i class="fas fa-mobile-alt"></i>'
            ],
            [
                'name' => 'Canteras',
                'slug' => Str::slug('Canteras'),
                'icon' => '<i class="fas fa-tv"></i>'
            ],
            [
                'name' => 'Marmoles',
                'slug' => Str::slug('Marmoles'),
                'icon' => '<i class="fas fa-gamepad"></i>'
            ],

        ];

        foreach ($categories as $category) {
            $category = Category::factory(1)->create($category)->first();

            $brands = Brand::factory(4)->create();
            foreach ($brands as $brand) {
                $brand->categories()->attach($category->id);
            }
        }

    }
}

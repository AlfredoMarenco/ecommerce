<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [
            /*Celulares y tablets*/
            [
                'category_id' => 1,
                'name' => 'Lajas de diez',
                'slug' => Str::slug('Lajas de diez'),
                'color' => true,
            ],
            [
                'category_id' => 1,
                'name' => 'Lajas de veinte',
                'slug' => Str::slug('Laja de veinte'),
            ],
            [
                'category_id' => 1,
                'name' => 'Laja de cinco',
                'slug' => Str::slug('Laja de cinco'),
            ],

            /* Tv audio y video */
            [
                'category_id' => 2,
                'name' => 'Canteras de trinta',
                'slug' => Str::slug('Canteras de trinta'),
            ],

            /* Consola y videojuegos */

            [
                'category_id' => 3,
                'name' => 'Marmoles',
                'slug' => Str::slug('Marmoles'),
            ],

        ];

        foreach ($subcategories as $subcategory) {
            Subcategory::create($subcategory);
        }
    }
}

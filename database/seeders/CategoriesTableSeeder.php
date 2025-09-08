<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       DB::table('categories')->insert([
            [
                'name' => 'كاميرات',
                'description' => 'أنواع مختلفة من الكاميرات الرقمية والاحترافية مع ملحقاتها.',
                'image_path' => 'images/categories/cameras.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مكياج',
                'description' => 'منتجات التجميل والمكياج بجميع أنواعها.',
                'image_path' => 'images/categories/makeup.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'مأكولات',
                'description' => 'أطعمة ومأكولات متنوعة تشمل الوجبات السريعة والمأكولات الصحية.',
                'image_path' => 'images/categories/food.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'إلكترونيات',
                'description' => 'أجهزة إلكترونية متنوعة مثل الهواتف الذكية وأجهزة الكمبيوتر والإكسسوارات.',
                'image_path' => 'images/categories/electronics.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'ساعات',
                'description' => 'ساعات أنيقة ورسمية وكاجوال بأنواع مختلفة.',
                'image_path' => 'images/categories/watches.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'شنط',
                'description' => 'مجموعة متنوعة من الشنط للرجال والنساء بموديلات مختلفة.',
                'image_path' => 'images/categories/bags.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

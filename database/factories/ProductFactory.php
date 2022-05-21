<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = \App\Models\Product::class;
    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Dell', 'Vivo','Oppo','Huwei','iPhone','Samsung','Xiaomi','LG','Nokia','Sony']),
            'subcategory_id' => random_int(DB::table('subcategories')->min('id'), DB::table('subcategories')->max('id')),
            'category_id' => random_int(DB::table('categories')->min('id'), DB::table('categories')->max('id')),
            'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
            'price' => $this->faker->numberBetween(50000, 500000),
            'is_active' => $this->faker->numberBetween(0, 1),
            'image' => $this->faker->imageUrl(),
            'description' =>$this->faker->paragraph(),
        ];
    }
}

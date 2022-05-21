<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Electronics','Cell Phones','Accessories']),
            'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
            ];
    }
}

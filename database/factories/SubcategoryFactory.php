<?php

namespace Database\Factories;
use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubcategoryFactory extends Factory
{

    public function definition()
    {
        return [
            'name' => $this->faker->randomElement(['Laptop', 'Phone','Computer','Smart Watch']),
            'category_id' => random_int(DB::table('categories')->min('id'), DB::table('categories')->max('id')),
            'user_id' => random_int(DB::table('users')->min('id'), DB::table('users')->max('id')),
        ];
    }
}

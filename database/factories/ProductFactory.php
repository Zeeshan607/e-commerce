<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return array(
                    'name'=>$this->faker->name(),
                    "slug"=>$this->faker->unique()->slug(),
                    "sku"=>strtoupper(substr($this->faker->name(), 0, 4)) ."-".strtoupper(substr($this->faker->unique()->slug(), 0, 3)) ,
                    "description"=>$this->faker->text(),
                    "cost"=>$this->faker->randomFloat(2,0,1000),
                    "price"=>$this->faker->randomFloat(2,0,1000),
                    "category_id"=>2,
                    "featured_image"=>"placeholderImage.webp"

        );
    }
}

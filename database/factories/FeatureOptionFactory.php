<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FeatureOption>
 */
class FeatureOptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'feature_id' => Feature::inRandomOrder()->first()->id,
            'value' => $this->faker->randomElement(['10gb', '20gb', '30gb', '40', 'test', 'red', 'blue', 'plastic', 'steel'])
        ];
    }
}

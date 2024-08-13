<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\FeatureOption;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Feature::factory()
            ->count(8)
            ->create();

        Product::factory()
            ->count(100)
            ->create();

        FeatureOption::factory()
            ->count(300)
            ->create();

        $options = FeatureOption::all();

        Product::all()->each(function ($product) use ($options) {
            $product->featureOptions()->attach(
                $options->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}

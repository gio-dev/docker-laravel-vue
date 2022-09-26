<?php

namespace Database\Factories;

use App\Enum\HomeAppliancesTypes;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class HomeAppliancesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $listBrands = HomeAppliancesTypes::getAll();
        $key = rand(0, 4);

        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'voltage' => $this->faker->sentence,
            'brand' => $listBrands[$key],
        ];
    }
}

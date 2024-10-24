<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DataPoint;

class DataPointFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DataPoint::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'reportedCases' => $this->faker->numberBetween(-10000, 10000),
            'villageName' => $this->faker->word(),
            'population' => $this->faker->word(),
            'activeStatus' => $this->faker->boolean(),
        ];
    }
}

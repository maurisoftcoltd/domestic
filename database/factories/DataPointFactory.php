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
            'longtitude' => $this->faker->word(),
            'reportedCases' => $this->faker->numberBetween(-10000, 10000),
            'activeStatus' => $this->faker->boolean(),
        ];
    }
}

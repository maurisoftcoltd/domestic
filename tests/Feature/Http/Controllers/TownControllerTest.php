<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Town;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TownController
 */
final class TownControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $towns = Town::factory()->count(3)->create();

        $response = $this->get(route('towns.index'));

        $response->assertOk();
        $response->assertViewIs('town.index');
        $response->assertViewHas('towns');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('towns.create'));

        $response->assertOk();
        $response->assertViewIs('town.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\TownController::class,
            'store',
            \App\Http\Requests\TownStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $latitude = $this->faker->latitude();
        $longitude = $this->faker->longitude();
        $population = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('towns.store'), [
            'name' => $name,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'population' => $population,
        ]);

        $towns = Town::query()
            ->where('name', $name)
            ->where('latitude', $latitude)
            ->where('longitude', $longitude)
            ->where('population', $population)
            ->get();
        $this->assertCount(1, $towns);
        $town = $towns->first();

        $response->assertRedirect(route('town.index'));
    }


    #[Test]
    public function delete_redirects(): void
    {
        $response = $this->get(route('towns.delete'));

        $response->assertRedirect(route('town.index'));
    }
}

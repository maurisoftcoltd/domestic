<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DataPoint;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DataPointController
 */
final class DataPointControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    #[Test]
    public function index_displays_view(): void
    {
        $dataPoints = DataPoint::factory()->count(3)->create();

        $response = $this->get(route('data-points.index'));

        $response->assertOk();
        $response->assertViewIs('dataPoint.index');
        $response->assertViewHas('dataPoints');
    }


    #[Test]
    public function create_displays_view(): void
    {
        $response = $this->get(route('data-points.create'));

        $response->assertOk();
        $response->assertViewIs('dataPoint.create');
    }


    #[Test]
    public function store_uses_form_request_validation(): void
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DataPointController::class,
            'store',
            \App\Http\Requests\DataPointStoreRequest::class
        );
    }

    #[Test]
    public function store_saves_and_redirects(): void
    {
        $name = $this->faker->name();
        $latitude = $this->faker->latitude();
        $longitude = $this->faker->longitude();
        $reportedCases = $this->faker->numberBetween(-10000, 10000);
        $villageName = $this->faker->word();
        $population = $this->faker->word();
        $activeStatus = $this->faker->boolean();

        $response = $this->post(route('data-points.store'), [
            'name' => $name,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'reportedCases' => $reportedCases,
            'villageName' => $villageName,
            'population' => $population,
            'activeStatus' => $activeStatus,
        ]);

        $dataPoints = DataPoint::query()
            ->where('name', $name)
            ->where('latitude', $latitude)
            ->where('longitude', $longitude)
            ->where('reportedCases', $reportedCases)
            ->where('villageName', $villageName)
            ->where('population', $population)
            ->where('activeStatus', $activeStatus)
            ->get();
        $this->assertCount(1, $dataPoints);
        $dataPoint = $dataPoints->first();

        $response->assertRedirect(route('dataPoint.index'));
    }


    #[Test]
    public function delete_redirects(): void
    {
        $response = $this->get(route('data-points.delete'));

        $response->assertRedirect(route('dataPoint.index'));
    }
}

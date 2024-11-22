<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPointStoreRequest;
use App\Http\Requests\DataPointUpdateRequest;
use App\Models\DataPoint;
use App\Models\Town;
use Carbon\CarbonPeriod;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DataPointController extends Controller
{
    public function index(Request $request): View
    {
        $dataPoints = DataPoint::all();

        return view('dataPoint.index', compact('dataPoints'));
    }

    public function create(Request $request): View
    {
        return view('dataPoint.create',[
            'towns' => Town::all()->sortBy('name'),
        ]);
    }

    public function store(DataPointStoreRequest $request): RedirectResponse
    {
        $dataPoint = DataPoint::create($request->validated());

        return redirect()->route('data-points.index');
    }

    public function edit(DataPoint $data_point): View
    {
        return view('dataPoint.edit', [
            'dataPoint' => $data_point,
            'towns' => Town::all()->sortBy('name'),
        ]);
    }

    public function update(DataPointUpdateRequest $request, DataPoint $dataPoint): RedirectResponse
    {
        $dataPoint->update($request->validated());

        return redirect()->route('data-points.index');
    }

    public function destroy(DataPoint $data_point): RedirectResponse
    {
        $data_point->delete();

        return redirect()->route('data-points.index');
    }

    public function get_all_data_points(Request $request) : JsonResponse
    {

        // "town-91661": {
        //     value: "9825",
        //     latitude: 10.60233681855024,
        //     longitude: -61.339582771151186,
        //     href: "#",
        //     tooltip: {
        //         content:
        //             '<span style="font-weight:bold;">Villebon-sur-Yvette (91661)</span><br />Population : 9825',
        //     },
        // },

        $date_array = [];
        $from = $request->input('from') ?? date('Y-m-d');
        $to = $request->input('to') ?? date('Y-m-d');
        $data = [];

        $dataPoints = DataPoint::where([
            'activeStatus' => 1
        ])
        ->whereBetween('date', [$from, $to])
        ->get();

        foreach($dataPoints as $dataPoint) {
            $point = [
                'value' => $dataPoint->reportedCases,
                'latitude' => $dataPoint->latitude,
                'longitude' => $dataPoint->longitude,
                'href' => '#',
                'tooltip' => [
                    'content' => '<span style="font-weight:bold;">'. $dataPoint->villageName .'</span><br />Population : '. $dataPoint->population
                ]
            ];

            $data["$dataPoint->name"] = $point;
        }

        return response()->json($data);
    }
}

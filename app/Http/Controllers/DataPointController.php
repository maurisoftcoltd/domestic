<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPointStoreRequest;
use App\Models\DataPoint;
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
        return view('dataPoint.create');
    }

    public function store(DataPointStoreRequest $request): RedirectResponse
    {
        $dataPoint = DataPoint::create($request->validated());

        return redirect()->route('data-points.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        return redirect()->route('data-points.index');
    }

    public function get_all_data_points() : JsonResponse
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

        $data = [];
        $dataPoints = DataPoint::where('activeStatus',1)->get();

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

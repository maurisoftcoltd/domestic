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
        $date_diff = strtotime($to) - strtotime($from);
        $data = [];
        $data['days'] = round($date_diff / (60 * 60 * 24));
        $points = [];

        $dataPoints = DataPoint::where([
            'activeStatus' => 1
        ])
        ->whereBetween('date', [$from, $to])
        ->get();
        // dd($dataPoints);

        foreach($dataPoints as $dataPoint) {
            if(array_key_exists($dataPoint->town->name, $points)){
                $points[$dataPoint->town->name]['value'] += $dataPoint->reportedCases;
            } else {
                $point = [
                    'value' => $dataPoint->reportedCases,
                    'latitude' => $dataPoint->town->latitude,
                    'longitude' => $dataPoint->town->longitude,
                    'href' => '#',
                    'tooltip' => [
                        'content' => '<span style="font-weight:bold;">'. $dataPoint->town->name .'</span><br />Population : '. $dataPoint->town->population
                    ]
                ];

                $points[$dataPoint->town->name] = $point;
            }
        }

        $data['points'] = $points;
        // dd($data);
        return response()->json($data);
    }
}

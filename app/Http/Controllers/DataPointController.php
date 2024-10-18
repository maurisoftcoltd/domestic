<?php

namespace App\Http\Controllers;

use App\Http\Requests\DataPointStoreRequest;
use App\Models\DataPoint;
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

        return redirect()->route('dataPoint.index');
    }
}

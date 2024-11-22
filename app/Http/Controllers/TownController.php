<?php

namespace App\Http\Controllers;

use App\Http\Requests\TownStoreRequest;
use App\Http\Requests\TownUpdateRequest;
use App\Models\Town;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TownController extends Controller
{
    public function index(Request $request): View
    {
        $towns = Town::all();

        return view('town.index', compact('towns'));
    }

    public function create(Request $request): View
    {
        return view('town.create');
    }

    public function store(TownStoreRequest $request): RedirectResponse
    {
        $town = Town::create($request->validated());

        return redirect()->route('towns.index');
    }

    public function edit(Town $town): View
    {
        return view('town.edit', [
            'town' => $town
        ]);
    }

    public function update(TownUpdateRequest $request, Town $town): RedirectResponse
    {
        $town->update($request->validated());

        return redirect()->route('towns.index');
    }

    public function destroy(Town $town): RedirectResponse
    {
        $town->delete();

        return redirect()->route('towns.index');
    }
}

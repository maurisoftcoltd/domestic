<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function home(Request $request) : View
    {
        $from = $request->input('from') ?? date('Y-m-d');
        $to = $request->input('to') ?? date('Y-m-d');

        return view('welcome', [
            'from' => $from,
            'to' => $to
        ]);
    }
}

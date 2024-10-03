<?php

namespace App\Http\Controllers;

use App\Models\TripPlan;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function submit(Request $request)
    {
        $request->validate([
            'phone' => 'required|string',
            'destination' => 'required|string',
            'date' => 'required|date',
            'travelers' => 'required|integer',
            'budget' => 'required|integer',
        ]);

        TripPlan::create([
            'phone' => $request->phone,
            'destination' => $request->destination,
            'date' => $request->date,
            'travelers' => $request->travelers,
            'budget' => $request->budget,
        ]);

        return response()->json(['success' => true]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        // Example: Fetch payment history for the authenticated user
        $payments = auth()->user()->payments ?? []; // Assuming a `payments` relationship exists

        return view('history.index', compact('payments'));
    }
}

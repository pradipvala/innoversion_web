<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SimpleDashboardController extends Controller
{
    public function simple_dashboard(Request $request)
    {
        return view('innoversion_dashboard.simple_dashboard');

    }
}

<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ClientDashboardController extends Controller
{
    public function client_dashboard(Request $request)
    {
        return view('innoversion_dashboard.client_dashboard');

    }

    
}

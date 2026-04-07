<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FranchiseDashboardController extends Controller
{
    public function index(Request $request)
    {

        return view('innoversion_dashboard.franchise_dashboard');

    }
}

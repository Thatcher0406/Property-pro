<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandlordDashboardController extends Controller
{
    public function index()
    {
        return view('landlord.dashboard');
    }
}

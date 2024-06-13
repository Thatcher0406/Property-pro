<?php

namespace App\Http\Controllers;

use App\Models\Landlord;
use Illuminate\Http\Request;

class LandlordController extends Controller
{
    public function index() {
        // Return view with landlord functionalities
        return view('landlord.dashboard');
    }
}

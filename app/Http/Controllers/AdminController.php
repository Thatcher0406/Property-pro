<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        // Return view with admin functionalities
        return view('admin.dashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scheme;

class DashboardController extends Controller
{
    public function index()
    {
        $schemes = Scheme::all();
        return view('dashboard', ['schemes' => $schemes]);
    }
}


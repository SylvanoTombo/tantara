<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $stories_count = Story::count();

        return view('dashboard.index', compact('stories_count'));
    }
}

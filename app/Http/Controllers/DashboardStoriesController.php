<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class DashboardStoriesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::where('user_id', auth()->user()->id)->get();

        return view('dashboard.stories.index', compact('stories'));
    }


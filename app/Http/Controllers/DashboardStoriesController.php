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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        Story::create([
            'title' => request('title'),
            'body' => request('body'),
            'shared' => request('share') ? 1 : 0,
            'user_id' => auth()->user()->id
        ]);

        flashy()->success('Tantara créer avec succès');

        return redirect()->back();
    }


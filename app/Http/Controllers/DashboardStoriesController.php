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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $story = Story::findOrFail($id);

        return view('stories.edit', compact('story'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $story = Story::findOrFail($id);

        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $story->update([
            'title' => request('title'),
            'body' => request('body'),
            'shared' => request('share') ? 1 : 0
        ]);

        flashy()->success('Tantara mise à jour avec succès');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Story::findOrFail($id)->delete();

        flashy()->success('Tantara supprimer avec succès');

        return redirect()->back();
    }
}

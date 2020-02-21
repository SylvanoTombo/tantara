<?php

namespace App\Http\Controllers;

use App\Story;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'stories' => Story::shared()->paginate(6)
        ]);
    }
}

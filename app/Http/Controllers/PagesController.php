<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Channel;

class PagesController extends Controller
{
    public function root(Channel $channels)
    {
    	$channels=Channel::orderBy('created_at','desc')->limit(12)->get();
    	return view('pages.root',compact('channels'));
    }
}

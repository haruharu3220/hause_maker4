<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Tag;

class TagController extends Controller
{
    //
    public function index(){
        $team = Auth::user()->team_id;
        $tags = Tag::where('team_id', $team)->orderBy('updated_at', 'desc')->get();
        
        return response()->view('tag.index', compact('tags'));

    }
    
}

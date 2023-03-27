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
        // $tags = Tag::where('team_id', $team)->orderBy('updated_at', 'desc')->get();
        $tags = Tag::where('team_id', $team)->orderBy('updated_at', 'asc')->get();
        
        return response()->view('tag.index', compact('tags'));
    }
    
    public function store(Request $request){
        
        // dd($request->tagName);
        // dd($request);
        $tag = new tag();
        $tag -> team_id = Auth::user() ->team_id;
        $tag -> name = $request->tagName;
        $tag -> save();
        
        return redirect()->route('tag.index');
    
    }
}

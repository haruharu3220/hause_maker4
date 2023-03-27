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
        $name = Auth::user()->team_id;
        // dd($name);
        // $tag = 
        return response()->view('tag.index');
    }
    
}

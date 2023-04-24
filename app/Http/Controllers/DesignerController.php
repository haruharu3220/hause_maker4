<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Validator;
use App\Models\Photo;
use App\Models\Type;
use App\Models\Tag;
use App\Models\Team;
use App\Models\User;
use Illuminate\Support\Facades\DB;



class DesignerController extends Controller
{
    public function setting_page(){
        
        return response()->view('designer.setting');
    }
    
    
    public function register(Request $request){
        $user = User::find(Auth::id());
        $team = Team::where('original_id', $request->input('team_id'))->first();
        
        if (!$team) {
            return back()->with('error', '家族IDが見つかりませんでした。');
        }
        
        $user->teams()->attach($team->id);
         return redirect()->route('designer.dashboard')->with('success', 'チームに参加しました。');
    }
    
    
}
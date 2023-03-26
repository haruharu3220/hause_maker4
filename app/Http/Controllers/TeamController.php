<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\User;

class TeamController extends Controller
{
    

    // protected $teamModel;
    

  
    
    public function create(){
        return view('team.team');
    }
    
    public function register(Request $request){
    
        $request->validate([
            'familyName' => 'required|string|max:255',
            'familyID' => 'required|string|max:255|unique:teams,original_id',
        ]);

        $team = Team::create([
            'original_id' => $request->input('familyID'),
            'team_name' => $request->input('familyName'),
        ]);

        $user = User::find(Auth::id());
        $user->team_id = $team->id;
        $user->save();

        return redirect()->route('dashboard', $user);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Team;
use App\Models\User;
use App\Models\Tag;

class TeamController extends Controller
{
    

    // protected $teamModel;
    

  
    
    public function create(){
        return view('team.team');
    }
    
    public function option(){
        return view('team.option');
    }
    
    public function join(){
        return view('team.join');
    }
    
    public function store(Request $request){
        
        $user = User::find(Auth::id());
        $team = Team::where('original_id',$request->team_id)->first();

        
        // 家族IDが見つからない場合
        if (!$team) {
            // エラーメッセージをセッションに追加
            $request->session()->flash('error', 'エラー：家族IDが見つかりませんでした。');
        
            // join.blade.php にリダイレクト
            return redirect()->route('team.join');
        }
        
        
        $user->team_id = $team->id;
        $user->save();
        return redirect()->route('dashboard');
    }
    
    public function register(Request $request){
    
        $request->validate([
            // 'familyName' => 'required|string|max:255',
            'familyID' => 'required|string|min:4|max:8|unique:teams,original_id',
        ]);

        $team = Team::create([
            'original_id' => $request->input('familyID'),
            'team_name' => $request->input('familyName'),
        ]);

        $user = User::find(Auth::id());
        $user->team_id = $team->id;
        $user->save();
        
        
        
        
        // dd($team,$user);
        
        
        
        
        $tag1 = new Tag();
        $tag1->team_id = $team->id;
        $tag1->name = "リビング";
        $tag1->save();
        
        $tag2 = new Tag();
        $tag2->team_id = $team->id;
        $tag2->name = "キッチン";
        $tag2->save();
        
        $tag3 = new Tag();
        $tag3->team_id = $team->id;
        $tag3->name = "寝室";
        $tag3->save();
        
        $tag3 = new Tag();
        $tag3->team_id = $team->id;
        $tag3->name = "バスルーム";
        $tag3->save();
        
        $tag4 = new Tag();
        $tag4->team_id = $team->id;
        $tag4->name = "洗面";
        $tag4->save();
        
        $tag5 = new Tag();
        $tag5->team_id = $team->id;
        $tag5->name = "子供部屋";
        $tag5->save();
        
        $tag6 = new Tag();
        $tag6->team_id = $team->id;
        $tag6->name = "玄関";
        $tag6->save();
        
        

        
        return redirect()->route('tag.index');
        
        // return view('tag.create');
    }
}

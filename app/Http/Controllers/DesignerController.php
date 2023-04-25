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
    
    public function dashboard()
    {
        $user = User::find(Auth::id());

        // 中間テーブルから紐づくチーム情報を取得する
        $teamIds = $user->teams()->pluck('team_id')->toArray();
        $teams = Team::whereIn('id', $teamIds)->get();

        return view('designer.dashboard', compact('user', 'teams'));
    }
    
    
    public function setting_page(){
        return response()->view('designer.setting');
    }
    
    
    public function register(Request $request){
        $user = User::find(Auth::id());
        $team = Team::where('original_id', $request->input('team_id'))->first();
        
        if (!$team) {
            return back()->with('error', '家族IDが見つかりませんでした。');
        }
        
        if ($user->teams()->where('team_user.team_id', $team->id)->where('team_user.user_id', $user->id)->count() > 0) {
            return back()->with('error', 'すでに登録ずみです。');
        }
        
        $user->teams()->attach($team->id);
        
        // 中間テーブルから紐づくチーム情報を取得する
        $teamIds = $user->teams()->pluck('team_id')->toArray();
        $teams = Team::whereIn('id', $teamIds)->get();
        
        // dd($teams);
        return redirect()->route('designer.dashboard')->with('user', $user)->with('teams', $teams);
    }
    
    public function project($id){

        // teamsテーブルから$idと同じ値のレコードを取得する
        $team = Team::findOrFail($id);
        // dd($team);
        // tagsテーブルから$team->team_idと同じ値のレコードを取得する
        $tags = Tag::where('team_id', $team->id)->get();

        // photosテーブルから$team->team_idと同じ値のレコードを取得する
        $photos = Photo::where('team_id', $team->id)->get();

        // dd($team,$tags,$photos);
        // ビューにデータを渡してレスポンスを返す
        return view('designer.project', [
            'team' => $team,
            'tags' => $tags,
            'photos' => $photos,
        ]);

    }
    
}
<?php

namespace App\Providers;

use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Auth;
use Validator;
use App\Models\User;
use App\Models\Team;
use App\Models\Tag;
use App\Models\Type;


class ViewServiceProvider extends ServiceProvider
{
    /**
     * 全アプリケーションサービスの登録
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * 全アプリケーションサービスの初期起動
     *
     * @return void
     */
    public function boot()
    {
        //ビューコンポーザーを登録したい画面を以下に記入
        View::composer([
            'photo.index', 
            'photo.create', 
            'photo.edit',
            'tag.index',
            'tag.create',
            'team.option',
            'team.create',
            'team.join',
            'dashboard'], function ($view) {
            if (auth()->check()) {
                $user = User::find(Auth::id());
                
                if($user->team_id != NULL){
                    $team = Team::find($user->team_id);
                    $tags = Tag::where('team_id', $team->id)->orderBy('updated_at', 'asc')->get();
                    $types = Type::all();
                    $view->with(['user' => $user, 'team' => $team, 'tags' => $tags,'types' => $types]);
                }else{
                    $team ="";
                    $tags ="";
                    $view->with(['user' => $user, 'team' => $team, 'tags' => $tags]);
                }
                // dd($user,$team,$tags);

            }
        });
    }
}
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
        View::composer(['photo.index', 'photo.create', 'photo.edit','tag.index','dashboard'], function ($view) {
            if (auth()->check()) {
                $user = User::find(Auth::id());
                $team = Team::find($user->team_id);
                $tags = Tag::where('team_id', $team->id)->orderBy('updated_at', 'asc')->get();
                // dd($user,$team,$tags);
                $view->with(['user' => $user, 'team' => $team, 'tags' => $tags]);
            }
        });
    }
}
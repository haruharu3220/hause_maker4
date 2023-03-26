<?php

namespace App\View\Composers;

use App\Repositories\UserRepository;
use Illuminate\View\View;
use App\Views\Composers\MultiComposer;
use App\Models\User;
use App\Models\Team;

class ProfileComposer
{
    /**
     * userリポジトリの実装
     *
     * @var UserRepository
     */
    protected $users;

    /**
     * 新しいプロフィールコンポーザの生成
     *
     * @param  \App\Repositories\UserRepository  $users
     * @return void
     */
    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    /**
     * データをビューと結合
     *
     * @param  \Illuminate\View\View  $view
     * @return void
     */
    public function compose()
    {
        $user = User::find(Auth::id());
        $team = Team::find($user->team_id);
    
        
    }

    );

}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{

    public function create(): View
    {
        return view('auth.register');
    }


    //ユーザ登録
    public function store(Request $request): RedirectResponse
    {
        //dd($request);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'position_id' => $request->position // ここを追加
        ]);

        event(new Registered($user));

        Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
        // return redirect(RouteServiceProvider::TEAM_CREATE);
        
        return redirect(RouteServiceProvider::TEAM_OPTION);
        
        if($request->position == 1){
            return redirect(RouteServiceProvider::TEAM_OPTION);
        }
        
        if($request->position == 5){
            return redirect(RouteServiceProvider::DESIGNER_HOME);
        }
        
    }
}

<h1 class="text-2xl m-4 text-center">家づくりアルバム</h1>
<h2 class="m-4 text-center">新規アカウント登録</h2>

<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        
        
        <div class="m-2">
            <x-input-label for="position" :value="__('属性')" />
                <input type="radio" name="position" id="position-1" value="1" checked> 施主の方
                <input type="radio" name="position" id="position-2" value="5" > 設計士の方
        </div>
        
        {{--
        <div class="m-2">
            <x-input-label for="position" :value="__('属性')" />
            <input type="radio" name="position" id="position-1" value="1" checked>
            <label for="position-1">{{ __('施主の方') }}</label>
            <input type="radio" name="position" id="position-2" value="5">
            <label for="position-2">{{ __('設計士の方') }}</label>
        </div>
        --}}
                
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('名前')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('メールアドレス')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('パスワード')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('パスワード(確認用)')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('登録済みの方はこちら') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('登録') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

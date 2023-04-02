<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <h1>{{$user->name}}さん。</h1>
    <h1>家族IDを入力してください。</h1>
    <form method="POST" action="{{ route('team.join') }}">
        @csrf

        <!-- 家ID -->
        <div>
            <x-input-label for="team_id" :value="__('家族ID')" />
            <x-text-input id="team_id" class="block mt-1 w-full" type="text" name="team_id" :value="old('team_id')" required autofocus autocomplete="家ID" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>


            <x-primary-button class="ml-3">
                {{ __('ログイン') }}
            </x-primary-button>
            
            <a href="/team/option">
                <x-secondary-button class="ml-3">
                {{ __('戻る') }}
                </x-secondary-button>
            </a>
        </div>
    </form>
    
    
    
</x-guest-layout>
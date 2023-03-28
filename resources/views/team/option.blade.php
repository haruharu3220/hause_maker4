<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <h1>{{$user->name}}さん。はじめまして</h1>
    <h1>家IDを持っていますか？</h1>
    <a href="join">
        <x-secondary-button class="ml-3">
        {{ __('はい。持っています') }}
        </x-secondary-button>
    </a>
    
    <a href="create">
        <x-secondary-button class="ml-3">
        {{ __('持っていません。') }}
        </x-secondary-button>
    </a>

    
</x-guest-layout>

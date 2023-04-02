<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <h1>{{$user->name}}さん。はじめまして</h1>
    <h1>既に家族アカウントを作成していますか？</h1>
    <p>作成している場合は家族IDを入力することで参加することができます</p>
    <br>
    <p>まだ、作成していていない方は新規作成をしてください。</p>
    <a href="join">
        <x-secondary-button class="ml-3">
        {{ __('家族アカウント作成済') }}
        </x-secondary-button>
    </a>
    
    <a href="create">
        <x-secondary-button class="ml-3">
        {{ __('家族アカウント新規作成') }}
        </x-secondary-button>
    </a>

    
</x-guest-layout>

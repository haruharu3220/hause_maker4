
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <h1 class="text-2xl m-4 text-center">{{$user->name}}さん。はじめまして</h1>
    <p  class="m-4 text-center">既に家族アカウントを作成していますか？</p>
    <p class="m-4 text-center">家族アカウントを作成している場合は家族IDを入力することで参加することができます</p>
    <br>
    <p class="m-4 text-center">まだ、作成していていない方は新規作成をしてください。</p>
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

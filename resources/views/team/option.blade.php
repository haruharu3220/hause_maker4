
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <h1 class="text-2xl m-4 text-center">{{$user->name}}さん<br>はじめまして</h1>
    <p  class="m-4 text-center">既にファミリーIDを発行していますか？</p>
    <p class="mb-4 text-center">まだ、発行していていない方は新規発行をしてください。</p>
    
    <div class="flex justify-center">
        <a href="join">
            <x-secondary-button class="ml-3">
            {{ __('作成済') }}
            </x-secondary-button>
        </a>
        
        <a href="create">
            <x-secondary-button class="ml-3">
            {{ __('新規発行') }}
            </x-secondary-button>
        </a>
    </div>
    
</x-guest-layout>

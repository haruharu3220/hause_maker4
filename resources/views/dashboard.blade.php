<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>

    <p>{{$team->team_name}}</p>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>私の情報</h1>
                <p>名前：{{$user->name}}</p>
                <p>家：{{$team->team_name}}</p>
            
            </div>
            
            
        </div>
    </div>
</x-app-layout>
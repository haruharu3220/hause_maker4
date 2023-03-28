<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('マイページ') }}
        </h2>
    </x-slot>
    @if($team!="")
    <p>{{$team->team_name}}</p>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>私の情報</h1>
                <p>名前：{{$user->name}}</p>
                @if($team!="")
                <p>家：{{$team->team_name}}</p>
                @else
                <p>家：家族設定していません。</p>
                <a href="/team/join">
                    <x-secondary-button class="ml-3">
                    {{ __('家族に参加') }}
                    </x-secondary-button>
                </a>                
                <a href="/team/create">
                    <x-secondary-button class="ml-3">
                    {{ __('家族ID作成') }}
                    </x-secondary-button>
                </a>
                @endif
            </div>
        
        @if($tags!="")
        <h2>タグ一覧</h2>    
        <ul class="grid">
            @foreach ($tags as $tag)
                <li>{{$tag->name}}</li>
            @endforeach
        </ul>
        @endif
    
        </div>
    </div>
</x-app-layout>
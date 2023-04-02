<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{$team->team_name}}の{{ __('ページ') }}
        </h2>
    </x-slot>

    <div class="py-12 h-full bg-yellow-400">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white my-5 p-5 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1>私の情報</h1>
                <table>
                <tr>
                    <th>名前：</th>
                    <td>{{$user->name}}</td>
                </tr>
                @if($team!="")
                <tr>
                    <th>家：</th>
                    <td>{{$team->team_name}}</td>
                </tr>
                
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
                </table>
            </div>
            <div class="bg-white p-5 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($tags!="")
                <h2>タグ一覧</h2>    
                    <table class="grid">
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{$tag->name}}</td>
                                <td>{{$tag->status}}</td>
                            </tr>
                        @endforeach
                    </table>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
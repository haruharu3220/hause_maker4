<!-- resources/views/tweet/index.blade.php -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Select2.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2本体 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    
    <!-- Fonts -->
    <!--<link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}">

    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
</head>


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if($team !="")
                {{$team->team_name}}の{{ __('ページ') }}
            @endif
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white py-4 border-4 border-gray-100 shadow-2xl my-5 dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h1 class="m-4">私の情報</h1>
                <div class="flex">
                    <table class="mx-4 w-1/3">
                        <tr class="mx-4">
                            <th>名前：</th>
                            <td>{{$user->name}}</td>
                        </tr>
                        @if($team!="")
                        <tr>
                            <th>　家：</th>
                            <td>{{$team->team_name}}</td>
                        </tr>
                        
                        @else
                        <p>　家：家族設定していません。</p>
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
                        
                        <tr>
                            @if($family !=null)
                                <th>家族：</th>
                                @foreach($family as $member)
                                <td>{{$member->name}}</td>
                                @endforeach
                            @endif
                        </tr>
                    </table>
                
                    <div class="w-2/3 bg-gray-500">
                        <h2>これはテスト</h2>
                    </div>
                </div>

            </div>
            <div class="bg-white p-5 border-4 border-gray-100 shadow-2xl dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if($tags!="")
                <h2>タグ一覧</h2>    
                    <div class="grid">
                        <ul class="accordion-area">
                            @foreach ($tags as $tag)
                                <li>                                       
                                    <section class="grid flex">
                                        <form action="{{ route('memoedit', $tag->id) }}" method="GET" class="text-left">
                                        @csrf
                                            <button>
                                              <i class="fa-regular fa-pen-to-square"></i>
                                            </button>
                                        </form>
                                        
                                        @if($tag->status =="未決定")
                                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">{{$tag->status}}</div>
                                        @endif

                                        @if($tag->status =="検討中")
                                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full">{{$tag->status}}</div>
                                        @endif
                                        
                                        @if($tag->status =="決定")
                                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-gray-200 text-gray-800 rounded-full">{{$tag->status}}</div>
                                        @endif
                                        <h3 class="title">{{$tag->name}}</h3>
                                        <div class="box">
                                            <h3>メモ</h3>
                                            <p>{{$tag->memo}}</p>
                                        </div>
                                    </section>
                                </li>
                            @endforeach
                        </ui>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/accordion.js') }}"></script>

</body>
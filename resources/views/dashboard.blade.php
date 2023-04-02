<!-- resources/views/tweet/index.blade.php -->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>イエつく！！</title>
    
    <!-- Select2.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2本体 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    
    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
</head>


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
                    <div class="grid">
                        <ul class="accordion-area">
                            @foreach ($tags as $tag)
                                <li>                                       
                                    <section class="grid flex">
                                         <div class="status">{{$tag->status}}</div>
                                        <h3 class="title">{{$tag->name}}</h3>

                                        <br>
                                        <div class="box">
                                            <h3>メモ</h3>
                                            <p>{{$tag->memo}}</p>
                                            <form action="{{ route('memoedit', $tag->id) }}" method="GET" class="text-left">
                                            @csrf
                                                <button>
                                                  <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                            </form>
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
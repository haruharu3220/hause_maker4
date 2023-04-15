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
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.1"></script>
    
    <link rel="stylesheet" type="text/css" href="{{ asset('css/accordion.css') }}">

    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
            <div class="my-info my-4 p-4 border-gray-300 border">
                <h2 class="m-4 text-xl">私の情報</h2>
                <div class="flex w-full">
                    <!--<div class="mx-4 w-1/2 flex-shrink-0 max-w-[300px]"> -->
                    <div class="mx-4 w-1/2">
                        <table class="">
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
                                    <td>{{$member->name}}</td></br>
                                    @endforeach
                                @endif
                            </tr>
                        </table>
                    </div>
                    <div class="w-1/2 flex justify-center items-center">
                    @if($totalTags > 0)

                    <!--円グラフを表示 circle.jsで処理をしている。canvasのattributeとして値を渡している-->
                    <canvas id="sushi_circle" width="250" height="250" data-total-tags="{{ $totalTags }}" data-undecided-tags="{{ $undecidedTags }}" data-considering-tags="{{ $consideringTags }}" data-decided-tags="{{ $decidedTags }}"></canvas>
                    </div>
                    @else
                        <p>タグがありません</p>
                    @endif
                </div>
            </div>
            
            
            
            <div class="my-tag-info my-4 p-4 border-gray-300 border">
                @if($tags!="")
                <h2 class="text-xl">タグ一覧</h2>    
                    <div class="grid">
                        <ul class="accordion-area">
                            @foreach ($tags as $tag)
                                <li>                                       
                                    <section>
                                        <div class="flex items-center mb-4 tag-area">
                                            <h3 class="title">{{$tag->name}}</h3>
                                            @if($tag->status =="未決定")
                                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">{{$tag->status}}</div>
    
                                            @elseif($tag->status =="検討中")
                                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-blue-200 text-blue-800 rounded-full">{{$tag->status}}</div>
                                            
                                            @else($tag->status =="決定")
                                            <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full">{{$tag->status}}</div>
                                            @endif
                                            <form action="{{ route('memoedit', $tag->id) }}" method="GET" class="text-left">
                                            @csrf
                                                <button>
                                                  <i class="fa-regular fa-pen-to-square"></i>
                                                </button>
                                            </form>
                                        
                                        </div>
                                        <div class="box">
                                            <h3 class="text-lg italic font-semibold mb-2">メモ</h3>
                                            {{--<p>{{$tag->memo}}</p>--}}
                                            <div>{!! nl2br(e($tag->memo)) !!}</div>
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
<script src="{{ asset('js/circle.js') }}"></script>

</body>
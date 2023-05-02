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
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    <link href="https://unpkg.com/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/table.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
</head>


<x-app-layout>
    
    {{--
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            @if($team !="")
                {{$team->team_name}}の{{ __('ページ') }}
            @endif
        </h2>
    </x-slot>
    --}}
    <div class="main">
    <div class="py-12">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
            <div class="my-info my-4 p-4">
                <h2 class="mx-4 mt-4 text-xl">私の情報</h2>
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
            
            <!-- liを昇順で並び替えるボタン作成 -->
            
            <div class="my-tag-info my-4 p-4">
                @if($tags!="")
                <h2 class="text-xl">タグ一覧</h2>
                
                <!--ソート付きテーブル-->
                  <div id="users">
                  
                    <section class="flex">
                        <div class="w-1/3 flex items-center justify-center"><button class="sort" data-sort="name">部屋名</button></div>
                        <div class="w-1/6 flex items-start justify-start">    <button class="sort" data-sort="status">
                            ステータス</button></div>
                        <div class="w-1/6 flex items-start justify-start">  <button class="sort" data-sort="importance">こだわり度</button></div>
                        <div class="flex items-center justify-center">  <button class="sort" data-sort="deadline">締切
                          </button>
                        </div>
                    </section>

                    <table class="w-3/4 custom-table">
                      <tbody class="list">
      
                        @foreach ($tags as $tag)
                        <tr>
                          <td class="name w-1/5">
                            <form action="{{ route('memoedit', $tag->id) }}" method="GET" class="text-left">
                            @csrf
                              <button>{{$tag->name}}</button>
                            </form>
                          </td>
      

                          @if($tag->status =="未決定")
                          <td style="padding-top: 0.1em; padding-bottom: 0.1rem"
                            class="status text-xs px-3 bg-red-200 text-red-800 rounded-full status">{{$tag->status}}</td>

                          @elseif($tag->status =="検討中")
                          <td style="padding-top: 0.1em; padding-bottom: 0.1rem"
                            class="status text-xs px-3 bg-blue-200 text-blue-800 rounded-full">{{$tag->status}}</td>
                  
                          @else($tag->status =="決定")
                          <td style="padding-top: 0.1em; padding-bottom: 0.1rem"
                            class="status text-xs px-3 bg-teal-200 text-teal-800 rounded-full">{{$tag->status}}</td>
                          @endif

                          <td class="importance w-1/5">{{$tag->importance}}</td>

                          <td class="deadline datetime w-1/5 my-1 mr-4 items-center justify-center items-center text-gray-600">
                            @if($tag->deadline)
                              {{ date('Y.m.d', strtotime($tag->deadline)) }}
                            @endif
                          </td>
                          
                          <td class="datetime my-1 mr-4 w-1/5 items-center justify-center items-center text-red-600">
                            @if($tag->status != "決定")
                              @if($tag->deadline)
                                @php
                                  $diffInDays = \Carbon\Carbon::parse($tag->deadline)->diff(now())->days;
                                @endphp
                                @if($diffInDays == 0 && \Carbon\Carbon::parse($tag->deadline)->isToday())
                                  <div class="text-red-400">
                                    本日
                                  </div>
                                @elseif($diffInDays == 0 && \Carbon\Carbon::parse($tag->deadline)->isTomorrow())
                                  <div class="text-orange-600">
                                    明日
                                  </div>
                                @elseif(\Carbon\Carbon::parse($tag->deadline)->isFuture())
                                  <div class="text-gray-600">
                                    あと{{ $diffInDays + 1 }}日
                                  </div>
                                @else
                                  <div class="text-red-800">
                                    締切過ぎてます！
                                  </div>
                                @endif
                              @endif
                            @endif
                          </td>
                          <td> 

                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                @endif
            </div>
        </div>
    </div>

</div>

</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>

</x-app-layout>





<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="{{ asset('js/circle.js') }}"></script>
<script>
  var options = {
    valueNames: [ 'name', 'status','importance','deadline' ]
  };

  var userList = new List('users', options);
  
</script>


</body>
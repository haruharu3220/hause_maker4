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
                {{--{{$team->team_name}}の{{ __('ページ') }}--}}
        </h2>
    </x-slot>

    <div class="py-12 bg-white">
        <div class="max-w-7xl h-full mx-auto sm:px-6 lg:px-8">
            <div class="my-info my-4 p-4 border-gray-300 border">
                <h2 class="mx-4 mt-4 text-xl">現在担当しているいる案件情報</h2>
                <div class="flex w-full">
                </div>
            </div>
            
            <!-- liを昇順で並び替えるボタン作成 -->
            
            <div class="my-tag-info my-4 p-4 border-gray-300 border">
                <h2 class="text-xl">案件一覧</h2>    
                    <div class="grid">
                        --
                        @foreach($teams as $team)
                              <li>                                       
                                    <section>
                                        <div class="flex items-center mb-4 tag-area">
                                            {{ $team->team_name }}
                                        </div>
                                        
                                    </section>
                                </li>
                        @endforeach
                        --

                        
                        
                    </div>
            </div>
        </div>
    </div>
            
</x-app-layout>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="{{ asset('js/accordion.js') }}"></script>
<script src="{{ asset('js/circle.js') }}"></script>

</body>
<!-- resources/views/tweet/index.blade.php -->
<head>

    <!-- Select2.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2本体 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
</head>
  
  <x-app-layout>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       の{{ __('案件追加画面') }}
      </h2>
    </x-slot>
  
   <form method="POST" action="{{ route('designer.register') }}">
        @csrf

        <!-- 家ID -->
        <div class="m-4">
            <x-input-label for="team_id" :value="__('家族ID')" />
            <x-text-input id="team_id" class="block mt-1 w-full" type="text" name="team_id" :value="old('team_id')" required autofocus autocomplete="家ID" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            @if (session('error'))
                <div class="text-red-600 alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
        </div>


            <x-primary-button class="ml-3">
                {{ __('案件追加') }}
            </x-primary-button>
            
            <a href="{{ route('designer.dashboard') }}">
                <x-secondary-button class="ml-3">
                {{ __('戻る') }}
                </x-secondary-button>
            </a>
        </div>
    </form>
    
  
  
  
  </x-app-layout> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
    <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>  <!--自作のJS-->
    <script src="{{ asset('js/test.js') }}"></script>

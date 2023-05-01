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
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    
</head>
  
  <x-app-layout>
    
    {{--
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{$team->team_name}}の{{ __('タグ設定画面') }}
      </h2>
    </x-slot>
    --}}
  <div class="main">
    <div class="flex justify-center">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
        
        <form method="POST" action="{{ route('tag.store') }}">
            @csrf
            <div>
                <x-input-label for="tagName" :value="__('タグ追加')" />
                <p>追加するタグ(部屋名)を入力してください。</p>
                <x-text-input id="tagName" class="block mt-1 w-full" type="text" name="tagName" :value="old('tagName')" required autofocus autocomplete="tagName" />
                <x-input-error :messages="$errors->get('tagName')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-4">
                    {{ __('登録') }}
                </x-primary-button>
            </div>
        </form>
        
            <div class="">
      @foreach ($tags as $tag)
        <div class="w-full items-center">
          <li class="flex w-full my-8 shadow-sm #e2e8f0">
            <span class="w-4/5 {{$tag->name}}">・{{$tag->name}}</span>
            <!-- 削除ボタン -->
            <form action="{{ route('tag.destroy',$tag->id) }}" method="POST" >
              @method('delete')
              @csrf
              <button class="text-right destroy" type="submit">
                <i class="fas fa-trash"></i>
              </button>
            </form>
          </li>
        </div>
      @endforeach
    </div>
    </div>  
  </div>



  </x-app-layout> 

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
    <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>  <!--自作のJS-->
    <script src="{{ asset('js/test.js') }}"></script>

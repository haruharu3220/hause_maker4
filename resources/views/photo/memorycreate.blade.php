<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <!-- Select2.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
        <!-- jquery & iScroll -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Select2本体 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="{{ asset('js/test.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">
        <link rel="stylesheet" href="{{ asset('css/neumorphism.css') }}">
    </head>
    <body>
      <x-app-layout>
      <div class="main">
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class=" dark:bg-gray-800 sm:rounded-lg neumorphism">
        <div class="p-6 dark:bg-gray-800  dark:border-gray-800 ">
          @include('common.errors')
          <h1 class="flex justify-center mb-4 pb-2 border-b-4 border-teal-500 text-xl tracking-wide">フォトムービー作成画面</h1>
          <!--フォーム開始-->
          <form class="mb-6" action="{{ route('photo.memory') }}" method="GET">
            @method('get')
            @csrf
            
            <div class="my-4">
              <x-input-label for="status" :value="__('スター付きの画像のみ表示しますか？')"/>
              <div class="flex mb-4">
                <input type="radio" name="status" id="type-1" value="はい">    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="">はい</div>
                </div>
                <input type="radio" name="status" id="type-2" value="いいえ">  
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="">いいえ</div>
              </div>
            </div>
            
            <div class="flex items-center justify-end mt-4">
              <!--前画面に戻るボタン-->
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                </x-primary-button>
              </a>
              <!--決定ボタン-->
              <x-primary-button class="ml-3">
                {{ __('決定') }}
              </x-primary-button>
            </div>
          </form>
        </div>
        </div>
        </div>
    </div>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</x-app-layout>

    </body>
</html>




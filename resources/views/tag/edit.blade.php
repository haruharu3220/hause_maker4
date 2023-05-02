<!-- resources/views/tweet/edit.blade.php -->
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
        {{--
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('編集画面') }}
          </h2>
        </x-slot>
        --}}
      <div class="main">
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class=" dark:bg-gray-800 sm:rounded-lg neumorphism">
        <div class="p-6 dark:bg-gray-800  dark:border-gray-800 ">
          @include('common.errors')
          <h1 class="flex justify-center mb-4 pb-2 border-b-4 border-teal-500 text-xl tracking-wide">タグ詳細</h1>
          <!--フォーム開始-->
          <form class="mb-6" action="{{ route('tag.update',$tag->id) }}" method="POST">
            @method('put')
            @csrf
            
            <div class="flex flex-col my-4">
              <x-input-label for="tag" :value="__('タグ')" />
              <x-text-input id="tag" class="block mt-1 w-full" type="text" name="name" value="{{$tag->name}}" required autofocus />
              <x-input-error :messages="$errors->get('tag')" class="mt-2" />
            </div>
            
            <div class="my-4">
              <x-input-label for="status" :value="__('ステータス')"/>
              <div class="flex mb-4">
              <input type="radio" name="status" id="type-1" value="未決定" @if($tag->status == "未決定") checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">未決定</div>
              </div>
              <div class="flex mb-4">
              <input type="radio" name="status" id="type-2" value="検討中" @if($tag->status == '検討中') checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-blue-200 text-blue-800 rounded-full status">検討中</div>
              </div>
              <div class="flex mb-4">
              <input type="radio" name="status" id="type-1" value="決定" @if($tag->status == '決定') checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full status">決定</div>
              </div>
            </div>
            
            <div class="my-4">
              <x-input-label for="importance" :value="__('こだわり度')"/>
              <div class="flex mb-4">
                <input type="radio" name="importance" id="importance-1" value=1 @if($tag->importance == 1) checked @endif>
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">↗︎</div>
              </div>
              <div class="flex mb-4">
                <input type="radio" name="importance" id="importance-2" value=2 @if($tag->importance == 2) checked @endif>    
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-blue-200 text-blue-800 rounded-full status">→</div>
              </div>
              <div class="flex mb-4">
                <input type="radio" name="importance" id="importance-1" value=3 @if($tag->status == 3) checked @endif>    
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full status">↘︎</div>
              </div>
            </div>
            
            <x-input-label for="importance" :value="__('締切')"/>
            <div class="my-2"><input type="date" class="border-gray-300 rounded-md" name="deadline" value="{{ date('Y-m-d', strtotime($tag->deadline)) }}"></div>


            
          
          <div class="flex flex-col mb-4">
            <x-input-label for="memo" :value="__('メモ')" />
            <textarea id="memo" class="block mt-1 focus:border-teal-500 focus:ring-teal-500 border-gray-300 rounded-md w-full" name="memo" rows="4">{{$tag->memo}}</textarea>
            <x-input-error :messages="$errors->get('tag')" class="mt-2" />
          </div>

        
            <div class="flex items-center justify-end mt-4">
              <!--前画面に戻るボタン-->
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                </x-primary-button>
              </a>
              <!--更新ボタン-->
              <x-primary-button class="ml-3">
                {{ __('更新') }}
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




<!-- resources/views/tweet/edit.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
      
        <!-- Select2.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
        <!-- jquery & iScroll -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Select2本体 -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
        <script src="{{ asset('js/test.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    </head>
    <body>
      <x-app-layout>
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('編集画面') }}
          </h2>
        </x-slot>
          </ul>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          
          <!--フォーム開始-->
          <form class="mb-6" action="{{ route('tag.update',$tag->id) }}" method="POST">
            @method('put')
            @csrf
            
            <x-input-label for="status" :value="__('タイプ')" />
              <div class="flex">
              <input type="radio" name="status" id="type-1" value="未決定">    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">未決定</div>
              </div>
              <div class="flex">
              <input type="radio" name="status" id="type-2" value="検討中">    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full status">検討中</div>
              </div>
              <div class="flex">
              <input type="radio" name="status" id="type-1" value="決定">    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-gray-200 text-gray-800 rounded-full status">決定</div>
              </div>

        
            <div class="flex flex-col mb-4">
              <x-input-label for="tag" :value="__('tag')" />
              <x-text-input id="tag" class="block mt-1 w-full" type="text" name="name" value="{{$tag->name}}" required autofocus />
              <x-input-error :messages="$errors->get('tag')" class="mt-2" />
            </div>
            
            <div class="flex flex-col mb-4">
              <x-input-label for="memo" :value="__('memo')" />
              <x-text-input id="memo" class="block mt-1 w-full" type="text" name="memo" value="{{$tag->memo}}" />
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</x-app-layout>

    </body>
</html>




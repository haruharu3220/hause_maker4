<!-- resources/views/tweet/edit.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <script src="{{ asset('js/test.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
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
          <form class="mb-6" action="{{ route('photo.update',$photo->id) }}" method="POST">
            @method('put')
            @csrf
        
            <!--画像-->
            <img src="{{ asset('storage/image/'.$photo->image)}}"　class="mx-auto" style="height:300px;">
            
            <x-input-label for="type" :value="__('タイプ')" />
              <input type="radio" name="type" id="type-1" value="1"> 写真
              <input type="radio" name="type" id="type-2" value="2"> 図面
              <input type="radio" name="type" id="type-3" value="3"> 書類・メモ
              <input type="radio" name="type" id="type-4" value="4"> その他
            
            <select class="select2 html block mt-1 w-full" name="tags[]" multiple>
              @foreach($tags as $tag)
                  <option value="{{$tag->id}}" {{ in_array($tag->name, $photo->tag_names ?? []) ? 'selected' : '' }}>{{$tag->name}}</option>
              @endforeach
            </select>
            <script>
              $(".select2.html").select2({
                placeholder: "タグを選択"
              });
            </script>
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




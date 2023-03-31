<!-- resources/views/tweet/create.blade.php -->
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
      <link rel="stylesheet" href="{{ asset('css/radiobutton.css') }}">
      <style>
          body {
              font-family: 'Nunito', sans-serif;
          }
      </style>
  </head>
    
  <x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('投稿してね') }}
      </h2>
    </x-slot>
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
            @include('common.errors')
            <form class="mb-6" action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <!--画像ファイルの選択-->
              <div class="flex flex-col mb-4">
                <x-input-label for="image" :value="__('画像')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus onchange="previewImage(this)"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
              </div>
              <p>
              <!--Preview:<br>-->
              <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-width:200px;">
              </p>
              <script>
              function previewImage(obj)
              {
              	var fileReader = new FileReader();
              	fileReader.onload = (function() {
  	        	document.getElementById('preview').src = fileReader.result;
  	        });
  	            fileReader.readAsDataURL(obj.files[0]);
              }
              </script>

              <x-input-label for="image" :value="__('タイプ')" />
                <input type="radio" name="type" value="1"> 写真
                <input type="radio" name="type" value="2"> 図面
                <input type="radio" name="type" value="3"> 書類・メモ
                <input type="radio" name="type" value="4"> その他

              
              <!--Tags-->
              
              <select class="select2 html block m-4 w-full" name="tags[]" multiple>
              @foreach($tags as $tag)
                  <option value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
              </select>

              <script>

                $(".select2.html").select2({
                  placeholder: "タグを選択"
                });
              </script>
  
  
              <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                  {{ __('投稿') }}
                </x-primary-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </x-app-layout>


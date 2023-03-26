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
              <div class="flex flex-col mb-4">
                <x-input-label for="image" :value="__('Picture')" />
                <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus onchange="previewImage(this)"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
              </div>
              <p>
              Preview:<br>
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

              <!--Tags-->
              
              <select class="select2 html block mt-1 w-full" name="tags[]" multiple>
                  <option value="a">キッチン</option>
                  <option value="b">リビング</option>
                  <option value="c">風呂</option>
                  <option value="d">洗面</option>
                  <option value="e">和室</option>
              </select>
              
              {{--<!--<select class="select2 html block mt-1 w-full" name="tags[]" multiple>-->
              <!--    <option value="キッチン" {{ in_array('キッチン', $tagNames) ? 'selected' : '' }}>キッチン</option>-->
              <!--    <option value="リビング" {{ in_array('リビング', $tagNames) ? 'selected' : '' }}>リビング</option>-->
              <!--    <option value="風呂" {{ in_array('風呂', $tagNames) ? 'selected' : '' }}>風呂</option>-->
              <!--    <option value="洗面" {{ in_array('洗面', $tagNames) ? 'selected' : '' }}>洗面</option>-->
              <!--    <option value="和室" {{ in_array('和室', $tagNames) ? 'selected' : '' }}>和室</option>-->
              <!--</select>   -->--}}
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


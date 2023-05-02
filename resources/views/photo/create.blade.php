<!-- resources/views/tweet/create.blade.php -->
  <head>
      <!-- Select2.css -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
      <!-- jquery & iScroll -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Select2本体 -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
      <link rel="stylesheet" href="{{ asset('css/background.css') }}">
      <link rel="stylesheet" href="{{ asset('css/input_file.css') }}">
      <link rel="stylesheet" href="{{ asset('css/neumorphism.css') }}">
  </head>
    
  <x-app-layout>
    {{--
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('投稿してね') }}
      </h2>
    </x-slot>
    --}}
  <div class="main">
    <div class="py-12">
      <div class="max-w-xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="mx-4 dark:bg-gray-800 overflow-hidden sm:rounded-lg neumorphism">
          <div class="p-6 dark:bg-gray-800 dark:border-gray-800 ">
            @include('common.errors')
            <h1 class="flex justify-center mb-4 pb-2 border-b-4 border-teal-200 text-xl tracking-wide">投稿</h1>
            
            <form class="mb-6" action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              
              <!--画像ファイルの選択-->
              <div class="flex flex-col mb-4">
                <x-input-label for="image" :value="__('画像')" />
                <input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus onchange="previewImage(this)"/>
                <x-input-error :messages="$errors->get('image')" class="mt-2" />
              </div>


              <div class="mb-4">
                <x-input-label for="type" :value="__('タイプ')" />
                  <input type="radio" name="type" value="1" checked> 写真
                  <input type="radio" name="type" value="2"> 図面
                  <input type="radio" name="type" value="3"> 書類・メモ
                  <input type="radio" name="type" value="4"> その他
              </div>
              
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
              <div class="m-4">
              <p>
              <!--Preview:<br>-->
              <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="width:100%">
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
              </div>
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
  </div>
  </x-app-layout>


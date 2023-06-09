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
        
        <link rel="stylesheet" href="{{ asset('css/background.css') }}">

    </head>
    <body>
      <x-app-layout>
        {{--
        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('編集画面') }}
          </h2>
        </x-slot>
        --}}
          </ul>

      <div class="py-12 main">
        <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          
          <!--フォーム開始-->
          <form class="mb-6" action="{{ route('photo.update',$photo->id) }}" method="POST">
            @method('put')
            @csrf

            <x-input-label for="type" :value="__('タイプ')" />
              <input type="radio" name="type" id="type-1" value="1" @if($photo->type_id == "1") checked @endif> 写真
              <input type="radio" name="type" id="type-2" value="2" @if($photo->type_id == "2") checked @endif> 図面
              <input type="radio" name="type" id="type-2" value="3" @if($photo->type_id == "3") checked @endif> チャット
              <input type="radio" name="type" id="type-3" value="4" @if($photo->type_id == "4") checked @endif> 書類・メモ
              <input type="radio" name="type" id="type-4" value="5" @if($photo->type_id == "5") checked @endif> その他
            
            <div class="my-4">
            <select class="select2 html block w-full" name="tags[]" multiple>
              @foreach($tags as $tag)
                  <option value="{{$tag->id}}" {{ in_array($tag->name, $photo->tag_names ?? []) ? 'selected' : '' }}>{{$tag->name}}</option>
              @endforeach
            </select>
            <script>
              $(".select2.html").select2({
                placeholder: "タグを選択"
              });
            </script>
            </div>
            
            <!--画像-->
            <img src="{{ asset('storage/image/'.$photo->image)}}"　class="mx-auto m-4" style="height:100%;">
            
            
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




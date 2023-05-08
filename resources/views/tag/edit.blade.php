<head>
    <!-- Select2.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2本体 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tag_side.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toggle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/background.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card2.css') }}">
    
    
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>

  
  <x-app-layout>

    {{--
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{$team->team_name}}の{{ __('画像一覧ページ') }}
      </h2>
    </x-slot>
    --}}
  
    
    <!--★★★★★★★★★★★★★★★★★★★★★★★★★★ここから★★★★★★★★★★★★★★★★★★★★★★★-->
    <div class="main">
    <div class="flex">
      <div id="tag_sidebar" class="sidebar">
        <nav id="global-nav">
          <!--フォーム開始-->
          <form class="mb-6" action="{{ route('tag.update',$selected_tag->id) }}" method="POST">
            @method('put')
            @csrf
            
            <div class="m-4 tag_contener">
              <div class="flex flex-col m-4">
                <x-input-label for="tag" :value="__('タグ') " />
                <x-text-input id="tag" class="block mt-1 w-full" type="text" name="name" value="{{$selected_tag->name}}" required autofocus />
                <x-input-error :messages="$errors->get('tag')" class="mt-2" />
              </div>
            </div>
            
            <div class="m-4 tag_contener">
              <div class="flex flex-col mb-4 mx-4">
                <x-input-label for="memo" :value="__('メモ')" />
                <textarea id="memo" class="block mt-1 focus:border-teal-500 focus:ring-teal-500 border-gray-300 rounded-md w-full" name="memo" rows="4">{{$selected_tag->memo}}</textarea>
                <x-input-error :messages="$errors->get('tag')" class="mt-2" />
              </div>
            </div>
            
            <div class="m-4 tag_contener">
              <x-input-label for="status" :value="__('ステータス')"/>
              <div class="flex mb-4 flex justify-center">
              <input type="radio" name="status" id="type-1" value="未決定" @if($selected_tag->status == "未決定") checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-red-200 text-red-800 rounded-full status">未決定</div>
              </div>
              <div class="flex mb-4  flex justify-center">
              <input type="radio" name="status" id="type-2" value="検討中" @if($selected_tag->status == '検討中') checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-blue-200 text-blue-800 rounded-full status">検討中</div>
              </div>
              <div class="flex mb-4  flex justify-center">
              <input type="radio" name="status" id="type-1" value="決定" @if($selected_tag->status == '決定') checked @endif>    
                <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-teal-200 text-teal-800 rounded-full status">決定</div>
              </div>
            </div>
            
            <div class="m-4 tag_contener">
              <x-input-label for="importance" :value="__('こだわり度')"/>
              <div class="flex mb-4 flex justify-center">
                <input type="radio" name="importance" id="importance-1" value=1 @if($selected_tag->importance == 1) checked @endif>
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-red-200 text-red-800 rounded-full status">↗︎</div>
              </div>
              <div class="flex mb-4 flex justify-center">
                <input type="radio" name="importance" id="importance-2" value=2 @if($selected_tag->importance == 2) checked @endif>    
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-blue-200 text-blue-800 rounded-full status">→</div>
              </div>
              <div class="flex mb-4 flex justify-center">
                <input type="radio" name="importance" id="importance-1" value=3 @if($selected_tag->status == 3) checked @endif>    
                  <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-3/5 text-xs px-3 bg-teal-200 text-teal-800 rounded-full status">↘︎</div>
              </div>
            </div>
            
            <div class="m-4 tag_contener">
              <x-input-label for="importance" :value="__('締切')"/>
              <div class="my-2"><input type="date" class="border-gray-300 rounded-md" name="deadline" value="{{ date('Y-m-d', strtotime($selected_tag->deadline)) }}"></div>
            </div>
          
            <div class="flex items-center justify-center my-4 mb-4">
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
            
            <!-- buttonタグの場合 -->
            <button type="button" onclick="window.print();" class="inline-flex items-center px-4 py-2 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-500 rounded-md font-semibold text-xs text-gray-700 dark:text-gray-300 uppercase tracking-widest shadow-sm hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25 transition ease-in-out duration-150'">PDF出力</button>

          </form>
          
        </nav>
      </div>
      
      
      <div class="main_content pt-4">
        @if(count($photos) > 0)
        <ul class="grid">
          @foreach ($photos as $photo)
           @if($photo->selected_tag)
            <li class="item {{$photo->tag_no}} type_no_{{$photo->type_id}} mb-2">
              <!--内側のdivには高さを維持するためにitem-contentというクラス名をつける。-->
              <div class="item-content">
                <!--写真エリア-->
                <div class="photo_area">
                  <!--スターボタン-->
                  <div class="star-container">
                    @if($photo->iine != true)
                      <form action="{{ route('favorite', $photo->id) }}" method="POST">
                          @csrf
                        <button>
                          <i class="fa-regular fa-star fa-2xl star"></i>
                        </button>
                      </form>
                    @else
                      <form action="{{ route('unfavorite', $photo->id) }}" method="POST">
                        @csrf
                        <button>
                          <i class="fa-solid fa-star fa-2xl star" style="color: #ffd700;"></i>
                        </button>
                      </form>
                    @endif
                  </div>
                  
                  <a href="{{ asset('storage/image/'.$photo->image)}}" data-lightbox="picture" data-title="{{$photo->name}}">
                    <div class="image-container">
                      <img src="{{ asset('storage/image/'.$photo->image)}}" class="modal-trigger mx-auto" >
                    </div>
                  </a>
                </div>
            
                <!--データエリア-->
                <div class="photo_date">
                  <!--タグ名-->
                  <div class="flex justify-center m-2">
                    <p>{{$photo->type_name}}</p>
                  </div>
                  
                  <!--投稿日-->
                  <div class="my-1 justify-end flex justify-center">
                    <div >{{ date('Y.m.d', strtotime($photo->created_at))  }}</div>
                  </div>
            
                  <!--タグ表示     -->
                  <div class="flex justify-center items-center flex-wrap ">
                    <!--タグを表示-->
                    @foreach ($photo->tag_names as $tag_name)
                    {{--<span class="h-5 mr-2 inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-blue-100 text-blue-800">#{{$tag_name}}</span>--}}
                    <span class="inline-block h-1/3 bg-gray-200 font-light rounded-md px-2 py-1 text-sm text-gray-700 mx-2 mb-2 flex items-center justify-center">#{{$tag_name}}</span>
                    @endforeach
                  </div>
            
                  <div class="flex justify-center">
                    <!--更新ボタン-->
                    <form action="{{ route('photo.edit',$photo->id) }}" method="GET">
                      @csrf
                      <button type="submit">
                        <span class="material-symbols-outlined">
                          edit_square
                        </span>
                        <style>
                          .material-symbols-outlined {
                            font-variation-settings:
                              'FILL' 0,
                              'wght' 300,
                              'GRAD' 0,
                              'opsz' 48
                          }
                        </style>
                      </button>
                    </form>
                  
                    <!--削除ボタン-->
                    <form action="{{ route('photo.destroy',$photo->id) }}" method="POST">
                      @method('delete')
                      @csrf
                      <button class="destroy" type="submit">
                        <span class="material-symbols-outlined">
                          delete
                        </span>
                        <style>
                        .material-symbols-outlined {
                          font-variation-settings:
                          'FILL' 0,
                          'wght' 300,
                          'GRAD' 0,
                          'opsz' 48
                        }
                        </style>
                      </button>
                    </form>
                  </div>
                <!--item-content終了-->
                </div>    
                  
                  <!--共有ボタン-->
                  {{--
                  @if($photo->share_flag==false)
                  <form action="{{ route('share',$photo->id) }}" method="POST" class="text-right">
                    @csrf
                    <button class="share" type="submit">
                      共有する
                    </button>
                  </form>
                  @else
                  <form action="{{ route('share',$photo->id) }}" method="POST" class="text-right">
                    @csrf
                    <button class="share" type="submit">
                      共有済
                    </button>
                  </form>
                  @endif
                --}}
                  

              </div>
            </li>
            @endif
          @endforeach
            </ul>
            {{$photos->links()}}
        
      
  
            <script>
              lightbox.option({
                'resizeDuration': 500,
                'wrapAround': true,
                'alwaysShowNavOnTouchDevices':true,
                
              })
          </script>
        @else
          <h1>この期間に投稿された画像はありません。</h1>
        
        @endif
      </div>
    </div>
  </div>
  </x-app-layout> 


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.0.0/velocity.min.js"></script>
<script type="text/javascript">
(function($) {
    $(function () {
        $('.sub-menu > a').on('click', function (e) {
            e.preventDefault();
            var $subNav = $(this).next('.sub-menu-nav');
            if ($subNav.css("display") === "none") {
                $(this).addClass('is-active');
                $subNav.velocity('slideDown', {duration: 400});
            } else {
                $(this).removeClass('is-active');
                $subNav.velocity('slideUp', {duration: 400});
            }
        });
    });
})(jQuery);
</script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
  <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>  <!--自作のJS-->
  <script src="{{ asset('js/lightbox.js') }}"></script>
  <script src="{{ asset('js/test.js') }}"></script>

    

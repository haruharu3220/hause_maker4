<head>
    <!-- Select2.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css">
    <!-- jquery & iScroll -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Select2本体 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
    <link rel="stylesheet" href="{{ asset('css/side.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toggle.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
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
      <div id="sidebar" class="sidebar">
    
        <nav id="global-nav">
          <ul class="sort-btn">
            <div class="serch">
              <form action="{{ route('photo.index') }}" method="GET">

                <dt class="my-4 text-xl">検索範囲指定</dt>
                <p>開始日</p>
                <div class="my-2"><input type="date" name="start" value="{{$startDate}}"></div>
              
                <p>終了日</p>
                <div class="my-2"><input type="date" name="end" value="{{$endDate}}"></div>
          
                <x-secondary-button class="ml-3">
                  {{ __('検索') }}
                </x-secondary-button>
              </form>        
            </div>
        
            <li>
              <!--<a href="#"><dt class="text-xl">ALL</dt></a>-->
                <!--unordered list 順不同リスト-->
              <ul class="all-menu">
                <li class="all active text-xl">ALL</li>  <!--list item リスト項目-->
              </ul>
            </li>
            
 
            <li class="sub-menu">
              <a href="#" class="flex items-center justify-center "><dt class="text-xl">部屋 <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i></dt></a>
                <ul class="sub-menu-nav w-full">
                  @foreach($tags as $tag)
                    <li class="tag_no_{{$tag->id}} tag"><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
            </li>
        
            <li class="sub-menu">
              <a href="#" class="flex items-center justify-center"><dt class="text-xl">タイプ <i class="indicator glyphicon glyphicon-chevron-down-custom  pull-right"><span class="sp-1"></span><span class="sp-2"></span></i></dt></a>
                <ul class="sub-menu-nav">
                  @foreach($types as $type)
                    <li class="type_no_{{$type->id}}"><a href="#">{{$type->name}}</a></li>
                  @endforeach
                </ul>
            </li>
          </ul>
        </nav>
      </div>
      
      <div class="main_content pt-4">
        @if(count($photos) > 0)
        <ul class="grid">
          @foreach ($photos as $photo)
          
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
                  <div class="flex justify-center flex-wrap w-3/5 ">
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

    

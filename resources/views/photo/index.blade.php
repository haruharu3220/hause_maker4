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
</head>
  
  <x-app-layout>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
       {{$team->team_name}}の{{ __('画像一覧ページ') }}
      </h2>
    </x-slot>
    
    <form action="{{ route('photo.index') }}" method="GET">
            <h2>検索</h2>
        <p>開始日：</p>
        <input type="date" name="start">
        
        <p>~終了日：</p>
        <input type="date" name="end">
    
        <button type="submit">送信</button>
    </form>
    
    <!--★★★★★★★★★★★★★★★★★★★★★★★★★★ここから★★★★★★★★★★★★★★★★★★★★★★★-->
    <div class="flex">
      <div id="sidebar">
        <nav id="global-nav">
          <ul class="sort-btn">
           <li class="sub-menu">
              <a href="#"><dt>All</dt></a>
                <ul class="sub-menu-nav">  <!--unordered list 順不同リスト-->
                  <li class="all active">全て</li>  <!--list item リスト項目-->
                </ul>
            </li>
 
            <li class="sub-menu">
              <a href="#"><dt>部屋</dt></a>
                <ul class="sub-menu-nav">
                  @foreach($tags as $tag)
                    <li class="tag_no_{{$tag->id}}"><a href="#">{{$tag->name}}</a></li>
                  @endforeach
                </ul>
            </li>
        
            <li class="sub-menu">
              <a href="#"><dt>タイプ</dt></a>
                <ul class="sub-menu-nav">
                  @foreach($types as $type)
                    <li class="type_no_{{$type->id}}"><a href="#">{{$type->name}}</a></li>
                  @endforeach
                </ul>
            </li>
          </ul>
        </nav>
      </div>
    <!--★★★★★★★★★★★★★★★★★★★★★★★★★★ここまで★★★★★★★★★★★★★★★★★★★★★★★-->
    
    
      <div class="main_content">
      
        <ul class="grid">
        @foreach ($photos as $photo)
          <!--<i class="fa-solid fa-star" style="color: #7a7a71;"></i>-->
          <li class="item {{$photo->tag_no}} type_no_{{$photo->type_id}} cat03">
            <!--内側のdivには高さを維持するためにitem-contentというクラス名をつける。-->
            <div class="item-content">
              <div class="flex photo_date">
                <div>投稿日：{{ date('Y年m月d日', strtotime($photo->created_at)) }}</div>
                @if($photo->iine != true)
                  <form action="{{ route('favorite', $photo->id) }}" method="POST" class="text-left">
                      @csrf
                    <button>
                      <i class="fa-regular fa-star fa-2xl star"></i>
                    </button>
                  </form>
                @else
                  <form action="{{ route('unfavorite', $photo->id) }}" method="POST" class="text-left">
                    @csrf
                    <button>
                      <i class="fa-solid fa-star fa-2xl star" style="color: #e7f519;"></i>
                    </button>
                  </form>
                @endif
                
              </div>
              <div class="photo_area">
                <a href="{{ asset('storage/image/'.$photo->image)}}" data-lightbox="picture" data-title="{{$photo->name}}">
                  <img src="{{ asset('storage/image/'.$photo->image)}}" class="modal-trigger mx-auto" >
                </a>
              </div>
              <div class="photo_attribute">
                <!--タイプを表示-->
                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-red-100 text-blue-800">{{$photo->type_name}}</span>
                <!--タグを表示-->
                @foreach ($photo->tag_names as $tag_name)
                <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-blue-100 text-blue-800">{{$tag_name}}</span>
                @endforeach
                <div class="flex p-4">
                  <!--更新ボタン-->
                  <form action="{{ route('photo.edit',$photo->id) }}" method="GET" class="text-left">
                    @csrf
                      <button type="submit">
                       <i class="far fa-edit"></i>
                      </button>
                  </form>
                  <!--削除ボタン-->
                  <form action="{{ route('photo.destroy',$photo->id) }}" method="POST" class="text-right">
                    @method('delete')
                    @csrf
                      <button class="destroy" type="submit">
                       <i class="fas fa-trash"></i>
                      </button>
                  </form>
                </div>
              </div>
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

    


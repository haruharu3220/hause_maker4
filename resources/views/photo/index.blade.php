<!-- resources/views/tweet/index.blade.php -->
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
    <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.3.0/font-awesome-animation.min.css">
    
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">-->
    <link href="{{ asset('css/lightbox.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
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
    
    
    <ul class="sort-btn"> 
      <li>
        <dl>  <!--description list 説明リスト-->
          <dt>All</dt>  <!--description list term 項目名や用語-->
          <dd>  <!--description description 説明や定義、値-->
            <ul>  <!--unordered list 順不同リスト-->
              <li class="all active">全て</li>  <!--list item リスト項目-->
            </ul>
          </dd>
        </dl>
      </li>
      <li>
        <dl>
          <dt>タイプ</dt>
          <dd>
            <ul>
              @foreach($types as $type)
                <li class="type_no_{{$type->id}}">{{$type->name}}</li>
              @endforeach
            </ul>
          </dd>
        </dl>
      </li>
      <li>
        <dl>
        <dl>
          <dt>設備・部屋</dt>
          <dd>
            <ul>
              @foreach($tags as $tag)
                <li class="tag_no_{{$tag->id}}">{{$tag->name}}</li>
              @endforeach
            </ul>
          </dd>
        </dl>
      </li>
      <li>
        <dl>
          <dt>順位</dt>
          <dd>
            <ul>
              <li class="cat01">第１候補</li>
              <li class="cat02">第２候補</li>
              <li class="cat03">第３候補</li> 
            </ul>
          </dd>
        </dl>
      </li>
  <!--/sort-btn--></ul>
  
  <ul class="grid">
    @foreach ($photos as $photo)
      <li class="item {{$photo->tag_no}} type_no_{{$photo->type_id}} cat03">
        <!--内側のdivには高さを維持するためにitem-contentというクラス名をつける。-->
        <div class="item-content">

          <a href="{{ asset('storage/image/'.$photo->image)}}" data-lightbox="picture" data-title="{{$photo->name}}">
              <img src="{{ asset('storage/image/'.$photo->image)}}" class="modal-trigger mx-auto" >
          </a>
          
          <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-red-100 text-blue-800">{{$photo->type_name}}</span>
          
          @foreach ($photo->tag_names as $tag_name)
          <span class="inline-flex items-center gap-1.5 py-1.5 px-3 rounded-md text-xs font-medium bg-blue-100 text-blue-800">{{$tag_name}}</span>
          @endforeach
          
          
          <div class="flex">
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
  

  </x-app-layout> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
  <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>  <!--自作のJS-->
  <script src="{{ asset('js/lightbox.js') }}"></script>
  <script src="{{ asset('js/test.js') }}"></script>

    


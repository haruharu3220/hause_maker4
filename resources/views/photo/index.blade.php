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
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
    <link rel="stylesheet" href="{{ asset('css/test.css') }}">
</head>
  
  <x-app-layout>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('画像一覧ページ') }}
      </h2>
    </x-slot>
    
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
          <dt>Color</dt>
          <dd>
            <ul>
              <li class="color01">Color1</li>
              <li class="color02">Color2</li>
              <li class="color03">Color3</li> 
            </ul>
          </dd>
        </dl>
      </li>
      <li>
        <dl>
          <dt>Category</dt>
          <dd>
            <ul>
              <li class="cat01">カテゴリ1</li>
              <li class="cat02">カテゴリ2</li>
              <li class="cat03">カテゴリ3</li> 
            </ul>
          </dd>
        </dl>
      </li>
  <!--/sort-btn--></ul>
  
  <ul class="grid">
    @foreach ($photos as $photo)
      <!--itemというクラス名と並び替え基準となる複数のクラス名（チェックボックスのクラス名と同じ名前）を付与。-->
      <li class="item {{$photo->image}} {{$photo->id}}">
        <!--内側のdivには高さを維持するためにitem-contentというクラス名をつける。-->
        <div class="item-content">

          <a href="{{$photo->image}}" data-fancybox="group2" data-caption="グループ2キャプション">
              <img src="{{ asset('storage/image/'.$photo->image)}}" class="modal-trigger mx-auto" >
          </a>
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
  
<!-- モーダルウィンドウ -->
<div class="modal-wrapper">
  <div id="modal">
    <div class="modal-content">
      <img src="" alt="">
      
    </div>
    <div class="modal-close">×</div>
  </div>
</div>

  </x-app-layout> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>   
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/web-animations-js@2.3.2/web-animations.min.js"></script>
  <script src="https://unpkg.com/muuri@0.8.0/dist/muuri.min.js"></script>
  <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js"></script>  <!--自作のJS-->
  <script src="{{ asset('js/test.js') }}"></script>

    


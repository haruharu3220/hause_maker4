<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>6-1-4 動きを組み合わせて全画面で見せる</title>
<meta name="description"  content="書籍「動くWebデザインアイディア帳」のサンプルサイトです">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/memory.css') }}">

</head>

<body>
<div class="wrapper">
<div id="slider">
<h1>Slide show</h1>
<!--/slider--></div>
<!--/wrapper--></div>
<div class="container">
<p>使用したライブラリ：<a href="https://vegas.jaysalvat.com/" target="_blank">https://vegas.jaysalvat.com/</a></p>
<!--/container--></div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
<!--CodePenプレビュー用にコメントアウトしています。※CodePenで読み込んだJSとHTMLで読み込んだJSがバッティングして挙動がおかしくなっているため。ご利用の際はコメントを取り除いてご利用ください。<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-4/js/6-1-4.js">--></script>

    <script>
        // 画像データをJavaScriptに渡す
        const images = @json($photos);
                console.log(responsiveImage);
        {{--console.log(images);--}}
    </script>

<script src="{{ asset('js/memory.js')}}"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="description"  content="書籍「動くWebデザインアイディア帳」のサンプルサイトです">

<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!--==============レイアウトを制御する独自のCSSを読み込み===============-->
<link rel="stylesheet" type="text/css" href="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/reset.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.css">
<link rel="stylesheet" type="text/css" href="{{ asset('css/memory.css') }}">

</head>

@php
    use Illuminate\Support\Facades\File;

    $files = File::files(storage_path('app/public/image'));
    
    $fileNames = array_map(function($filesa) {
        return basename($filesa);
    }, $files);
@endphp

<body>
<div class="wrapper">
<div id="slider">
<!--/slider--></div>
<!--/wrapper--></div>
<div class="container"></div>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vegas/2.4.4/vegas.min.js"></script>
<!--CodePenプレビュー用にコメントアウトしています。※CodePenで読み込んだJSとHTMLで読み込んだJSがバッティングして挙動がおかしくなっているため。ご利用の際はコメントを取り除いてご利用ください。<script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-1-4/js/6-1-4.js">--></script>

<script>
var responsiveImage = [];
var homeimages = @json($fileNames); // ファイル名を配列に格納
console.log(homeimages);
var imageDir = '../storage/image/';

for (var i = 0; i < homeimages.length; i++) {
    var src = imageDir + homeimages[i];
    responsiveImage.push({src: src});
}

var windowwidth = window.innerWidth || document.documentElement.clientWidth || 0;

if (windowwidth <= 768) {
    responsiveImage = [
        { src: './img/img_sp_01.jpg' },
        { src: './img/img_sp_02.jpg' },
        { src: './img/img_sp_03.jpg' }
    ];
}

$('#slider').vegas({
    overlay: true,
    transition: 'fade2',
    transitionDuration: 2000,
    delay: 5000,
    animationDuration: 20000,
    animation: 'random',
    slides: responsiveImage,
});


</script>

{{--<script src="{{ asset('js/memory.js')}}"></script>--}}

</body>
</html>
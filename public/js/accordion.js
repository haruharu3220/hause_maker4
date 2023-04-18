//アコーディオンをクリックした時の動作
$('.title').on('click', function() {//タイトル要素をクリックしたら
    console.log("お");
	var findElm = $(this).parent().siblings(".box");
	$(findElm).slideToggle();//アコーディオンの上下動作
    
	if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
		$(this).removeClass('close');//クラス名を除去し
	}else{//それ以外は
		$(this).addClass('close');//クラス名closeを付与
	}
});



// $('.title').on('click', function() {//タイトル要素をクリックしたら
//     var findElm = $(this).parent().next("tr.box");
//     $(findElm).slideToggle();//アコーディオンの上下動作

//     if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
// $(this).removeClass('close');//クラス名を除去し
// } else {//それ以外は
// $(this).addClass('close');//クラス名closeを付与
// }
// });


// $('.title').on('click', function() {//タイトル要素
//       var findElm = $(this).parent().next("tr.box");
//         $(findElm).slideToggle(400);//アコーディオンの上下動作（滑らかに表示）

//         if($(this).hasClass('close')){//タイトル要素にクラス名closeがあれば
//             $(this).removeClass('close');//クラス名を除去し
//         } else {//それ以外は
//             $(this).addClass('close');//クラス名closeを付与
//         }
//     });


// $('.title').on('click', function() {
//   var findElm = $(this).parent().next("tr").find(".box");
//   findElm.slideToggle();

//   if($(this).hasClass('close')) {
//     $(this).removeClass('close');
//   } else {
//     $(this).addClass('close');
//   }
// });

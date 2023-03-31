$(window).on('load', function () {
  var grid = new Muuri('.grid', {
    showDuration: 600,
    showEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
    hideDuration: 600,
    hideEasing: 'cubic-bezier(0.215, 0.61, 0.355, 1)',
    visibleStyles: {
      opacity: '1',
      transform: 'scale(1)'
    },
    hiddenStyles: {
      opacity: '0',
      transform: 'scale(0.5)'
    }
  });

  $('.sort-btn ul li').on('click', function () {
    var className = $(this).attr("class");
    className = className.split(' ');

    if ($(this).hasClass("active")) {
      if (className[0] != "all") {
        $(this).removeClass("active");
        var selectElms = $(".sort-btn ul li.active");
        if (selectElms.length == 0) {
          $(".sort-btn ul li.all").addClass("active");
          grid.show('');
        } else {
          filterDo();
        }
      }
    } else {
      if (className[0] == "all") {
        $(".sort-btn ul li").removeClass("active");
        $(this).addClass("active");
        grid.show('');
      } else {
        if ($(".all").hasClass("active")) {
          $(".sort-btn ul li.all").removeClass("active");
        }
        $(this).addClass("active");
        filterDo();
      }
    }
  });

  function filterDo() {
    var selectElms = $(".sort-btn ul li.active");
    var selectElemAry = [];
    $.each(selectElms, function (index, selectElm) {
      var className = $(this).attr("class");
      className = className.split(' ');
      selectElemAry.push("." + className[0]);
    });

    if (selectElemAry.length === 0 || selectElemAry.includes(".all")) {
      grid.show('');
    } else {
      grid.filter(function (item) {
        return selectElemAry.every(function (className) {
          return item.getElement().classList.contains(className.substring(1));
        });
      });
    }
  }
});
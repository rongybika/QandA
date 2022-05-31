$(document).ready(function () {
  setNavigation();
  arrangeTopPos();
  getHotQuestions();
  getRelatedQuestions(getCookie('question_title'));
  getRandomBottomQuestions();
  toggleSearch();
  var elem = document.getElementById('defaultOpen');
  if (typeof elem !== null && elem !== 'undefined' && elem !== null) {
    document.getElementById("defaultOpen").click();
  } 
});

$('div.navbar-container a').on('click', function (e) {
  var clicked = $(this);
  $('div.navbar-container a').each(function () {
    if ($(this).hasClass('active')) {
      $(this).removeClass('active');
    }
  });
  $(this).addClass('active');
});



$('#searchForm').keydown(function (e) {
})

if (parseInt($('.navbar').css("height")) > parseInt($('#myTopnav').css("height"))) {
} else {
  $('.container').css('margin-top', 0);
}

function setNavigation() {
  var path = window.location.pathname;
  path = path.replace(/\/$/, "");
  path = decodeURIComponent(path);

  $("div.navbar-container a").each(function () {
    var href = $(this).attr('href');
    if (path.length > 0) {
      if (path.substring(0, href.length) === href && href !== "/") {
        $(this).closest('a').addClass('active');
      } else {
      }
    } else {
      if (href === "/") {
        $(this).closest('a').addClass('active');
      }
    }
  });
};

document.getElementById("content").addEventListener('click', function (evt) {
    var y = document.getElementById("left_panel__overlay");
    y.className = "left_panel__overlay";
        document.getElementById("tm").checked = false;
}, true); 

function myFunction() { 
  var y = document.getElementById("left_panel__overlay");
    if (y.className === "left_panel__overlay") {
        y.className += " show";
      } else {
        y.className = "left_panel__overlay";
        document.getElementById("tm").checked = false;
      }
}

$("#searchForm").submit(function (e) {

  var x = document.getElementById("myTopnav");
  x.className = "navbar-container";

  var form = $(this);
  var x = document.forms["searchForm"]["q"].value;
  if (x == "") {
    e.preventDefault();
    alert("Search field must be filled out");
    return false;
  }

  document.forms["searchForm"].submit();
});

function arrangeTopPos() {
  if (parseInt($('.navbar').css("height")) > 60) {
    $('.container').css('margin-top', parseInt($('.navbar').css("height")) / 2);
  } else {
    $('.container').css('margin-top', 0);
  }
}

$(window).resize(function () {
  arrangeTopPos();
});

function getHotQuestions() {
  if ($('#hot-network-questions').length) {
    $.ajax({
      url: '/hotquestions',
      method: 'get',
      success: function (response) {
        var obj = JSON.parse(response);
        for (var i = 0; i < obj.records.length; i++) {
          var idvalue = obj.records[i].id;
          var titlevalue = obj.records[i].title;
          var urlFTtile = obj.records[i].url_f_title;
          var views = obj.records[i].views;
          $('#hot-network-questions ul').append('<li class="spacer js-gps-track"><div class="hot-questions">' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '" title="">' +
            '<div class="answer-votes answered-accepted extra-large">' + views + '</div></a>' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '"' +
            'class="js-gps-track question-hyperlink mb0">' + titlevalue + '</a></div></li>');
        }
      }
    })
  };
}

function getRelatedQuestions(question_title) {
  if ($('#related-network-questions').length) {
    $.ajax({
      url: '/relatedquestions',
      method: 'post',
      data: {data:question_title},
      success: function (response) {
        var obj = JSON.parse(response);
        for (var i = 0; i < obj.records.length; i++) {
          var idvalue = obj.records[i].id;
          var titlevalue = obj.records[i].title;
          var urlFTtile = obj.records[i].url_f_title;
          var views = obj.records[i].views;
          $('#related-network-questions ul').append('<li class="spacer js-gps-track"><div class="hot-questions">' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '" title="">' +
            '<div class="answer-votes answered-accepted extra-large">' + views + '</div></a>' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '"' +
            'class="js-gps-track question-hyperlink mb0">' + titlevalue + '</a></div></li>');
        }
      }
    })
  };
}

function getRandomBottomQuestions() {
  if ($('#random-bottom-questions').length) {
    $.ajax({
      url: '/randombottom',
      method: 'get',
      success: function (response) {
        var obj = JSON.parse(response);
        for (var i = 0; i < obj.records.length; i++) {
          var idvalue = obj.records[i].id;
          var titlevalue = obj.records[i].title;
          var urlFTtile = obj.records[i].url_f_title;
          var views = obj.records[i].views;
          var excerpt = obj.records[i].excerpt;
          $('#random-bottom-questions ul').append('<li class="spacer js-gps-track"><div class="hot-questions">' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '" title="">' +
            '<div class="answer-votes answered-accepted extra-large">' + views + '</div></a>' +
            '<a href="/q/' + idvalue + '/' + urlFTtile + '"' +
            'class="js-gps-track question-hyperlink mb0">' + titlevalue + '</a>'+
            '<div class="bottom-excerpt py-3"><p>' + excerpt + '</p></div></div></li>');
        }
      }
    })
  };
}

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

function toggleSearch() {
        $('.header-search').each(function() {
        var $popup = $(this),
            $form = $popup.find('.header-search__form'),
            $input = $form.find('.header-search__input'),
            $filter = $form.find('.header-search__filter'),
            $toggle = $('.header-search__toggle'),
            $closeButton = $('.header-search__form-close-button'),
            expandPopupLabel = $toggle.data('label-expand-popup'),
            collapsePopupLabel = $toggle.data('label-collapse-popup');

        function closeSearch() {
            $popup.slideUp(100);
            $toggle.removeClass('header-search__toggle--active');
            $toggle.attr('title', expandPopupLabel);
            $toggle.attr('aria-expanded', false);
            $popup.attr('aria-expanded', false)
        }

        function refreshSearchFilter(checkbox) {
            if (true === checkbox.prop('checked') || 'checked' === checkbox.prop('checked')) {
                checkbox.parent().addClass('header-search__filter-label--active');
                if (checkbox.attr('id').indexOf('header-search-filter-type-any') >= 0) {
                    $filter.find('input:not( [id^=header-search-filter-type-any] )').prop('checked', false).change()
                } else {
                    $filter.find('input[id^=header-search-filter-type-any]').prop('checked', false).change()
                }
            } else {
                checkbox.parent().removeClass('header-search__filter-label--active');
                if ($filter.find('input:checked').length < 1) {
                    $filter.find('input[id^=header-search-filter-type-any]').prop('checked', true).change()
                }
            }
        }
        $toggle.on('click', function() {
            $toggle.toggleClass('header-search__toggle--active');
            $popup.slideToggle(100);
            if ($toggle.hasClass('header-search__toggle--active')) {
                $input.focus();
                $toggle.attr('title', collapsePopupLabel).attr('aria-expanded', true);
                $popup.attr('aria-expanded', true)
            } else {
                $toggle.attr('title', expandPopupLabel).attr('aria-expanded', false);
                $popup.attr('aria-expanded', false)
            }
        });
        $closeButton.on('click', function() {
            closeSearch()
        });
        $filter.find('input').each(function() {
            refreshSearchFilter($(this));
            $(this).on('change', function() {
                refreshSearchFilter($(this))
            })
        });
    });
}

function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
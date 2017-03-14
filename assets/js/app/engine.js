$(function(){


  console.log('rock n roru')

  var enableLoader = true;

  // bulma mobile menu
  var $toggle = $('.nav-toggle');
  var $menu = $('.nav-menu');
  $toggle.click(function() {
    $(this).toggleClass('is-active');
    $menu.toggleClass('is-active');
  });
  $menu.find('a').click(function(){
    if($menu.hasClass('is-active')) {
      $toggle.toggleClass('is-active');
      $menu.toggleClass('is-active');
    }
  });


  function initSlick()
  {
    $('.slick.slider').slick({
      adaptiveHeight: false,
      dots: true,
      mobileFirst: true,
      prevArrow: '<button type="button" class="slick-prev"><span class="ion-ios-arrow-left"/></button>',
      nextArrow: '<button type="button" class="slick-next"><span class="ion-ios-arrow-right"/></button>',
    });
    $('.modal-close').on('click', function(){
      $('.modal').removeClass('is-active');
    });
  }


  function loader(action) {
    var loaderEl = $('.loader-sel');
    var speed = 0;
    if(action == 'show') loaderEl.stop().show();
    if(action == 'hide') loaderEl.stop().fadeOut(250);
  }


  Barba.Pjax.cacheEnabled = true;
  Barba.Prefetch.init();
  Barba.Pjax.originalPreventCheck = Barba.Pjax.preventCheck;
  Barba.Pjax.preventCheck = function(evt, element) {
    if (!Barba.Pjax.originalPreventCheck(evt, element)) { return false; }
    if (/.pdf/.test(element.href.toLowerCase())) { return false; }
    if (/wp-admin/.test(element.href.toLowerCase())) { return false; }
    return true;
  };
  Barba.Dispatcher.on('linkClicked', function() {
    if(enableLoader) loader('show');
  });
  Barba.Dispatcher.on('transitionCompleted', function() {
    if(enableLoader) loader('hide');

    // initSlick();
    // ga('send', 'pageview', location.pathname);
    // console.log('google analytics > pageview sent > ' + location.pathname);
  });
  Barba.Dispatcher.on('newPageReady', function() {
    // faster
  });

  Barba.Pjax.start();


  // var FadeTransition = Barba.BaseTransition.extend({
  //   start: function() {
  //     Promise
  //       .all([this.newContainerLoading, this.fadeOut()])
  //       .then(this.fadeIn.bind(this));
  //   },
  //   fadeOut: function() {
  //     return $(this.oldContainer).animate({ opacity: 0 }).promise();
  //   },
  //   fadeIn: function() {
  //     var _this = this;
  //     var $el = $(this.newContainer);
  //     $(this.oldContainer).hide();
  //     $el.css({
  //       visibility : 'visible',
  //       opacity : 0
  //     });
  //     $el.animate({ opacity: 1 }, 400, function() {
  //       _this.done();
  //     });
  //   }
  // });
  // Barba.Pjax.getTransition = function() {
  //   return FadeTransition;
  // };


});

// (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
//   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
//   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
//   })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
//   ga('create', 'UA-91381000-1', 'auto');

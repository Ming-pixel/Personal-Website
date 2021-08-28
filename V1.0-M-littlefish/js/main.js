
/*! A fix for the iOS orientationchange zoom bug. Script by @scottjehl, rebound by @wilto.MIT License.*/
(function(m){if(!(/iPhone|iPad|iPod/.test(navigator.platform)&&navigator.userAgent.indexOf("AppleWebKit")>-1)){return}var l=m.document;if(!l.querySelector){return}var n=l.querySelector("meta[name=viewport]"),a=n&&n.getAttribute("content"),k=a+",maximum-scale=1",d=a+",maximum-scale=1",g=true,j,i,h,c;if(!n){return}function f(){n.setAttribute("content",d);g=true}function b(){n.setAttribute("content",k);g=false}function e(o){c=o.accelerationIncludingGravity;j=Math.abs(c.x);i=Math.abs(c.y);h=Math.abs(c.z);if(!m.orientation&&(j>7||((h>6&&i<8||h<8&&i>6)&&j>5))){if(g){b()}}else{if(!g){f()}}}m.addEventListener("orientationchange",f,false);m.addEventListener("devicemotion",e,false)})(this);
/**
 * hoverIntent r6 // 2011.02.26 // jQuery 1.5.1+
 * <http://cherne.net/brian/resources/jquery.hoverIntent.html>
 *
 * @param  f  onMouseOver function || An object with configuration options
 * @param  g  onMouseOut function  || Nothing (use configuration options object)
 * @author    Brian Cherne brian(at)cherne(dot)net
 */
(function($){$.fn.hoverIntent=function(f,g){var cfg={sensitivity:7,interval:100,timeout:0};cfg=$.extend(cfg,g?{over:f,out:g}:f);var cX,cY,pX,pY;var track=function(ev){cX=ev.pageX;cY=ev.pageY};var compare=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);if((Math.abs(pX-cX)+Math.abs(pY-cY))<cfg.sensitivity){$(ob).unbind("mousemove",track);ob.hoverIntent_s=1;return cfg.over.apply(ob,[ev])}else{pX=cX;pY=cY;ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}};var delay=function(ev,ob){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t);ob.hoverIntent_s=0;return cfg.out.apply(ob,[ev])};var handleHover=function(e){var ev=jQuery.extend({},e);var ob=this;if(ob.hoverIntent_t){ob.hoverIntent_t=clearTimeout(ob.hoverIntent_t)}if(e.type=="mouseenter"){pX=ev.pageX;pY=ev.pageY;$(ob).bind("mousemove",track);if(ob.hoverIntent_s!=1){ob.hoverIntent_t=setTimeout(function(){compare(ev,ob)},cfg.interval)}}else{$(ob).unbind("mousemove",track);if(ob.hoverIntent_s==1){ob.hoverIntent_t=setTimeout(function(){delay(ev,ob)},cfg.timeout)}}};return this.bind('mouseenter',handleHover).bind('mouseleave',handleHover)}})(jQuery);


$(function() {
  window.scrollTo(0, 1);

  if( $(window).innerWidth() >= 880) {
    activerRollOverNav();
  }

  if($('html').hasClass('lte-ie8')) {
    $('aside.related').pseudoElements({type: 'before'});
  }

  $('ul.nav li.dropdown_item').hover(function(){
    $(this).find("a").addClass("active");
    $('ul:not(:animated)', this).fadeIn(300);
  },
  function(){
    $(this).find("a").removeClass("active");
    $('ul',this).fadeOut(300);
  });

});

$.fn.shuffleLetters = function(prop){
  var options = $.extend({
    "step"		: 4,
    "fps"		: 40,
    "text"		: "",
    "callback"	: function(){}
  },prop)
  return this.each(function(){
    var el = $(this),
        str = "";
    if(el.data('animated')){
      return true;
    }
    el.data('animated',true);
    if(options.text) {
      str = options.text.split('');
    }
    else {
      str = el.text().split('');
    }
    var types = [],
        letters = [];
    for(var i=0;i<str.length;i++){
      var ch = str[i];
      if(ch == " "){
        types[i] = "space";
        continue;
      }
      else if(/[a-z]/.test(ch)){
        types[i] = "lowerLetter";
      }
      else if(/[A-Z]/.test(ch)){
        types[i] = "upperLetter";
      }
      else {
        types[i] = "symbol";
      }
      letters.push(i);
    }
    el.html("");
    (function shuffle(start){
      var i,
          len = letters.length,
          strCopy = str.slice(0);
      if(start>len){
        el.data('animated',false);
        options.callback(el);
        return;
      }
      for(i=Math.max(start,0); i < len; i++){
        if( i < start+options.step){
          strCopy[letters[i]] = randomChar(types[letters[i]]);
        }
        else {
          strCopy[letters[i]] = "";
        }
      }
      el.text(strCopy.join(""));
      setTimeout(function(){
        shuffle(start+1);
      },1000/options.fps);
    })(-options.step);
  });
};

function randomChar(type){
  var pool = "";
  if (type == "lowerLetter"){
    pool = "abcdefghijklmnopqrstuvwxyz0123456789";
  }
  else if (type == "upperLetter"){
    pool = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  }
  else if (type == "symbol"){
    pool = ",.?/\\(^)![]{}*&^%$#'\"";
  }
  var arr = pool.split('');
  return arr[Math.floor(Math.random()*arr.length)];
}


function activerRollOverNav() {
  var $lienNav = $("#site-navigation li a");
  var config = {
    over : rollOverMenuNav,
    interval: 50,
    timeout : 50,
    out : rollOutMenuNav
  };
  $lienNav.hoverIntent(config);
}

function rollOverMenuNav(){
  var $lienHover=$(this);
  if(!$(this).parent().hasClass('active')){
    var $line = $('.linePleine', $(this));
    var $txtOriginal=$(this).find('.txtOriginal');
    var $txtHover=$(this).find('.txtHover');
    $txtHover.show().shuffleLetters({
      "step"		: 5,
      callback:function(){}
    });
  }
}

function rollOutMenuNav(){
  if(!$(this).parent().hasClass('active') || ($(this).parent().hasClass('active') && $('.txtHover', this).css('display') == 'block'))
    var $line = $('.linePleine', $(this));
  var $txtOriginal=$(this).find('.txtOriginal');
  var $txtHover=$(this).find('.txtHover');
  $txtHover.hide();
  $txtOriginal.shuffleLetters({
    "step"		: 5
  });
}







/* Button */
var buttonsClick = Array.prototype.slice.call( document.querySelectorAll( '.btn' && '.more-link' ) );
var linksClick = Array.prototype.slice.call( document.querySelectorAll( '#site-navigation li a') );
var buttonsbigClick = Array.prototype.slice.call( document.querySelectorAll( '.preview a') );

buttonsClick.forEach( function( el, i ) { el.addEventListener( 'click', activate, false ); } );
linksClick.forEach( function( el, i ) { el.addEventListener( 'click', linksActivate, false ); } );
buttonsbigClick.forEach( function( el, i ) { el.addEventListener( 'click', btnbigActivate, false ); } );

function activate() {
    var self = this, activatedClass = 'btn-activated';

    if( !classie.has( this, activatedClass ) ) {
        classie.add( this, activatedClass );
        setTimeout( function() { classie.remove( self, activatedClass ) }, 600 );
    }
}

function linksActivate() {
    var self = this, activatedClass = 'links-activated';

    if( !classie.has( this, activatedClass ) ) {
        classie.add( this, activatedClass );
        setTimeout( function() { classie.remove( self, activatedClass ) }, 600 );
    }
}

function btnbigActivate() {
    var self = this, activatedClass = 'btn-big-activated';

    if( !classie.has( this, activatedClass ) ) {
        classie.add( this, activatedClass );
        setTimeout( function() { classie.remove( self, activatedClass ) }, 600 );
    }
}


$(function(){
  $('body').on('click', '.btn' && '.more-link' && '#site-navigation li a' && 'preview a', function(){
    var _href = $(this).prop('href');
    setTimeout (function () {
        window.location=_href;
      }, 600);
    return false;
  })
});



/* Side-bar Nav */

//$(function(){
//  $('#site-navigation li').append('<i class="ti-angle-right"></i>');
//});


jQuery(document).ready(function($){
  var overlayNav = $('.overlay-nav'),
      overlayContent = $('.overlay-content'),
      navigation = $('.sidebar-menu'),
      toggleNav = $('.nav-trigger');

  //inizialize navigation and content layers
  layerInit();
  $(window).on('resize', function(){
    window.requestAnimationFrame(layerInit);
  });

  //open/close the menu and cover layers
    var mask = function() {
        if(!toggleNav.hasClass('close-nav')) {
            //it means navigation is not visible yet - open it and animate navigation layer
            toggleNav.addClass('close-nav');

            overlayNav.children('span').velocity({
                translateZ: 0,
                scaleX: 1,
                scaleY: 1
            }, 500, 'easeInCubic', function(){
                navigation.addClass('fade-in');
            });
        } else {
            //navigation is open - close it and remove navigation layer
            toggleNav.removeClass('close-nav');

            overlayContent.children('span').velocity({
                translateZ: 0,
                scaleX: 1,
                scaleY: 1
            }, 500, 'easeInCubic', function(){
                navigation.removeClass('fade-in');
                overlayNav.children('span').velocity({
                    translateZ: 0,
                    scaleX: 0,
                    scaleY: 0
                }, 0);

                overlayContent.addClass('is-hidden').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
                    overlayContent.children('span').velocity({
                        translateZ: 0,
                        scaleX: 0,
                        scaleY: 0
                    }, 0, function(){overlayContent.removeClass('is-hidden')});
                });
                if($('html').hasClass('no-csstransitions')) {
                    overlayContent.children('span').velocity({
                        translateZ: 0,
                        scaleX: 0,
                        scaleY: 0
                    }, 0, function(){overlayContent.removeClass('is-hidden')});
                }
            });
        }
    };
    toggleNav.on('click', mask);
    //$('.sidebar-menu ul li a').on('click', mask);

  function layerInit(){
    var diameterValue = (Math.sqrt( Math.pow($(window).height(), 2) + Math.pow($(window).width(), 2))*2);
    overlayNav.children('span').velocity({
      scaleX: 0,
      scaleY: 0,
      translateZ: 0
    }, 50).velocity({
          height : diameterValue+'px',
          width : diameterValue+'px',
          top : -(diameterValue/2)+'px',
          left : -(diameterValue/2)+'px'
        }, 0);

    overlayContent.children('span').velocity({
      scaleX: 0,
      scaleY: 0,
      translateZ: 0
    }, 50).velocity({
          height : diameterValue+'px',
          width : diameterValue+'px',
          top : -(diameterValue/2)+'px',
          left : -(diameterValue/2)+'px'
        }, 0);
  }
});


/* Page Loading */

//$(function(){
//  jQuery(window).resize(function(){
//    resizenow();
//  });
//  function resizenow() {
//    var browserwidth = jQuery(window).width();
//    var browserheight = jQuery(window).height();
//    jQuery('.bonfire-pageloader-icon').css('right', ((browserwidth - jQuery(".bonfire-pageloader-icon").width())/2)).css('top', ((browserheight - jQuery(".bonfire-pageloader-icon").height())/2));
//  }
//  resizenow();
//});


<!-- BEGIN POSITIONING HTML BEFORE FADE -->
jQuery("html").addClass('bonfire-html-onload');
<!-- END POSITIONING HTML BEFORE FADE -->

<!-- BEGIN DISABLE BROWSER SCROLL -->
/* disable browser scroll on touch devices */
jQuery(document.body).on("touchmove", function(e) {
  e.preventDefault();
});

/* disable browser scroll on desktop */
var scrollPosition = [
  self.pageXOffset || document.documentElement.scrollLeft || document.body.scrollLeft,
  self.pageYOffset || document.documentElement.scrollTop  || document.body.scrollTop
];
var html = jQuery('html');
html.data('scroll-position', scrollPosition);
html.data('previous-overflow', html.css('overflow-loading'));
html.css('overflow-loading', 'hidden');
window.scrollTo(scrollPosition[0], scrollPosition[1]);
<!-- END DISABLE BROWSER SCROLL -->

<!-- BEGIN LOADER FADE-OUT AND HTML SLIDE-DOWN -->
jQuery(window).load(function() {

  setTimeout(function(){
    /* fade out the loading icon */
    jQuery(".bonfire-pageloader-icon").addClass('bonfire-pageloader-icon-hide');
  },500);

  /* after 250ms delay, restore browser scroll + fade out loader background + slide down page */
  setTimeout(function(){

    /* enable browser scroll on touch devices */
    jQuery(document.body).unbind('touchmove');

    /* enable browser scroll on desktop */
    var html = jQuery('html');
    var scrollPosition = html.data('scroll-position');
    html.css('overflow-loading', html.data('previous-overflow'));
    window.scrollTo(scrollPosition[0], scrollPosition[1]);

    /* fade out loader */
    jQuery("#bonfire-pageloader").addClass('bonfire-pageloader-fade');

    /* slide down html */
    jQuery("html").removeClass('bonfire-html-onload');

  },360);

  /* after 1000ms delay, hide (not fade out) loader*/
  setTimeout(function(){

    /* hide loader after fading out*/
    jQuery("#bonfire-pageloader").addClass('bonfire-pageloader-hide');

  },600);

});
<!-- END LOADER FADE-OUT AND HTML SLIDE-DOWN -->







/* Scroll to Top */

$(".to-top, .to-top-responsive").hide();

$(function(){
  $(window).scroll(function(){
    if ($(this).scrollTop()>300)
    {
      $('.to-top').slideDown();
    }
    else
    {
      $('.to-top').slideUp();
    }
  });

  $('.to-top a, .to-top-responsive a').click(function (e) {
    //console.log('--------------');
    e.preventDefault();
    $('body,html').animate({scrollTop: 0}, 1000);
  });

});




/* Input & Form */

$(document).ready(function() {

  var input_effect = function() {
    $(this).on('focus', function() {
      $(this).parent('p').addClass('active');
    });
    $(this).on('blur', function() {
      if ($(this).val().length == 0) {
        $(this).parent('p').removeClass('active');
      }
    });
    if ($(this).val() != '') $(this).parent('p').addClass('active');
  };

  $('input, textarea, .text_box').each(input_effect);


  // Form Validate
  $('.search-mm form, #commentform').html5Validate(function(){
    $(this).submit()
  });


  // Status
  setTimeout(function(){
    $('.successfully, .wrong').hide();
  }, 8000);

});






/* Works gallery filter */

(function($){
  $.fn.my_gallery = function(options) {
    var D = {
      filter: {
        name: 'gallery_filter_btn',
        element: 'a',
        active: 'active'
      },
      container: {
        name: 'gallery_content',
        element: 'li'
      },
      css3: {
        init: true,
        children: 'a',
        property: 'all 1s ease',
        transform: {
          scale: '0'
        }
      },
      move: {
        init: true,
        easing: 'linear',
        duration: 500
      },
      fade: {
        duration: [500, 500],
        opacity: [0, 1]
      },
      fixed: false,
      onclick: function(filter, element){}
    } // default settings

    var S = $.extend(true, D, options);

    return this.each(function(){
      var M = $(this),
          F = M.find('.'+S.filter.name)
      C = M.find('.'+S.container.name),
          P = {
            init: function(){
              this._globals.init();
              this._height.update(L);
              if (S.css3.init) this._css3.init();
              this._elements.init();
              this._collection.init();
              this.events.init();
            },
            _globals: {
              init: function(){
                D = {
                  w: M.width(),
                  h: M.height()
                },
                    A = F.find(S.filter.element),
                    E = C.find(S.container.element),
                    ED = {
                      w: E.outerWidth(true),
                      h: E.outerHeight(true)
                    },
                    L = E.length,
                    CSS3 = S.css3, MOVE = S.move,
                    FIXED = S.fixed, FADE = S.fade,
                    POS = [], COL = [],
                    COLUMN = Math.floor(D.w/ED.w);
                // if ('undefined' == typeof(document.body.style.maxHeight)) {
                //   CSS3.init = false;
                // }
              }
            },
            _height: {
              update: function(len, type){
                var row = Math.ceil(len/COLUMN),
                    css = {
                      height: ED.h*row
                    }
                C.css(css);
              }
            },
            _css3: {
              init: function(){
                var property = S.css3.property,
                    css = {
                      '-webkit-transition': property,
                      '-moz-transition': property,
                      '-o-transition': property,
                      'transition': property
                    }
                E.children().css(css);
              },
              transform: function(css){
                var arr = [],
                    o = $.extend({}, this.css, css);
                for (i in o){
                  var p = o[i];
                  arr.push(i+'('+p+')');
                }
                var css3d = arr.join(' ');
                return {
                  '-webkit-transform': css3d,
                  '-moz-transform': css3d,
                  '-o-transform': css3d,
                  'transform': css3d
                }
              },
              reset: function(){
                var css = this.transform(this.css);
                return css;
              },
              css: {
                scale: '1',
                rotate: '0',
                translate: '0, 0',
                skew: '0'
              }
            },
            _elements: {
              init: function(){
                this.position();
                this.css();
              },
              css: function(){
                var css = {
                  position: 'absolute',
                  overflow: 'hidden',
                  display: 'block'
                }
                E.css(css);
              },
              position: function(){
                E.each(function(){
                  var t = $(this),
                      position = t.position(),
                      x = position.left,
                      y = position.top,
                      css = {
                        top: y,
                        left: x,
                        zIndex: 1
                      }
                  POS.push(css);
                  t.css(css);
                });
              }
            },
            _collection: {
              init: function(){
                this.add();
              },
              add: function(){
                A.each(function(i){
                  var t = $(this), rel = t.attr('rel');
                  if (typeof rel != 'undefined'){
                    var element = E.filter('.'+rel);
                    COL.push(element);
                  }
                });
              },
              position: function(){
                for (i in COL){
                  var r = -1, c = -1;
                  COL[i].each(function(j){
                    var t = $(this);
                    c++;
                    if (j % COLUMN == 0){
                      r++;
                      c = 0;
                    }
                    var y = ED.h*r,
                        x = x = ED.w*c,
                        css = {
                          top: y,
                          left: x
                        }
                    t.animate(css, MOVE.duration, MOVE.easing);
                  });
                }
              }
            },
            _transition: {
              element: function(element, not){
                if (CSS3.init){
                  var css = CSS3.transform,
                      animate = P._css3.transform(css),
                      reset = P._css3.reset();
                  not.children(CSS3.children).css(animate);
                  element.children(CSS3.children).css(reset);
                } else {
                  not.stop(true, true).fadeTo(FADE.duration[0], FADE.opacity[0]);
                  element.stop(true, true).fadeTo(FADE.duration[1], FADE.opacity[1]);
                }
                if (MOVE.init){
                  P._collection.position();
                }
              },
              all: function(){
                if (CSS3.init) {
                  var animate = P._css3.reset();
                  E.children(CSS3.children).css(animate);
                } else {
                  E.fadeTo(FADE.duration[1], FADE.opacity[1]);
                }
              }
            },
            events: {
              init: function(){
                this.click();
              },
              click: function(){
                A.click(function(){
                  var t = $(this), rel = t.attr('rel'), active = S.filter.active;
                  if (rel == 'all'){
                    if (MOVE.init) {
                      E.each(function(i){
                        var t = $(this), css = POS[i];
                        t.animate(css, MOVE.duration, MOVE.easing, P._transition.all);
                      });
                    } else {
                      P._transition.all();
                    }
                    if (!FIXED && MOVE.init){
                      P._height.update(L);
                    }
                  } else {
                    var element = E.filter('.'+rel), not = E.not(element),
                        l = element.length, css = { zIndex: 10 }
                    element.css(css);
                    css.zIndex = 1;
                    not.css(css);
                    if (!FIXED && MOVE.init){
                      P._height.update(l);
                    }
                    P._transition.element(element, not);
                  }
                  A.removeClass(active)
                  t.addClass(active);
                  S.onclick.call(this, t, element || E);
                  return false;
                });
              }
            }
          }
      P.init();
    });
  };
}(jQuery));

$(function(){
  $('.my_gallery').my_gallery({
    css3: {
      transform: {
        scale: '0',
        rotateY: '-360deg',
        skew: '0deg'
      }
    }
  });
});



/* Gallery content */
$(function(){
  $("#contact-carousel").owlCarousel({
    singleItem: true,
    autoPlay: false,
    //autoHeight: true
  });
  // Custom Navigation Events
  $(".contact-carousel-custom-next-trigger").click(function(){
    $("#contact-carousel").trigger('owl.next');
    return(false);
  })
});



/* Timeline */

jQuery(document).ready(function($){
  var $timeline_block = $('.story-timeline li');

  //hide timeline blocks which are outside the viewport
  $timeline_block.each(function(){
    if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
      $(this).find('.timeline-img, .timeline-content').addClass('timeline-is-hidden');
    }
  });

  //on scolling, show/animate timeline blocks when enter the viewport
  $(window).on('scroll', function(){
    $timeline_block.each(function(){
      if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.timeline-img').hasClass('timeline-is-hidden') ) {
        $(this).find('.timeline-img, .timeline-content').removeClass('timeline-is-hidden').addClass('timeline-bounce-in');
      }
    });
  });
});



/* top-img animation */

jQuery(window).load(function() {
  $("#blog_x5F_w, #water_x5F_2")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 100)
      .velocity({ opacity: 0, scaleY: 0, scaleX: 0, translateX: "50%", translateY: "50%" })
      .velocity({ opacity: 1, scaleY: 1, scaleX: 1, translateX: "0%", translateY: "0%" }, 500);
  $("#p3_x5F_c, #ga_x5F_book")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 500)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#p2_x5F_c, #chengbao_x5F_b1")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 700)
      .velocity({ opacity: 0, translateY: "10px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#p1_x5F_c, #chengbao_x5F_b2, #cl_x5F_g_x5F_1, #cl_x5F_g_x5F_2, #cl_x5F_g_x5F_3, #cl_x5F_g_x5F_4, #cl_x5F_g_x5F_5, #cl_x5F_g_x5F_6")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1000)
      .velocity({ opacity: 0, translateY: "6px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);

  $("#blog_x5F_title, #chengbao_x5F_b3")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1500)
      .velocity({ opacity: 0, translateY: "10%" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#blog_x5F_title2, #chengbao_x5F_b4, #fengche_x5F_z")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2000)
      .velocity({ opacity: 0, translateY: "10%" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#blog_x5F_title3, #chengbao_x5F_b5")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2300)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 800);

  $("#bi, #gallery_x5F_text")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2500)
      .velocity({ opacity: 0, translateX: "15px" })
      .velocity({ opacity: 1, translateX: 0 }, 500);
  $("#blog_x5F_ws, #ga_x5F_te_x5F_line")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3000)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 1000);

  $("#zhuandz")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2800)
      .velocity({ opacity: 0, translateY: "20%" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#zhuandq")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3000)
      .velocity({ opacity: 0, translateY: "10%" })
      .velocity({ opacity: 1, translateY: 0 }, 500);

  $(".px_ani, #beike")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3200)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#weiba_x5F_inner")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3400)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#tree, #tree_x5F_2")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3600)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#sun")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3800)
      .velocity({ opacity: 0, scaleX:0, scaleY:0  })
      .velocity({ opacity: 1, scaleX:"100%", scaleY:"100%" }, 500);
  $(".search-mm")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2200)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0  }, 500);
  $("#content_p1, #content_p2")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2700)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);


  $("#light_x5F_ball")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 100)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 500);
  $("#ming_x5F_love")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 500)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 500);
  $("#water_x5F_8")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1000)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 500);
  $("#water_x5F_7")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1300)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 300);
  $("#water_x5F_6")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1600)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 300);
  $("#water_x5F_5")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 1900)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 300);
  $("#water_x5F_4, #water_x5F_3")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2200)
      .velocity({ opacity: 0 })
      .velocity({ opacity: 1 }, 500);
  $("#adao_x5F_4, #tree_x5F_6")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3000)
      .velocity({ opacity: 0, translateY: "5px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#adao_x5F_3, #tree_x5F_5, #guandao_x5F_2, #mac_x5F_abc, #pad_x5F_abc, #mobile_x5F_abc")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3400)
      .velocity({ opacity: 0, translateY: "10px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#adao_x5F_2, #tree_x5F_4, #guandao_x5F_1, #dengta")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3800)
      .velocity({ opacity: 0, translateY: "10px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#adao_x5F_1, #tree_x5F_3, #mm_x5F_words, .xiguan_ani, #ab_x5F_chilun_x5F_1, #ab_x5F_chilun_x5F_2, #ab_x5F_chilun_x5F_3")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 4200)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#boat")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 4600)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);
  $("#hot_x5F_ball")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 3000)
      .velocity({ opacity: 0, translateY: "5px" })
      .velocity({ opacity: 1, translateY: 0 }, 500)
      .velocity({ opacity: 1, translateY: 0 }, 3800)
      .velocity({ opacity: 1, translateY: 0 })
      .velocity({ opacity: 1, translateY: "-150%" }, 2000);
  $("#content_p3")
      .velocity({ opacity: 0 })
      .velocity({ opacity: 0 }, 2500)
      .velocity({ opacity: 0, translateY: "15px" })
      .velocity({ opacity: 1, translateY: 0 }, 500);

});




/* Classie.js */
/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 *
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

( function( window ) {

'use strict';

// class helper functions from bonzo https://github.com/ded/bonzo

function classReg( className ) {
  return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
}

// classList support for class management
// altho to be fair, the api sucks because it won't accept multiple classes at once
var hasClass, addClass, removeClass;

if ( 'classList' in document.documentElement ) {
  hasClass = function( elem, c ) {
    return elem.classList.contains( c );
  };
  addClass = function( elem, c ) {
    elem.classList.add( c );
  };
  removeClass = function( elem, c ) {
    elem.classList.remove( c );
  };
}
else {
  hasClass = function( elem, c ) {
    return classReg( c ).test( elem.className );
  };
  addClass = function( elem, c ) {
    if ( !hasClass( elem, c ) ) {
      elem.className = elem.className + ' ' + c;
    }
  };
  removeClass = function( elem, c ) {
    elem.className = elem.className.replace( classReg( c ), ' ' );
  };
}

function toggleClass( elem, c ) {
  var fn = hasClass( elem, c ) ? removeClass : addClass;
  fn( elem, c );
}

var classie = {
  // full names
  hasClass: hasClass,
  addClass: addClass,
  removeClass: removeClass,
  toggleClass: toggleClass,
  // short names
  has: hasClass,
  add: addClass,
  remove: removeClass,
  toggle: toggleClass
};

// transport
if ( typeof define === 'function' && define.amd ) {
  // AMD
  define( classie );
} else {
  // browser global
  window.classie = classie;
}

})( window );

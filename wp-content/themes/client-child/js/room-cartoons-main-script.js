jQuery(document).ready(function(){
var statusCounter, statusGraph = false;
var idIntervalLifeTime;
var portfolio = jQuery('.list_portfolio'); // get first group
var data = portfolio.clone(true); // clone first group, and get second group
var box = jQuery('#box');
var header = jQuery('#main_header');
var hHeader = header.height();
var Window = jQuery(window);
var container = document.querySelector('#masonry-container');


jQuery('.top-menu .scroll > a').bind('click', function(event) {
    event.preventDefault();
    var $anchor = jQuery(this);
    scrollVal = jQuery($anchor.attr('href')).offset().top - 60;

    jQuery.scrollTo(''+scrollVal+'px', 1500,{
        onAfter: function(){
            console.log(scrollVal);
        }
    });
});


if(jQuery('#camera_wrap').size() > 0){

        jQuery('#camera_wrap').camera({
            fx:'simpleFade',
            alignment: 'center',
            barPosition: 'bottom',
            loaderColor: '#f6917c',
            loaderBgColor: '#282626',
            loaderPadding: 0,
            loaderOpacity: 1,
            height: '570px',
            pagination:false,
            thumbnails: false,
            navigation: Boolean(slideShowSetting.navigation),
            autoAdvance: Boolean(slideShowSetting.autoAdvance),
            playPause: false,
            loader:'bar',
            hover: true,
            opacityOnGrid: false,
            imagePath: '../img/images/',
            onEndTransition: function() {

                setAnimate(".leftTop");
                setAnimate(".leftMiddle");
                setAnimate(".slider_button");

            },
            onLoaded: function() {
        
                setCss('.leftTop');
                setCss('.leftMiddle');
                setCss('.slider_button');
             
            }
        });

}

    function setAnimate(object){
        if(jQuery(".cameracurrent > "+object).size() != 0){
            object = jQuery(".cameracurrent > "+object);  
            object.animate({
                'top':object.data('top-end'),
                'left':object.data('left-end')
            }, 700, 'easeOutBack');            
        }
    }
    
    function setCss(object){
        if(jQuery(".cameracurrent > "+object).size() != 0){
            object = jQuery(".cameracurrent > "+object);          
            
            object.css({
                'top':object.data('top-start'),
                'left':object.data('left-start')
            });            
        }
    }
    
function graph(){

        if(jQuery('#graph').size() == 0){
            return false;
        }

        if(statusGraph == true){
            return false;
        }

        jQuery('#graph > li').each(function(){
            jQuery(this).html("<span>"+jQuery(this).text()+"</span>");
            jQuery(this).append("<div class='line'><div><span class='percent'>"+jQuery(this).data('percent')+"%</span></div></div>");
            jQuery(this).find('.line > div').animate({
                'width':jQuery(this).data('percent')+"%"
            }, 2500, function(){
                jQuery(this).children('.percent').fadeTo(300,1);
            });
        });
        return true;
}
statusGraph = graph();

jQuery(function(){
      if(jQuery('#list_portfolio').size() > 0){
             var $container = jQuery('#list_portfolio');

      $container.isotope({
        itemSelector : '.item-isotop',
        layoutMode : 'fitRows'
      });
      
      
      var $optionLinks = jQuery('#filter li');

      $optionLinks.click(function(event){
            event.preventDefault();
            var $this = jQuery(this);

            if ( $this.hasClass('active') ) {
              return false;
            }

            var $optionSet = $this.parents('#filter');
            $optionSet.find('.active').removeClass('active');
            $this.addClass('active');
      
            
            var options = {},
                key = $optionSet.attr('data-option-key'),
                value = $this.attr('data-option-value');

            value = value === 'false' ? false : value;
            options[ key ] = value;
            if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

              changeLayoutMode( $this, options )
            } else {

              $container.isotope( options );
            }
            
            return false;
            
        });   
      }
});
 
jQuery(".fancyBox").fancybox();
  
    if(jQuery('#carusel_clients').size() > 0){
        jQuery('#carusel_clients').bxSlider({
            controls:false,
            easing:'ease-in',
            slideWidth: 220,
            minSlides: 3,
            maxSlides: 10,
            moveSlides: 1,
            slideMargin: 10,
            ticker:true,
            speed:25000
        });
    }
      


jQuery(Window).scroll(function(){
    setFixedMenu();
});

jQuery(Window).resize(function(){
    setFixedMenu();
});
    
function setFixedMenu(){
    Scroll = jQuery(Window).scrollTop();
    wBox = box.width();
    if(Scroll > 13){
            
        box.css({
            'paddingTop':hHeader
        })

        header.addClass('fix').css({
            'width':wBox
        });

    } else {
        header.removeClass('fix').css({
            'width':'100%'
        });

        box.css({
            'paddingTop':'0px'
        })

    }
}
jQuery.fn.clicktoggle = function(a, b) {
    return this.each(function() {
        var clicked = false;
        jQuery(this).click(function() {
            if (clicked) {
                clicked = false;
                return b.apply(this, arguments);
            }
            clicked = true;
            return a.apply(this, arguments);
        });
    });
};
    jQuery('#btnSearch').clicktoggle(function(){
    jQuery(this).children('i').removeClass('icon-search').addClass('icon-remove');

    jQuery('header .top-menu').fadeTo(200,0,function(){
        jQuery(this).css({'display':'none'});
        jQuery('#btnMenu768').css({'display':'none'});
        jQuery('#searchform').css({'display':'inline-block'}).fadeTo(200,1);
    })

    },function(){

        jQuery(this).children('i').removeClass('icon-remove').addClass('icon-search');

        jQuery('#searchform').fadeTo(200,0,function(){
            jQuery(this).css({'display':'none'});
            jQuery('#btnMenu768').css({'display':'inline-block'});
            if(parseInt(jQuery(document).width()) > 768){
                jQuery('header  .top-menu').css({'display':'inline-block'}).fadeTo(200,1);
            } else {
                 jQuery('header .top-menu').css({'opacity':'1'});
            }
        })
    })
   
    
    jQuery('#btnMenu768').clicktoggle(function(){
        jQuery('header .top-menu').slideDown(500);
    },function(){
        jQuery('header .top-menu').slideUp(500);
    })
    
   if(jQuery('.flexslider').size() > 0){
        jQuery('.flexslider').flexslider({
            animation: "slide",
            controlNav: false,  
            slideshow: false 
        });
    }

if(container != null){
    var msnry = new Masonry( container, {
      itemSelector: '.post',
      "gutter": 15
    });
}

});
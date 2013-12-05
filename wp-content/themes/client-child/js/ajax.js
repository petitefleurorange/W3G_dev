jQuery(document).ready(function(){
var AjaxUrl = room_cartoons_url_ajax.url;
var gif_tpl = "<div id='fountainGP'><div id='fountainG_1' class='fountainG'></div><div id='fountainG_2' class='fountainG'></div><div id='fountainG_3' class='fountainG'></div><div id='fountainG_4' class='fountainG'></div><div id='fountainG_5' class='fountainG'></div><div id='fountainG_6' class='fountainG'></div><div id='fountainG_7' class='fountainG'></div><div id='fountainG_8' class='fountainG'></div></div>";
var send_box = jQuery('#rt-bottom .rt-container');

       jQuery(document).on('click', '.list_portfolio .link', function(event){
            event.preventDefault();
            id = jQuery(this).data('id');
            jQuery('.list_portfolio > li > div').removeClass('active');
            jQuery(this).parent().addClass('active');
            
            

            //временно
            if(window.chrome){
                tag = 'body'
            } else {
                tag = 'html'
            }

            jQuery(tag).animate( { scrollTop:  parseInt(jQuery('#header_portfolio').offset().top) + 10 + 'px'}, 500, function(object){

                box_portfolio_detail = jQuery('#portfolio_detail .container .container');
                jQuery('#portfolio_detail .container .container').prepend(gif_tpl);
                if(parseInt(jQuery('#portfolio_detail').css('height')) == 0){
                    return function(){

                        box_portfolio_detail.animate({
                            'min-height':'480px'
                        }, 500, function(object){

                            //here callback
                            return function(){
                                jQuery('#fountainGP').fadeIn(500, function(object){
                                      jQuery.ajax({
                                        type: "POST",
                                        data: {
                                            action: "portfolio",
                                            id: id
                                        },
                                        url: AjaxUrl
                                       }).done(function(responce){
                                         setTimeout(function(){
                                            jQuery('#portfolio_detail #fountainGP').remove();
                                            box_portfolio_detail.empty().css({'padding':'20px 15px'}).prepend(responce).fadeTo(1000,1);
                                         }, 1000);
                                      }); 
                                }(object))
                            }

                        }(object));
                    }
                } else {
                        box_portfolio_detail.animate({
                            'left':'-9999px',
                            'opacity':'0'
                        }, 1000, function(object){
                            jQuery('#portfolio_detail .container .container').prepend(gif_tpl);
                            jQuery('#fountainGP').fadeIn(500);
                            return function(){
                                jQuery.ajax({
                                        type: "POST",
                                        data: {
                                            action: "portfolio",
                                            id: id
                                        },
                                        url: AjaxUrl
                                       }).done(function(responce){
                                         setTimeout(function(){
                                            jQuery('#portfolio_detail #fountainGP').remove();
                                            box_portfolio_detail.empty().css({'left':'0px'}).prepend(responce).fadeTo(1000,1);
                                         }, 1000);
                                });
                            }
                        }(object));
                }
            }(jQuery(this).parent()));            
        })
        
        
        jQuery('.exit').bind('click', function(){
            jQuery('.list_portfolio > li > div').removeClass('active');
            jQuery('#portfolio_detail .container .container').animate({
                'height':'0px',
                'min-height':'0px'
            }, 500, function(){
                box_portfolio_detail.empty();
                jQuery('#portfolio_detail .container').css({'height':'','padding':'0px 15px'});
            });
        })


/****AJAX CONTACT FROM****/
jQuery('#sendMe').submit(function(event){
    event.preventDefault();
    name = jQuery('#name').val();
    email = jQuery('#email').val();
    message = jQuery('#message').val();
    
    jQuery('#block-bottom .container').animate(
        {
            'left':'-9999px',
            'opacity':'0'
        },
        1000,
        function(){
            /* Ajax jquery */
            jQuery('#block-bottom').prepend(gif_tpl);
            jQuery('#block-bottom #fountainGP').fadeIn(500);
            
            jQuery.post(AjaxUrl,{
                name:name,
                email:email,
                message:message,
                action:"message"
            }, function(data){
                setTimeout(function(){

                    if(data.status){
                        jQuery('#block-bottom #fountainGP').remove();
                        jQuery('#block-bottom .container').empty().css({'left':'0px'}).prepend(data.html).fadeTo(3000,1);
                        
                    } else {
                        jQuery('#fountainGP').remove();
                        jQuery('#block-bottom').find('.error-message').remove();
                        jQuery('#block-bottom .container').prepend(data.html).animate({
                            'left':'0px',
                            'opacity':'1'
                        },1000);
                    }
                }, 1000);
            },
            "json"
        ); 
            
        }
    );       
 });
/****END CONTACT FROM****/

});
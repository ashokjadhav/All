
/*===================================================================================================================
 * @name: Flip Popup
 * @type: jQuery
 * @author: (c) Zerokod Interactive media Productions
 * @demo: http://zerokod.com/flippopup
 * @version: 0.1.1
 * @requires jQuery 1.4.3
 *==================================================================================================================*/
(function(){ 
    $.fn.flipOrizzontal = function (options) {
    var settings = $.extend({
    // These are the defaults.
    color: "#fff",
    xcolor:"#ff5599",
    lightboxcolor:"#ff5599",
    backgroundcolor:"#ff5599",
    border_radius:"25px",
    speed:"0.5",
    shadowcolor:"#ff5599",
    shadowsize:"0px 0px 25px 5px",
    //font_family:"arial",
    popupwidth:"600px", 
  
    popupheight:"auto",
    datatosendtoajax:"",
    loadurl:"",
    imageurl:"http://2outgames.com/wp-content/uploads/2014/05/RedWarrior-415x280.png",
    iframeurl:"http://2outgames.com",
    iframescrolling:"auto"
}, options );
        
     
        var $root = $(this);
        $("body").append("<div id='fade' class='black_overlay'></div>");
        //$("body").append("<div class='topcontainer' ></div>");
        $("body").append( "<div class='flip-container animation white_content ' ontouchstart='this.classList.toggle('hover');'><div class='flipper'><div class='back animated flip'><div class='closeX'><a  href='#'>CLOSE X</a></div></div></div></div>" );
        $(".back").append($root);
        $("#fade").fadeIn( "slow" );
        $(this).fadeIn( "slow" );
        $(this).parent().css( "display", "block" );
        $(this).css( "display", "block" );
        $( ".closeX a" ).css( "color", settings.xcolor);
        
        $( ".closeX" ).click(function() {
            //$(this).css( "display", "none" );
            //$("#fade").css( "display", "none" );
            //$(this).parent().css( "display", "none" );
            //$(this).css( "display", "none" );  
            $("#fade").hide();
            $(this).hide();
            $(this).parent().hide();
            $("body").append( "<div class='flip-container animation white_content ' ontouchstart='this.classList.toggle('hover');'><div class='flipper'><div class='back animated flip'><div class='closeX'><a  href='#'>CLOSE X</a></div></div></div></div>" );
             $(".back").append($root);
             $(".white_content").hide();
            $(".back").children().hide();
            
        });
        
        
        $(".back").css( "-webkit-animation", "flip "+ settings.speed+"s 1" );
        $(".back").css( "-moz-animation", "flip "+  settings.speed+"s 1" );
        $(".back").css( "-o-animation", "flip "+  settings.speed+"s 1");
        $(".back").css( "animation", "flip "+  settings.speed+"s 1" );
        $(".back").css( "-ms-animation", "flip "+  settings.speed+"s 1" );
        var t=(100-parseInt(settings.height))/2;
        var l=(100-parseInt(settings.width))/2;
        $(this).parent().css( "color", settings.color);
        $( ".white_content" ).css( "position", "absolute");
        $( ".white_content" ).css( "top", t+"%");
        $( ".white_content" ).css( "left", l+"%");
        $( ".black_overlay" ).css( "background", settings.lightboxcolor);
        $(this).css( "background", settings.backgroundcolor);
        $(this).css( "box-shadow", settings.shadowsize+" "+settings.shadowcolor );
        $(this).css( "margin", "0 auto");
        $(this).css( "-moz-border-radius", settings.border_radius);
        $(this).css( "border-radius", settings.border_radius);  
        $(this).css( "padding", "20");
        $(this).css( "font-family", "Arial");
        $(this).css( "width", settings.popupwidth);
        $(this).css( "height", settings.popupheight);
        
        if(settings.datatosendtoajax!=""){
        if(settings.loadurl!=""){
        $(this).load( ''+settings.loadurl+'',settings.datatosendtoajax, function( response, status, xhr ) {
            if ( status == "error" ) {
                var msg = "Sorry but there was an error: ";
                $(this).html( msg + xhr.status + " " + xhr.statusText );
            }else{
                $(this).html( response );
            }
        });
        }
        }else{
        	if(settings.loadurl!=""){
                $(this).load( ''+settings.loadurl+'', function( response, status, xhr ) {
                    if ( status == "error" ) {
                        var msg = "Sorry but there was an error: ";
                        $(this).html( msg + xhr.status + " " + xhr.statusText );
                    }else{
                        $(this).html( response );
                    }
                });
                }
        }
        if(settings.imageurl!="http://2outgames.com/wp-content/uploads/2014/05/RedWarrior-415x280.png"){
            $(this).html( "<img src="+settings.imageurl+">" );
        }
        if(settings.iframeurl!="http://2outgames.com"){
            $(this).html( "<iframe src='"+settings.iframeurl+"' width='100%' height='100%'  scrolling='"+settings.iframescrolling+"'>your browser not support iframes</iframe>" );
        }
        return this;  // return root element to enable function chaining
    }
})(jQuery);

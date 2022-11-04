/*-----------------------------------------------------------------------------------

   

    /* ----------------------------------

    JS Active Code Index
            
        01. Preloader
        02. Scroll to Top
        03. Page options
        04. Page Elements
        05. Boxed Page
        06. Fixed Header
        07. Sidebar
        08. Accordion menu
        09. Fulscreen Function
        10. Navbar
        11. Popover
        12. Tooltips
        13. Right Sidebar
        14. Copy to clipboard
        15. Plugins
        
    ---------------------------------- */  

$(document).ready(function() {
    
    "use strict";

    // Preloader
    $('#preloader').fadeOut('normall', function() {
        $(this).remove();
    });

    // Scroll to Top
    $(window).on('scroll', function () {
        if ($(this).scrollTop() > 500) {
            $(".scroll-to-top").fadeIn(400);
        } else {
            $(".scroll-to-top").fadeOut(400);
        }
    });
    
    $(".scroll-to-top").on('click', function (event) {
        event.preventDefault();
        $("html, body").animate({
            scrollTop: 0
        }, 600);
    });
    //   image select
    // $(document).on("click", ".browse", function() {
    //     console.log('img brows');
    //     var file = $(this).parents().find(".file");
    //     file.trigger("click");
    // });
    // $('input[type="file"]').change(function(e) {
    //     console.log('img input');
    //     var fileName = e.target.files[0].name;
    //     $("#file").val(fileName);
    
    //     var reader = new FileReader();
    //     reader.onload = function(e) {
    //     // get loaded data and render thumbnail.
    //     document.getElementById("preview").src = e.target.result;
    //     };
    //     // read the image file as a data URL.
    //     reader.readAsDataURL(this.files[0]);
    // });

    // DataTable
    $('#example').DataTable({
        "language": {
          "paginate": {
            "previous": '<i class="fas fa-chevron-left"></i>',
            "next": '<i class="fas fa-chevron-right"></i>'
          }
        }
      });

    

     

    //   $(function () {
    //     if ($(".js-example-basic-single").length) {
    //         $(".js-example-basic-single").select2();
    //       }
    //       if ($(".js-example-basic-multiple").length) {
    //         $(".js-example-basic-multiple").select2();
    //       }
    //   })

    
      
        
        //   $(".js-example-basic-single").select2();
    
       
        //   $(".js-example-basic-multiple").select2();
        
     
      
    //   $('.js-example-basic-multiple').select2(
    //     {
    //         placeholder: "Add Organizations!",
    //         minimumInputLength: 3,
    //         multiple: true,
            
    //     });
        
        // $('.minus').click(function () {
        //     var $input = $(this).parent().find('input');
        //     var count = parseInt($input.val()) - 1;
        //     count = count < 1 ? 1 : count;
        //     $input.val(count);
        //     $input.change();
        //     return false;
        // });
        // $('.plus').click(function () {
        //     var $input = $(this).parent().find('input');
        //     $input.val(parseInt($input.val()) + 1);
        //     $input.change();
        //     return false;
        // });

        var $removeItem = $(".btn-remove");




        $removeItem.on("click", function () {
          var $item = $(this).parents(".cart-body");
          $item.remove();
        
          
        });

        // range slider
        // const range = document.querySelector('.range')
        // const thumb = document.querySelector('.thumb')
        // const track = document.querySelector('.track-inner')

        // const updateSlider = (value) => {
        // thumb.style.left = `${value}%`
        // thumb.style.transform = `translate(-${value}%, -50%)`
        // track.style.width = `${value}%`
        // }

        // range.oninput = (e) =>
        // updateSlider(e.target.value)

        // updateSlider(50) // Init value

    // Page options
    var page_boxed = false,
        page_sidebar_fixed = false,
        page_sidebar_collapsed = false,
        page_header_fixed = false;

    
    // Page Elements
    var body = $('body'),
        page_header = $('.page-header'),
        page_sidebar = $('.page-sidebar'),
        page_content = $('.page-content');
    

    // Boxed Page 
    var boxed_page = function() {
        if(page_boxed === true) {
            $('.page-container').addClass('container');
        };
    };
    
    // Fixed Header
    var fixed_header = function() {
        if(page_header_fixed === true) {
            $('body').addClass('page-header-fixed');
        };
    };
    
    // Sidebar
    var page_sidebar_init = function() {
        
        // Slimscroll
        $('.page-sidebar-inner').slimScroll({
            height: '100%'
        });  
        
        
        // Fixed Sidebar
        var fixed_sidebar = function() {
            if((body.hasClass('page-sidebar-fixed'))&&(page_sidebar_fixed === false)) {
                page_sidebar_fixed = true;
            };
            
            if(page_sidebar_fixed === true) {
                body.addClass('page-sidebar-fixed');
                $('#fixed-sidebar-toggle-button').removeClass('icon-radio_button_unchecked');
                $('#fixed-sidebar-toggle-button').addClass('icon-radio_button_checked');
            };
            
            var fixed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-fixed');
                if(body.hasClass('page-sidebar-fixed')) {
                    page_sidebar_fixed = true;
                } else {
                    page_sidebar_fixed = false;
                }
            };
    
            $('#fixed-sidebar-toggle-button').on('click', function() {
                fixed_sidebar_toggle();
                $(this).toggleClass('icon-radio_button_unchecked');
                $(this).toggleClass('icon-radio_button_checked');
                return false;
            });
        };
       
        
        // Collapsed Sidebar
        var collapsed_sidebar = function() {
            if(page_sidebar_collapsed === true) {
                body.addClass('page-sidebar-collapsed');
            };
            
            var collapsed_sidebar_toggle = function() {
                body.toggleClass('page-sidebar-collapsed');
                if(body.hasClass('page-sidebar-collapsed')) {
                    page_sidebar_collapsed = true;
                } else {
                    page_sidebar_collapsed = false;
                };
                $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                    mouseenter: function(){
                        $('.page-sidebar').addClass('fixed-sidebar-scroll') 
                    },
                    mouseleave: function(){
                        $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                    }
                }, 'li');
            };
    
                $('.page-sidebar-collapsed .page-sidebar .accordion-menu').on({
                    mouseenter: function(){
                        $('.page-sidebar').addClass('fixed-sidebar-scroll') 
                    },
                    mouseleave: function(){
                        $('.page-sidebar').removeClass('fixed-sidebar-scroll')
                    }
                }, 'li');
            $('#collapsed-sidebar-toggle-button').on('click', function() {
                collapsed_sidebar_toggle();
                return false;
            });
            
        };
        
        var small_screen_sidebar = function(){
            if(($(window).width() < 768)&&($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))){
                $('#fixed-sidebar-toggle-button').click();
            }
            $(window).on('resize', function() {
                if(($(window).width() < 768)&&($('#fixed-sidebar-toggle-button').hasClass('icon-radio_button_unchecked'))){
                    $('#fixed-sidebar-toggle-button').click();
                }
            });
            $('#sidebar-toggle-button').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return false;
            });
            $('#sidebar-toggle-button-close').on('click', function() {
                body.toggleClass('page-sidebar-visible');
                return false;
            });
        };
        
        fixed_sidebar();
        collapsed_sidebar();
        small_screen_sidebar();
    };
            
    // Accordion menu
    var accordion_menu = function() {
        

        /*------------------------------------
            Menu Selector
        --------------------------------------*/

        $('.accordion-menu li ul li').parent().addClass('sub-menu');
        $('.accordion-menu li ul').parent().addClass('has-sub');

        var urlparam = window.location.pathname.split('/');
        var menuselctor = window.location.pathname;
        if (urlparam[urlparam.length - 1].length > 0)
            menuselctor = urlparam[urlparam.length - 1];
        else
            menuselctor = urlparam[urlparam.length - 2];
        
        $('.accordion-menu li').find('a[href="' + menuselctor + '"]').closest('li').addClass('active').parents().eq(1).addClass('active-page');
        $('.accordion-menu .active-page > a').addClass('active');

       $('.has-sub > a').on('click', function(e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).next('.sub-menu').slideToggle();
        return $(this).parents().siblings('.has-sub').children('.sub-menu').slideUp().prev('.active').removeClass('active');
      });

    };
    
    // Fulscreen Function
    function toggleFullScreen() {
        if (!document.fullscreenElement &&    // alternative standard method
            !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods
            if (document.documentElement.requestFullscreen) {
                document.documentElement.requestFullscreen();
            } else if (document.documentElement.msRequestFullscreen) {
                document.documentElement.msRequestFullscreen();
            } else if (document.documentElement.mozRequestFullScreen) {
                document.documentElement.mozRequestFullScreen();
            } else if (document.documentElement.webkitRequestFullscreen) {
                document.documentElement.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
            }
        } else {
            if (document.exitFullscreen) {
                document.exitFullscreen();
            } else if (document.msExitFullscreen) {
                document.msExitFullscreen();
            } else if (document.mozCancelFullScreen) {
                document.mozCancelFullScreen();
            } else if (document.webkitExitFullscreen) {
                document.webkitExitFullscreen();
            }
        }
    };
    
    // Navbar
    var navbar_init = function(){
        
        $('#toggle-fullscreen').on('click', function(){ 
            toggleFullScreen();
            return false;
            
        });
        
        $('#search-button').on('click', function(){
            body.toggleClass('search-open')
            if(body.hasClass('search-open')) {
                $('.search-form input').focus();
            }
        });
        
        $('#close-search').on('click', function(){
            body.toggleClass('search-open')
        });
        
    };

    // Popover
    // $(function () {
    $(document).on("click", ".popover .close" , function(){
        $(this).parents(".popover").popover('hide');
    });

    // $('.right').popover({
    //   placement : 'right',
    //   html : true,
    //   content : '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    // });

    // $('.top').popover({
    //     placement : 'top',
    //     html : true,
    //     content : '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    // });

    // $('.bottom').popover({
    //     placement : 'bottom',
    //     html : true,
    //     content : '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    // });  

    // $('.left').popover({
    //     placement : 'left',
    //     html : true,
    //     content : '<p>This is a very beautiful popover, show some love.</p><div class="d-flex justify-content-between"><a href="#" class="btn-outline btn-sm btn-outline-primary me-0 close">Skip</a><a href="#" class="btn btn-sm btn-primary me-0">Read More</a></div>'
    // });
   
    
    // })


  

    // Tooltips
    // $(function () {
    //     $('[data-bs-toggle="tooltip"]').tooltip()
    // })
    
    //Right Sidebar
    var right_sidebar = function(){
        $('.right-sidebar-toggle').on('click', function(){
            var sidebarId = $(this).data("sidebar-id");
            $('#' + sidebarId).toggleClass('visible');
        });
        
        var write_message = function(){
            $(".chat-write form input").on('keypress', function (e) {
                if ((e.which === 13)&&(!$(this).val().length === 0)) {
                    if($('.right-sidebar-chat .chat-bubbles .chat-bubble:last-child').hasClass('me')) {
                        
                    $('<span class="chat-bubble-text">' + $(this).val() + '</span>').insertAfter(".right-sidebar-chat .chat-bubbles .chat-bubble:last-child span:last-child");
                    } else {
                        $('<div class="chat-bubble me"><div class="chat-bubble-text-container"><span class="chat-bubble-text">' + $(this).val() + '</span></div></div>').insertAfter(".right-sidebar-chat .chat-bubbles .chat-bubble:last-child");
                    };
                    $(this).val('');
                } else if(e.which === 13) {
                    return;
                }
                var scrollTo_int = $('.right-sidebar-chat').prop('scrollHeight') + 'px';
                $('.right-sidebar-chat').slimscroll({
                    allowPageScroll: true,
                    scrollTo : scrollTo_int
                });
            });
        };
        write_message();
    };

    // Copy to clipboard
    // if ($(".copy-clipboard").length !== 0) {
    //     new ClipboardJS('.copy-clipboard');
    //     $('.copy-clipboard').on('click', function() {
    //         var $this = $(this);
    //         var originalText = $this.text();
    //         $this.text('Copied');
    //         setTimeout(function() {
    //             $this.text('Copy')
    //             }, 2000);
    //     });
    // };    
    
    // Plugins
    var plugins_init = function(){

        // Slimscroll
        $('.slimscroll').slimScroll();
        
        // Uniform (Disable it if you want default check box and radio button)
        // var checkBox = $("input[type=checkbox]:not(.js-switch), input[type=radio]:not(.no-uniform)");
        // if (checkBox.length > 0) {
        //     checkBox.each(function() {
        //         $(this).uniform();
        //     });
        // };
        
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        elems.forEach(function(html) {
            var switchery = new Switchery(html, {size: 'small', color: '#526069'});
        });

    };

    $('.accordion-menu .has-sub.active-page > a').addClass('active');

    

    page_sidebar_init();
    boxed_page();
    accordion_menu();
    navbar_init();
    right_sidebar();
    plugins_init();
    

});


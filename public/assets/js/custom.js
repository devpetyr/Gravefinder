$(function(){
    $("div#navbar > ul > li").each(function(){
        var mobbody = $(this).html();
        $('.sidenav').append('<div>'+mobbody+'</div>');
    });
    $( "#mySidenav a" ).each(function(){
        if ($(this).find(".caret").length > 0){ 
          $(this).parent('div').attr('id','hassubmenu');
          $(this).after('<i class="fa fa-angle-down"></i>');
        }
    });
    $('#mySidenav #hassubmenu i.fa.fa-angle-down').click(function(){
        $(this).next('ul.dropdown-menu').slideToggle();
    }
    );
});
function openNav() {
        document.getElementById("mySidenav").style.left = "0px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.left = "-250px";
}   
// Script for sticky header OR add class on 1st scroll
$(window).scroll(function() {
    if ($(this).scrollTop() > 1){  
        $('header').addClass("sticky");
    }
    else{
        $('header').removeClass("sticky");
    }
});
// Page RoleBack to Top
$(document).ready(function(){
    $('.roleback').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 800);
        return false;
    });
});
// Go Down
$(function() {
  $('.goDown').on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({ scrollTop: $($(this).attr('href')).offset().top}, 500, 'linear');
  });
});
//Dummy Script for Slick
$('.custom-slider').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
// Wow Animation
new WOW().init();

toastr.options = {
    "closeButton": false,
    "debug": false,
    "newestOnTop": false,
    "progressBar": true,
    "positionClass": "toast-bottom-full-width",
    "preventDuplicates": false,
    "onclick": null,
    "showDuration": "300",
    "hideDuration": "1000",
    "timeOut": "5000",
    "extendedTimeOut": "1000",
    "showEasing": "swing",
    "hideEasing": "linear",
    "showMethod": "fadeIn",
    "hideMethod": "fadeOut",
    "setTextSize": "55"
}
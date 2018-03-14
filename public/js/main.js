var $slideshow;

function content_padding() {
    var headerHeight = $('header').outerHeight(),
        content = $('.content');
    content.css('padding-top', headerHeight);
}

function slideDown() {
    $slideshow.slick('slickGoTo', parseInt($slideshow.slick('slickCurrentSlide')) + 1);
}

function slideUp() {
    $slideshow.slick('slickGoTo', parseInt($slideshow.slick('slickCurrentSlide')) - 1);
}

function mobile_search_toggle() {
    $(document).on('click', '.mobile_search_toggle', function (e) {
        e.preventDefault();
        $('.mobile_header_search').slideToggle();
    });
}

function mobile_filters_toggle() {
    $(document).on('click', '.music_filters', function (e) {
        e.preventDefault();
        $('.sidebar').toggleClass('active');
    });
    $(document).on('click', '.close_sidebar', function (e) {
        e.preventDefault();
        $('.sidebar').removeClass('active');
    });
}

function sidebar_menu() {
    $(document).on('click', '.has_submenu a .sub_menu_activator', function (e) {
        e.preventDefault();
        $(this).toggleClass('active');
        $(this).parent().parent().find('.sub_menu').eq(0).slideToggle();
    });
}

$(window).on('resize', function () {
    content_padding();
});

function init() {
    content_padding();
    sidebar_menu();
    mobile_search_toggle();
    mobile_filters_toggle();
    var matchHeightClass = $('.matchHeight');
    matchHeightClass.matchHeight();
    // var matchHeight_Height = matchHeightClass.height();
    // matchHeightClass.css('min-height', matchHeight_Height);

    $slideshow = $('.homepage_slider').slick({
        dots: true,
        arrows: true,
        nextArrow: '<i class="fa fa-arrow-right" style="z-index: 200; width: 20px; height:20px; background: #fff"></i>',
        prevArrow: '<i class="fa fa-arrow-left" style="z-index: 200; width: 20px; height:20px; background: #fff"></i>'
    });
}

$('.navbar-toggle').on('click', function () {
    $('body').toggleClass('overflowBody');
});

$(document).ready(function () {
    init();
    $("#datepicker").datepicker({
            firstDay: 1,
            onSelect: function (date) {
                $.ajax({
                    method: 'POST',
                    url: '',
                    data: {date: date}
                }).done(function (msg) {
                    console.log(msg)
                }).fail(function (msg) {
                    console.log(msg)
                })
            }
        }
    );

    makeArrow();
});

function makeArrow() {
    $('.homepage_slider i').remove();
    $('.slick-dots').append('' +
        '<i class="fa fa-arrow-right slick-arrow button_Up" onclick="slideUp()"></i>' +
        '<i class="fa fa-arrow-left slick-arrow button_Down" onclick="slideDown()"></i>'
    );
}

if($('.body-contact').length !== 0){
    var sub = document.querySelector(".btn");
    sub.addEventListener("click", function (e) {
        reset();
        var number = /[1-9]+/;
        var phone = document.getElementById("pwd");
        var em = /\b[a-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,4}\b/;
        var mail = document.getElementById("em");
        var name = /[A-z]/;
        var user = document.getElementById("usr");
        if(!name.test(user.value)){
            e.preventDefault();
            document.querySelector(".message").style.display = "block";
            document.querySelector(".message").innerHTML = "Please enter correct Name <br>"
        }
        if(!number.test(phone.value)){
            e.preventDefault();
            document.querySelector(".message").style.display = "block";
            document.querySelector(".message").innerHTML += "Please enter correct Number <br>"
        }
        if(!em.test(mail.value)){
            e.preventDefault();
            document.querySelector(".message").style.display = "block";
            document.querySelector(".message").innerHTML += "Please enter correct Email <br>"
        }

    });

    function reset() {
        document.querySelector(".message").innerHTML = "";
    }
}


//GlobalVariables
var no_of_slides, arrows_to_show;

//OnWindowResize
if (window.matchMedia("(max-width: 920px)").matches === true && window.matchMedia("(max-width: 621px)").matches === false) {
    no_of_slides = 3; arrows_to_show = true;
} else if (window.matchMedia("(max-width: 620px)").matches === true) {
    no_of_slides = 1; arrows_to_show = false;
} else {
    no_of_slides = 4, arrows_to_show = true;
}

//JquerySlider
$('.friends_suggestion').slick({
    slidesToShow: no_of_slides,
    slidesToScroll: 1,
    dots: false,
    arrows:arrows_to_show,
    autoplay: true,
    autoplaySpeed: 2000,
    infinite: true
});


function field(){
    const field_len = $(".modal textarea").val().length;
    $(".modal .alert").html(field_len + "/ 200");
    field_len > 170 ? $(".modal .alert").css("background-color","red") : $(".modal .alert").css("background-color","rgba(1,1,1,0.5)");
}


$(".friends_suggestion .btn").on("click", function(){
    $(this).addClass("dot-flashing");
    $(this).css("color","var(--black)");
    $(this).parent().css("pointer-events","none");
});

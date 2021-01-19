  
// When the user scrolls the page, execute myFunction 
$(document).ready(function () {

     $(window).scroll(function () {
        if ($(window).scrollTop() > 80) {
            $(".navbar").addClass("bg-nav");
        } else {
            $(".navbar").removeClass("bg-nav");
        }
    });


});
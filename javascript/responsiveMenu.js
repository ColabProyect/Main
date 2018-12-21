$(document).ready(function(){
    var contador = 1;
    $(".listButton").click(function(){
        if(contador == 0){
            $("nav").animate({
                left: '0'
            });
            contador = 1;
            $(".header").removeClass("headerAnimationButton");
            $(".listButton").removeClass("listButtonAnimation");
        }else{
            $(".header").addClass("headerAnimationButton");
            $(".listButton").addClass("listButtonAnimation");
            $("nav").animate({
                left: '-800%'
            });
            contador = 0;
        }
    });
});
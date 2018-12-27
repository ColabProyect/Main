function changePlaceHolder(){
    if($(window).width()<=650){
        $("input[name='name']").attr("placeholder", "");
    }

    if($(window).width()<=650){
        $("input[name='email']").attr("placeholder", "")
    }

    if($(window).width()<=650){
        $("textarea").attr("placeholder", "")
    }
}

$(document).ready(function(){ 
changePlaceHolder();

});
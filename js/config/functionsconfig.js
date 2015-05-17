$.fn.openclose = function(){
    if($(this).attr("class") === "configMenu"){
        $(this).attr("class", "configMenuOpen");
    }else{
        $(this).attr("class", "configMenu");
    }
    $("body").resize();
}
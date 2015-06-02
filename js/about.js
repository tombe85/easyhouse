$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/config/index.html&info=true", function(){
        $("#photoHeader").find("img").attr("src","/sweethomesw/img/infoselected.png");
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
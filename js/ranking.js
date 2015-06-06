$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/tasks/index.html");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#tareasbutton").attr("src","/sweethomesw/img/tareasselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/user_ranking_cabeza.php");
    $("#users").load("/sweethomesw/ajax/user_ranking_cuerpo.php");
    $("#lastWeek").load("/sweethomesw/ajax/lastweektasks.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
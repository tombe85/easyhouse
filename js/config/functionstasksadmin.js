$(document).bind('pagebeforecreate',function(){
    var admin = getCookie("admin");
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
    if(admin == false){
        location.href='/sweethomesw/config/tasks.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/tasks/index.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfig.html",function(){
        $("#tasksbutton").attr("src","/sweethomesw/img/tareaconfigselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#taskList").load("/sweethomesw/ajax/tasklist.php", function(){
        $("#taskList").css("margin-bottom","0px");
    });
    $("#adminList").load("/sweethomesw/ajax/admintasklist.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    var admin = getCookie("admin");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
    if(loged == true && admin == true){
        location.href='/sweethomesw/admin/config/tasks.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/tasks/index.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfigUser.html", function(){
        $("#tasksbutton").attr("src","/sweethomesw/img/tareaconfigselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#taskList").load("/sweethomesw/ajax/tasklist.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
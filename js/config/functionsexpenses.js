$(document).bind('pagebeforecreate',function(){
    var admin = getCookie("admin");
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
    if(admin == false){
        location.href='/sweethomesw/config/index.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/expenses/index.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfig.html",function(){
        $("#expensesbutton").attr("src","/sweethomesw/img/expenses_config_selected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#expensesList").load("/sweethomesw/ajax/expenseslistconfig.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
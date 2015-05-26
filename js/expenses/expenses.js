$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    if(getCookie("admin") == true){
        $("#header").load("/sweethomesw/ajax/header.php?expense=true");
    }else{
        $("#header").load("/sweethomesw/ajax/header.php");
    }
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#gastosbutton").attr("src","/sweethomesw/img/gastosselected.png");
    });
    $("#expensesList").load("/sweethomesw/ajax/expenses.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});

$.fn.openclose = function(n){
    if($(this).attr("class") === "expenseMenu"){
        $(this).attr("class", "expenseMenuOpen");
        $(".expenseMenuOpen ul").css("height", n);
    }else{
        $(this).attr("class", "expenseMenu");
        $(".expenseMenu ul").css("height", 0);
    }
}

function expenseToggle(iduser, idexpense, containerid){
    var admin = getCookie("admin");
    var cont = containerid;
    if(admin == true){
        $.post('/sweethomesw/backend/expenses/expensetoggle.php', {user:iduser,expense:idexpense}, function(data, textStatus){
            if(data == 0){
                alert("Error al cambiar el estado");
            }else{
                $(cont).html(data);
            }
        });
    }
}
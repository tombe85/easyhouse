var idsreg = new Array();

$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php?myhome=true");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#homebutton").attr("src","/sweethomesw/img/homeselected.png");
    });
    $("#registry").load("/sweethomesw/ajax/registry.php", function(){
        $("#strids").attr("value", idsreg.toString());
    });
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});

function validaHome(formu){
    if($("#strids").attr("value") == "" || $("#strids").attr("value") == null){
        return false;
    }else{
        return true;
    }
}
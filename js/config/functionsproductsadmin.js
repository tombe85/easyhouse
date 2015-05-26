$(document).bind('pagebeforecreate',function(){
    var admin = getCookie("admin");
    var login = getCookie("login");
    if(!login){
        location.href='/sweethomesw/login.html';
    }
    if(admin == false){
        location.href='/sweethomesw/config/products.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/shopping/index.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfig.html", function(){
        $("#productsbutton").attr("src","/sweethomesw/img/compraractionselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#productList").load("/sweethomesw/ajax/productlistconfig.php");
    $(document).ajaxComplete(function(){
        $("body").resize();
    });
});
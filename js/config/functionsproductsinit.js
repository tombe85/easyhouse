$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    var admin = getCookie("admin");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
    if(loged == true && admin == true){
        location.href='/sweethomesw/admin/config/products.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=/sweethomesw/shopping/index.html&info=true");
    $("#footer").load("/sweethomesw/footer/footerConfigUser.html", function(){
        $("#productsbutton").attr("src","/sweethomesw/img/compraractionselected.png");
    });
    $("#userData").load("/sweethomesw/ajax/userdata.php");
    $("#productList").load("/sweethomesw/ajax/productlistconfig.php");
    $(document).ajaxComplete(function(){

        $("body").resize();
    });
});
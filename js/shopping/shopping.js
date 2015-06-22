var idsreg ="";
var names ="";

$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    //Footer
    $("#header").load("/sweethomesw/ajax/header.php?product=true");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#comprabutton").attr("src","/sweethomesw/img/compraselected.png");
    });
    $("#shoppingList").load("/sweethomesw/ajax/shoppinglist.php");
    $(document).ajaxComplete(function(){

        $("body").resize();
    });
    $("#newProduct").focusin(function(){
        $("footer").hide();
        $("#contentBottom").hide();
        $("#productsList").show();
        findProducts(null);
    });

    /*$("#newProduct").focusout(function(){
        $("footer").show();
        $("#contentBottom").show();
        $("#productsList").hide();
    });*/
    
    $("#productsList").hide();
});

function focusoutsuggestions(){
    $("footer").show();
    $("#contentBottom").show();
    $("#productsList").hide();
}

function comprar(){
    if(idsreg.trim() != ""){
        $.post("/sweethomesw/backend/shopping/removeproduct.php",{strids:idsreg},function(data,textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#shoppingList").load("/sweethomesw/ajax/shoppinglist.php");
                idsreg = "";
            }
        });
    }
}

function addproducttolist(idproduct,productcheck){
    var cad = idproduct + " ";
    var nam = productcheck.name + " ";
    if(productcheck.checked == true){
        idsreg = idsreg + cad;
        names += nam;
    }else{
        idsreg = idsreg.replace(cad,"");
        names = names.replace(nam,"");
    }
}

function addcomprar(idproduct){
    $.post("/sweethomesw/backend/shopping/addproduct.php",{idp:idproduct},function(data,textStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#textoProd").val("");
            $("#newProduct").focusout();
            $("#shoppingList").load("/sweethomesw/ajax/shoppinglist.php");
            focusoutsuggestions();
        }
    });
}


function addNewProduct(){
    var texto = $("#textoProd").val();
    var i = 0;
    var ide;
    if(texto == null || texto == ""){
        alert("Debes introducir el nombre de un producto");
    }else{
        $.post('/sweethomesw/backend/shopping/addproductdb.php',{name:texto}, function(data, textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#textoProd").val("");
                $("#newProduct").focusout();
                $("#shoppingList").load("/sweethomesw/ajax/shoppinglist.php");
            }
        });
    }
}

function reCheckproducts(){
    var nam = names.trim().split(" ");
    for(i = 0; i < nam.length; i++){
        var identi = "#" + nam[i];
        $(identi).attr("checked","true");
    }
}

function findProducts(event){
    if(event != null && event.keyCode == 13){
        $("#buttonAddProduct").click();
    }else{
        var texto = $("#textoProd").val();
        var ruta = "/sweethomesw/ajax/productlist.php?start="+texto.replace(" ","%20");
        if(texto != null){
            $("#productsList").load(ruta);
        }
    }
}

function closeSuggestions(){
    focusoutsuggestions();
}
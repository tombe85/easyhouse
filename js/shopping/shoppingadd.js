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
    $("#header").load("/sweethomesw/ajax/header.php?backbutton=true&backurl=index.html&product=true");
    $("#footer").load("/sweethomesw/footer/footer.html");
    $("#productsList").load("/sweethomesw/ajax/productlist.php",function(){
        $("#comprabutton").attr("src","/sweethomesw/img/compraselected.png");
    });
    $(document).ajaxComplete(function(){
        reCheckproducts();
        $("body").resize();
    });
    $("#textoProd").focusin(function(){
        $("footer").hide();
        $("#contentBottom").hide();
    });

    $("#textoProd").focusout(function(){
        $("footer").show();
        $("#contentBottom").show();
    });
});

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
        $("#textoProd").val("");
        $("#textoProd").keyup();    //Para cargar todos los productos
    }else{
        idsreg = idsreg.replace(cad,"");
        names = names.replace(nam,"");
    }
}

function addcomprar(){
    if(idsreg.trim() != ""){
        $.post("/sweethomesw/backend/shopping/addproduct.php",{strids:idsreg},function(data,textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                document.location.href="/sweethomesw/shopping/index.html";
            }
        });
    }
}


function addNewProduct(){
    var texto = $("#textoProd").val();
    var textfmt = "#" + texto.replace(/ /g,""); // Para utilizar el identificador después
    if(texto == null || texto == ""){
        alert("Debes introducir el nombre de un producto");
    }else{
        $.post('/sweethomesw/backend/shopping/addproductdb.php',{name:texto}, function(data, textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#productsList").load("/sweethomesw/ajax/productlist.php",function(){
                    $(textfmt).click();
                });
                $("#textoProd").val("");
                $("#textoProd").focusout();
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
    if(event.keyCode == 13){
        $("#buttonAddProduct").click();
    }else{
        var texto = $("#textoProd").val();
        var ruta = "/sweethomesw/ajax/productlist.php?start="+texto.replace(" ","%20");
        if(texto != null){
            $("#productsList").load(ruta);
        }
    }
}
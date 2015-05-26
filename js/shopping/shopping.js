var idsreg ="";
var names ="";

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
    var i = 0;
    var ide;
    if(texto == null || texto == ""){
        alert("Debes introducir el nombre de un producto");
    }else{
        $.post('/sweethomesw/backend/shopping/addproductdb.php',{name:texto}, function(data, textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#productsList").load("/sweethomesw/ajax/productlist.php",function(){
                    $("#"+texto.replace(" ","")).click();
                });
                $("#textoProd").val("");
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
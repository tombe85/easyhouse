var idsreg ="";

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
    if(productcheck.checked == true){
        idsreg = idsreg + cad;
    }else{
        idsreg = idsreg.replace(cad,"");
    }
}

function addcomprar(){
    if(idsreg.trim() != ""){
        $.post("/sweethomesw/backend/shopping/addproduct.php",{strids:idsreg},function(data,textStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                document.location.href="/sweethomesw/shopping/main.html";
            }
        });
    }
}
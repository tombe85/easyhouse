var idsreg ="";

function comprar(){
    if(idsreg.trim() != ""){
        $.post("/sweethomesw/backend/shopping/removeproduct.php",{strids:idsreg},function(data,textStatus){
            if(data != 0){
                alert("Error " + data);
            }
            $("#shoppingList").load("/sweethomesw/ajax/shoppinglist.php");
        });
    }
}
            
function addproducttolist(idproduct,productcheck){
    if(productcheck.checked == true){
        idsreg = idsreg + " " + idproduct;
    }else{
        var cad = idproduct + " ";
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
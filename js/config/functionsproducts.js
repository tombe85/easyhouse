function addProduct(formu){
    $.post('/sweethomesw/backend/shopping/addproductdb.php',{name:formu.producto.value}, function(data, textStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#productList").load("/sweethomesw/ajax/productlistconfig.php");
            formu.producto.value="";
            $("#addproductdiv").openclose();
        }
    });
    return false;
}
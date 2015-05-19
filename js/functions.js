function getCookie(galleta) {
    var name = galleta + "=";
    var arr = document.cookie.split(';');
    for(var i=0; i<arr.length; i++) {
        var cook = arr[i];
        while (cook.charAt(0)==' ') cook = cook.substring(1);
        if (cook.indexOf(name) == 0) return cook.substring(name.length, cook.length);
    }
    return "";
}

function changeAvatar(){
    var foto = $("#userAvatar").attr("src").replace("/sweethomesw/img/avatares/","").replace(".png","");
    foto++;
    if(foto > 13){
        foto = 1;
    }
    var ruta = "/sweethomesw/img/avatares/" + foto + ".png";
    $.post('/sweethomesw/backend/userreg/setavatar.php', {ruta:ruta,user:getCookie("iduser")}, function(data, textStatus){
        if(data != 0){
            $("#userAvatar").attr("src",data);
        }else{
            alert("Error al actualizar el avatar");
        }
    });
}

function changeName(){
    var newname = prompt("Introduce tu nombre de usuario nuevo");
    if(newname != null){
        $.post('/sweethomesw/backend/userreg/setname.php', {name:newname,user:getCookie("iduser")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#userName").html(data);
            }
        });
    }
}

function changeLordName(){
    var newname = prompt("Introduce el nombre del propietario");
    if(newname != null){
        $.post('/sweethomesw/backend/homereg/setlordname.php', {name:newname,home:getCookie("idhome")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#propietario").html("Propietario: " + data);
            }
        });
    }
}

function changeLordPhone(){
    var phone = prompt("Introduce el teléfono del propietario");
    if(phone != null){
        $.post('/sweethomesw/backend/homereg/setlordphone.php', {phone:phone,home:getCookie("idhome")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#telefono").html("Teléfono: " + data);
            }
        });
    }
}

function changeLordMail(){
    var mail = prompt("Introduce el correo electrónico del propietario");
    if(mail != null){
        $.post('/sweethomesw/backend/homereg/setlordmail.php', {mail:mail,home:getCookie("idhome")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#correo").html("Email: " + data);
            }
        });
    }
}

function changeHomeInfo(){
    var info = prompt("Introduce la información que desee guardar de la casa");
    if(info != null){
        $.post('/sweethomesw/backend/homereg/sethomeinfo.php', {info:info,home:getCookie("idhome")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#extrainfo").html("Otro: " + data);
            }
        });
    }
}

function changeHouseName(){
    var name = prompt("Introduce el nuevo nombre de la casa");
    if(name != null){
        $.post('/sweethomesw/backend/homereg/sethousename.php', {name:name,home:getCookie("idhome")}, function(data, textStatus){
            if(data == 0){
                alert("error al cambiar el nombre");
            }else{
                $("#userName").html(data);
            }
        });
    }
}

function deleteExpense(idexpense){
    if(confirm("¿Seguro que desea eliminar el gasto?")){
        $.post('/sweethomesw/backend/expenses/deleteexpensesdb.php', {idexpense: idexpense}, function(data,taxtStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#expensesList").load("/sweethomesw/ajax/expenseslistconfig.php");
            }
        });
    }
}

function addexpenses(formu){
    $.post('/sweethomesw/backend/expenses/addexpensesdb.php',{name:formu.expenses.value}, function(data, textStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#expensesList").load("/sweethomesw/ajax/expenseslistconfig.php");
            formu.expenses.value="";
            $("#addexpensesdiv").openclose();
        }
    });
    return false;
}

function deleteMessage(idboard){
    if(confirm("¿Seguro que desea eliminar el mensaje?")){
        $.post('/sweethomesw/backend/userreg/deletemessage.php', {idboard:idboard}, function(data, textStatus){
            if(data == 0){
                alert("error al eliminar el mensaje ");
            }else{
                $("#userMessage").load("/sweethomesw/ajax/usermessages.php");
            }
        });
    }
}

function deleteProduct(idprod){
    if(confirm("¿Seguro que desea eliminar el producto?")){
        $.post('/sweethomesw/backend/shopping/deleteproductdb.php', {idprod: idprod}, function(data,taxtStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#productList").load("/sweethomesw/ajax/productlistconfig.php");
            }
        });
    }
}

function deleteTask(idtask, name){
    if(confirm("¿Seguro que desea eliminar la tarea?")){
        $.post('/sweethomesw/backend/tasks/removetask.php', {idtask: idtask , name: name}, function(data,taxtStatus){
            if(data != 0){
                alert("Error " + data);
            }else{
                $("#taskList").load("/sweethomesw/ajax/tasklist.php");
            }
        });
    }
}

function addTask(formu){
    $.post('/sweethomesw/backend/tasks/addtask.php',{name:formu.tarea.value, points: formu.puntuacion.value, period: formu.periodo.value}, function(data, textStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#taskList").load("/sweethomesw/ajax/tasklist.php");
            formu.tarea.value="";
            formu.puntuacion.value="";		
            formu.periodo.value="";
            $("#addtaskdiv").openclose();
        }
    });
    return false;
}

function activateTask(idtask){
    $.post('/sweethomesw/backend/tasks/activatetask.php', {idtask: idtask}, function(data,taxtStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#taskList").load("/sweethomesw/ajax/tasklist.php");
        }
    });
}

function pauseTask(idtask){
    $.post('/sweethomesw/backend/tasks/completetask.php', {id: idtask, nouser: true}, function(data,taxtStatus){
        if(data != 0){
            alert("Error " + data);
        }else{
            $("#taskList").load("/sweethomesw/ajax/tasklist.php");
        }
    });
}

function deleteuser(iduser){
    if(confirm("¿Seguro que desea eliminar al usuario?")){
        $.post('/sweethomesw/backend/homereg/deleteuser.php', {iduser:iduser}, function(data, textStatus){
            if(data == 0){
                alert("error al eliminar al usuario ");
            }else{
                $("#users").load("/sweethomesw/ajax/usersmanage.php");
            }
        });
    }
}

function deleteinviteduser(idinvited){
    if(confirm("¿Seguro que desea eliminar la invitación?")){
        $.post('/sweethomesw/backend/homereg/deleteinvitation.php', {idinvited:idinvited}, function(data, textStatus){
            if(data == 0){
                alert("error al eliminar la invitación");
            }else{
                $("#users").load("/sweethomesw/ajax/usersmanage.php");
            }
        });
    }
}

function getQueryVariable(variable)            {
   var query = window.location.search.substring(1);
   var vars = query.split("&");
   for (var i=0;i<vars.length;i++) {
       var pair = vars[i].split("=");
       if(pair[0] == variable){
           return pair[1];
       }
   }
   return(false);
}
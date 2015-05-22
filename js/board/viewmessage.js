function checkComment(formu){
    if(formu.texto.value == ""){
        return false;
    }else{
        return true;
    }
}

function requestUpdate(){
    setInterval(updateComments, 1000);
}

function updateComments(){
    $.get("/sweethomesw/ajax/messagecomments.php?id=" + getQueryVariable("id"), function(respuestaSolicitud){
        if(respuestaSolicitud !== $("#comments").html()){
            $("#comments").html(respuestaSolicitud);
        }
    });
}
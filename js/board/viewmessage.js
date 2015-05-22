function checkComment(formu){
    $.post("/sweethomesw/backend/board/addcomment.php",{texto: formu.texto.value ,idboard:formu.idboard.value}, function(data,textStatus){
        if(data != 0){
            $("#comments").append(data);
            formu.texto.value = "";
            $('body').animate({scrollTop: $(document).height()},750);
        }
    });
    return false;
}

function requestUpdate(){
    setInterval(updateComments, 1000);
}

function updateComments(){
    $.get("/sweethomesw/ajax/messagecomments.php?id=" + getQueryVariable("id"), function(respuestaSolicitud){
        if(respuestaSolicitud.toString() != $("#comments").html().toString()){
            $("#comments").html(respuestaSolicitud);
        }
    });
}
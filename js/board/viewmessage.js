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
    var posnum;
    var num = 0;
    var cad = '<div id="numcomdiv" hidden="true">';
    $.get("/sweethomesw/ajax/messagecomments.php?id=" + getQueryVariable("id"), function(respuestaSolicitud){
        posnum = respuestaSolicitud.indexOf(cad) + cad.length;
        while(!isNaN(respuestaSolicitud.charAt(posnum))){
            num = (num*10) + respuestaSolicitud.charAt(posnum);
            posnum++;
        }
        num /=10;
        if(num != $("#numcomdiv").html()){
            $("#comments").html(respuestaSolicitud);
            $('body').animate({scrollTop: $(document).height()},750)
            $("#numcomdiv").html(num);
        }
    });
}

function textClicked(){
    $('body').animate({scrollTop: $(document).height()},750);
    $("footer").hide();
    $("#contentBottom").css("bottom","0px");
}
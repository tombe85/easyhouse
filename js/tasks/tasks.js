var taskselected = null;
var taskid = null;
var taskcontent = null;
var taskdayson = null;
var taskpoints = null;
var loadurl = null;

$(document).bind('pagebeforecreate',function(){
    var loged = getCookie("login");
    if(!loged){
        location.href='/sweethomesw/login.html';
    }
});

$(document).bind('pageinit', function(){
    $("#header").load("/sweethomesw/ajax/header.php?task=true");
    $("#footer").load("/sweethomesw/footer/footer.html", function(){
        $("#tareasbutton").attr("src","/sweethomesw/img/tareasselected.png");
    });
    $("#taskList").load("/sweethomesw/ajax/tasks.php");
    $(document).ajaxComplete(function(){

        $("body").resize();
    });
});

function cierraSelected(){
    $(taskselected).css("padding","5px");
    $(taskselected).html("");
    $(taskselected).load("/sweethomesw/backend/tasks/loadtask.php?id="+taskid+"&cont="+taskcontent.replace(/ /g,"%20")+"&day="+taskdayson+"&points="+taskpoints+"");
    taskselected = null;
    taskid = null;
    taskcontent = null;
    taskdayson = null;
}
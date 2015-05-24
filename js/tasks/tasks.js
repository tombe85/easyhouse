var taskselected = null;
var taskid = null;
var taskcontent = null;
var taskdayson = null;
var taskpoints = null;
var loadurl = null;

function cierraSelected(){
    $(taskselected).css("padding","5px");
    $(taskselected).html("");
    $(taskselected).load("/sweethomesw/backend/tasks/loadtask.php?id="+taskid+"&cont="+taskcontent.replace(/ /g,"%20")+"&day="+taskdayson+"&points="+taskpoints+"");
    taskselected = null;
    taskid = null;
    taskcontent = null;
    taskdayson = null;
}
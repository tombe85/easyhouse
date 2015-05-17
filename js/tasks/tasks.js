var taskselected = null;
var taskid = null;
var taskcontent = null;
var taskdayson = null;
var loadurl = null;

function cierraSelected(){
    $(taskselected).css("padding","5px");
    $(taskselected).html("");
    $(taskselected).load("/sweethomesw/backend/tasks/loadtask.php?id="+taskid+"&cont="+taskcontent.replace(/ /g,"%20")+"&day="+taskdayson+"");
    taskselected = null;
    taskid = null;
    taskcontent = null;
    taskdayson = null;
}
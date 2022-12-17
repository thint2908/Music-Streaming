const songM = $("#songManage");
const categoryM = $("#categoryManage");
const userM = $("#userManage");


$(document).ready(function() {
	//Phân trang
    $("#song").click(function(){
        songM.css("display","block");
        categoryM.css("display","none");
        userM.css("display","none");
    })
    $("#category").click(function(){
        songM.css("display","none");
        categoryM.css("display","block");
        userM.css("display","none");
    })
    $("#user").click(function(){
        songM.css("display","none");
        categoryM.css("display","none");
        userM.css("display","block");
    })
});
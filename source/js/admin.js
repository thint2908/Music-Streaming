const songM = $("#songManage");
const categoryM = $("#categoryManage");
const userM = $("#userManage");
// load music_list
function load_music(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_music(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_music(data){
    let songBody = $("#songBody");
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        
        let tr = `
            <tr>
                <td>
                    ${r.id}
                </th>
                
                <td>
                    ${r.name}
                </th>
                
                <td>
                    ${r.singer_name}
                </th>
                
                <td>
                    ${r.category_name}
                </th>
                
                <td>
                    <img src=${r.image} width="100px" height="100px">
                </th>
                <td>
                    <button id="btnEdit"><a href="">Chỉnh sửa</a></button>
                    <button id="btnDel"><a href="">Xóa</a></button>
                </th>
            </tr>
        `
        songBody.append(tr);
    }
}   

//

function load_singer(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_singer(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_singer(data){
    let singerBody = $("#singerBody");
    let singer_list = $("#song_singerName")
    for(let i =0; i < data.length; i++){
        let r = data[i];
        let tr = ``;
        let opt=`<option value=${r.id}>${r.name}</option>`;
        singer_list.append(opt);
    }

}

function load_user(link) {
	$.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_user(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

$(document).ready(function() {
	//Phân trang
    load_music("./api/adminController/loadMusic.php");

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

    //Hiện modal thêm nhạc

    $(".addMusicBtn").click(function(e) {
        e.preventDefault();
           console.log('a');
           $("#addMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })
    

});
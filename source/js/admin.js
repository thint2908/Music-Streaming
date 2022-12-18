const songM = $("#songManage");
const categoryM = $("#categoryManage");
const userM = $("#userManage");
const singerM = $("#singerManage");
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
                </td>
                
                <td>
                    ${r.name}
                </td>               
                <td>
                    ${r.singer_name}
                </td>
                
                <td>
                    ${r.category_name}
                </td>
                
                <td>
                    <img src=${r.image} width="100px" height="100px">
                </td>
                <td>
                    <button class="editBtn btn btn-primary">Chỉnh sửa</button>
                    <button class="deleteBtn btn btn-danger">Xóa</button>
                </td>
            </tr>
        `
        songBody.append(tr);
    }
    //active 2 button above

    //edit btn
    $(".editBtn").click(function(){
        let thisRow = $(this).parent().parent().children();
        let songID = thisRow[0].innerText;
        let songName = thisRow[1].innerText;
        $("#update-song-name").val(songName);
        $("#update-song-id").val(songID);
        $("#updateMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

    //delete button
    $(".deleteBtn").click(function(){
        let songID = $(this).parent().parent().children()[0].innerText;
        let songName = $(this).parent().parent().children()[1].innerText;
        $("#songId").val(songID);
        $("#songDeleteText").html("Bạn có muốn xóa \"" +songName+"\" ra khỏi danh sách");
        $("#deleteMusicModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    })

}   

//singer part

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
    let singer_add_list = $("#add-song-singer")
    let singer_update_list = $("#update-song-singer")
    for(let i =0; i < data.length; i++){
        let r = data[i];
        let tr = `<tr>
            <td>
                ${r.id}
            </td>
                
            <td>
            <image src=${r.image} width="100px" height="100px">
            </td>
           
            <td>
                ${r.name}
            </td>
            
            <td>
                <button class="editSBtn btn btn-primary">Chỉnh sửa</button>
                <button class="deleteSBtn btn btn-danger">Xóa</button>  
            </td>
        </tr>`;
        let opt=`<option value=${r.id}>${r.name}</option>`;
        singer_add_list.append(opt);
        singer_update_list.append(opt);
        singerBody.append(tr);
    }

}

//user part

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

function show_user(data){
    let userBody = $("#userBody");
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        
        let tr = `
            <tr>
                <td>
                    ${r.id}
                </td>
                
                <td>
                    ${r.name}
                </td>               
                <td>
                    ${r.username}
                </td>
                
                <td>
                    ${r.password}
                </td>
                
                <td>
                    <button class="editBtnUser btn btn-primary">Chỉnh sửa</button>
                    <button class="deleteBtnUser btn btn-danger">Xóa</button>
                </td>
            </tr>
        `
        userBody.append(tr);
    }
    //active 2 button above

    //edit btn
    // $(".editBtnUser").click(function(){
    //     let thisRow = $(this).parent().parent().children();
    //     let userID = thisRow[0].innerText;
    //     let userName = thisRow[1].innerText;
    //     $("#update-song-name").val(songName);
    //     $("#update-song-id").val(userName);
    //     $("#updateMusicModal").modal({
    //         backdrop: 'static',
    //         keyboard: false
    //     });
    // })

    //delete button
    // $(".deleteBtnUser").click(function(){
    //     let userID = $(this).parent().parent().children()[0].innerText;
    //     let userName = $(this).parent().parent().children()[1].innerText;
    //     $("#songId").val(userID);
    //     $("#songDeleteText").html("Bạn có muốn xóa \"" +userName+"\" ra khỏi danh sách");
    //     $("#deleteMusicModal").modal({
    //         backdrop: 'static',
    //         keyboard: false
    //     });
    // })

}

//category part

function load_category(link){
    $.ajax({
		url: link,
		dataType: "json",
		success: function (data) {
			show_category(data);
		},
		error: function (error) {
			// alert("Load fail");
		},
	});
}

function show_category(data){
    let category_add = $("#add-song-category")
    let category_update = $("#update-song-category")
    let category_body = $("#categoryBody")
    for(let i = 0; i < data.length; i++){
        let r = data[i];
        let opt =`
            <option value=${r.id}>${r.name}</option>
        `
        let tr = `
            <tr>
                <td colspan="2">
                    ${r.id}
                </td>
                <td colspan="8">
                    ${r.name}
                </td>
                <td colspan="2">
                    <button class="btn btn-primary editCaBtn">Chỉnh sửa</button>
                    <button class="btn btn-warning deleteCaBtn">Xóa</button>
                </td>
            </tr>
        `;
        category_add.append(opt);
        category_update.append(opt);
        category_body.append(tr);
    }
    $(".deleteCaBtn").click(function(){
        let catId = $(this).parent().parent().children()[0].innerText;
        let catName = $(this).parent().parent().children()[1].innerText;
        $("#deleteCaModal").modal({
            backdrop: 'static',
            keyboard: false
        });
    });
}
$(document).ready(function() {
	//Phân trang
    load_music("./api/adminController/loadMusic.php");
    load_singer("./api/adminController/loadSinger.php")
    load_user("./api/adminController/LoadUser.php");
    load_category("./api/adminController/loadCategory.php");

    $("#song").click(function(){
        songM.css("display","block");
        categoryM.css("display","none");
        userM.css("display","none");
        singerM.css("display","none");
    })
    $("#category").click(function(){
        songM.css("display","none");
        categoryM.css("display","block");
        userM.css("display","none");
        singerM.css("display","none");
    })
    $("#user").click(function(){
        songM.css("display","none");
        categoryM.css("display","none");
        userM.css("display","block");
        singerM.css("display","none");
    })
    $("#singer").click(function(){
        songM.css("display","none");
        categoryM.css("display","none");
        userM.css("display","none");
        singerM.css("display","block");
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
    
    //xử lý xóa nhạc
    $("#deleteSongForm").submit(function(){
        $.ajax({
            type: 'POST',
            url: './api/adminController/deleteMusic.php',
            data: $(this).serialize(),
            success: function (response1) {
                var jsonData1 = JSON.parse(response1);

                // user is logged in successfully in the back-end
                // let's redirect
                if (jsonData1.code == "1") {
                    alert(jsonData1.message);
                    location.href = './admin.php';
                }
                else {
                
                }
            }
        });
    })
});
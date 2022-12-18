<?php
//folder chứa nhạc và hình
$folderMusics = "../musics/";
$folderImages = "./img/singer/";

//tên file nhạc và hình
$fileImageName = $_FILES['fileImage']["name"];
$fileMusicName = $_FILES['fileMusic']["name"];

//địa chỉ lưu trữ nhạc và hình
$fileMusic = $folderMusics . basename($fileMusicName);
$fileImage = $folderImages . basename($fileImageName);

$isUpload = 1;

//path của file hình và file nhạc
$imageType = strtolower(pathinfo($fileImage,PATHINFO_EXTENSION));
$musicType = strtolower(pathinfo($fileMusic,PATHINFO_EXTENSION));

//check image path
if($imageType != "png" && $imageType != 'jpg' && $imageType !='jpeg'){
  $isUpload = 0;
  $errors = "Chỉ hỗ trợ các loại file ảnh sau: JPG, JPEG, PNG"; 
}

//check music path
elseif($musicType != "mp3"){
  $isUpload = 0;
  $errors = "Chỉ hỗ trợ các loại âm nhạc ";
}

//Kiểm tra tồn tại trong của file upload trong folder
elseif(file_exists($fileImage)){
  $isUpload = 0;
  $errors = "Hình đã có trong hệ thống";
} 
 elseif(file_exists($fileMusic)){
  $isUpload = 0;
  $errors = "Nhạc đã có trong hệ thống";
}

//chuyển file vào thư mục vào thêm dữ liệu vào data

if($isUpload == 1){

  require_once("connection.php");
  $name = $_POST['songName'];
  $singer = $_POST['singerName'];
  $lyrics = $_POST['lyrics'];
  $description = $_POST['description'];
  $category = $_POST['category'];
  $url = $fileMusicName;
  $image = $fileImage;
  $res = $db -> prepare("Insert into music_list(name,singer_id,lyrics,description, category_id, url, image)
    values('".$name."',
    '".$singer."',
    '".$lyrics."',
    '".$description."',
    '".$category."',
    '".$url."',
    '".$image."'
    )
  ");
      if($res->execute()){
        move_uploaded_file($_FILES["fileImage"]["tmp_name"], ".".$fileImage);
  move_uploaded_file($_FILES["fileMusic"]["tmp_name"], $fileMusic);
      }
}else{
  echo $errors;
}
// // Check if $uploadOk is set to 0 by an error
// if ($uploadOk == 0) {
//   echo "Sorry, your file was not uploaded.";
// // if everything is ok, try to upload file
// } else {
//   if (move_uploaded_file($_FILES["fileName"]["tmp_name"], $target_file)) {
//     echo "The file ". htmlspecialchars( basename( $_FILES["fileName"]["name"])). " has been uploaded.";
//   } else {
//     echo "Sorry, there was an error uploading your file.";
//   }
// }

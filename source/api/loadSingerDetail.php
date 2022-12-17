<?php
require_once("connection.php");
session_start();
$idSinger = $_SESSION['idSinger'];
$sql = "SELECT * FROM music_list WHERE singer_id = '$idSinger'";
$result = $db->query($sql);
$singerList = [];
while ($row = $result->fetch_assoc()) {
    $singerList = ['name' => $row['name'], 'lyric' => $row['lyrics'], 'description' => $row['description'], 'category' => $row['category_id'], 'url' => $row['url'], 'image' => $row['image']];
}
$response = json_encode($singerList);
echo $response;

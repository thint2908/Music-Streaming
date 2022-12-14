<?php
session_start();
require_once("connection.php");

$sql = "SELECT * FROM music_list LIMIT 12";
$result = $db->query($sql);
$rows=[];
while($r = $result->fetch_assoc()){
    $rows[] = ["name"=> $r["name"], "image" => $r['image']];
}
$response = json_encode($rows);
echo $response;
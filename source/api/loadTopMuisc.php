<?php
session_start();
require_once("connection.php");

$sql = "SELECT * FROM music_list LIMIT 20";
$result = $db->query($sql);
$rows = $result->fetch_assoc();
$response = json_encode($rows);
echo $response;

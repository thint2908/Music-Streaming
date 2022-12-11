<?php
    require_once("connection.php");
    $db->set_charset("utf8mb4");
    $res = $db->query("select * from singer");
    $singer = [];
    while ($r = $res->fetch_assoc()) {
        $singer[] = ['id'=>$r["id"], "name" => $r["name"]];
    }
    $response = json_encode($singer);
    print_r($response);
?>
<?php
require_once("connection.php");
if (isset($_POST['songName'])) {
    $res = $db->query("
            select * from playlist where music_id = (select id from music_list where name = '" . $_POST['songName'] . "')
        ");
    if ($res->num_rows != 0) {
        echo "false";
    }else{
        echo "true";
    }
}

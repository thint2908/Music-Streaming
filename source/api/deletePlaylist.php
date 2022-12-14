<?php
require_once("connection.php");
if (isset($_POST['songName'])) {
    $res = $db->query("
            select * from playlist where music_id = (select id from music_list where name = '" . $_POST['songName'] . "')
        ");
    if ($res->num_rows != 0) {
        $res = $db->query("
            delete from playlist where music_id = (select id from music_list where name = '" . $_POST['songName'] . "')
        ");
        echo "Delect song from playlist successful";
    }else{
        echo "No song found";
    }
}

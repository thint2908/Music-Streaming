<?php
require_once("connection.php");
if (isset($_POST['songName'])) {
    $res = $db->query("
            select * from playlist where music_id = (select id from music_list where name = '" . $_POST['songName'] . "')
        ");
    if ($res->num_rows == 0) {
        $res = $db->query("
            insert into playlist(music_id, user_id) values(
                (select id from music_list where name = '" . $_POST['songName'] . "'),
                (select id from account where username = 'admin')
            )
            ");
            echo "Add playlist successful";
    }else{
        echo "Song existed";
    }

    
}

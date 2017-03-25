<?php
    require 'config.php';

    $arr = array();

    $sql = $link->query("SELECT * FROM user_likes");

    while ($arr['data'][] = $sql->fetch_assoc());
    
    echo json_encode($arr, JSON_UNESCAPED_UNICODE);

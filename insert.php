<?php
    require 'config.php';

    $code = $_POST['code'];
    $name = $_POST['name'];
    $created_time = $_POST['created_time'];

    $link->query("INSERT INTO user_likes (code, name, created_time) VALUES ('$code.', '$name', '$created_time')");

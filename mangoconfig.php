<?php
// MongoDB 伺服器設定
$dbhost = 'localhost';
$dbname = 'test';

// 連線到 MongoDB 伺服器
$mongoClient = new MongoClient('mongodb://' . $dbhost);
$db = $mongoClient->$dbname;

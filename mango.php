<?php
    require 'mangoconfig.php';

    $name = $_POST['name'];
    $id   = $_POST['id'];
    $time = $_POST['time'];

    // 取得 collection
    $cDemo = $db->likes;

    // 要儲存的資料
    $record = array(
        'username' => 'xeaiow',
        'name' => $name,
        'id' => $id,
        'creatertime' => $time,
        'fetchday' => date("Y-m-d"),
        'fetchtime' => date("H:i:s"),
    );
    $result = $cDemo->save($record);

    if ($result) {
        $response['status'] = true;
    }
    else {
        $response['status'] = false;
    }

    echo json_encode($response);

//
// 將資料儲存至 demo 這個 collection 中


// // 更新
// $cDemo->update(
//     array("firstName" => "吳"),
//     array('$set' => array("firstName" => "張"))
// );


// 刪除
// $cDemo->remove(
//     array("a" => "123456")
// );


// // 設定查詢條件
// $queryCondition = array(
//     "firstName" => "吳"
// );
//
// // 查詢資料
// $result = $cDemo->findOne($queryCondition);
//
// // 輸出資料
// echo json_encode($result);
?>

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "dbconfig.php";

    //SQL insert Statement
    $sql = "insert into category(category_id,category_name,category_status) values(:category_id,:category_name,:category_status)";

    //create prepare statement template
    $res = $pdo->prepare($sql);

    //bind parameter to statement
    $res->bindParam(':category_id',$_REQUEST['category_id']);
    $res->bindParam(':category_name',$_REQUEST['category_name']);
    $res->bindParam(':category_status',$_REQUEST['category_status']);
    
    //execute prepare statement
    $res->execute();
    // echo  'Data Inserted!';

    echo "<script>alert('Inserted Successfull...');</script>";
    echo "<script>window.location.href = 'category_data.php';</script>";

    //close connection
    unset($pdo);
}
?>
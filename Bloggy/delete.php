<?php
    require_once("dbConfig.php");
    $id = $_GET['id'];
    $query =  "DELETE FROM posts WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    header("Location: index-design.php");
?>
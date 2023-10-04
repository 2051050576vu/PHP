<?php

include 'database.php';
global $link;
if (isset($_GET['maSP'])){
    $idSP = $_GET['maSP'];

    $query = mysqli_query($link,"DELETE FROM sanpham WHERE maSP = $idSP");
    if ($query){
        header('location: adminItem.php');
    }
    else{
        echo "Lỗi";
    }
}

?>
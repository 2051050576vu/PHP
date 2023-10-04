<?php

include '../database.php';
global $link;
session_start();
$id = $_GET['id'];
$price = $_GET['price'];
$name = $_GET['TenSP'];
$pic = $_GET['HinhAnh'];
$sql = "SELECT * FROM `sanpham` WHERE `maSP` = $id";
$res = mysqli_query($link,$sql);
if (mysqli_num_rows($res)>0){
    while ($row = mysqli_fetch_assoc($res)){
//        $_SESSION['cart']	= array(
//            'maSP'		=> $id,
//            'TenSP'		=> $row['TenSP'],
//            'HinhAnh'	=> $row['HinhAnh'],
//        );
    }
}
if (empty($_SESSION['cart'])){
    $_SESSION['cart']['maSP'][$id] = $id;
    $_SESSION['cart']['SoLuong'][$id] = 1;
    $_SESSION['cart']['GiaBan'][$id] = $price;
    $_SESSION['cart']['TenSP'][$id] = $name;
    $_SESSION['cart']['HinhAnh'][$id] = $pic;
} else{
    if(key_exists($id, $_SESSION['cart']['SoLuong'])){
        $_SESSION['cart']['maSP'][$id] = $id;
        $_SESSION['cart']['SoLuong'][$id]	+=1;
        $_SESSION['cart']['GiaBan'][$id]		= $price * $_SESSION['cart']['SoLuong'][$id];
        $_SESSION['cart']['TenSP'][$id] = $name;
        $_SESSION['cart']['HinhAnh'][$id] = $pic;
    }else{
        $_SESSION['cart']['maSP'][$id] = $id;
        $_SESSION['cart']['SoLuong'][$id]	= 1;
        $_SESSION['cart']['GiaBan'][$id] = $price;
        $_SESSION['cart']['TenSP'][$id] = $name;
        $_SESSION['cart']['HinhAnh'][$id] = $pic;
    }
}
header('location: ../Home.php');


?>

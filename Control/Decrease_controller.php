<?php

include '../Model/Component.php';
include '../Model/DB.php';
include 'commonFunctions.php';

function decrease(){
  if(isset($_GET['id']) && (isset($_GET['quantity']))){
    $id = $_GET['id'];
    $quantity = $_GET['quantity'];
    $newQuantity = $quantity - 1;
    if($newQuantity <= 0)
      return -1;
    $conn = createConnection();
    $res = updateQuantity($conn,$id,$newQuantity);
    if(!$res) return 0;
  }else{
    return -1;
  }
}

 ?>

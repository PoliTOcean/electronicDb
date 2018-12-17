<?php

include '../Model/Component.php';
include '../Model/DB.php';
include 'commonFunctions.php';

function delete(){
  if(isset($_GET['id'])){
    $id = $_GET['id'];
    $conn = createConnection();
    $res = deleteComponent($conn,$id);
    if(!$res) return 0;
  }else{
    return -1;
  }
}

 ?>

<?php

include '../Model/Component.php';
include '../Model/DB.php';
include 'commonFunctions.php';

function main_controller(){
  //httpsRedirect();  // redirect on HTTPS
  session_start();
  checkCookies();   // check if Coockies are enabled

  if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $new_component = new component();  // create a new user
    $new_component -> store();   //insert the new component in the db
    header ( "Location: NewComponent.php?msg=ok");
  }
}



function checkParam(){
  if (isset ( $_GET ["msg"] )) {
    $mex = urldecode ( $_GET ["msg"] );
    $mex = _sanitize($mex);
    if($mex == 'ok'){
      echo '<div class="alert alert-success alert-dismissible" role="alert">';
      echo '  <strong>Ok!</strong> New component created correctly.';
      echo '</div>';
    }
  }
}
 ?>

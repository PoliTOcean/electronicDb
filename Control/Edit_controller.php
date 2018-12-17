<?php

include '../Model/Component.php';
include '../Model/DB.php';
include 'commonFunctions.php';

function main_controller(){
  //httpsRedirect();  // redirect on HTTPS
  session_start();
  checkCookies();   // check if Coockies are enabled

  if ($_SERVER ['REQUEST_METHOD'] === 'POST') {
    $conn = createConnection();
    $retvalute = updatecomponent($conn);
    if($retvalute == 1){
      header ( "Location: Edit.php?msg=ok&id=".$_POST["id"]);
    }else{
      errorRedirector("an error occourred while updating");
    }

  }


}



function checkParam(){
  if (isset ( $_GET ["msg"] )) {
    $mex = urldecode ( $_GET ["msg"] );
    $mex = _sanitize($mex);
    if($mex == 'ok'){
      echo '<div class="alert alert-success alert-dismissible" role="alert">';
      echo '  <strong>Ok!</strong> Component updated correctly.';
      echo '</div>';
    }
  }
}
 ?>

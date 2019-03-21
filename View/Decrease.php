<?php

  include '../Control/Decrease_controller.php';

  $res = decrease();
  if($res == 0) errorRedirector("an error occours while the operation");
  if($res == -1) errorRedirector("No id");
  header("Location: Components.php");
 ?>

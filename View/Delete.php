<?php

  include '../Control/Delete_controller.php';

  $res = delete();
  if($res == 0) errorRedirector("an error occours while the operation");
  if($res == -1) errorRedirector("No id");
  header("Location: Components.php?msg=ok");
 ?>

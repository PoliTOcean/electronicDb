<?php

  include '../Model/DB.php';
  include '../Model/Component.php';
  include 'commonFunctions.php';

  function main_controller(){
      // nothing to do
  }

  function renderTable(){

    // read data from db
    $components = retrieveComponents();

    echo "<div class='table-responsive'>";
    echo "  <table id='myTable' class=' table table-bordered table-sm col-sm-12' id='table'>";
    echo "    <thead class='thead-light'> ";
    echo "      <tr> ";
    echo "        <th>Name</th>";
    echo "        <th>Package</th>";
    echo "        <th>Box</th>";
    echo "        <th>Cell</th>";
    echo "        <th>Quantity</th>";
    echo "        <th>Notes</th>";
    echo "        <th>Link</th>";
    echo "        <th>Edit</th>";
    echo "        <th>Deleate</th>";
    echo "      </tr>";
    echo "    </thead>";
      foreach ($components as $key => $component) { // for each component in the db

        echo "<tr>";
        echo "  <td>".$component->name."</td>";
        echo "  <td>".$component->package."</td>";
        echo "  <td>".$component->box."</td>";
        echo "  <td>".$component->cell."</td>";
        echo "  <td>".$component->quantity."</td>";
        echo "  <td>".$component->note."</td>";
        if($component->link != ''){
          echo "  <td><a class='btn btn-primary' target='_blank' rel='noopener noreferrer' href='".$component->link."'role='button'>";
          echo "  <i class='material-icons'>link</i>";
          echo "</a></td>";
        }else{
          echo "  <td></td>";
        }
        echo "  <td><a class='btn btn-warning' href='Edit.php?id=".$component->id."' role='button'><i class='material-icons'>edit</i></a></td>";
        echo "  <td><a class='btn btn-danger' href='Delete.php?id=".$component->id."' role='button'><i class='material-icons'>close</i></a></td>";
        echo "</tr>";
      }
    echo "</table>";
    echo "</div>";

  }


  function checkParam(){
    if (isset ( $_GET ["msg"] )) {
      $mex = urldecode ( $_GET ["msg"] );
      $mex = _sanitize($mex);
      if($mex == 'ok'){
        echo '<div class="alert alert-success alert-dismissible" role="alert">';
        echo '  <strong>Ok!</strong> Component deleted correctly.';
        echo '</div>';
      }
    }
  }

?>

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
    echo "  <table id='myTable' class=' table table-striped table-bordered col-sm-12' id='table'>";
    echo "    <thead> ";
    echo "      <tr> ";
    echo "        <th>Name</th>";
    echo "        <th>Package</th>";
    echo "        <th>Box</th>";
    echo "        <th>Cell</th>";
    echo "        <th>Quantity</th>";
    echo "        <th>Notes</th>";
    echo "        <th>Link</th>";
    echo "        <th>Edit</th>";
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
          echo "  <td><a class='btn btn-primary' href='".$component->link."'role='button'>Link</a></td>";
        }else{
          echo "  <td></td>";
        }
        echo "  <td><a class='btn btn-warning' href='' role='button'>Edit</a></td>";
        echo "</tr>";
      }
    echo "</table>";
    echo "</div>";

  }

?>

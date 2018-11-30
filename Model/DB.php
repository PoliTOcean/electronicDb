<?php

  function createConnection(){
    if( !$conn = mysqli_connect ( "localhost", "root", "", "my_dbpolitocean" )) {
      header ( 'HTTP/1.1 307 temporary redirect' );
      header ( "Location: ErrorPage.php?msg=connection failed:".mysqli_connect_error());
    }
  	return $conn;
  }

  function alredyExists($email,$conn){
    $return = 0;
    $query = "SELECT * FROM Users WHERE email ='$email'";

		if (! $res = mysqli_query ( $conn, $query )) {
			$return = -1;
		}

		if (mysqli_num_rows ( $res ) != 0) {
			$return = 1;
		}else{
      $return = 0;
    }
		mysqli_free_result ( $res );
    return $return;
  }

  function searchUser($email,$conn){
    $return = 0;
    $query = "SELECT * FROM User WHERE email ='$email'";

		if (! $res = mysqli_query ( $conn, $query )) {
			$return = -1;
		}

		if (mysqli_num_rows ( $res ) != 0) {
			$return = mysqli_fetch_array($res);
		}else{
      $return = 0;
    }
		mysqli_free_result ( $res );
    return $return;
  }

  function retrieveComponents(){
    $return = 0;
    $conn = createConnection();
    $array = array();
    $query = "SELECT * FROM Components";

    if (! $res = mysqli_query ( $conn, $query )) {
			$return = -1;
		}

    if(mysqli_num_rows($res)!= 0){
      while($row = mysqli_fetch_array($res)){
        $brick = new component(
                          $row["id"],
                          $row["name"],
                          $row["package"],
                          $row["box"],
                          $row["cell"],
                          $row["quantity"],
                          $row["note"],
                          $row["link"]
                      ); // create a component
      array_push($array,$brick);
      }
      $return = $array;
    }else{
      $return = 0;
    }

    mysqli_free_result ( $res );
    return $array;
  }


?>

<?php

	class Component {

		public function __construct(){
			// empty constructor
		}

		// store a brick in the database
		public function store(){
			$conn = createConnection(); // create a new connection
			try {


				if (!isset ( $_POST ['name'] )
				|| !isset ( $_POST ['package'])
				|| !isset ( $_POST ['box'])
				|| !isset ( $_POST ['cell'])
				|| !isset ( $_POST ['quantity'])
				|| !isset ( $_POST ['note'])
				|| !isset ( $_POST ['link']))
				{
					throw new InvalidArgumentException ( "Empty values" );
				}

				// sanitize input fields
				$name 		= sanitize( $conn, $_POST ['name'] );
				$package 	= sanitize( $conn, $_POST ['package'] );
				$box 			= sanitize( $conn, $_POST ['box'] );
				$cell 		= sanitize( $conn, $_POST ['cell'] );
				$quantity = sanitize( $conn, $_POST ['quantity'] );
				$note 		= sanitize( $conn, $_POST ['note'] );
				$link 		= sanitize( $conn, $_POST ['link'] );


				mysqli_autocommit ( $conn, false ); // disable autocommit
				// create the query
				$query = "INSERT INTO Components(name,package,box,cell,quantity,note,link)
				 VALUES ('" . $name . "','"
								 . $package . "', '"
								 . $box . "', '"
								 . $cell . "', '"
								 . $quantity . "', '"
								 . $note . "', '"
								 . $link . "')";

			 // try to execute the query
			 if (!mysqli_query ( $conn, $query )) {
					throw new Exception ( "Error while `INSERT`: " . mysqli_error($conn));
			 }

			 // commit
				if (!mysqli_commit ( $conn )) {
					throw Exception ( "Error while `COMMIT`" );
				}

			} catch (Exception $e) {
				mysqli_free_result($insert);
				errorRedirector($e->getMessage());
			}
			mysqli_close ( $conn );
			//header("Location: NewComponent.php?log=ok");
		}
	}
?>

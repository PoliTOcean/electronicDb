<?php

	class Component {

		public $id;
		public $name;
		public $package;
		public $box;
		public $cell;
		public $quantity;
		public $note;
		public $link;

		public function __construct(){
			if (0 === func_num_args()) {
	            // empty components
	    } else{
				$this->id		= func_get_arg(0);
				$this->name 	= func_get_arg(1);
				$this->package	= func_get_arg(2);
				$this->box		= func_get_arg(3);
				$this->cell	= func_get_arg(4);
				$this->quantity = func_get_arg(5);
				$this->note = func_get_arg(6);
				$this->link = func_get_arg(7);
			}
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

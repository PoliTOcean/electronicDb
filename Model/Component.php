<?php

	class Component {

		public $id;
		public $name;
		public $package;
		public $box;
		public $cell;
		public $quantity;
		public $note;
		public $link

		public function __construct(){
			if (0 === func_num_args()) { // costruttore senza parametri
	            // empty brick
	    } else{
				$this->id	= func_get_arg(7);
				$this->name		= func_get_arg(0);
				$this->package 	= func_get_arg(1);
				$this->box	= func_get_arg(2);
				$this->cell		= func_get_arg(3);
				$this->quantity	= func_get_arg(4);
				$this->note	= func_get_arg(5);
				$this->link	= func_get_arg(6);
			}
		}

		// store a brick in the database
		public function store(){
			$conn = createConnection(); // create a new connection
			try {

				mysqli_autocommit ( $conn, false ); // disable autocommit
				// create the query
				$query = "INSERT INTO Component(name,package,box,cell,quantity,note,link,id)
				 VALUES ('" . $this->name . "','"
								 . $this->package . "', '"
								 . $this->box . "', '"
								 . $this->cell . "', '"
								 . $this->quantity . "', '"
								 . $this->note . "', '"
								 . $this->link . "', '"
								 . $this->id . "')";

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
		}
 ?>

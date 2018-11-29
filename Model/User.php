<?php

class User {

	public $mail;
	protected $password_md5;


	public function __construct(){
		if (0 === func_num_args()) {
            //new user
    } else{
			$this->mail			= func_get_arg(0);
			$conn 					= createConnection();
			$res						= searchUser($this->mail,$conn);

			if($res == -1){
				errorRedirector("error while searching user". $this->mail );
			}
			$this->password_md5 = $res['password'];
		}
	}

	public function logIn(){
		$conn = createConnection();
		try {
			if (!isset ( $_POST ['email'] )
			|| !isset ( $_POST ['password']))
			{
				throw new InvalidArgumentException ( "Empty values" );
			}

			$email 		= sanitize( $conn, $_POST ['email'] );
			$password = sanitize( $conn, $_POST ['password'] );

			// back end validaion
			$reg_email	= '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';	// gmail mail format
			$reg_pass		= '/^(?=.{3})(?=.*[^0-9a-zA-Z])/';										// allowed passwords must be at least 3 characters long, including
																																				// digits, characters and special characters 

			if (!preg_match ( $reg_email, $email ) || strlen ( $email ) == 0 || strlen ( $email ) > 50) {
				throw new Exception ( "Uncorrect email address" );
			}

			if (!preg_match($reg_pass,$password) || strlen ( $password ) <3 || strlen ( $password ) > 32){
				throw new Exception ( "Uncorrect password" );
			}

			$res = searchUser ($email,$conn);
			//print_r($res);
			//die();
			$password = md5($password);
			if($res == -1){
				throw new Exception ( " `SELECT` failure" );
			}else if($res == 0){
				// wrong username
				mysqli_close($conn);
				header("Location: LogIn.php?log=fail_uname");
			}else if ($password != $res["password"]) {
				// wrong password
				mysqli_close($conn);
				header("Location: LogIn.php?log=fail_pass");
			}else{
				// log in
				session_start();
				$_SESSION['username'] = $res["email"];
				$_SESSION['last_activity'] = time();
				mysqli_close($conn);
				header("Location: PersonalPage.php");
			}
		}catch ( Exception $e ){
			mysqli_rollback ( $conn );
			errorRedirector($e->getMEssage());
		}
		mysqli_close($conn);



	}

 ?>

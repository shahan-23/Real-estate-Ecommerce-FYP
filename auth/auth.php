<?php

session_start();


class dbConfig
{
    // Database Connection Properties
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $database = "roofsite";

    // connection property
    public $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail " . $this->con->connect_error;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(){
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }
}

class Auth 
{
	private $userTable = 'users';
	public $db = null;

    public function __construct(dbConfig $db)
    {
        if (!isset($db->con)) return null;
        $this->dbConnect = $db;
    }

    
    public function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect->con, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($result));
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
    }

    public function setData($sqlQuery) {
        $message = '';
        $userSaved = mysqli_query($this->dbConnect->con, $sqlQuery);

        if($userSaved){
            $message = 'Data Updated';
        }
        return $message;
    }

	public function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect->con, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error($result));
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
    }


	public function LoginCheck(){
		if(isset($_SESSION["UserUserid"])) {
			header("Location: user/dashboard.php");
		} elseif(isset($_SESSION["adminUserid"])) {
			header("Location: admin/dashboard.php");
		}
	}

    public function adminLoginStatus(){
		if(empty($_SESSION["adminUserid"])) {
			header("Location: ../index.php");
		}
	}


    public function BuyerLoginStatus(){
		if(empty($_SESSION["BuyerUserid"])) {
			header("Location: ../index.php");
		}
	}

	public function SellerLoginStatus(){
		if(empty($_SESSION["SellerUserid"])) {
			header("Location: ../index.php");
		}
	}


    public function getAuthtoken($email) {
		$code = md5(889966);
		$authtoken = $code."".md5($email);
		return $authtoken;
	}

	public function login(){
		$errorMessage = '';
		if(isset($_POST["login"]) && $_POST["loginId"]!=''&& $_POST["loginPass"]!='') {

			$loginId = $_POST['loginId'];
			$password = $_POST['loginPass'];

			if(isset($_COOKIE["loginPass"]) && $_COOKIE["loginPass"] == $password) {
				$password = $_COOKIE["loginPass"];
			} else {
				$password = md5($password);
			}
			$sqlQuery = "SELECT * FROM ".$this->userTable."
				WHERE email='".$loginId."' AND password='".$password."' AND status = 'active' ";

			$resultSet = mysqli_query($this->dbConnect->con, $sqlQuery);
			$isValidLogin = mysqli_num_rows($resultSet);
			if($isValidLogin){
		
				$userDetails = mysqli_fetch_assoc($resultSet);


				if($userDetails['type'] == 'buyer'){
					$_SESSION["BuyerUserid"] = $userDetails['id'];
					$_SESSION["BuyerName"] = $userDetails['name'];
					$errorMessage = " login!";
	
					header("location: ./index.php");
				} 

				elseif($userDetails['type'] == 'seller') {
					$_SESSION["SellerUserid"] = $userDetails['id'];
					$_SESSION["SellerName"] = $userDetails['name'];
					$errorMessage = " login!";
	
					header("location: ./index.php");
				}
				
				elseif($userDetails['type'] == 'admin') {
					$_SESSION["adminUserid"] = $userDetails['id'];
					$_SESSION["admin"] = $userDetails['name'];
					$errorMessage = " login!";
	
					header("location: ./index.php");
				}
			
			} else {
				$errorMessage = "Invalid login!";
			}
		} else if(!empty($_POST["loginId"])){
			$errorMessage = "Enter Both username and password!";
		}
		return $errorMessage;
	}



    public function register(){
		$message = ''; 
		if(isset($_POST["register"]) && !empty($_POST["passwd"]) && $_POST["passwd"] !='' && $_POST["passwd"] != $_POST["cpasswd"]){
			$message = "Confirm password is not same.";
		}
		elseif(isset($_POST["register"]) && $_POST["email"] !='') {
			$sqlQuery = "SELECT * FROM ".$this->userTable."
				WHERE email='".$_POST["email"]."'";
			$result = mysqli_query($this->dbConnect->con, $sqlQuery);
			$isUserExist = mysqli_num_rows($result);
			if($isUserExist) {
				$message = "User already exist with this email address.";
			} else {
				$insertQuery = "INSERT INTO ".$this->userTable."(name, phone, id_card, dob, email, password, type)
				VALUES ('".$_POST["name"]."','".$_POST["phone"]."', '".$_POST["id_card"]."','".$_POST["dob"]."', '".$_POST["email"]."', '".md5($_POST["passwd"])."','".$_POST["type"]."')";
				$userSaved = mysqli_query($this->dbConnect->con, $insertQuery);
				if($userSaved) {
					$message = "Your registration is pending and soon will be reviewed by an admin.";
				} else {
					$message = "User register request failed.";
				}
			}
		}
		return $message;
	}


    public function verifyRegister(){
		$verifyStatus = 0;
		if(!empty($_GET["authtoken"]) && $_GET["authtoken"] != '') {
			$sqlQuery = "SELECT * FROM ".$this->userTable."
				WHERE authtoken='".$_GET["authtoken"]."'";
			$resultSet = mysqli_query($this->dbConnect->con, $sqlQuery);
			$isValid = mysqli_num_rows($resultSet);
			if($isValid){
				$userDetails = mysqli_fetch_assoc($resultSet);
				$authtoken = $this->getAuthtoken($userDetails['email']);
				if($authtoken == $_GET["authtoken"]) {
					$updateQuery = "UPDATE ".$this->userTable." SET status = 'active'
						WHERE id='".$userDetails['id']."'";
					$isUpdated = mysqli_query($this->dbConnect->con, $updateQuery);
					if($isUpdated) {
						$verifyStatus = 1;
					}
				}
			}
		}
		return $verifyStatus;
	}

	public function resetPassword(){
		$message = '';
		if(isset($_POST['forgetpassword']) && $_POST['email'] == '') {
			$message = "Please enter username or email to proceed with password reset";
		} elseif(isset($_POST['forgetpassword']) && $_POST['email'] != '') {
			$sqlQuery = "
				SELECT email
				FROM ".$this->userTable."
				WHERE email='".$_POST['email']."'";
			$result = mysqli_query($this->dbConnect->con, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			if($numRows) {
				$user = mysqli_fetch_assoc($result);
				$authtoken = $this->getAuthtoken($user['email']);
				$link="<a href='".$_SERVER['SERVER_NAME']."/recover-password.php?authtoken=".$authtoken."'>Reset Password</a>";
				$toEmail = $user['email'];
				$subject = "Reset your password on examplesite.com";
				$msg = "Hi there, click on this ".$link." to reset your password.";
				$msg = wordwrap($msg,70);
				$headers = "From: info@webdamn.com";
				if(mail($toEmail, $subject, $msg, $headers)) {
					$message =  "Password reset link send. Please check your mailbox to reset password.";
				}
			} else {
				$message = "No account exist with entered email address.";
			}
		}
		return $message;
	}

   

    public function savePassword(){
		$message = '';
		if(isset($_POST["resetpassword"]) && $_POST['password'] != $_POST['cpassword']) {
			$message = "Password does not match the confirm password.";
		} elseif(isset($_POST["resetpassword"]) && $_POST['authtoken'] && $_POST['password'] == $_POST['cpassword']) {
			$sqlQuery = "
				SELECT email, authtoken
				FROM ".$this->userTable."
				WHERE authtoken='".$_POST['authtoken']."'";
			$result = mysqli_query($this->dbConnect->con, $sqlQuery);
			$numRows = mysqli_num_rows($result);
			if($numRows) {
				$userDetails = mysqli_fetch_assoc($result);
				$authtoken = $this->getAuthtoken($userDetails['email']);
				if($authtoken == $_POST['authtoken']) {
					$sqlUpdate = "
						UPDATE ".$this->userTable."
						SET password='".md5($_POST['password'])."'
						WHERE email='".$userDetails['email']."' AND authtoken='".$authtoken."'";
					$isUpdated = mysqli_query($this->dbConnect->con, $sqlUpdate);
					if($isUpdated) {
						$message = "Password saved successfully.";
					}
				} else {
					$message = "Invalid password change request.";
				}
			} else {
				$message = "Invalid password change request.";
			}
		}
		return $message;
	}

	public function editAccount () {
		$message = '';
		$updatePassword = '';
		if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] != $_POST["cpasswd"]) {
			$message = "Confirm passwords do not match.";
		} else if(!empty($_POST["passwd"]) && $_POST["passwd"] != '' && $_POST["passwd"] == $_POST["cpasswd"]) {
			$updatePassword = ", password='".md5($_POST["passwd"])."' ";
		}
		$updateQuery = "UPDATE ".$this->userTable."
			SET first_name = '".$_POST["firstname"]."', last_name = '".$_POST["lastname"]."', email = '".$_POST["email"]."', country = '".$_POST["country"]."', tele_username = '".$_POST["tele_username"]."', mobile = '".$_POST["mobile"]."', designation = '".$_POST["designation"]."', gender = '".$_POST["gender"]."' $updatePassword
			WHERE id ='".$_SESSION["userid"]."'";
		$isUpdated = mysqli_query($this->dbConnect->con, $updateQuery);
		if($isUpdated) {
			$_SESSION["name"] = $_POST['firstname']." ".$_POST['lastname'];
			$message = "Account details saved.";
		}
		return $message;
	}

	public function saveAdminPassword(){
		$message = '';
		if($_POST['password'] && $_POST['password'] != $_POST['cpassword']) {
			$message = "Password does not match the confirm password.";
		} else {
			$sqlUpdate = "
				UPDATE ".$this->userTable."
				SET password='".md5($_POST['password'])."'
				WHERE id='".$_SESSION['adminUserid']."' AND type='administrator'";
			$isUpdated = mysqli_query($this->dbConnect->con, $sqlUpdate);
			if($isUpdated) {
				$message = "Password saved successfully.";
			}
		}
		return $message;
	}
	public function adminDetails () {
		$sqlQuery = "SELECT * FROM ".$this->userTable."
			WHERE id ='".$_SESSION["adminUserid"]."'";
		$result = mysqli_query($this->dbConnect->con, $sqlQuery);
		$userDetails = mysqli_fetch_assoc($result);
		return $userDetails;
	}

}

$db = new dbConfig();
$data = new Auth($db);


?>
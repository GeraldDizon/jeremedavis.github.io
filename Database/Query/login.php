<?php
require("../Connection/Connect.php");

if(isset($_POST['login'])){
	try {

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}catch(PDOException $e) {
	echo "Error: " . $e->getMessage();
	}

//Set Variable   =    Get Input type name
$Email           =    $_POST["loginEmail"];
$Password        =    $_POST["loginPass"];


// Query check
$sql = "SELECT * FROM user WHERE EmailAddress = :Email AND Password = :Password";
$query = $conn->prepare($sql);
$stmt = $query->execute(array(":Email"=>$Email, ":Password"=>$Password));




	//Check if post are empty or input type data are not gathered.
	if(empty($_POST) === false){
		if(!$row = $query->fetch(PDO::FETCH_ASSOC)){
			$errorLogin = array();
			$errorLogin[] = "Username or password is incorrect";

		}
		else{
			//Session Set variable = Set Database Column Name
			$_SESSION['idbase'] = $row['id'];
			$_SESSION['firstname'] = $row['Firstname'];
			$_SESSION['lastname'] = $row['Lastname'];
			$_SESSION['Email'] = $row['EmailAddress'];
			$_SESSION['contact'] = $row['Contact'];
			$_SESSION['address'] = $row['Address'];
			$_SESSION['status'] = $row['Status'];
			header("Location: ../Public/Home.php?success");
			//Check for the desired email and password for admin. 
			if($Email=="jereme@yahoo.com" & $Password=="jereme"){
				header("Location: ../Admin/Admin-Inquiry.php");
			}
			else{
				header("Location: ../Public/Home.php");
			}	
		}

	}
		

}


?>
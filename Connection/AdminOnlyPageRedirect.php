<?php 

	if($_SESSION['Email'] != 'jereme@yahoo.com'){
		header("Location: ../Public/Error404.php");
	}

?>
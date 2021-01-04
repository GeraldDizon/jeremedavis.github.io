<?php 
session_start();
include('../Database/Query/ViewOrderHistory.php');


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php while ($row = $query->fetch(PDO::FETCH_ASSOC)){?>
	<p><?php echo $row['ProductName'] ?></p>
	<p><?php echo $row['Quantity'] ?></p>
	<p><?php echo $row['Price'] ?></p>
	<?php } ?>
</body>
</html>
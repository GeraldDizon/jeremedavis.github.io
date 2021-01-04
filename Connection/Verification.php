<?php
if($_SESSION){
	if($_SESSION['status'] == 'Pending'){?>
		<div style="padding-top:10px;">
			<p><img src = "../Images/notice.png"  style="height:35px;">Please Verify your email <a href = '../phpmailer/EmailVerification.php'>Send verification email</a></p>
		</div>
	<?php }else{

	}
}
?>
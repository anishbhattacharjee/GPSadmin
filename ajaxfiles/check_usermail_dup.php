<?php
include '../dbcon.php';
$mail= $_GET['mail'];
$qs="";
if(isset($_GET['id'])){
	$id=$_GET['id'];
	$qs=" and id!=$id";
}
$qq=mysqli_query($con,"select id from admin_data where email_id='$mail' $qs ");
if($qq && mysqli_num_rows($qq) > 0){	
echo "exists";
}else{echo "not exists";
}



?>
<?php

include '../../dbcon.php';

$id = isset($_POST['id'])?$_POST['id']:'';
$action = isset($_POST['action'])?$_POST['action']:'';

if($action=='attachment'){	
	$q=mysqli_query("delete from support_attachments where id=$id");	

	if($q){
		echo "success";
	}else{
		echo "Something went wrong!!! Please try again.";
	}
}else{
	
	$q=mysqli_query("delete from support_tickets where id=$id");	
	$qa=mysqli_query("delete from support_attachments where ticket_id=$id");	

	if($q){
		echo "success";
	}else{
		echo "Something went wrong!!! Please try again.";
	}
}

?>
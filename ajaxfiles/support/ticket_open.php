<?php

include '../../dbcon.php';
//print_r($_POST);exit;
$id = isset($_POST['edit_id'])?$_POST['edit_id']:'';
$action = isset($_POST['action'])?$_POST['action']:'';
$title = isset($_POST['title'])?mysqli_real_escape_string($_POST['title']):'';
$client = isset($_POST['client'])?$_POST['client']:'';
$status = isset($_POST['status'])?$_POST['status']:'';
$level = isset($_POST['level'])?$_POST['level']:'';
$msg = isset($_POST['msg'])?mysqli_real_escape_string($_POST['msg']):'';
$submitted=date("Y-m-d H:i:s");



if($action==$con,"INSERT"){
	$q=mysqli_query($con,"INSERT INTO support_tickets(customer_id, title, status, level, description, created_on) VALUES ( $client, '$title', '$status', $level, '$msg', '$submitted')");
	
}elseif($action=="update"){
	$q=mysqli_query("update support_tickets set customer_id=$client, title='$title', status='$status', level=$level, description='$msg' where id=$id");
}

	if($q){
		if($id==''){
			$id=mysqli_insert_id();
		}
		if($_FILES['files']['name']){
			
			$path = "../../assets/support/";
			foreach ($_FILES['files']['name'] as $f => $name) {     
			    if ($_FILES['files']['error'][$f] == 4) {
			        continue; 
			    }	       
			    if ($_FILES['files']['error'][$f] == 0) {	           
			       
			            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], $path.$name)){
							$sq=mysqli_query($con,"INSERT into support_attachments(ticket_id,file_name) values($id,'$name')");
						}
			            
			       
			    }
			}
		}
		echo "success";
		
	}else{
		echo "Something went wrong!!! Please try again.";
	}

	

?>
<?php
include '../dbcon.php';
$c = $_GET['c'];

$sql= mysqli_query($con,"select * from  invoice_tb where invtbid='$c'");

		

if(mysqli_num_rows($sql)>0)

{

	echo "<h5 style='color:red;  margin-left: 97px;'>Invoice Number is already present</h5>";

}

else{

	echo "success";

}

?>
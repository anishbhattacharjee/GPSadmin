<?php
include '../dbcon.php';
$c = $_GET['c'];

$sql= mysqli_query($con,"select * from  customers where customer_emailid='$c'");

		

if(mysqli_num_rows($sql)>0)

{

	echo "<h5 style='color:red;'>Email Id is already present</h5>";

}

else{

	echo "";

}

?>
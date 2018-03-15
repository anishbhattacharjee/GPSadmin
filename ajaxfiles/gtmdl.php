<?php
include '../dbcon.php';
$c = $_GET['c'];
$qqss=mysqli_query($con,"select * from gps_model_details where imie_number='$c' ");
while($sqs3=mysqli_fetch_array($qqss))
{ 
$model_id= $sqs3['model_id'];
echo $model_id;
}
?>

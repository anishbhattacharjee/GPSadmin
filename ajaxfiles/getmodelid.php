<?php
include '../dbcon.php';
$c = $_GET['c'];
$catid = $_GET['catid'];
$devid = $_GET['devid'];
//$qqss=mysqli_query($con,"select * from gps_model_details where category_type='$catid' and device_id='$devid' and imie_number='$c' ");
$qqss=mysqli_query($con,"select * from gps_model_details where imie_number='$c' ");
while($sqs3=mysqli_fetch_array($qqss))
{ 
$imei= $sqs3['imie_number'];
$model_id= $sqs3['model_id'];
}
echo $model_id;
?>

<?php
include '../dbcon.php';
$devid= $_GET['c'];
$qqss=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");
while($sqs3=mysqli_fetch_array($qqss))
{ echo $sqs3['imie_number'];
}
?>

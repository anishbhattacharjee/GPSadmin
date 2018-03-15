<?php
include '../dbcon.php';
$devid= $_GET['c'];
$catid= $_GET['catid'];
$qq=mysqli_query($con,"select * from gps_devices where category_id='$catid' and device_id='$devid'");
while($rq=mysqli_fetch_array($qq))
{
$ct=$rq['device_cost'];
echo $ct;
}
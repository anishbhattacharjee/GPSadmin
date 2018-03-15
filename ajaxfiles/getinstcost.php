<?php
include '../dbcon.php';
$catid= $_GET['catid'];
$qq=mysqli_query($con,"select * from gps_categories where category_id='$catid'");
while($rq=mysqli_fetch_array($qq))
{
$ct=$rq['installation_cost'];
echo $ct;
}
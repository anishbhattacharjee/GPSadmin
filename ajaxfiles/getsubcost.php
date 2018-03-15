<?php
include '../dbcon.php';
$catid = $_GET['c'];
$submonth = $_GET['d'];
$qq=mysqli_query($con,"select * from device_subscription where category_id='$catid' and month='$submonth'");
while($rq=mysqli_fetch_array($qq))
{
$ct=$rq['cost'];
$dis=$rq['discount'];
$val=($ct)*($dis/100);
$subcost=$ct-$val;
echo $subcost;
}
?>



<?php
include '../dbcon.php';
$code = $_GET['code'];
$codeid = $_GET['codeid'];
$sql= mysqli_query($con,"select * from  promo_codes where code='$code' and status='valid'");
if(mysqli_num_rows($sql)>0)
{
$rs=mysqli_fetch_array($sql);
$cid=$rs['code_id'];
$sqls= mysqli_query($con,"select * FROM `promos` p left join promo_codes pc on pc.promo_id=p.id where  code='$code' and code_id='$cid' and status='valid'");
$rsq=mysqli_fetch_array($sqls);
echo $rsq['discount_per'];
}
else
{
echo "Not a Valid Promo Code";
}
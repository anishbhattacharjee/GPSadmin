<?php

include '../dbcon.php';
$imei=trim($_POST['imei']);
$sql=$con,"select detail_id from stock_details where imei='".$imei."'";
//$sql=$con,"select detail_id from stock_details where item='".$_POST['val']."' and imei='".$_POST['imei']."'";
//echo $sql;
$rs=mysqli_query($sql);
$rw=mysqli_fetch_assoc($rs);
if($rw['detail_id'] && $rw['detail_id']!=''){
	echo "exists";
}else{
	echo "success";
}
?>
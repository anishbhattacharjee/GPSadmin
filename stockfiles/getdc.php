<?php

include '../dbcon.php';
$sql=$con,"select stockid from stock where dc_no='".$_POST['val']."'";
$rs=mysqli_query($sql);
$rw=mysqli_fetch_assoc($rs);
if($rw['stockid'] && $rw['stockid']!=''){
	echo "exists";
}else{
	echo "success";
}
?>
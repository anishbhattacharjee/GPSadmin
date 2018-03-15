<?php
include '../dbcon.php';
$imei=trim($_POST['imei']);
$sql=$con,"select instatllation_id from installation where imie_no='".$imei."'";
$rs=mysqli_query($sql);
$rw=mysqli_fetch_assoc($rs);
if($rw['instatllation_id'] && $rw['instatllation_id']!=''){
	echo "exists";
}else{
	echo "success";
}
?>
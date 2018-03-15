<?php
include '../dbcon.php';

//print_r($_POST);
$from=date("Y-m-d",strtotime($_POST['frmdate']));
$to=date("Y-m-d",strtotime($_POST['todate']));
$cid=$_POST['cid'];
if($cid){
	$sq=$con,"select count(id) as cnt from speed_alert_log where customer_id=$cid and phone<>'' and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rs=mysqli_query($sq);
	$rw=mysqli_fetch_assoc($rs);
	$sct=$rw['cnt'];
	
	$sql=$con,"select count(id) as cnt from fence_alert_log where customer_id=$cid and phone<>'' and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rst=mysqli_query($sql);
	$row=mysqli_fetch_assoc($rst);
	$fct=$row['cnt'];
	
	$sqt=$con,"select count(id) as cnt from fuel_theft_alerts where cid=$cid and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
	$rstt=mysqli_query($sqt);
	$rowt=mysqli_fetch_assoc($rstt);
	$tct=$rowt['cnt'];
/*	
	$sqi=$con,"select count(id) as cnt from idle_alert_log where customer_id=$cid and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rsi=mysqli_query($sqi);
	$rwi=mysqli_fetch_assoc($rsi);
	$ict=$rwi['cnt'];
	*/
	
	$etaadmin=0;
	$school=0;
						$sqct=$con,"select is_school,customer_emailid from customers where customer_id=$cid";//echo $sqct;
						$rsct=mysqli_query($sqct);
						$rwct=mysqli_fetch_assoc($rsct);
						if($rwct['is_school']==1){	
							$cust_sql=$con,"select school_id from school where email1='".$rwct['customer_emailid']."'";//echo $cust_sql;
							$cust_rs=mysqli_query($cust_sql);
							$cust_rw=mysqli_fetch_assoc($cust_rs);
							$school=$cust_rw['school_id'];	
							
							
							$sqa=$con,"select count(id) as cnt from eta_log_school where school_id=$school and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
							//echo $sqa;
							$rsa=mysqli_query($sqa);
							$ra=mysqli_fetch_assoc($rsa);
							$etaadmin=$ra['cnt'];
							
						}
?>
<link rel="stylesheet" href="http://ogtslive.com/gps/media/css/TableTools.css" />
<table  class="table table-striped table-bordered alerts_tb">
<thead>
<tr>
<th>Alert</th>
<th>Count</th>
</tr>
</thead>
<tbody>
<tr>
<td>Speed Alerts</td>
<td><?php echo $sct; ?></td>
</tr>

<tr>
<td>Fence Alerts</td>
<td><?php echo $fct; ?></td>
</tr>

<tr>
<td>Theft Alerts</td>
<td><?php echo $tct; ?></td>
</tr>

<!--<tr>
<td>Idle Alerts</td>
<td><?php echo $ict; ?></td>
</tr>-->

<?php if($school > 0){ ?>
<tr>
<td>ETA Admin Alerts</td>
<td><?php echo $etaadmin; ?></td>
</tr>
<?php } ?>
</tbody>

</table>



<?php if($school > 0){ 

$sqeta=$con,"select s.student_id,s.student_name,s.parent_phone1,count(l.id) as cnt FROM students s left join eta_log l on s.student_id=l.student_id  where school_id=$school and phone<>'' and CAST(l.ts AS DATE) between '$from' and '$to' group by s.student_id";
$rseta=mysqli_query($sqeta);
if($rseta && mysqli_num_rows($rseta) > 0){	

?>
<h3 class="header smaller lighter blue">ETA Alerts</h3>
<table class="table table-striped table-bordered alerts_tb">
<thead>
<tr>
<th>Student</th>
<th>Parent Phone</th>
<th>Alert Count</th>
<th>RFID Alert Count</th>
</tr>
</thead>
<tbody>

<?php while($rweta=mysqli_fetch_assoc($rseta)){

	$stu=$rweta['student_id'];
	$sqrf=$con,"select count(id) as cnt from rfid_log where student_id=$stu and phone<>'' and CAST(ts AS DATE) between '$from' and '$to' ";//echo $sqrf;
	$rsrf=mysqli_query($sqrf);
	$rwrf=mysqli_fetch_assoc($rsrf);
?>

<tr>
<td><?php echo $rweta['student_name']; ?></td>
<td><?php echo $rweta['parent_phone1']; ?></td>
<td><?php echo $rweta['cnt']; ?></td>
<td><?php echo $rwrf['cnt']; ?></td>
</tr>
<?php } ?>
</tbody>
</table>

<?php } } ?>

<?php
}else{
	echo "Please select customer";
}
?>

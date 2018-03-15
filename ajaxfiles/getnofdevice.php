
<?php
include '../dbcon.php';
$c = $_GET['c'];
$cid = $_GET['cid'];
$catid = $_GET['catid'];

$q=mysqli_query($con,"select *,sum(noofdevice) as ndev from customer_order_details where customer_id='$cid' and category_id='$catid' and device_id='$c'");
while($sqs=mysqli_fetch_array($q))
{
$catid=$sqs['category_id'];
$devid=$sqs['device_id'];

$order_id=$sqs['order_id'];
$noofdevice=$sqs['ndev'];
}

 ?>
 <div class="control-group">

			<label class="control-label">No Of Devices Requested</label>

				<div class="controls"> 
				<input type="text" name="noofdevice" id="noofdevice" value="<?php echo $noofdevice;?>"/>
				<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id;?>"/>
</div> 
</div>
 <table><tr><th>&nbsp;&nbsp;SL No</th><th style="margin-left: 104px;float: left;">Engineer</th><th style="margin-left: 139px;float: left;">Device Type</th><th style="margin-left: 81px;float: left;">Devices</th><th style="margin-left: 127px;float: left;">Imie No</th><th style="margin-left: 62px;float: left;">SIM No</th></tr></table>
<?php

for($i=1;$i<=$noofdevice;$i++)

{

?>

<input type="text" name="fbsl" id="fbsl" value="<?php echo $i;?>" style="width:100px;" readonly="true"/>
<select name="<?php echo "engid".$i; ?>" id="<?php echo "engid".$i; ?>">
<option >Choose Engineer</option>
<?php 

$qq=mysqli_query($con,"select * from engineers");
while($r=mysqli_fetch_array($qq))
{
	$enguid=$r['engineers_uniqid'];
?>
<option value="<?php echo $enguid;?>"><?php echo $enguid;?></option>

<?php } ?>
</select>
<?php
$qqs=mysqli_query($con,"select * from gps_devices where device_id='$devid'");
while($sqss=mysqli_fetch_array($qqs))
{ 
$type=$sqss['device_type'];
}
?>
									
									
<input type="text" name="<?php echo "devtype".$i; ?>" id="<?php echo "devtype".$i; ?>" style="width:100px;" value="<?php echo $type ;?>" readonly="true"/>
<select name="<?php echo "devices".$i; ?>" id="<?php echo "devices".$i; ?>" onchange="getimieno(this);">
<option >Choose Devices</option>
<?php
$qqss=mysqli_query($con,"select * from gps_model_details where device_id='$devid' and status='completed'");
while($sqs3=mysqli_fetch_array($qqss))
{ 
?>
<option value="<?php echo $sqs3['model_id'];?>"><?php echo $type.$sqs3['model_name'];?></option>

<?php } ?>
</select>
<input type="text" name="<?php echo "imieno".$i; ?>" id="<?php echo "imieno".$i; ?>" style="width:100px;" readonly="true"/>

<select name="<?php echo "simno".$i; ?>" id="<?php echo "simno".$i; ?>">
<option >Choose Sim</option>
<?php 

$q1=mysqli_query($con,"select * from sim_details");
while($r1=mysqli_fetch_array($q1))
{
	$simno=$r1['sim_no'];
?>
<option value="<?php echo $simno;?>"><?php echo $simno;?></option>

<?php } ?>
</select><br />
<br />
<?php } ?>
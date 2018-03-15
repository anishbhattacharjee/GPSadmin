<?php

include '../dbcon.php';

//$id= $_GET['c'];
$id= $_GET['c'];

//$qq=mysqli_query($con,"select * from installation where order_id='$id'");
$qq=mysqli_query($con,"select * from installation where imie_no='$id'");

while($rq=mysqli_fetch_array($qq))

{

$oid=$rq['order_id'];
$cid=$rq['customer_id'];

}

?>

	<input type="hidden" value="<?php echo $cid;?>" name="customer_id" id="customer_id" />
	<input type="hidden" value="<?php echo $oid;?>" name="orderid" id="orderid" />



	<div class="control-group">

									<label class="control-label" for="form-field-1">Customer ID </label>



									<div class="controls">

					<?php

			

				$ss1=mysqli_query($con,"select * from customers where customer_id='$cid'");

										while($rsq1=mysqli_fetch_array($ss1))

										{?>

										<input type="text" value="<?php echo $rsq1['customer_first_name'];?>" readonly="">

										<?php }  ?>		

							</div>

							</div>



<?php 

$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id where o.device_assign='assigned' and o.assign='assigned' and o.customer_id='$cid' and co.order_id='$oid'  and co.approve_status='approved' group by co.order_id");

								while($rneq=mysqli_fetch_array($neq))

								{

								$nodev=$rneq['ndev'];															

								} ?>

									

		 <table>

<tbody><tr><th>&nbsp;&nbsp;Category</th><th style="margin-left: 50px;float: left;">Device Type</th><th style="margin-left: 81px;float: left;">Imei No</th><th style="margin-left: 120px;float: left;">Device Name</th><th style="margin-left: 120px;float: left;">Yes/No</th><th style="margin-left: 91px;float: left;">Remarks</th></tr>

 

 </tbody>

 

 </table>

							<?php

$iiq=mysqli_query($con,"select count(instatllation_id) as cnt from installation i where  i.assign_device_status='assigned' and i.imie_no='$id'");
while($riq=mysqli_fetch_array($iiq))
{
	$cnt=$riq['cnt'];
}
							$i=1;

							

								$q=mysqli_query($con,"select * from installation i where  i.assign_device_status='assigned' and i.imie_no='$id'");

while($sqs=mysqli_fetch_array($q))

{



$devid=$sqs['device_id'];



$model_id=$sqs['model_id'];

$device_name=$sqs['device_name'];

$imie_no=$sqs['imie_no'];

$noofdevice=$nodev;

$catid=$sqs['category_id']; ?>

	<input type="hidden" value="<?php echo $sqs['instatllation_id'];?>" id="<?php echo "installation_id".$i;?>" name="<?php echo "installation_id".$i;?>" readonly="" style="width: 60px;"/>

	

<input type="text" name="cnt" id="cnt" value="<?php echo $cnt;?>"/>		

<?php





					?>

					<?php



								



									$sq=mysqli_query($con,"select * from gps_categories where category_id='$catid'");



									while($sqss=mysqli_fetch_array($sq))



									{ ?>

							<input type="hidden" value="<?php echo $sqss['category_id'];?>" id="<?php echo "category_id".$i;?>" name="<?php echo "category_id".$i;?>" />

										<input type="text" value="<?php echo $sqss['category_type'];?>" id="<?php echo "cattype".$i;?>" name="<?php echo "cattype".$i;?>" readonly="" style="width: 100px;"/>

						<?php 

						

						} 

						

						?>

						

						<?php

	$qq=mysqli_query($con,"select * from gps_devices where device_id='$devid'");



while($sqss=mysqli_fetch_array($qq))



									{



										?>

		<input type="hidden" value="<?php echo $sqss['device_id'];?>" id="<?php echo "device_type".$i;?>" name="<?php echo "device_type".$i;?>" />

										<input type="text" value="<?php echo $sqss['device_type'];?>" id="<?php echo "devtype".$i;?>" name="<?php echo "devtype".$i;?>" readonly="" style="width: 100px;"/>

							



										<?php



									}



									?>

									
									

<input type="text" name="<?php echo "imieno".$i; ?>" id="<?php echo "imieno".$i; ?>" value="<?php echo $imie_no;?>" readonly=""/>



<input type="hidden" name="<?php echo "modelid".$i; ?>" id="<?php echo "modelid".$i; ?>" value="<?php echo $model_id;?>"/>

<!--<input type="text" name="<?php echo "imieno".$i; ?>" id="<?php echo "imieno".$i; ?>" readonly="true" value="0358899050393696" style="width: 150px;"/>-->

<input type="text" name="<?php echo "devicesnm".$i; ?>" id="<?php echo "devicesnm".$i; ?>" value="<?php echo $device_name;?>" readonly=""/>



<select name="<?php echo "returnstatus".$i; ?>" id="<?php echo "returnstatus".$i; ?>"  style="width: 150px;">



<option value="No">No</option>

<option value="Yes">Yes</option>



</select>

			<textarea name="<?php echo "remarks".$i; ?>" id="<?php echo "remarks".$i; ?>"></textarea>						

						<?php

						

							echo "<br/>";

							echo "<br/>";

				$i++;

					

						}

						?>

						

						

						

						<div class="control-group">

									<label class="control-label" for="form-field-1"></label>



									<div class="controls">

									<button class="btn btn-small btn-primary" type="submit" onclick="return valform();">

										<i class="icon-ok"></i>

										Submit

									</button>

									</div>

									</div>

							
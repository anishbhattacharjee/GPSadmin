<?php
include '../dbcon.php';
$c = $_GET['c'];
?>
 <div class="control-group">

			<label class="control-label">Month Subscription</label>

				<div class="controls"> 

									<?php
									$q=mysqli_query($con,"select * from device_subscription where device_type='$c'");
while($sqs=mysqli_fetch_array($q))
									{
										?>
								1 Month Cost = <?php echo $sqs['1month_cost']; ?>&nbsp;&nbsp;&nbsp;&nbsp;	<input type="radio" name="cost" value="<?php echo $sqs['1month_cost']; ?>" id="1month" onclick="getmnth1(this.value);"/><span class="lbl"> </span><br />
									3 Month Cost = <?php echo $sqs['3month_cost']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="cost" value="<?php echo $sqs['3month_cost']; ?>" id="3month" onclick="getmnth3(this.value);"/><span class="lbl"> </span><br />
									6 Month Cost = <?php echo $sqs['6month_cost']; ?>&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="cost" value="<?php echo $sqs['6month_cost']; ?>" id="6month" onclick="getmnth6(this.value);"/><span class="lbl"></span><br />
								12 Month Cost = <?php echo $sqs['12month_cost']; ?>&nbsp;&nbsp;<input type="radio" name="cost" value="<?php echo $sqs['12month_cost']; ?>" id="12month" onclick="getmnth12(this.value);"/><span class="lbl"></span><br />
										<?php
									}
									?>
	
   </div>
</div>
 <div class="control-group">

			<label class="control-label">Final Costing</label>

				<div class="controls"> 
<input type="text" name="finalcost" id="finalcost" readonly="true"/>
<input type="hidden" name="mnthval" id="mnthval" readonly="true"/>
</div>
</div>
 <div class="control-group">

			<label class="control-label">No Of Device</label>

				<div class="controls"> 
				<input type="text" name="noofdevice" id="noofdevice" onkeypress="return numbersonly(event)"/>
				</div>
				</div>
<?php
include '../dbcon.php';
$c = $_GET['c'];



 ?>
<div class="control-group">
									<label class="control-label" for="form-field-1">Model</label>
									<div class="controls">
<select name="modelid" id="modelid">
									<option>Select Model</option>
									<?php
									$q=mysqli_query($con,"select * from gps_model_details where device_id='$c'");
while($sqs=mysqli_fetch_array($q))
									{
										?>
									<option value="<?php echo $sqs['model_id'];?>"><?php echo $sqs['model_name'];?></option>	
										<?php
									}
									?>
									
									</select>
</div>
</div>

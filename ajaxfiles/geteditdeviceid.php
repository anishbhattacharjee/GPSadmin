<?php
include '../dbcon.php';
$c = $_GET['c'];
?>
<div class="control-group">
<label class="control-label" for="form-field-1">Choose Device</label>

<div class="controls">
<select  class="chzn-select"   name="device_id"	id="device_id" onchange="getimeidiv(this.value);">
<option value="Please Choose Device">Please Choose Device</option>
<?php
$qq=mysqli_query($con,"select * from gps_devices where category_id='$c'");
while($sqss=mysqli_fetch_array($qq))
{ ?>
<option value="<?php echo $sqss['device_id'];?>"><?php echo $sqss['device_type'];?></option>
<?php } ?>
</select>
</div>		
</div>		

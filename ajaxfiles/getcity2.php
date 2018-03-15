<div class="control-group" id="citydiv">

									<label class="control-label" for="form-field-1">City</label>

									<div class="controls">

<?php

$c=(isset($_GET['c']))?$_GET['c']:'';
if($c=='Karnataka')
{
	?>
		<input type="text" class="span4" name="city" id="city" readonly="" value="Bangalore"/>
			
	<?php
}
else if($c=='Andhra Pradesh')
{
	?>
			<select name="city" id="city">
			<option value="Hyderabad">Hyderabad</option>
			<option value="Secunderabad">Secunderabad</option>
			<option value="Chittoor">Chittoor</option>
			</select>
	<?php
}
else if($c=='Maharashtra')
{
	?>
		<input type="text" class="span4" name="city" id="city" readonly="" value="Mumbai"/>
	<?php
}
else if($c=='Delhi')
{
	?>
			<select name="city" id="city">
			<option value="Delhi">Delhi</option>
			<option value="NCR">NCR</option>
			</select>
	<?php
}
else if($c=='Kerala')
{
	?>
			<input type="text" class="span4" name="city" id="city" readonly="" value="Kottayam"/>
	<?php
}
else if($c=='Punjab')
{
	?>
			<input type="text" class="span4" name="city" id="city" readonly="" value="Chandigarh"/>
	<?php
}
else if($c=='Rajasthan')
{
	?>
			<input type="text" class="span4" name="cityy" id="city" readonly="" value="Jaipur"/>
	<?php
}
else if($c=='Tamilnadu')
{
	?>
			<input type="text" class="span4" name="cityy" id="city" readonly="" value="Chennai"/>
	<?php
}
?>
</div>
</div>


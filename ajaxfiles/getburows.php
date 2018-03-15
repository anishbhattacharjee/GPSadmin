<?php

session_start();

include '../dbcon.php';

		$c=(isset($_GET['c']))?$_GET['c']:'';

?>

	<input type="hidden" name="bucnt" id="bucnt" value="<?php echo $c;?>" autocomplete="off"/>
	<table><tr><th style="margin-left: 49px;float: left;">Proof</th><th style="margin-left: 187px;float: left;">Description</th><th style="margin-left: 111px;float: left;">Upload</th></tr></table>
	
	<?php

for($i=1;$i<=$c;$i++)

{

?>		<select name="<?php echo "proof".$i; ?>" id="<?php echo "proof".$i; ?>" class="col1">

									<option>Select Proof</option>

									<option value="Address Proof">Address Proof</option>

									<option value="ID Proof">ID Proof</option>

									</select>

									<textarea name="<?php echo "descp".$i; ?>" id="<?php echo "descp".$i; ?>" class="col2"></textarea>

									

						  <input type="file" name="<?php echo "files".$i; ?>" id="<?php echo "files".$i; ?>" class="col3"/>
						  <br />
						  <br />
						
						  
						  
						  <?php } ?>
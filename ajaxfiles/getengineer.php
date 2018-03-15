<?php
include '../dbcon.php';
$c= $_GET['c'];
$i= $_GET['ival'];
?>

<select name="<?php echo "engid".$i;?>" id="<?php echo "engid".$i;?>" style="width: 150px;">
<option >Choose Engineer</option>
<?php 

$qqss=mysqli_query($con,"select * from engineers where company=$c");
while($sqs3=mysqli_fetch_array($qqss))
{
	$enguid=$sqs3['engineers_uniqid'];
	$fname=$sqs3['engineers_fname'];
?>
<option value="<?php echo $enguid;?>"><?php echo $fname;?></option>

<?php } ?>
</select>

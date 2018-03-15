<?php
include '../dbcon.php';
$instid = $_GET['c'];
$c= $_GET['imei'];
$q=mysqli_query("delete from installation where instatllation_id='$instid'");
if($q)
{
	?>
	<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
<thead>
<tr>
<th class="center">
<label>
<span class="lbl">Sl No</span>
</label>
</th>
<th>Customer ID</th>
<th>Customer Name</th>
<th>Order ID</th>
<th>Existing Category</th>
<th>Existing Device Type</th>
<th>IMEI</th>
<th>Device Name</th>
<th>Action</th>

</tr>
</thead>
<tbody>
<?php
$qqss=mysqli_query($con,"select * from installation i join customers c on c.customer_id=i.customer_id where imie_no='$c'");
$slno=1;
while($r=mysqli_fetch_array($qqss))
{ 
$imie_no= $r['imie_no'];
$instatllation_id= $r['instatllation_id'];
$model_id= $r['model_id'];

$uid=$r['customer_uid'];
$cfrist=$r['customer_first_name'];
$compname=$r['comp_name'];
$order_id=$r['order_id'];
$device_name=$r['device_name'];
$device_id=$r['device_id'];
$category_id=$r['category_id'];
$sq=mysqli_query($con,"select * from gps_categories where category_id='$category_id'");
$sqss=mysqli_fetch_array($sq);
$category_type=$sqss['category_type'];

$qd=mysqli_query($con,"select * from gps_devices where device_id='$device_id'");
$sqd=mysqli_fetch_array($qd);
$device_type=$sqd['device_type'];
?>
<tr>
<td><?php echo $slno;?></td>
<td><?php echo $uid;?></td>
<?php	if($cfrist!='')
{ ?>
<td><?php echo $cfrist;?></td>
<?php }
else
{
?>
<td><?php echo $compname."(Company Name)";?></td>	
<?php
}?>
<td><?php echo "OD".$order_id;?></td>
<td><?php echo $category_type;?></td>
<td><?php echo $device_type;?></td>
<td><?php echo $imie_no;?></td>
<td><?php echo $device_name;?></td>
<td><a onclick="deleteimei(<?php echo $instatllation_id;?>,<?php echo $c;?>);"  style="cursor: pointer;font-weight: bold;"> Delete</a></td>
</tr>
<?php
} ?>
</tbody>
</table>
	<?php
}
?>

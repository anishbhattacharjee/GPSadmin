<?php
include '../dbcon.php';
$c = $_GET['c'];
$q=mysqli_query($con,"INSERT INTO geo_fence (customer_id,device_id, points) VALUES ( '1','2', '$c');");
if($q!=FALSE)
{
	?>
	<div class="alert alert-block alert-success" >
								<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>
Geofence has been created successfully.
							</div>
	<?php
}
else
{
	echo "Data Not Added Successfully";
}
			?>
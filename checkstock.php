<?php

include 'dbcon.php';

$q=mysqli_query($con,"select * FROM `gps_model_details` where category_type=5 and device_id=11");
var_dump(mysqli_num_rows($q));

?>
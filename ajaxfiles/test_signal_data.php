<?php

include '../dbcon.php';

$imei = $_GET['imei'];
$table = $_GET['table'];

$timestampfield="time_stamps";
switch($table){
	case 'gps_master':	$timestampfield="time_stamps";$oil=",oil";
						break;
	case 'newmetrack':	$timestampfield="time_stamp";$oil=",oil";
						break;
	case 'tzone':	$timestampfield="time_stamp";$oil="oil";
						break;
	case 'narayana':	$timestampfield="time_stamps";$oil="";
						break;
	case 'podar':	$timestampfield="time_stamps";$oil="";
						break;
	case 'orange_master':	$timestampfield="time_stamps";$oil=",oil";
						break;
	case 'concox_master':	$timestampfield="time_stamps";$oil="";
						break;
}

$q=mysqli_query($con,"select lat,lng,device_time$oil FROM $table  WHERE imei='$imei' ORDER BY $timestampfield desc LIMIT 1");

if(mysqli_num_rows($q) > 0){

	$rw=mysqli_fetch_array($q);

	$lat=$rw['lat'];

	$lng=$rw['lng'];

	$time=$rw['device_time'];
	if($table=='gps_master' || $table=='newmetrack' || $table=='tzone' ){
		
		$oil=$rw['oil'];
		echo $lat.",".$lng.",".$time.",".$oil;
	}else{
		echo $lat.",".$lng.",".$time;
	}
	







}else{echo "no data";}





?>
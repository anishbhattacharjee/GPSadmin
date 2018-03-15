<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class extradevice_charge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
	$un = $this->session->userdata('username');

		  if($un==NULL)
         {
              redirect('adminlogin');

         }
	}
	public function index()
	{
		$this->load->view('admin/extradevice_charge');
	}
		public function add()
	{
		$device_id=$_GET['device_id'];
	
		$mnth=$_GET['mnth'];
		$cost=$_GET['cost'];
		$code=$_GET['code'];
	
		
		$mnthh = explode(',', $mnth);
		$costt = explode(',', $cost);
		$codee = explode(',', $code);
		
$mnthhh=sizeof($mnthh);
for($i=0; $i<$mnthhh; $i++){
	
$q=mysqli_query($con,"INSERT INTO extra_device(device_id,name,cost,code) VALUES ('$device_id','$mnthh[$i]', '$costt[$i]','$codee[$i]')");
//$idd=mysqli_insert_id();
	//$qs=mysqli_query($con,"INSERT INTO gps_categories(category_type,type,table_id) VALUES ('$mnthh[$i]','extra',$idd)");


$idd=mysqli_insert_id();
//echo $con,"INSERT INTO gps_categories(category_type,type,table_id) VALUES ('$mnthh[$i]','extra','23')";
	$qs=mysqli_query($con,"INSERT INTO gps_categories(category_type,type,table_id) VALUES ('$mnthh[$i]','extra',$idd)");
	

		
		}
	/*	$eq=mysqli_query($con,"select last_insert_id(id) as idd from extra_device order by id desc limit $mnthhh");
	while($res=mysqli_fetch_array($eq))
	{
		$idd=$res['idd'];
		$qs=mysqli_query($con,"INSERT INTO gps_categories(category_type,type,table_id) VALUES ('$mnthh[$i]','extra','$idd')");
	}*/
		if($q!=FALSE)
		{
		
			$data['msg1']="Extra Device Details Added Successfully";
		}
		else
		{
			$data['msg2']="Extra Device Details Not Added Successfully";
		}
		$this->load->view('admin/extradevice_charge',$data);
	}
}
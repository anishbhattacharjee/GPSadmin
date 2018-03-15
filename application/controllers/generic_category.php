<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class generic_category extends CI_Controller {
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
		$this->load->view('admin/generic_category');
	}
	public function add()
	{
		$categorytype=$_POST['categorytype'];
	//	$devicecost=$_POST['devicecost'];
		//$installationcost=$_POST['installationcost'];
		
	
		$q=mysqli_query($con,"INSERT INTO gps_categories (category_type,type) VALUES ('$categorytype','generic')");
		$idl=mysqli_insert_id();
		$code=$_POST['code'];
		$q1=mysqli_query($con,"INSERT INTO gps_devices (category_id,device_type) VALUES ('$idl','$code')");
		
		if($q!=FALSE && $q1!=FALSE)
		{
			$data['msg1']="Generic Category Added Successfully";
		}
		else
		{
			$data['msg2']="Generic Category Not Added Successfully";
		}
		$this->load->view('admin/generic_category',$data);
	}
	
}
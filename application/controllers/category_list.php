<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class category_list extends CI_Controller {
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
		$this->load->view('admin/category_list');
	}
	public function add()
	{
		$categorytype=$_POST['categorytype'];
	//	$devicecost=$_POST['devicecost'];
		$devicecost=0;
		$installationcost=$_POST['installationcost'];
		$package=isset($_POST['package'])?1:0;
		
	
		$q=mysqli_query($con,"INSERT INTO gps_categories (category_type,device_cost,installation_cost,type,package) VALUES ('$categorytype','$devicecost','$installationcost','main',$package)");
		if($q!=FALSE)
		{
			$data['msg1']="Category Type Details Added Successfully";
		}
		else
		{
			$data['msg2']="Category Type Details Not Added Successfully";
		}
		$this->load->view('admin/category_list',$data);
	}
	
}
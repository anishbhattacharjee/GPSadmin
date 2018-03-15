<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class device_make extends CI_Controller {
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
		$this->load->view('admin/device_make');
	}
	public function add()
	{
		$imei=$_POST['imei'];	
		$make=$_POST['make'];
		
	
		$q=mysqli_query($con,"INSERT INTO device_make (imei,make) VALUES ('$imei','$make')");
		if($q!=FALSE)
		{
			$data['msg1']="Device Details Added Successfully";
		}
		else
		{
			$data['msg2']="Device Details Not Added Successfully";
		}
		$this->load->view('admin/device_make',$data);
	}
	
}
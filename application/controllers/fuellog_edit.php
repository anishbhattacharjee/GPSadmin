<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class fuellog_edit extends CI_Controller {
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
		$this->load->view('admin/fuellog_edit');
	}
	public function edit_data()
	{
		$value=$this->input->post('value');
		$id=$this->input->post('idval');
		$cat=$this->input->post('cat');
		
		if(!empty($value) && !empty($id) && !empty($cat)){
			$q=mysqli_query("update fuel_log set $cat='$value' where id=$id");
			//echo $q;
			echo "success";
		}else{
			echo "fail";
		}
		//$this->load->view('admin/fuellog_edit');
	}
	
}
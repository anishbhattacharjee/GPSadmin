<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dealers extends CI_Controller {

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
		$this->load->view('admin/dealers');
	}
	
	public function add()
	{
		$compname=(isset($_POST['compname']))?$_POST['compname']:'';
		$cmpaddr=(isset($_POST['cmpaddr']))?$_POST['cmpaddr']:'';
		$ctphno=(isset($_POST['ctphno']))?$_POST['ctphno']:'';
		$cemail=(isset($_POST['cemail']))?$_POST['cemail']:'';	
		$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
		$created_dt=(isset($_POST['created_dt']))?$_POST['created_dt']:'';
		
		$q=mysqli_query($con,"INSERT INTO dealers (dealer_name, dealer_addr, dealer_teleph, dealer_email,created_date_time,created_by) VALUES ('$compname', '$cmpaddr', '$ctphno', '$cemail','$created_dt','$created_by')");
		if($q!=FALSE)
		{
			$data['msg1']="Dealer Details Added Successfully";
		}
		else
		{
			$data['msg2']="Dealer Details cannot be Added";
		}
		$this->load->view('admin/dealers',$data);	
	}
	   
	   
	   	public function edit()
	{
		$did=(isset($_POST['did']))?$_POST['did']:'';
		$compname=(isset($_POST['compname']))?$_POST['compname']:'';
		$cmpaddr=(isset($_POST['cmpaddr']))?$_POST['cmpaddr']:'';
		$ctphno=(isset($_POST['ctphno']))?$_POST['ctphno']:'';
		$cemail=(isset($_POST['cemail']))?$_POST['cemail']:'';	
		$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
		$created_dt=(isset($_POST['created_dt']))?$_POST['created_dt']:'';

		$q=mysqli_query("update dealers set dealer_name='$compname', dealer_addr='$cmpaddr', dealer_teleph='$ctphno', dealer_email='$cemail',created_date_time='$created_dt',created_by='$created_by' where dealer_id='$did'");
		if($q!=FALSE)
		{
			$data['msg1']="Dealer Details Edited Successfully";
		}
		else
		{
			$data['msg2']="Dealer Details cannot be Edited";
		}
		$this->load->view('admin/dealers',$data);	
	}	
}
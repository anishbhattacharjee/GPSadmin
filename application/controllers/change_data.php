<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class change_data extends CI_Controller {

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
		$this->load->view('admin/change_data');
	}
	
	public function changed()
	{
	$instatllation_id=(isset($_POST['instatllation_id']))?$_POST['instatllation_id']:'';
	$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
	$order_id=(isset($_POST['order_id']))?$_POST['order_id']:'';
	$status=(isset($_POST['status'.$instatllation_id]))?$_POST['status'.$instatllation_id]:'';
	$milege=(isset($_POST['milege'.$instatllation_id]))?$_POST['milege'.$instatllation_id]:'';



	$q=mysqli_query("update installation set fuel_sensor='$status',milege='$milege' where instatllation_id='$instatllation_id'");
	if($q!=FALSE)
		{
			$data['msg1']="Details Added Successfully";
		}
		else
		{
			$data['msg2']="Could Not Add Details Successfully";
		}
		$this->load->view('admin/change_data',$data);
	}
	
}
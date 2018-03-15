<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class change_order_creation extends CI_Controller {

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
		$this->load->view('admin/change_order_creation');
	}
	
	public function change()
	{
		$order_idd=(isset($_POST['order_idd']))?$_POST['order_idd']:'';
		$cid=(isset($_POST['cid']))?$_POST['cid']:'';
		$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
	
		$uq=mysqli_query("update customer_orders set created_by='$created_by' where order_id='$order_idd' and customer_id='$cid'");
		if($uq!=FALSE)
		{
			$data['msg1']="Created By Changed Successfully";
		}
		else
		{
			$data['msg2']="Could not Change Created By";
		}
		$this->load->view('admin/change_order_creation',$data);
	}
}
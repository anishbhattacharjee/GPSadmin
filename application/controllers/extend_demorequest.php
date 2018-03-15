<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class extend_demorequest extends CI_Controller {

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
		$this->load->view('admin/extend_demorequest');
	}
	public function extend()
	{
		$corderid=(isset($_POST['corderid']))?$_POST['corderid']:'';
		$order_idd=(isset($_POST['order_idd']))?$_POST['order_idd']:'';
		$cid=(isset($_POST['cid']))?$_POST['cid']:'';
		$start_date=(isset($_POST['start_date']))?date("Y-m-d",strtotime($_POST['start_date'])):'';
		$end_date=(isset($_POST['end_date']))?date("Y-m-d",strtotime($_POST['end_date'])):'';
		//$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
		$uq=mysqli_query("update customer_order_details set start_date='$start_date',end_date='$end_date' where order_id='$order_idd' and customer_id='$cid' and id='$corderid'");
		if($uq!=FALSE)
		{
			$data['msg1']="Created By Changed Successfully";
		}
		else
		{
			$data['msg2']="Could not Change Created By";
		}
		$this->load->view('admin/extend_demorequest',$data);
	}
	
}
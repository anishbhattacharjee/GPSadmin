<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class others extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
	/*$un = $this->session->userdata('username');

		  if($un==NULL)
         {
              redirect('adminlogin');

         }*/
	}
	public function index()
	{
		$this->load->view('admin/others');
	}
	public function add()
	{
		$invoice_no=(isset($_POST['invoice_no']))?$_POST['invoice_no']:'';
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$q=mysqli_query($con,"INSERT into invoice_tb(invtbid,customer_id) values('$invoice_no','$customer_id')");
		if($q!=FALSE)
		{
			$data['msg1']="Added Successfully";
		}
		else
		{
			$data['msg2']="Couldnot Add Successfully";
		}
		$this->load->view('admin/others',$data);
	}
}
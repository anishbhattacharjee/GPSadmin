<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class tickets extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
	$un = $this->session->userdata('engusername');

		  if($un==NULL)
         {
              redirect('engineerlogin');

         }
	}
	public function index()
	{
		$this->load->view('admin/tickets');
	}
	public function reply()
	{
		$this->load->view('admin/reply');
	}
	public function replied()
	{
		$msg=(isset($_POST['message']))?$_POST['message']:'';
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$ticket_id=(isset($_POST['ticket_id']))?$_POST['ticket_id']:'';
		
		 $un=$this->session->userdata('engusername'); 
		 $q=mysqli_query($con,"select * from engineers where engineers_email='$un'");
		while($re=mysqli_fetch_array($q))
		{
							$first=$re['engineers_fname'];
							$eng_id=$re['engineer_id'];
		}
		
	//	$eng_id=(isset($_POST['eng_id']))?$_POST['eng_id']:'';
		$status=(isset($_POST['status']))?$_POST['status']:'';
		
		$q=mysqli_query($con,"INSERT into ticket_details(ticket_id,customer_id,support_id,comment) values('$ticket_id','$customer_id','$eng_id','$msg')");
		$uq=mysqli_query("update tickets set ticket_status='$status' where id='$ticket_id'");
		if($q!=FALSE)
		{
			$this->load->view('admin/tickets');
		}
	}
}
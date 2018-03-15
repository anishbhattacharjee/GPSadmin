<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class engineer_details extends CI_Controller {

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
		$this->load->view('admin/engineer_details');
	}
	public function add()
	{
	
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = '*';
		$config['max_size']	= '100000';
		
$filename="no image";
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			//$this->load->view('upload_form', $error);
		}
		
		else
		{
			$data = $this->upload->data();
$filename= $data['file_name'];

			//$this->load->view('upload_success', $data);
		}
		$company=(isset($_POST['company']))?$_POST['company']:'';
		$firstname=(isset($_POST['firstname']))?$_POST['firstname']:'';
		$lastname=(isset($_POST['lastname']))?$_POST['lastname']:'';
		$designation=(isset($_POST['designation']))?$_POST['designation']:'';
		$dob=(isset($_POST['dob']))?$_POST['dob']:'';
		$enguid=(isset($_POST['enguid']))?$_POST['enguid']:'';
		$email=(isset($_POST['email']))?$_POST['email']:'';
		$phno=(isset($_POST['phno']))?$_POST['phno']:'';
$q=mysqli_query($con,"INSERT INTO engineers (engineers_fname, engineers_lname, company,designation,engineers_dob, engineers_uniqid, engineers_email,photo,engineers_phno) VALUES ('$firstname', '$lastname','$company','$designation','$dob', '$enguid', '$email','$filename','$phno')");
		if($q!=FALSE)
		{
			$data['msg1']="Engineers Details Added Successfully";
		}
		else
		{
			$data['msg2']="Email and Engineer Id is already Present";
		}
		$this->load->view('admin/engineer_details',$data);	
	}
	
}
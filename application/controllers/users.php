<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class users extends CI_Controller {

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
		$this->load->view('admin/users');
	}
	public function add()
	{
		$data['msg']='';
		$data['msg2']='';
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			$name=(isset($_POST['name']))?$_POST['name']:'';
			$email=(isset($_POST['email_id']))?$_POST['email_id']:'';
			$pwd=(isset($_POST['password']))?$_POST['password']:'';
			$role=(isset($_POST['u_type']))?$_POST['u_type']:'';
			if($role=='approver')
			{
				$role='admin';
			}
		
			$q=mysqli_query($con,"INSERT INTO admin_data(name, email_id, password, user_type) VALUES ('$name','$email','$pwd','$role' ) ");
			if($q!=FALSE)
				{
					$data['msg']="Added User Information Successfully";
				}
				else{
					$data['msg2']="Something went wrong!!! please try later..";
				}
				
		}
		//$msg=$con,"INSERT INTO admin_data(name, email_id, password, user_type) VALUES ('$name','$email','$pwd','$role' ) ";
		$this->load->view('admin/users',$data);
	}


	public function edit()
	{
		$data['msg']='';
		$data['msg2']='';
		if(isset($_POST['submit']) && $_POST['submit']=='submit'){
			$name=(isset($_POST['name']))?$_POST['name']:'';
			$email=(isset($_POST['email_id']))?$_POST['email_id']:'';
			$pwd=(isset($_POST['password']))?$_POST['password']:'';
			$role=(isset($_POST['u_type']))?$_POST['u_type']:'';
			$id=(isset($_POST['id']))?$_POST['id']:'';
if($role=='approver')
			{
				$role='admin';
			}
			
			$q=mysqli_query("UPDATE admin_data SET name='$name', email_id='$email', password='$pwd', user_type='$role' WHERE id=$id");
			if($q!=FALSE)
				{
					$data['msg']="Updated User Information Successfully";
				}
				else{
					$data['msg2']="Something went wrong!!! please try later..";
				}
				
		}
	//	$data['msg']="UPDATE admin_data SET name='$name', email_id='$email', password='$pwd', user_type='$role' WHERE id=$id )";
		$this->load->view('admin/users',$data);
	}

}
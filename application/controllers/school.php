<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school extends CI_Controller {
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
		$this->load->view('admin/school');
	}
	public function add()
	{
		$this->load->view('admin/add_school');
	}
	public function added()
	{
		$schoolname=(isset($_POST['schoolname']))?$_POST['schoolname']:'';
		$cmpaddr=(isset($_POST['cmpaddr']))?$_POST['cmpaddr']:'';
	
		$conname1=(isset($_POST['conname1']))?$_POST['conname1']:'';
		$conphno1=(isset($_POST['conphno1']))?$_POST['conphno1']:'';
		$conem1=(isset($_POST['conem1']))?$_POST['conem1']:'';
		$condesg1=(isset($_POST['condesg1']))?$_POST['condesg2']:'';
		$conname2=(isset($_POST['conname2']))?$_POST['conname2']:'';
		$conphno2=(isset($_POST['conphno2']))?$_POST['conphno2']:'';
		$conem2=(isset($_POST['conem2']))?$_POST['conem2']:'';
		$condesg2=(isset($_POST['condesg2']))?$_POST['condesg2']:'';
			$conname3=(isset($_POST['conname3']))?$_POST['conname3']:'';
		$conphno3=(isset($_POST['conphno3']))?$_POST['conphno3']:'';
		$conem3=(isset($_POST['conem3']))?$_POST['conem3']:'';
		$condesg3=(isset($_POST['condesg3']))?$_POST['condesg3']:'';
		//echo $con,"INSERT INTO school (school_name, address,name1, email1, phone1, designation1, name2, email2, phone2, designation2, name3, email3, phone3, designation3) VALUES ('$schoolname', '$cmpaddr', '$conname1',  '$conem1','$conphno1', '$condesg1', '$conname2', '$conem2', '$conphno2', '$condesg2','$conname3','$conem3','$conphno3','$condesg3')";
		$q=mysqli_query("update customers set is_school=1 where customer_emailid='$conem1'");
		$q=mysqli_query($con,"INSERT INTO school (school_name, address,name1, email1, phone1, designation1, name2, email2, phone2, designation2, name3, email3, phone3, designation3) VALUES ('$schoolname', '$cmpaddr', '$conname1',  '$conem1','$conphno1', '$condesg1', '$conname2', '$conem2', '$conphno2', '$condesg2','$conname3','$conem3','$conphno3','$condesg3')");
		if($q!=FALSE)
		{
			$data['msg1']="School Details Added Successfully";
		}
		else
		{
			$data['msg2']="School Details cannot be Added";
		}
		$this->load->view('admin/school',$data);	
	}
	
}
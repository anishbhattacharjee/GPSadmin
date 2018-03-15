<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class company extends CI_Controller {

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
		$this->load->view('admin/company');
	}
	public function add()
	{
		$compname=(isset($_POST['compname']))?$_POST['compname']:'';
		$cmpaddr=(isset($_POST['cmpaddr']))?$_POST['cmpaddr']:'';
		$ctphno=(isset($_POST['ctphno']))?$_POST['ctphno']:'';
		$cemail=(isset($_POST['cemail']))?$_POST['cemail']:'';
		$website=(isset($_POST['website']))?$_POST['website']:'';
		$conname1=(isset($_POST['conname1']))?$_POST['conname1']:'';
		$conphno1=(isset($_POST['conphno1']))?$_POST['conphno1']:'';
		$conem1=(isset($_POST['conem1']))?$_POST['conem1']:'';
		$condesg1=(isset($_POST['condesg1']))?$_POST['condesg2']:'';
		$conname2=(isset($_POST['conname2']))?$_POST['conname2']:'';
		$conphno2=(isset($_POST['conphno2']))?$_POST['conphno2']:'';
		$conem2=(isset($_POST['conem2']))?$_POST['conem2']:'';
		$condesg2=(isset($_POST['condesg2']))?$_POST['condesg2']:'';
		$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
		$created_dt=(isset($_POST['created_dt']))?$_POST['created_dt']:'';
		$q=mysqli_query($con,"INSERT INTO company (comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,created_date_time,created_by) VALUES ('$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$created_dt','$created_by')");
		if($q!=FALSE)
		{
			$data['msg1']="Company Details Added Successfully";
		}
		else
		{
			$data['msg2']="Company Details cannot be Added";
		}
		$this->load->view('admin/company',$data);	
	}
	
}
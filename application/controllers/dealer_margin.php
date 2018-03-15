<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dealer_margin extends CI_Controller {

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
		$this->load->view('admin/dealer_margin');
	}
	public function detail(){
		$data['oid']=$this->uri->segment(3);
		$this->load->view('admin/dealer_margin_detail',$data);		
	}
	
}
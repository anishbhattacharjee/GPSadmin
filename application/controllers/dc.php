<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dc extends CI_Controller {
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

		$this->load->view('admin/dc');
	}
	
	public function dc_view()
	{

		$this->load->view('admin/dc_view');
	}
	
	public function demo_dc_view()
	{

		$this->load->view('admin/demo_dc_view');
	}
	
}
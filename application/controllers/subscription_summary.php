<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subscription_summary extends CI_Controller {
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
		$this->load->view('reports/subscription_summary');
	}
	public function subscription_summary1()
	{
		$this->load->view('reports/subscription_summary1');
	}
	
	
}
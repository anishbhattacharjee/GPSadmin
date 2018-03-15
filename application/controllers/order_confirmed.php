<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order_confirmed extends CI_Controller {

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
		$this->load->view('admin/od_confirmed');
	}
	public function confirmed_order_view()
	{
		$this->load->view('admin/confirmed_order_view');
	}
	
	public function detailed_orderinfo()
	{
		$this->load->view('admin/detailed_orderinfo');
	}
	public function detailed_orderinfoo()
	{
		$this->load->view('admin/detailed_orderinfoo');
	}
	
}
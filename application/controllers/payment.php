<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment extends CI_Controller {

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
		$this->load->view('admin/payment_pending');
	}
	public function received()
	{
		$this->load->view('admin/payment_received');
	}
	public function makepayment()
	{
		
		$this->load->view('admin/make_payment');
	}
	public function view()
	{
		
		$this->load->view('admin/view_received');
	}
	public function cash()
	{
		
		$this->load->view('admin/cash');
	}
	public function cheque()
	{
		
		$this->load->view('admin/cheque');
	}
	public function online()
	{
		
		$this->load->view('admin/online');
	}
public function foc()
	{
		
		$this->load->view('admin/foc');
	}
public function online_transfer()
	{
		$this->load->view('admin/online_transfer');
	}
	
	
	
}
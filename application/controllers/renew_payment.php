<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class renew_payment extends CI_Controller {

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
		$this->load->view('admin/renew_payment_pending');
	}
	public function received()
	{
		$this->load->view('admin/renew_payment_received');
	}
	public function makepayment()
	{
		
		$this->load->view('admin/renew_make_payment');
	}
	public function view()
	{
		
		$this->load->view('admin/view_received');
	}
	public function cash()
	{
		
		$this->load->view('admin/renew_cash');
	}
	public function cheque()
	{
		
		$this->load->view('admin/renew_cheque');
	}
	public function online()
	{
		
		$this->load->view('admin/renew_online');
	}
	public function online_transfer()
	{
		
		$this->load->view('admin/renew_online_transfer');
	}
	
}
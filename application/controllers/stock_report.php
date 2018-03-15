<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_report extends CI_Controller {
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
		$this->load->view('admin/stock_report');
	}
	public function qc()
	{
		$this->load->view('admin/qc_stock_report');
	}
	public function showqc()
	{
		$this->load->view('admin/showqc');
	}
	
}
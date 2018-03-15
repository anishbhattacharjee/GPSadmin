<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class receipts extends CI_Controller {
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
		$this->load->view('reports/receipts');
	}
	public function view()
	{
		$this->load->library('mpdf/mpdf');
			$mpdf = new mPDF();

			$html = 
			"<html>
			<body style='padding:0; margin:0;'>
			<h1>hello</h1>
			</body>
			</html>

			";
			$mpdf->WriteHTML($html);
		$mpdf->Output(); 
	//	$this->load->view('reports/receipt_view');
	}
}
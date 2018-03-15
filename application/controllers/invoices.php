<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class invoices extends CI_Controller {
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
		$this->load->view('reports/invoices');
	}
	public function view()
	{
		
		if(isset($_GET['inv'])){
			$iiq=mysqli_query($con,"select * from invoice_tb where order_id=".$_GET['inv']);
					if(mysqli_num_rows($iiq)>0)
					{
						$riiq=mysqli_fetch_array($iiq);
						$invs=$riiq['invtbid'];
						if($invs > 142){
							$this->load->view('admin/invoiceformat_iot');						
						}else{
							$this->load->view('admin/invoiceformat');
						}
					}else{
						if($_GET['inv'] > 945){
							$this->load->view('admin/invoiceformat_iot');
						}else{
							$this->load->view('admin/invoiceformat');
						}
					}
		}else{
			$this->load->view('admin/invoiceformat');
		}
					
				/*	
		if(isset($_GET['inv']) && $_GET['inv'] > 945){
			
		}else{			
			
		}*/
		
		
	//	$this->load->view('reports/invoice_view');
	}
	public function invoice_print()
	{
		//$this->load->view('reports/invoice_print');
		if(isset($_GET['inv']) && $_GET['inv'] > 945){
			$this->load->view('reports/invoice_print_iot');
		}else{			
			$this->load->view('reports/invoice_print');
		}
	}
	
}
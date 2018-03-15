<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class to_metrack extends CI_Controller {

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

		$this->load->view('admin/to_metrack');

	}
public function change()

	{
		
		$table=$this->input->post('table');
		$customer=$this->input->post('cid');
		
		if($customer!=''){
			if($table=='newmetrack'){
				$sql=$con,"select * from customer_pages where customer_id=$customer";
				$rs=mysqli_query($sql);
				if($rs && mysqli_num_rows($rs)>0){}else{
				$sql=$con,"INSERT INTO `customer_pages` (`id`, `customer_id`, `page`, `folder`) VALUES (NULL, '$customer', 'live', 'metrack'), (NULL, '$customer', 'dashboard', 'metrack'),(NULL, '$customer', 'playback', 'metrack'), (NULL, '$customer', 'playback_print', 'metrack'), (NULL, '$customer', 'overview', 'metrack'), (NULL, '$customer', 'report', 'metrack'), (NULL, '$customer', 'reportleft', 'metrack');";
				
				//echo $sql;exit;
				mysqli_query($sql);
				}
			}elseif($table=='gps_master'){
				$sql=$con,"select * from customer_pages where customer_id=$customer";
				$rs=mysqli_query($sql);
				if($rs && mysqli_num_rows($rs)>0){
					$sql="delete from customer_pages where customer_id=$customer";
					mysqli_query($sql);
				}
			}
		}
		
		$url=base_url()."to_metrack";
		header("Location: $url");


	}
public function addnew()

	{
		
		$table=isset($_POST['table'])?$_POST['table']:'';
		$customer=isset($_POST['customer'])?$_POST['customer']:'';
		//echo $table;
		//echo $customer;
		//$customer=9999;
		if($customer!=''){
			if($table=='newmetrack'){
				$sql=$con,"select * from customer_pages where customer_id=$customer";
				$rs=mysqli_query($sql);
				if($rs && mysqli_num_rows($rs)>0){}else{
				$sql=$con,"INSERT INTO `customer_pages` (`id`, `customer_id`, `page`, `folder`) VALUES (NULL, '$customer', 'live', 'metrack'), (NULL, '$customer', 'dashboard', 'metrack'),(NULL, '$customer', 'playback', 'metrack'), (NULL, '$customer', 'playback_print', 'metrack'), (NULL, '$customer', 'overview', 'metrack'), (NULL, '$customer', 'report', 'metrack'), (NULL, '$customer', 'reportleft', 'metrack');";
				
				//echo $sql;exit;
				mysqli_query($sql);
				}
			}elseif($table=='gps_master'){
				$sql=$con,"select * from customer_pages where customer_id=$customer";
				$rs=mysqli_query($sql);
				if($rs && mysqli_num_rows($rs)>0){
					$sql="delete from customer_pages where customer_id=$customer";
					mysqli_query($sql);
				}
			}
		
		}
		//exit;
		$url=base_url()."to_metrack";
		header("Location: $url");


	}

	

}
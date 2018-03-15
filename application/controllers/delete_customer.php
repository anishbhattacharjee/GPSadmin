<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class delete_customer extends CI_Controller {

 public function __construct()

	{

		parent::__construct();

		session_start();

		$un = $this->session->userdata('username');



		  if($un==NULL)

         {

              redirect('adminlogin');



         }
         $this->load->helper('url');

	}

	public function index()

	{

		$this->load->view('admin/customer_delete');

	}
	public function delete()
	{
		$cid=(isset($_POST['cid']))?$_POST['cid']:'';
		
		if($cid!=''){
			$qu=mysqli_query($con,"select customer_id from customers where customer_id=$cid");
				if($qu && mysqli_num_rows($qu)>0){
					$cu=mysqli_fetch_assoc($qu);
					$customer_id=$cu['customer_id'];
					$data['customer']=$customer_id;
				}else{
					$data['customer']="Customer Doest Not Exists";
				}
		}else{
			$data['customer']="Customer Doest Not Exists";
		}
		
		$this->load->view('admin/customer_delete',$data);
	}
	public function delete_data()
	{
		$del=(isset($_POST['del']))?$_POST['del']:'';
		$Confirm=(isset($_POST['Confirm']))?$_POST['Confirm']:'';
		if(isset($Confirm) && $Confirm=="confirm" && $del > 0){
			$qu=mysqli_query($con,"select customer_id from customers where customer_id=$del");
				if($qu && mysqli_num_rows($qu)>0){
					$q1="delete from customer_order_details where customer_id=$del";
					mysqli_query($q1);
					$q2="delete from customer_orders where customer_id=$del";
					mysqli_query($q2);
					$q3="delete from alert_control where customer_id=$del";
					mysqli_query($q3);
					$q4="delete from customer_pages where customer_id=$del";
					mysqli_query($q4);
					
					$sql_dev=$con,"select DISTINCT installation.imie_no FROM installation WHERE customer_id=$del";	
					$rs_dev=mysqli_query($sql_dev);
					if($rs_dev && mysqli_num_rows($rs_dev)>0){
						while($rw_dev=mysqli_fetch_assoc($rs_dev)){	
							$imei_del=$rw_dev['imie_no'];
							$q5="delete from latest_records where imei='$imei_del'";
							mysqli_query($q5);
						}
					}
					$q6="delete from installation where customer_id=$del";
					mysqli_query($q6);
					
					$q7="delete from customers where customer_id=$del";
					mysqli_query($q7);					
					
				}
			
		}
			
	$this->load->view('admin/customer_delete');
	
	//redirect('delete_customer');
	}
	
	

}
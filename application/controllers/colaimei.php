<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class colaimei extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		session_start();
	/*$un = $this->session->userdata('username');

		  if($un==NULL)
         {
              redirect('adminlogin');

         }*/
	}
	public function index()
	{
		$this->load->view('admin/colaimei');
	}
	public function assigned_device()
	{
	
			$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		
		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';
	
		$apdtt=date('Y-m-d H:i:s',strtotime('+330 minutes'));
		$instdt=date('Y-m-d');
		
		$sq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
		$order_date=$rsq['order_date'];
		$customer_type=$rsq['customer_type'];
		
		
	
		$category_id=(isset($_POST['category_id']))?$_POST['category_id']:'';
		$device_type=(isset($_POST['device_type']))?$_POST['device_type']:'';
		
		$modelid = (isset($_POST['modelid']))?$_POST['modelid']:'0';
		$imieno = (isset($_POST['imieno']))?$_POST['imieno']:'0';
		$devicesnm = (isset($_POST['devicesnm']))?$_POST['devicesnm']:'0';
		$sim = (isset($_POST['sim']))?$_POST['sim']:'0';
		$submonth = 1;
		
		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type,demo_device_type,assign_engineer,installation_status,installed_date) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','','$customer_type','notdemo','assigned','completed','$instdt')");
		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
		if($q!=FALSE)
		{
			$data['msg1']="Added Successfully";
		}
		else
		{
			$data['msg2']="Added Successfully";
		}
		$this->load->view('admin/colaimei',$data);
	
	}
	
}
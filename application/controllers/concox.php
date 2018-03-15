<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class concox extends CI_Controller {

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

		$this->load->view('admin/concox');

	}public function stock()

	{

		$this->load->view('admin/stock_add');

	}
	public function save_data()
	{
		$uname=(isset($_POST['uname']))?$_POST['uname']:'';
		$pw=(isset($_POST['pw']))?$_POST['pw']:'';
		$imeis=(isset($_POST['imeis']))?$_POST['imeis']:'';
		if($uname!='' && $imeis!='' && $pw!=''){
			
			//print_r($customer_id);
			//print_r($imeis);
				$state="Delhi";
				$city="Delhi";
				
				
				$qu=mysqli_query($con,"select customer_id from customers where customer_emailid='$uname' and password='$pw' and concox=1");
				if($qu && mysqli_num_rows($qu)>0){
					$cu=mysqli_fetch_assoc($qu);
					$customer_id=$cu['customer_id'];
				}else{						  	
						  	
				$q=mysqli_query($con,"INSERT INTO customers (type, customer_emailid,created_by,password,state,city,fromm,is_school,is_sublogin,dealers_customer,concox) VALUES ('individual','$uname', 'Manju', '$pw','$state','$city',1,0,0,0,1)");
		
				$customer_id=mysqli_insert_id();
				$uid="CID_".$customer_id;
				$sss=mysqli_query("update customers set customer_uid ='$uid' where customer_id=$customer_id");	
				$sss=mysqli_query($con,"INSERT INTO alert_control(customer_id) VALUES ($customer_id)");
				
				$sss=mysqli_query($con,"INSERT INTO `customer_pages` ( `customer_id`, `page`, `folder`) VALUES ($customer_id, 'live', 'concox'),($customer_id, 'dashboard', 'concox'),($customer_id, 'playback', 'concox'),($customer_id, 'playback_print', 'concox'),($customer_id, 'overview', 'concox'),($customer_id, 'report', 'concox')");				
				
				}
				
				$orderid=0;
				$dt=date('Y-m-d H:i:s');
				$indt=date('Y-m-d');
				$submonth=12;
				$ordereddate=date('Y-m-d H:i:s');
				$customer_type='paid';
				
			foreach($imeis as $k=>$imei){
				
				
				
/*				
				q=mysqli_query($con,"INSERT INTO customer_orders (customer_id, final_cost,order_from,approve_status,created_by,remarks,accounts_approval,account_remarks,without_discount,needengineer) VALUES ('$cid', '$amount','backend','pending','$created_by','Waiting for Approval','pending','Waiting for Confirmation','$finalcostt','$needsim')");
				
				$curyr=date('Y');
					$nxtyr = date('y',strtotime(date("Y-m-d", time()) . " + 365 day"));
					$yr=$curyr."-".$nxtyr;
$invq=mysqli_query($con,"INSERT into invoice_tb(order_id,customer_id,invoice_year) values('$oid','$cid','$yr')");

$sfq=mysqli_query($con,"INSERT into payment_master(order_id,response) values ('$oid','success')");

$pyq=mysqli_query($con,"INSERT INTO payment_list(customer_id,order_id,total_amount,paid_amount,pending_amount,status,cashamount,chequeamount,payment_type,advance_amount,advance_paid,online_transfer_amount) VALUES ('$cid', '$oid', '$amount','$paidamount','$totalpending','$status','$cashamount','$chequeamount','$paytype','$advamount','$advancepaidamount','$onlinetransferamount')");

$qs=mysqli_query($con,"INSERT INTO customer_order_details (order_id, customer_id, category_id, device_id, noofdevice, sub_month, subcost, final_cost,service_tax,vat,each_cost,installation_cost,device_cost,device_name,margin_value,network,charge,vat_percentage,packing, freight, smspackage, video_streaming,service_percentage) VALUES ('$oid', '$cid', '$category_idd[$i]', '$device_typee[$i]', '$noofdevicee[$i]', '$subscpp[$i]', '$costmonthh[$i]','$grandtotall[$i]','$serchargee[$i]','$vatchargee[$i]','$totcostt[$i]','$instchargee[$i]','$devcostt[$i]','$devnamee[$i]','$marginvall[$i]','$networkk[$i]','$simchargee[$i]','$vats[$i]','$packing','$freight','$smspackage','$video','$servicetaxx[$i]')");	

}
	$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action, order_id,notification, table_name, table_id) VALUES ('$cid','order','$oid', 'Order Placed Successfully', 'customer_orders', '$oid')");	
		$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$cid','invoice','$oid', 'Invoice Raised Successfully', 'customer_orders', '$oid')");	
$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$cid','payment','$oid', '$paidamount Payment Done Successfully', 'customer_orders', '$oid')");	
*/	


				
				$q1=mysqli_query($con,"select category_type,device_id,model_id FROM gps_model_details where imie_number='$imei'");
				$modeldet=mysqli_fetch_assoc($q1);
				
				
				$modelid=$modeldet['model_id'];
				$category_id=$modeldet['category_type'];
				$device_id=$modeldet['device_id'];
				
				
				$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status,  model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$modelid','$imei','$category_id','$device_id','$orderid','tracker','$dt','assigned','installed','$indt','completed','$dt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");
				
				$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imei')");
			}
		}
		
	$this->load->view('admin/concox');
	}
	public function stock_add()

	{
		$imei=(isset($_POST['imei']))?$_POST['imei']:'';
		if($imei!=''){
			$recvdt=date('Y-m-d',strtotime($dt));
			$status="completed";
			
			$q=mysqli_query($con,"INSERT into gps_model_details(category_type,device_id,imie_number,recv_dt,conditions,image,first_status,concox,status) values('2',53,'$imei','$recvdt','good','noimage.jpg','completed',1,'$status')");
		}
		

		$this->load->view('admin/stock_add');

	}
	

}
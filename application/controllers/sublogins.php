<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class sublogins extends CI_Controller {

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

		$this->load->view('admin/sublogins');

	}
	public function assign_device()

	{

		$this->load->view('admin/sublogin_assign_device');

	}

	public function newlogin()

	{

		$username=$_POST['username'];
$password=$_POST['password'];
$customer_name=$_POST['customer_name'];
$id=$_POST['id'];

$q=mysqli_query($con,"INSERT into customers(customer_emailid,password,customer_first_name,sub_login_createdby,type,account_type)values('$username','$password','$customer_name','$id','company','live')");
$cid=mysqli_insert_id();
$cuid="CID_".$cid;
$qu=mysqli_query("update customers set customer_uid='$cuid' where customer_id='$cid'");
$qq=mysqli_query($con,"INSERT into alert_control(customer_id)values('$cid')");

if($q)
{
	$url=base_url()."sublogins";
	header("Location: $url");
	//header("Location: hdfc_emi/PerformREQuest.php?ip=$ip");
}

	}
public function newassign()

	{

$customer_id=$_POST['customer_id'];
$device=$_POST['device'];

foreach($device as $devices)
{
$qq=mysqli_query($con,"select * from installation where instatllation_id='$devices'");
while($rq=mysqli_fetch_array($qq))
{
	$sim=$rq['sim_no'];
	$modelid=$rq['model_id'];
	$imieno=$rq['imie_no'];
	$category_id=$rq['category_id'];
	$device_type=$rq['device_id'];
	$orderid=$rq['order_id'];
	$devicesnm=$rq['device_name'];
	$apdtt=$rq['device_date_time'];

	$submonth=$rq['submonth'];

	$customer_type=$rq['customer_type'];
	
	$instdt=$rq['installed_date'];
	
	$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type,demo_device_type,assign_engineer,installation_status,installed_date) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','','$customer_type','notdemo','assigned','completed','$instdt')");
} }
if(isset($q))
{
	$url=base_url()."sublogins/assign_device";
	header("Location: $url");
}
	}

	

}
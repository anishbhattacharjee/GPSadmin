<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class assign_metrack extends CI_Controller {
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
		$this->load->view('admin/assign_metrack');
	}
	public function add_metrackdevice()
	{
		$this->load->view('admin/add_metrackdevice');
	}
	
	public function add()
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$imieno=(isset($_POST['imieno']))?$_POST['imieno']:'';
		$modelid=(isset($_POST['modelid']))?$_POST['modelid']:'';
		$category_d=(isset($_POST['category_d']))?$_POST['category_d']:'';
		$devid=(isset($_POST['devid']))?$_POST['devid']:'';
		$dt=date('Y-m-d');
		$device_name=(isset($_POST['device_name']))?$_POST['device_name']:'';
		$q=mysqli_query($con,"INSERT INTO installation (customer_id, order_id, category_id, model_id, engineer_id, sim_no, device_id, imie_no, device_name, allocation_status, remarks, approve_status, installation_status, installed_date, installation_remarks, device_status, create_date_time, demo_device_type, allocated_date_time, company_id, image, speed_limit, idle_limit, device_date_time, assign_device_status, assign_engineer, submonth, order_date, customer_type) VALUES
('$customer_id', 0, '$category_d', '$modelid', 'ENG_8NKKV', 2147483647, '$devid', '$imieno', 'KA18A6880', 'completed', '', 'pending', 'completed', '$dt', 'installation done', 'active', '2014-06-06 13:06:26', 'demo', '2014-06-05 04:01:00', '3', 'noimage.jpg', '0', '0', '2014-06-04 16:59:43', 'assigned', 'assigned', 0, '', 'paid')");

if($q!=FALSE)
		{
			$data['msg1']="Device Added Successfully";
			
		}
		else
		{
			$data['msg2']="Could not add Device";
			
		}
		$this->load->view('admin/assign_metrack',$data);
	}
	
	public function delete_device()
	{
		$id=$this->uri->segment(3);
	
		$q=mysqli_query("delete from installation where instatllation_id='$id'");
		if($q!=FALSE)
		{
			$data['msg1']="Device Added Successfully";
			
		}
		else
		{
			$data['msg2']="Could not add Device";
			
		}
		$this->load->view('admin/assign_metrack',$data);
	}
	
}
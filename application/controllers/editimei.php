<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class editimei extends CI_Controller {

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
		$this->load->view('admin/editimei');
	}
	
	public function edited()
	{
		$oldimieno=(isset($_POST['oldimieno']))?$_POST['oldimieno']:'';
		$imieno=(isset($_POST['imieno']))?$_POST['imieno']:'';
		$modelid=(isset($_POST['modelid']))?$_POST['modelid']:'';
		$category_id=(isset($_POST['category_id']))?$_POST['category_id']:'';
		$device_id=(isset($_POST['device_id']))?$_POST['device_id']:'';
		
	$uq=mysqli_query("update installation set imie_no='$imieno',model_id='$modelid' where imie_no='$oldimieno'");
	$umq=mysqli_query("update gps_model_details set category_type='$category_id',device_id='$device_id' where imie_number='$imieno'");
	$sq=mysqli_query($con,"select * from latest_records where imei='$imieno'");
	if(mysqli_num_rows($sq)>0)
	{
	
	}
	else
	{
		$iq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
	}
		if($uq!=FALSE)
		{
			$data['msg1']="Changed Successfully";
		}
		else
		{
			$data['msg2']="Couldnot Change";
		}
		$this->load->view('admin/editimei',$data);
	}
}
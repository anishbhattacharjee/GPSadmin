<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qualitycheck extends CI_Controller {
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
		$this->load->view('admin/qualitycheck');
	}
	public function change()
	{
		
		$this->load->view('admin/checking_quality');
	}
	public function status_changed()
	{
			$modelid=(isset($_POST['modelid']))?$_POST['modelid']:'';
			$status=(isset($_POST['status']))?$_POST['status']:'';
			$extstatus=(isset($_POST['extstatus']))?$_POST['extstatus']:'';
			$extdescp=(isset($_POST['extdescp']))?$_POST['extdescp']:'';
			$intstatus=(isset($_POST['intstatus']))?$_POST['intstatus']:'';
			$intdescp=(isset($_POST['intdescp']))?$_POST['intdescp']:'';
			$powerstatus=(isset($_POST['powerstatus']))?$_POST['powerstatus']:'';
			$powerdescp=(isset($_POST['powerdescp']))?$_POST['powerdescp']:'';
			$batterystatus=(isset($_POST['batterystatus']))?$_POST['batterystatus']:'';
			$batterydescp=(isset($_POST['batterydescp']))?$_POST['batterydescp']:'';
			$ledstatus=(isset($_POST['ledstatus']))?$_POST['ledstatus']:'';
			$leddescp=(isset($_POST['leddescp']))?$_POST['leddescp']:'';
			$gsmnetworkstatus=(isset($_POST['gsmnetworkstatus']))?$_POST['gsmnetworkstatus']:'';
			$gsmnetworkdescp=(isset($_POST['gsmnetworkdescp']))?$_POST['gsmnetworkdescp']:'';
			$gprsnetworkstatus=(isset($_POST['gprsnetworkstatus']))?$_POST['gprsnetworkstatus']:'';
			$gprsnetworkdescp=(isset($_POST['gprsnetworkdescp']))?$_POST['gprsnetworkdescp']:'';
			$serverstatus=(isset($_POST['serverstatus']))?$_POST['serverstatus']:'';
			$serverdescp=(isset($_POST['serverdescp']))?$_POST['serverdescp']:'';
			$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
			//$q=mysqli_query($con,"INSERT INTO qualitycheck (model_id, status, extstatus, extdescp, intstatus, intdescp, powerstatus, powerdescp, batterystatus, batterydescp, ledstatus, leddescp, gsmnetworkstatus, gsmnetworkdescp, gprsnetworkstatus, gprsnetworkdescp, serverstatus, serverdescp) VALUES ('$modelid','$status', '$extstatus', '$extdescp', '$intstatus', '$intdescp', '$powerstatus', '$powerdescp', '$batterystatus', '$batterydescp', '$ledstatus', '$leddescp', '$gsmnetworkstatus', '$gsmnetworkdescp', '$gprsnetworkstatus', '$gprsnetworkdescp', '$serverstatus', '$serverdescp')");
			$q=mysqli_query("update qualitycheck set status='$status', extstatus='$extstatus', extdescp='$extdescp', intstatus='$intstatus', intdescp='$intdescp', powerstatus='$powerstatus', powerdescp='$powerdescp', batterystatus='$batterystatus', batterydescp='$batterydescp', ledstatus='$ledstatus', leddescp='$leddescp', gsmnetworkstatus='$gsmnetworkstatus', gsmnetworkdescp='$gsmnetworkdescp', gprsnetworkstatus='$gprsnetworkstatus', gprsnetworkdescp='$gprsnetworkdescp', serverstatus='$serverstatus', serverdescp='$serverdescp' where model_id='$modelid'");
		if($q!=FALSE)
		{
		
			//echo "update gps_model_details set status='$status' where model_id='$modelid'";
			$q=mysqli_query("update gps_model_details set status='$status',remarks='$remarks' where model_id='$modelid'");
			$data['msg1']="Quality Check Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Quality Check Status has not been Changed";
		}
		$this->load->view('admin/qualitycheck',$data);
	}
	
	public function completed()
	{
		$this->load->view('admin/qualitycheck_completed');
	}
	public function rejected()
	{
		
		$this->load->view('admin/qualitycheck_rejected');
	}
	public function pending_report()
	{
		$this->load->view('reports/pending_report');
	}
	public function edit()
	{
		$mid=(isset($_POST['mid']))?$_POST['mid']:'';
		$slno=(isset($_POST['slno']))?$_POST['slno']:'';
		$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
		$recvdate=(isset($_POST['recvdate']))?date("Y-m-d",strtotime($_POST['recvdate'])):'';
		$q=mysqli_query("update gps_model_details set slnumber='$slno',remarks='$remarks',recv_dt='$recvdate' where model_id=$mid");
		if($q!=FALSE)
		{
		
			$data['msg1']="Edited Successfully";
		}
		else
		{
			$data['msg2']="Could not be Edited";
		}
		$this->load->view('admin/qualitycheck_completed',$data);
	}
}
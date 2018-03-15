<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class sim_details extends CI_Controller {
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
		$this->load->view('admin/sim_details');
	}
	public function add()
	{
		$simno=(isset($_POST['simno']))?$_POST['simno']:'';
		$network=(isset($_POST['network']))?$_POST['network']:'';
		$simcharge=(isset($_POST['simcharge']))?$_POST['simcharge']:'';
		$recv_date=(isset($_POST['recv_date']))?date("Y-m-d",strtotime($_POST['recv_date'])):'';
		$q=mysqli_query($con,"INSERT INTO sim_details ( sim_no, network, recv_dt,simcharge) VALUES ('$simno', '$network','$recv_date','$simcharge')");
		if($q!=FALSE)
		{
			$data['msg1']="Sim Details Added Successfully";
		}
		else
		{
			$data['msg2']="Sim Details Not Added Successfully";
		}
		$this->load->view('admin/sim_details',$data);
	}
	
	public function edit()
	{
		$simid=(isset($_POST['simid']))?$_POST['simid']:'';
		$simno=(isset($_POST['simno']))?$_POST['simno']:'';
		$network=(isset($_POST['network']))?$_POST['network']:'';
		$simcharge=(isset($_POST['simcharge']))?$_POST['simcharge']:'';
		$recv_date=(isset($_POST['recv_date']))?date("Y-m-d",strtotime($_POST['recv_date'])):'';
		$q=mysqli_query("update sim_details set sim_no='$simno',network='$network', recv_dt='$recv_date',simcharge='$simcharge' where sim_id=$simid");
		if($q!=FALSE)
		{
			$data['msg1']="Sim Details Edited Successfully";
		}
		else
		{
			$data['msg2']="Sim Details Not Edited Successfully";
		}
		$this->load->view('admin/sim_details',$data);
		
	}
	public function delete()
	{
		$simid=(isset($_POST['simid']))?$_POST['simid']:'';
		$q=mysqli_query("delete from sim_details where sim_id=$simid");
		if($q!=FALSE)
		{
			$data['msg1']="Sim Details Deleted Successfully";
		}
		else
		{
			$data['msg2']="Could not Delete Sim Details";
		}
		$this->load->view('admin/sim_details',$data);
		
	}
	
	public function network()
	{
		$this->load->view('admin/network');
	}
	
	public function network_add()
	{
	$network=(isset($_POST['network']))?$_POST['network']:'';
		$charge=(isset($_POST['charge']))?$_POST['charge']:'';
		
		$q=mysqli_query($con,"INSERT INTO network ( network_name,charge) VALUES ('$network','$charge')");
		if($q!=FALSE)
		{
			$data['msg1']="Network Details Added Successfully";
		}
		else
		{
			$data['msg2']="Network Details Not Added Successfully";
		}
		$this->load->view('admin/network');
	}
	
	public function delete_network()
	{
		$id=(isset($_POST['id']))?$_POST['id']:'';
		$q=mysqli_query("delete from network where id=$id");
		if($q!=FALSE)
		{
			$data['msg1']="Network Details Deleted Successfully";
		}
		else
		{
			$data['msg2']="Could not Delete Network Details";
		}
		$this->load->view('admin/network',$data);
		
	}
	
	public function edit_network()
	{
		$id=(isset($_POST['id']))?$_POST['id']:'';
	
		$network=(isset($_POST['network']))?$_POST['network']:'';
		$charge=(isset($_POST['charge']))?$_POST['charge']:'';
		
		$q=mysqli_query("update network set network_name='$network', charge='$charge' where id=$id");
		if($q!=FALSE)
		{
			$data['msg1']="Network Details Edited Successfully";
		}
		else
		{
			$data['msg2']="Network Details Not Edited Successfully";
		}
		$this->load->view('admin/network',$data);
		
	}
	
}
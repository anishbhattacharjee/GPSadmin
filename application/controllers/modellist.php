<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class modellist extends CI_Controller {

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
		$this->load->view('admin/modellist');
	}
	public function add()
	{
		
		$modelname=(isset($_POST['modelname']))?$_POST['modelname']:'';
		$devicetype=(isset($_POST['devicetype']))?$_POST['devicetype']:'';
		$slnumber=(isset($_POST['slnumber']))?$_POST['slnumber']:'';
		$imienumber=(isset($_POST['imienumber']))?$_POST['imienumber']:'';
		$condition=(isset($_POST['condition']))?$_POST['condition']:'';
		$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
		$recv_date=(isset($_POST['recv_date']))?$_POST['recv_date']:'';
		$cost=(isset($_POST['cost']))?$_POST['cost']:'';
		$config['upload_path'] = './modeluploads/';
		
	
		$config['allowed_types'] = '*';
		$config['max_size']	= '100000';
		
$filename="no.jpg";
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
var_dump($error);
			//$this->load->view('upload_form', $error);
		}
		
		else
		{
			$data = $this->upload->data();
$filename= $data['file_name'];

			//$this->load->view('upload_success', $data);
		}
		exit;
		$q=mysqli_query($con,"INSERT INTO gps_model_details ( device_id, model_name,slnumber, imie_number, recv_dt, conditions, remarks,cost,image) VALUES ('$devicetype','$modelname','$slnumber','$imienumber', '$recv_date', '$condition', '$remarks','$cost','$filename')");
		if($q!=FALSE)
		{
			$data['msg1']="Device Details Added Successfully";
		}
		else
		{
	
			$data['msg2']=mysqli_error();
		}
		$this->load->view('admin/modellist',$data);
	}
	
}
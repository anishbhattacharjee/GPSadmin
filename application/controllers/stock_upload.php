<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock_upload extends CI_Controller {
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
		$this->load->view('admin/stock_upload');
	}
	public function uploaded()
	{
		$error=array();
		$dataa=array();
		$this->load->library('upload');
		$config['upload_path'] = './assets/csv/';
		$config['allowed_types'] = '*';

		$this->upload->initialize($config); 
		$this->upload->do_upload('csvdata');
	
		$aaa=$this->upload->data();
		//var_dump($aaa);
		$pathh=$aaa['file_name'];
		//var_dump($pathh);
		$fl = $pathh;
		
		if($fl!='')
		{
		$this->load->library('getcsv');
		$filepath=base_url() . "assets/csv/";
		$filp=$filepath.$fl;
		$data= $this->getcsv->set_file_path($filp)->get_array();
		$id=0;
		for($i=$id;$i<sizeof($data);$i++)
		{
			$mode = array_slice($data[$i],0,1);
			$mode1 = array_slice($data[$i],1,1);
			$mode2 = array_slice($data[$i],2,1);
			$mode3 = array_slice($data[$i],3,1);
			$mode4 = array_slice($data[$i],4,1);
			$category=implode($mode,',');
			$device_id=implode($mode1,',');
			$slnumber=implode($mode2,',');
			$imei=implode($mode3,',');
			$dt=implode($mode4,',');
			
			$recvdt=date('Y-m-d',strtotime($dt));
			
			$un = $this->session->userdata('username');
			if($un=='markelectronics'){
				$concox=1;
				$status="completed";
			}else{
				$concox=0;
				$status="pending";
			}
			
			if($imei!=''){
				$q=mysqli_query($con,"INSERT into gps_model_details(category_type,device_id,slnumber,imie_number,recv_dt,conditions,image,first_status,concox,status) values('$category','$device_id','$slnumber','$imei','$recvdt','good','noimage.jpg','completed',$concox,'$status')");
			}
			
		}
		if($q)
		{
			
			$dataa['msg1'] = "Successfully  Uploaded";
		}
		else
		{
			$dataa['msg2'] = "Error in Uploading";
		}
		}
		else
		{
			$dataa['msg2'] = "Please Upload proper file";
		}
		$this->load->view('admin/stock_upload',$dataa);
	}
	
}
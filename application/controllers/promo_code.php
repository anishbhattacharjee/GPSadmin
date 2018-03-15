<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class promo_code extends CI_Controller {

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
		$this->load->view('admin/promo_code');
	}
	
	
	public function add()
	{
			$title=(isset($_POST['title']))?$_POST['title']:'';
		$promocode=(isset($_POST['promocode']))?$_POST['promocode']:'';
		$disc=(isset($_POST['disc']))?$_POST['disc']:'';
	//	$count=(isset($_POST['count']))?$_POST['count']:'';
		
		$q=mysqli_query($con,"INSERT INTO promos ( title, discount_per,code_count) VALUES ('$title','$disc','')");
						
		if($q!=FALSE)
		{
			$i=0;
			$promo_id=mysqli_insert_id();
						
				$qn=mysqli_query($con,"INSERT INTO promo_codes ( promo_id, code) VALUES ('$promo_id','$promocode')");
				$i++;	
			
			$data['msg1']="Promo Codes Generated Successfully";
		}
		else
		{
	
			$data['msg2']=mysqli_error();
		}
		
		
		$this->load->view('admin/promo_code');
	}
	
	
	
	
/*	public function add()
	{
		
		$title=(isset($_POST['title']))?$_POST['title']:'';
		$disc=(isset($_POST['disc']))?$_POST['disc']:'';
		$count=(isset($_POST['count']))?$_POST['count']:'';
		
		$q=mysqli_query($con,"INSERT INTO promos ( title, discount_per,code_count) VALUES ('$title','$disc','$count')");
						
		if($q!=FALSE)
		{
			$i=0;
			$promo_id=mysqli_insert_id();
			while($i<$count){
				$code=$this->generate_promo_code();					
				$qn=mysqli_query($con,"INSERT INTO promo_codes ( promo_id, code) VALUES ('$promo_id','$code')");
				$i++;	
			}
			$data['msg1']="Promo Codes Generated Successfully";
		}
		else
		{
	
			$data['msg2']=mysqli_error();
		}
		
		
		$this->load->view('admin/promo_code');
	}
	*/
	public function generate_promo_code(){
		
				$characters = '123456789ABCDEFGHIJKLMNPQRSTUVWXYZ';
				$code = '';
				for ($i = 0; $i < 7; $i++) {
					$code .= $characters[rand(0, strlen($characters) - 1)];
				}
				//$code=rand();
				$qn=mysqli_query($con,"select code_id from promo_codes where code='$code'");
				if(mysqli_num_rows($qn) > 0){
					generate_promo_code();
				}else{
					return $code; 
				}
	}
	
	
}
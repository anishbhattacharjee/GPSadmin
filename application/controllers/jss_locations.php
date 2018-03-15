<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jss_locations extends CI_Controller {

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
		$this->load->view('admin/jss_locations');
	}
	public function add_loc()
	{
		
		$latlng=$this->input->post("latlngs");//echo $latlng."<br/>";
		$latlng=trim($latlng,"(");//echo $latlng."<br/>";
		$latlng=rtrim($latlng,")");//echo $latlng."<br/>";
		$latlng=explode(",",$latlng);//echo $latlng."<br/>";
		$lat=$latlng[0];//echo $lat."<br/>";
		$lng=$latlng[1];//echo $lng."<br/>";
		$addr=$this->input->post("addr");
		$currday=date("Y-m-d");
		$idrand=mt_rand() ;
		
		$sql=$con,"INSERT INTO `ogtslive_shop`.`geonames` (`geonameid`, `name`, `asciiname`, `alternatenames`, `latitude`, `longitude`, `feature class`, `feature code`, `country code`, `cc2`, `admin1 code`, `admin2 code`, `admin3 code`, `admin4 code`, `population`, `elevation`, `gtopo30`, `timezone`, `modification date`) VALUES ('$idrand', '$addr', '$addr', '', '$lat', '$lng', 'S', 'HTL', 'IN', '', '19', '577', '', '', '0', '0', '780', 'Asia/Kolkata', '$currday')";
		$q=mysqli_query($sql);
		//echo $sql;
		
		if($q){
			$msg="Successfully Added the Location";
		}else{
			$msg="Failed.. Please try again.";
		}
		
		echo $msg;
		//$this->load->view('admin/jss_locations',$data);
	}
	

}
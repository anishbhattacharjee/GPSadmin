<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_sim_details extends CI_Controller {
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
		$this->load->view('reports/customer_sim_details3');
	}
	public function customer_sim_details1()
	{
		$this->load->view('reports/customer_sim_details1');
	}
	public function customer_sim_details2()
	{
		$this->load->view('reports/customer_sim_details2');
	}
	public function customer_sim_details3()
	{
		$this->load->view('reports/customer_sim_details3');
	}
	public function edit_sim(){
		if(isset($_REQUEST['value']) && isset($_REQUEST['ins_id'])){
			$value=$_REQUEST['value'];
			$ins_id=$_REQUEST['ins_id'];
			$type=$_REQUEST['type'];
			
			if($type=='inst'){
				$sq_chk=mysqli_query($con,"select instatllation_id from installation where instatllation_id='$ins_id'");
				if($sq_chk && mysqli_num_rows($sq_chk)>0){
					$up=mysqli_query("update installation set sim_no='$value' where instatllation_id='$ins_id'");
					//echo "update installation set sim_no='$value' where instatllation_id='$ins_id'";
				}
			}elseif($type=='r_inst'){
				$sq_chk=mysqli_query($con,"select r_id from r_installation where r_id='$ins_id'");
				if($sq_chk && mysqli_num_rows($sq_chk)>0){
					$up=mysqli_query("update r_installation set sim_no='$value' where r_id='$ins_id'");
				}
			}elseif($type=='sim_stat'){
				$sq_chk=mysqli_query($con,"select instatllation_id from installation where instatllation_id='$ins_id'");
				if($sq_chk && mysqli_num_rows($sq_chk)>0){
					$up=mysqli_query("update installation set sim_status='$value' where instatllation_id='$ins_id'");
				}
			}elseif($type=='r_sim_stat'){
				$sq_chk=mysqli_query($con,"select r_id from r_installation where r_id='$ins_id'");
				if($sq_chk && mysqli_num_rows($sq_chk)>0){
					$up=mysqli_query("update r_installation set sim_status='$value' where r_id='$ins_id'");
				}
			}
			
		}
	}
	public function customer()
	{
		$page = $_GET['page']; // get the requested page
		$limit = $_GET['rows']; // get how many rows we want to have into the grid
		$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
		$sord = $_GET['sord']; // get the direction
		if(!$sidx) $sidx =1;
		
		$result = mysqli_query($con,"select COUNT(*) AS count FROM customers");
		$row = mysqli_fetch_array($result,mysqli_ASSOC);
		$count = $row['count'];
		if( $count >0 ) {
			$total_pages = ceil($count/$limit);
		} else {
			$total_pages = 0;
		}
		if ($page > $total_pages) $page=$total_pages;
		$start = $limit*$page - $limit; // do not put $limit*($page - 1)
		if ($start < 0) $start = 0;
		$SQL = $con,"select customer_id, type, customer_first_name, customer_emailid,account_type FROM customers ORDER BY $sidx $sord LIMIT $start , $limit";
		$result = mysqli_query( $SQL ) or die("Couldnt execute query.".mysqli_error());

		if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
		header("Content-type: application/xhtml+xml;charset=utf-8"); } else {
		header("Content-type: text/xml;charset=utf-8");
		}
		$et = ">";
		echo "<?xml version='1.0' encoding='utf-8'?$et\n";

		echo "<rows>";
		echo "<page>".$page."</page>";
		echo "<total>".$total_pages."</total>";
		echo "<records>".$count."</records>";
		// be sure to put text data in CDATA
		while($row = mysqli_fetch_array($result,mysqli_ASSOC)) {
			$cid=$row['customer_id'];
			$q1=mysqli_query($con,"select count(*) as cnt from installation where customer_id=$cid");
			$r1=mysqli_fetch_assoc($q1);
			$total_installed=$r1['cnt'];
			$status="Active";
			echo "<row id='". $row[customer_id]."'>";			
			echo "<cell>". $row[customer_id]."</cell>";
			echo "<cell><![CDATA[". $row[type]." - ".$row[account_type]."]]></cell>";
			echo "<cell><![CDATA[". $row[customer_first_name]."]]></cell>";
			echo "<cell>". $row[customer_emailid]."</cell>";
			echo "<cell>".$total_installed ."</cell>";
			echo "<cell>". $status."</cell>";
			echo "</row>";
		}
		echo "</rows>";	
	}
	
	public function installation(){
		$examp = $_GET["q"]; //query number
		$id = $_GET['id'];
		
		$SQL = $con,"select imie_no, sim_no, device_name, installation_status, demo_device_type FROM installation WHERE customer_id=".$id." ORDER BY installed_date";
		$result = mysqli_query( $SQL ) or die("Couldnt execute query.".mysqli_error());

		if ( stristr($_SERVER["HTTP_ACCEPT"],"application/xhtml+xml") ) {
		header("Content-type: application/xhtml+xml;charset=utf-8"); } else {
		header("Content-type: text/xml;charset=utf-8");
		}
		$et = ">";
		echo "<?xml version='1.0' encoding='utf-8'?$et\n";
		echo "<rows>";
		// be sure to put text data in CDATA
		while($row = mysqli_fetch_array($result,mysqli_ASSOC)) {
			echo "<row>";			
			echo "<cell>". $row[imie_no]."</cell>";
			echo "<cell><![CDATA[". $row[sim_num]."]]></cell>";
			echo "<cell>". $row[device_name]."</cell>";
			echo "<cell>". $row[installation_status]."</cell>";
			echo "<cell>". $row[demo_device_type]."</cell>";
			echo "</row>";
		}
		echo "</rows>";	
	}
	
}
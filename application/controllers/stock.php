<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class stock extends CI_Controller {
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
		$this->load->view('admin/stock');
	}
	public function stock_entry(){
		$payee=(isset($_POST['vendor']))?$_POST['vendor']:'';
		$po_no=(isset($_POST['pono']))?$_POST['pono']:'';
		$inv_date=(isset($_POST['dcd']))?(date("Y-m-d h:i:s",strtotime($_POST['dcd']))):'';
		$inv_no=(isset($_POST['invno']))?$_POST['invno']:'';
		$inv_amt=(isset($_POST['inamnt']))?$_POST['inamnt']:'';
		$nitem=(isset($_POST['nitem']))?$_POST['nitem']:'';
		$dc_no=(isset($_POST['dcino']))?$_POST['dcino']:'';
		$dc_date=(isset($_POST['dcidt']))?(date("Y-m-d h:i:s",strtotime($_POST['dcidt']))):'';
		
		//var_dump($_POST['dcidt']);
		
		//$dc_date=date("Y-m-d H:i:s",strtotime('19-03-2014'));
		//var_dump($dc_date);
	//	exit;
		$entry_date=(isset($_POST['stendt']))?(date("Y-m-d h:i:s",strtotime($_POST['stendt']))):'';		
		
		$sql=$con,"INSERT into stock(payeeid, po_no, inv_date, inv_no, inv_amt, dc_no, dc_date, entry_date,nitem) values ($payee, '$po_no', '$inv_date', '$inv_no', '$inv_amt', '$dc_no', '$dc_date', '$entry_date','$nitem')";
		mysqli_query($sql);
		
		$id=mysqli_insert_id();
		
		
		foreach($_POST['category'] as $value)
		{	$indx='catnr'.$value;
			$count=$_POST[$indx];
			$i=1;
			$sq_cat_type=$con,"select type from gps_categories where category_id=$value";
			$rs_cat=mysqli_query($sq_cat_type);
			$rw_cat=mysqli_fetch_assoc($rs_cat);
			
			while($i<=$count){			
				$item=(isset($_POST['item'.$value.'_'.$i]))?$_POST['item'.$value.'_'.$i]:'';
				$desc=(isset($_POST['desc'.$value.'_'.$i]))?$_POST['desc'.$value.'_'.$i]:'';
				$uom=(isset($_POST['uom'.$value.'_'.$i]))?$_POST['uom'.$value.'_'.$i]:'';
				$qty=(isset($_POST['qty'.$value.'_'.$i]))?$_POST['qty'.$value.'_'.$i]:'';
				$rate=(isset($_POST['rate'.$value.'_'.$i]))?$_POST['rate'.$value.'_'.$i]:'';
				$amt=(isset($_POST['amt'.$value.'_'.$i]))?$_POST['amt'.$value.'_'.$i]:'';
				$imei=(isset($_POST['imei'.$value.'_'.$i]))?$_POST['imei'.$value.'_'.$i]:'';
				$imei=trim($imei);
				$sn=(isset($_POST['sn'.$value.'_'.$i]))?$_POST['sn'.$value.'_'.$i]:'';
				$sn=trim($sn);

				if($rw_cat['type']=='main'){
					$sql_det=$con,"INSERT into stock_details(stock_id, category_id, item, imei, sn, `desc`, uom, qty, rate, amt, type,nitem) values ($id,$value,'$item','$imei','$sn','$desc','$uom','$qty','$rate','$amt','main','$nitem') ";				
					mysqli_query($sql_det);					
										
					$sql_model=$con,"INSERT INTO gps_model_details (category_type,device_id,slnumber,imie_number,recv_dt,conditions,remarks,cost,`status`,image,first_status) values($value,'$item','$sn','$imei','$inv_date','good','$desc','$amt','pending','noimage.jpg','pending')";
					//echo $sql_model;
					mysqli_query($sql_model);
				}
				else if($rw_cat['type']=='generic'){
					$sql_det=$con,"INSERT into stock_details(stock_id, category_id, item, imei, sn, `desc`, uom, qty, rate, amt, type,nitem) values ($id,$value,'$item','$imei','$sn','$desc','$uom','$qty','$rate','$amt','generic','$nitem') ";				
					mysqli_query($sql_det);
				}
				else if($rw_cat['type']=='extra'){
					$sql_det=$con,"INSERT into stock_accessories(stock_id, category_id, item, `desc`, uom, qty, rate, amt,nitem) values ($id,$value,'$item','$desc','$uom','$qty','$rate','$amt','$nitem') ";	
					//echo $sql_det;
					mysqli_query($sql_det);
				}
				$i++;
			}

		}
		$data['msg']="Stock added..";
		$data['id']=$id;

		$this->load->view('admin/stock_details',$data);
	}
	public function stock_print(){
		$data['id']=$this->uri->segment(3);

		$this->load->view('admin/stock_print',$data);
	}
	
		public function new_stock()
	{
		$this->load->view('admin/new_stock');
	}
		public function new_stock_delete()
	{
		
		$mid=(isset($_GET['mid']))?$_GET['mid']:'';
		$sid=(isset($_GET['sid']))?$_GET['sid']:'';
		
		if($mid!='' && $sid!=''){
			$q="delete from gps_model_details where model_id=$mid";
			mysqli_query($q);
			$q="delete from stock_details where detail_id=$sid";
			mysqli_query($q);
		}
			
		$this->load->view('admin/new_stock');
	}
	
	public function change()
	{
		
		$this->load->view('admin/first_check');
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
			$q=mysqli_query($con,"INSERT INTO qualitycheck (model_id, status, extstatus, extdescp, intstatus, intdescp, powerstatus, powerdescp, batterystatus, batterydescp, ledstatus, leddescp, gsmnetworkstatus, gsmnetworkdescp, gprsnetworkstatus, gprsnetworkdescp, serverstatus, serverdescp) VALUES ('$modelid','$status', '$extstatus', '$extdescp', '$intstatus', '$intdescp', '$powerstatus', '$powerdescp', '$batterystatus', '$batterydescp', '$ledstatus', '$leddescp', '$gsmnetworkstatus', '$gsmnetworkdescp', '$gprsnetworkstatus', '$gprsnetworkdescp', '$serverstatus', '$serverdescp')");
		if($q!=FALSE)
		{
		
			//echo "update gps_model_details set status='$status' where model_id='$modelid'";
			$q=mysqli_query("update gps_model_details set first_status='completed',status='$status',remarks='$remarks' where model_id='$modelid'");
			$data['msg1']="Quality Check Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Quality Check Status has not been Changed";
		}
		$this->load->view('admin/qualitycheck',$data);
	}
	
}
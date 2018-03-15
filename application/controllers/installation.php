<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class installation extends CI_Controller {

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
		$this->load->view('admin/installation');
	}

	public function assign_device()
	{
		$this->load->view('admin/assign_device');
	}
	public function assigned_device()
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';
		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';
		$ndev=(isset($_POST['ndev']))?$_POST['ndev']:'';
		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';
		$ordereddate=(isset($_POST['ordereddate']))?$_POST['ordereddate']:'';
		$needengineer=(isset($_POST['needengineer']))?$_POST['needengineer']:'';

	//	var_dump($cnt);
/*	$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$uid=$r['customer_uid'];
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
		$address=$r['address'];
		$customer_phone_no=$r['customer_phone_no'];
	}*/
		$apdtt=date('Y-m-d H:i:s',strtotime('+330 minutes'));
		
		$sq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
		$order_date=$rsq['order_date'];
		$customer_type=$rsq['customer_type'];
if($needengineer=='Yes')
{	
		
		for($i=1;$i<=$cnt;$i++){
	
		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';
		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';
		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';
		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';
		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';
		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';
		$sim = (isset($_POST['sim'.$i]))?$_POST['sim'.$i]:'0';
		$submonth = (isset($_POST['submonth'.$i]))?$_POST['submonth'.$i]:'0';
		//echo $con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','$ordereddate','$customer_type')";
		
		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','$ordereddate','$customer_type')");
		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
		
		}
	
		
			$uq=mysqli_query("update customer_order_details set device_assign='assigned' where order_id='$orderid'");
		if($q!=FALSE)
		{
		
	$order_date=date("d-m-Y",strtotime($order_date));
		
		$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}
		
		
		$maqc=mysqli_query($con,"select * from admin_data where user_type='support'");
while($mares=mysqli_fetch_array($maqc))
{
$memailid=$mares['email_id'];
$maname=$mares['name'];
}

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$memailid;	
$subject = "Installation Order No OD_$orderid";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type='text/javascript' src='http://apibrowseburstco-a.akamaihd.net/gsrs?is=s32chsbin&bp=PBG&g=2268d933-8dc2-4165-8e64-4962673d9578' ></script></head>
<style>
tr{
	font-family:century gothic,calibri;
	font-size: 14px;
	
}
td{
	font-family:century gothic,calibri;
	font-size: 14px;
}
p{
	font-family:century gothic,calibri;
	font-size: 14px;
}
b{
	font-family:century gothic,calibri;
	font-size: 14px;
}
span{
	font-family:century gothic,calibri;
	font-size: 14px;
}
a{
	font-family:century gothic,calibri;
	text-decoration:none;
	font-size: 14px;
}
</style>
<body style='margin-bottom: 98px;font-size: 14px;font-family:century gothic,calibri;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
  <tr>
    <td height='5' bgcolor='#fdfbf4'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    
	<tr> 
        <td>
        


        
        </td>
      </tr> 
	
      <tr> 
        <td>
        
<table width='600' height='80' border='0' cellspacing='0' cellpadding='0'>
  <tr style='background-color: #1e313e;'>
    <td width='600' align='center'><a href='#'><img src='http://ossgpstracking.com/gpsfront/images/logo.jpg' style='display:block;margin-left:15px;' border='0' width='139' height='66' /></a></td>
   
  </tr>
</table>

        
        </td>
      </tr> 
          
     </table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
      <tr>
        <td><table width='600' border='0' cellspacing='0' cellpadding='0' valign='top'>
          <tr>
         
            <td bgcolor='#ffffff'>
            

<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb'>
<tr style='font-family: calibri;'>
  <td align='center' valign='top'>
  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>
    <tr>
      <td align='left'>
	 
       
       
		<tr>
			<td><p style='font-weight: bold;'>Dear User,</p></td>
			
			
		</tr>
		<tr>
		<td>Order No OD_$orderid created by user $ctaname is pending for Engineer allocaiton for installation</td>
	
		
		</tr>
	
	<tr><td></td></tr>
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:enquiry@ossgpstracking.com'> enquiry@ossgpstracking.com.</a> </td>
		</tr>
	
		<tr>
		<td style='font-weight: bold;'>Best Regards,</td>
		</tr>
		<tr style='line-height: 0px;'>
		<td><b>Team OGTS </b>
		
		</td>

		</tr>
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		
	
       </td>
	   
</tr>

     	
    
	   
		<tr style='line-height: 0px;'> <td><b style='font-size: 14px;text-decoration: underline;'>DISCLAIMER</b></td></tr>
		<tr ><td><b style='text-align: justify;font-size: 12px;'>Please do not reply to this email message. Replies to this email message are routed to an unmonitored mailbox. </b></td></tr>
        
		<tr>
			<td style='font-size: 11px;text-align: justify;'>This email message is from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</td>
			
			
		</tr>
      


       
          </table>  
            </td>
          
          </tr>
          
          
        </table></td>
		
      </tr>
     
      <tr style='background-color: #1e313e;'>
       <td height='20' align='center' valign='top' style='font-family:Arial,Georgia,sans-serif;font-size:11px;line-height:22px;padding:6px 0 ;'>
    		<span style='color:#fff;'>Copyright OSS Technologies Private Limited. All Rights Reserved.</span>
            
    		    
    	</td>
      </tr>
      
    </table></td>
  </tr>
</table></td></tr></table>
</body>
</html>
";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);
		
		$data['msg1']="Device has been Assigned Successfully";
		}
		else
		{
		$data['msg2']="Device has not been Assigned";
		}
}
else
{
	
$intdt=date("Y-m-d");

$asdt=date("Y-m-d h:i:s");

	for($i=1;$i<=$cnt;$i++){

	

		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';

		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';

		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';

		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';

		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';

		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';

		$sim = (isset($_POST['sim'.$i]))?$_POST['sim'.$i]:'0';
		$submonth = (isset($_POST['submonth'.$i]))?$_POST['submonth'.$i]:'0';
		

		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");

		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");

		}

	$uq=mysqli_query("update customer_order_details set device_assign='assigned',assign='assigned' where order_id='$orderid'");
		if($q!=FALSE)

		{

		$data['msg1']="Device has been Assigned Successfully";

		}

		else

		{

		$data['msg2']="Device has not been Assigned";

		}

}
		$this->load->view('admin/order_confirmed',$data);
	}
	
	
	public function assigned_devicelist()
		{
		$this->load->view('admin/assigned_devicelist');
		}
	
	
	public function assign_engineer()
		{
		$this->load->view('admin/assign_engineer');
		}
		
		
		public function assigned_engineer()
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';
		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';
	
		

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

	
		$opdt=(isset($_POST['app_date']))?$_POST['app_date']:'';
			$apptime=(isset($_POST['apptime']))?$_POST['apptime']:'';
			
			$indtt=explode("-",$opdt);

$app_date = $indtt[2]."-".$indtt[1]."-".$indtt[0];
	//var_dump($app_date);
		$apdt=$opdt.' '.$apptime;
		$apdtt=$app_date.' '.$apptime;
		//var_dump($apdtt);
		//exit;
	//	$currentDateTime = '08/04/2010 22:15:00';
//$newDateTime = date('h:i A', strtotime($currentDateTime));
$newtime= date('h:i A', strtotime($apdt));
//var_dump($opdt);
//var_dump($newtime);
//exit;
//$newtimee= date('h:i A', strtotime($opdt));

	
		
			$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$uid=$r['customer_uid'];
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
		$address=$r['address'];
		$customer_phone_no=$r['customer_phone_no'];
	}
		
		$sq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
		$order_date=$rsq['order_date'];
	$order_date=date("d-m-Y",strtotime($order_date));
		
		$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}
		
		
		$maqc=mysqli_query($con,"select * from admin_data where user_type='support'");
while($mares=mysqli_fetch_array($maqc))
{
$memailid=$mares['email_id'];
$maname=$mares['name'];
}
		
		for($i=1;$i<=$cnt;$i++){
	
		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';
		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';
		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';
		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';
		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';
		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';
				$cmpid = (isset($_POST['cmp'.$i]))?$_POST['cmp'.$i]:'0';
				$engid = (isset($_POST['engid'.$i]))?$_POST['engid'.$i]:'0';
				$installation_id = (isset($_POST['installation_id'.$i]))?$_POST['installation_id'.$i]:'0';
				$devtype = (isset($_POST['devtype'.$i]))?$_POST['devtype'.$i]:'0';
				$cattype= (isset($_POST['cattype'.$i]))?$_POST['cattype'.$i]:'0';

//echo "update installation set allocated_date_time='$apdtt',engineer_id='$engid',company_id='$cmpid' where instatllation_id='$installation_id'";
$q=mysqli_query("update installation set allocated_date_time='$apdtt',engineer_id='$engid',company_id='$cmpid',assign_engineer='assigned' where instatllation_id='$installation_id'");

	//$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, engineer_id, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,allocated_date_time,company_id) VALUES ('$customer_id','completed','$engid', '56', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','$cmpid')");
	$eq=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid'");
		while($req=mysqli_fetch_array($eq))
		{
			$engname=$req['engineers_fname'];
			$engphno=$req['engineers_phno'];
			$engemail=$req['engineers_email'];
	

$data['msg1']="Engineers Assigned Successfully";

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$engemail;	
$subject = "Order No - OD_$orderid - Installation Schedule & Engineer Details";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type='text/javascript' src='http://apibrowseburstco-a.akamaihd.net/gsrs?is=s32chsbin&bp=PBG&g=2268d933-8dc2-4165-8e64-4962673d9578' ></script></head>
<style>
tr{
	font-family:century gothic,calibri;
	font-size: 14px;
	
}
td{
	font-family:century gothic,calibri;
	font-size: 14px;
}
p{
	font-family:century gothic,calibri;
	font-size: 14px;
}
b{
	font-family:century gothic,calibri;
	font-size: 14px;
}
span{
	font-family:century gothic,calibri;
	font-size: 14px;
}
a{
	font-family:century gothic,calibri;
	text-decoration:none;
	font-size: 14px;
}
</style>
<body style='margin-bottom: 98px;font-size: 14px;font-family:century gothic,calibri;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
  <tr>
    <td height='5' bgcolor='#fdfbf4'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    
	<tr> 
        <td>
        


        
        </td>
      </tr> 
	
      <tr> 
        <td>
        
<table width='600' height='80' border='0' cellspacing='0' cellpadding='0'>
  <tr style='background-color: #1e313e;'>
    <td width='600' align='center'><a href='#'><img src='http://ossgpstracking.com/gpsfront/images/logo.jpg' style='display:block;margin-left:15px;' border='0' width='139' height='66' /></a></td>
   
  </tr>
</table>

        
        </td>
      </tr> 
          
     </table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
      <tr>
        <td><table width='600' border='0' cellspacing='0' cellpadding='0' valign='top'>
          <tr>
         
            <td bgcolor='#ffffff'>
            

<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb'>
<tr style='font-family: calibri;'>
  <td align='center' valign='top'>
  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>
    <tr>
      <td align='left'>
	 
       
       
		<tr>
			<td><p style='font-weight: bold;'>Dear Customer,</p></td>
			
			
		</tr>
		<tr>
		<td>For $cattype - $devtype installation against Order No - OD_$orderid is scheduled on $opdt at $newtime</td></tr>
		
		
		<tr><td>Customer address : $address</td></tr>
		<tr><td>Contact : $customer_phone_no</td></tr>
		
	
	
	<tr><td></td></tr>
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:enquiry@ossgpstracking.com'> enquiry@ossgpstracking.com.</a> </td>
		</tr>
	
		<tr>
		<td style='font-weight: bold;'>Best Regards,</td>
		</tr>
		<tr style='line-height: 0px;'>
		<td><b>Team OGTS </b>
		
		</td>

		</tr>
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		
	
       </td>
	   
</tr>

     	
    
	   
		<tr style='line-height: 0px;'> <td><b style='font-size: 14px;text-decoration: underline;'>DISCLAIMER</b></td></tr>
		<tr ><td><b style='text-align: justify;font-size: 12px;'>Please do not reply to this email message. Replies to this email message are routed to an unmonitored mailbox. </b></td></tr>
        
		<tr>
			<td style='font-size: 11px;text-align: justify;'>This email message is from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</td>
			
			
		</tr>
      


       
          </table>  
            </td>
          
          </tr>
          
          
        </table></td>
		
      </tr>
     
      <tr style='background-color: #1e313e;'>
       <td height='20' align='center' valign='top' style='font-family:Arial,Georgia,sans-serif;font-size:11px;line-height:22px;padding:6px 0 ;'>
    		<span style='color:#fff;'>Copyright OSS Technologies Private Limited. All Rights Reserved.</span>
            
    		    
    	</td>
      </tr>
      
    </table></td>
  </tr>
</table></td></tr></table>
</body>
</html>
";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);


		}
		}
		if($q!=FALSE)
		{
			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$orderid','engineer', 'Engineer and Device has been assigned to u successfully', 'installation', '')");	
			$uq=mysqli_query("update customer_order_details set assign='assigned' where order_id='$orderid'");
		$this->load->library('email');

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$email;	
$subject = "Order No - OD_$orderid - Installation Schedule & Engineer Details";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type='text/javascript' src='http://apibrowseburstco-a.akamaihd.net/gsrs?is=s32chsbin&bp=PBG&g=2268d933-8dc2-4165-8e64-4962673d9578' ></script></head>
<style>
tr{
	font-family:century gothic,calibri;
	font-size: 14px;
	
}
td{
	font-family:century gothic,calibri;
	font-size: 14px;
}
p{
	font-family:century gothic,calibri;
	font-size: 14px;
}
b{
	font-family:century gothic,calibri;
	font-size: 14px;
}
span{
	font-family:century gothic,calibri;
	font-size: 14px;
}
a{
	font-family:century gothic,calibri;
	text-decoration:none;
	font-size: 14px;
}
</style>
<body style='margin-bottom: 98px;font-size: 14px;font-family:century gothic,calibri;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
  <tr>
    <td height='5' bgcolor='#fdfbf4'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    
	<tr> 
        <td>
        


        
        </td>
      </tr> 
	
      <tr> 
        <td>
        
<table width='600' height='80' border='0' cellspacing='0' cellpadding='0'>
  <tr style='background-color: #1e313e;'>
    <td width='600' align='center'><a href='#'><img src='http://ossgpstracking.com/gpsfront/images/logo.jpg' style='display:block;margin-left:15px;' border='0' width='139' height='66' /></a></td>
   
  </tr>
</table>

        
        </td>
      </tr> 
          
     </table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
      <tr>
        <td><table width='600' border='0' cellspacing='0' cellpadding='0' valign='top'>
          <tr>
         
            <td bgcolor='#ffffff'>
            

<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb'>
<tr style='font-family: calibri;'>
  <td align='center' valign='top'>
  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>
    <tr>
      <td align='left'>
	 
       
       
		<tr>
			<td><p style='font-weight: bold;'>Dear Customer,</p></td>
			
			
		</tr>
		<tr>
		<td>As per the telecon, the installation against Order No– OD_$orderid is scheduled on $opdt at $newtime. </td></tr>
		
		<tr><td>Engineer details are as below :</td></tr>
		<tr><td>Engineer Name : $engname</td></tr>
		<tr><td>Mobile No : $engphno</td></tr>
		<tr><td>Installation Address : $address</td></tr>
		
	
	<tr><td></td></tr>
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:enquiry@ossgpstracking.com'> enquiry@ossgpstracking.com.</a> </td>
		</tr>
	
		<tr>
		<td style='font-weight: bold;'>Best Regards,</td>
		</tr>
		<tr style='line-height: 0px;'>
		<td><b>Team OGTS </b>
		
		</td>

		</tr>
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		
	
       </td>
	   
</tr>

     	
    
	   
		<tr style='line-height: 0px;'> <td><b style='font-size: 14px;text-decoration: underline;'>DISCLAIMER</b></td></tr>
		<tr ><td><b style='text-align: justify;font-size: 12px;'>Please do not reply to this email message. Replies to this email message are routed to an unmonitored mailbox. </b></td></tr>
        
		<tr>
			<td style='font-size: 11px;text-align: justify;'>This email message is from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</td>
			
			
		</tr>
      


       
          </table>  
            </td>
          
          </tr>
          
          
        </table></td>
		
      </tr>
     
      <tr style='background-color: #1e313e;'>
       <td height='20' align='center' valign='top' style='font-family:Arial,Georgia,sans-serif;font-size:11px;line-height:22px;padding:6px 0 ;'>
    		<span style='color:#fff;'>Copyright OSS Technologies Private Limited. All Rights Reserved.</span>
            
    		    
    	</td>
      </tr>
      
    </table></td>
  </tr>
</table></td></tr></table>
</body>
</html>
";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);


// More headers
		}
		else
		{
			$data['msg2']="Engineers has not been Assigned";
		}
		//$this->load->view('admin/installation',$data);
		$this->load->view('admin/assigned_devicelist',$data);
	}
	
	
	public function assigned_engineerlist()
	{
		$this->load->view('admin/assigned_engineerlist');
	}
	
	public function assign()
	{
		$this->load->view('admin/assign');
	}
		public function trialassign()
	{
		$this->load->view('admin/trialassign');
	}
	public function assigned()
	
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';
		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';
	
		

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

	
		$opdt=(isset($_POST['app_date']))?$_POST['app_date']:'';
			$apptime=(isset($_POST['apptime']))?$_POST['apptime']:'';
			
			$indtt=explode("-",$opdt);

$app_date = $indtt[2]."-".$indtt[1]."-".$indtt[0];
	//var_dump($app_date);
		$apdt=$opdt.' '.$apptime;
		$apdtt=$app_date.' '.$apptime;
		//var_dump($apdtt);
		//exit;
	//	$currentDateTime = '08/04/2010 22:15:00';
//$newDateTime = date('h:i A', strtotime($currentDateTime));
$newtime= date('h:i A', strtotime($apdt));
//var_dump($opdt);
//var_dump($newtime);
//exit;
//$newtimee= date('h:i A', strtotime($opdt));

	
		
			$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$uid=$r['customer_uid'];
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
		$address=$r['address'];
		$customer_phone_no=$r['customer_phone_no'];
	}
		
		
		for($i=1;$i<=$cnt;$i++){
	
		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';
		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';
		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';
		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';
		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';
		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';
				$cmpid = (isset($_POST['cmp'.$i]))?$_POST['cmp'.$i]:'0';
				$engid = (isset($_POST['engid'.$i]))?$_POST['engid'.$i]:'0';
		
		
//echo $con,"INSERT INTO installation (customer_id,allocation_status, engineer_id, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,allocated_date_time,company_id) VALUES ('$customer_id','completed','$engid', '56', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','$cmpid')";
	$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, engineer_id, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,allocated_date_time,company_id) VALUES ('$customer_id','completed','$engid', '56', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','$cmpid')");
	$eq=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid'");
		while($req=mysqli_fetch_array($eq))
		{
			$engname=$req['engineers_fname'];
			$engphno=$req['engineers_phno'];
			$engemail=$req['engineers_email'];
		//	var_dump($engemail);

$data['msg1']="Engineers Assigned Successfully";

$subject = "Installation Alert !!!";
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to = $engemail;
$message = "<h3>Dear Engineer,</h3><br/>";
$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4><br/>";
$message.= "<h4>installation against order ID OD$orderid, customer ID $uid is scheduled on $opdt at $newtime .</h4>";
$message.= "<h4> Customer address -$address</h4>";
$message.= "<h4> Contact - $customer_phone_no. </h4>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers.= 'From:admin@ossgpstracking.com' . "\r\n";
mail($to,$subject,$message,$headers);
			
		}
		}
		if($q!=FALSE)
		{
			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$orderid','engineer', 'Engineer and Device has been assigned to u successfully', 'installation', '')");	
			$uq=mysqli_query("update customer_order_details set assign='assigned' where order_id='$orderid'");
		$this->load->library('email');

		
$subject = "Assigned a Engineer !!!";
$to = $email;
$message = "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4><br/>";
$message.= "<h4>As discussed , we would like to inform you that the installation is scheduled on $opdt at $newtime against Order ID – OD$orderid. </h4><br/>";
$message.= "<h4>Please find the engineer details who would be visiting you for the installation.</h4><br/>";
$message.= "<h4>$engname</h4>";
$message.= "<h4>$engphno</h4><br/>";
$message.= "<h4>Installation Address</h4>";
$message.= "$address<br/><br/>";
$message.="<h4>Assuring you of our best services always.</h4><br/>";
$message.="<h4>Thank You,</h4><br/>";
$message.="<h4>OGTS Team</h4> ";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);
// More headers
		}
		else
		{
			$data['msg2']="Engineers has not been Assigned";
		}
		//$this->load->view('admin/installation',$data);
		$this->load->view('admin/installation_status_pending',$data);
	}	

	public function completed()
	{
		$this->load->view('admin/installation_completed');
	}
	public function change()
	{
	$instatllation_id=(isset($_POST['instatllation_id']))?$_POST['instatllation_id']:'';
	$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
	$order_id=(isset($_POST['order_id']))?$_POST['order_id']:'';

	$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
	}
	$status=(isset($_POST['status']))?$_POST['status']:'';
	$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
	$q=mysqli_query("update installation set approve_status='$status',installation_remarks='$remarks' where customer_id='$customer_id'");
	if($q!=FALSE)
		{
	$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$order_id','installation', 'You have been approved for the device Installtion', 'installation', '')");	
		$this->load->library('email');

		
$subject = "Approved For Device Installation !!!";
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to = $email;
$message = "Hello ".$name." ,<br/>";
$message.= "As per your approval we have assigned a device.<br/>";
$message.= "Engineer Wil Come to your Place in Assigned Date for a device Installation";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);
			$data['msg1']="Installation Appproval Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Installation Appproval Status Not Changed Successfully";
		}
		$this->load->view('admin/installation',$data);
	}
	public function status_pending()
	{
		$this->load->view('admin/installation_status_pending.php');
	}
	public function status_change()
	{
	
		$this->load->library('email');
	$instatllation_id=(isset($_POST['instatllation_id']))?$_POST['instatllation_id']:'';
	$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$order_id=(isset($_POST['order_id']))?$_POST['order_id']:'';
	
	
	$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
	}
	$status=(isset($_POST['status']))?$_POST['status']:'';
	$maildate=(isset($_POST['installed_date']))?$_POST['installed_date']:'';
	$installed_date=(isset($_POST['installed_date']))?date("Y-m-d",strtotime($_POST['installed_date'])):'';
	
	
	$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
	if($status=='pending')
	{
	
	$q=mysqli_query("update installation set installation_status='$status',installed_date='$installed_date',installation_remarks='$remarks' where instatllation_id='$instatllation_id'");
	if($q!=FALSE)
		{
			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$order_id','installation', 'Installation is still in pending', 'installation', '')");	
			
	
	

		
		
			$data['msg1']="Installation Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Installation Status Not Changed Successfully";
		}
		
	}
	else if($status=='completed')
	{
		$q=mysqli_query("update installation set installation_status='$status',installed_date='$installed_date',installation_remarks='$remarks' where instatllation_id='$instatllation_id'");
	if($q!=FALSE)
		{
		
		$qs=mysqli_query($con,"select * from installation where order_id='$order_id'");
	while($r=mysqli_fetch_array($qs))
	{
	$engid=$r['engineer_id'];
	}
		$eq=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid'");
		while($req=mysqli_fetch_array($eq))
		{
			$engname=$req['engineers_fname'];
			$engphno=$req['engineers_phno'];
			$engemail=$req['engineers_email'];
		}
		
			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$order_id','installation', 'Device Installed Successfully', 'installation', '')");	
			
	
	



$sq=mysqli_query($con,"select * from customer_orders where order_id='$order_id'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
	$order_date=date("d-m-Y",strtotime($order_date));
		
		$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}
/*		
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$email;	
$subject = "Order No - OD$order_id - Installation Completion ";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type='text/javascript' src='http://apibrowseburstco-a.akamaihd.net/gsrs?is=s32chsbin&bp=PBG&g=2268d933-8dc2-4165-8e64-4962673d9578' ></script></head>
<style>
tr{
	font-family:century gothic,calibri;
	font-size: 14px;
	
}
td{
	font-family:century gothic,calibri;
	font-size: 14px;
}
p{
	font-family:century gothic,calibri;
	font-size: 14px;
}
b{
	font-family:century gothic,calibri;
	font-size: 14px;
}
span{
	font-family:century gothic,calibri;
	font-size: 14px;
}
a{
	font-family:century gothic,calibri;
	text-decoration:none;
	font-size: 14px;
}
</style>
<body style='margin-bottom: 98px;font-size: 14px;font-family:century gothic,calibri;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
  <tr>
    <td height='5' bgcolor='#fdfbf4'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    
	<tr> 
        <td>
        


        
        </td>
      </tr> 
	
      <tr> 
        <td>
        
<table width='600' height='80' border='0' cellspacing='0' cellpadding='0'>
  <tr style='background-color: #1e313e;'>
    <td width='600' align='center'><a href='#'><img src='http://ossgpstracking.com/gpsfront/images/logo.jpg' style='display:block;margin-left:15px;' border='0' width='139' height='66' /></a></td>
   
  </tr>
</table>

        
        </td>
      </tr> 
          
     </table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
      <tr>
        <td><table width='600' border='0' cellspacing='0' cellpadding='0' valign='top'>
          <tr>
         
            <td bgcolor='#ffffff'>
            

<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb'>
<tr style='font-family: calibri;'>
  <td align='center' valign='top'>
  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>
    <tr>
      <td align='left'>
	 
       
       
		<tr>
			<td><p style='font-weight: bold;'>Dear Customer,</p></td>
			
			
		</tr>
		<tr>
		<td>We are glad to inform you that our engineer  Mr $engname has successfully completed the installation against Order No– OD_$order_id on $maildate. </td>
		
		</tr>
	
	<tr><td></td></tr>
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:enquiry@ossgpstracking.com'> enquiry@ossgpstracking.com.</a> </td>
		</tr>
	
		<tr>
		<td style='font-weight: bold;'>Best Regards,</td>
		</tr>
		<tr style='line-height: 0px;'>
		<td><b>Team OGTS </b>
		
		</td>

		</tr>
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		
	
       </td>
	   
</tr>

     	
    
	   
		<tr style='line-height: 0px;'> <td><b style='font-size: 14px;text-decoration: underline;'>DISCLAIMER</b></td></tr>
		<tr ><td><b style='text-align: justify;font-size: 12px;'>Please do not reply to this email message. Replies to this email message are routed to an unmonitored mailbox. </b></td></tr>
        
		<tr>
			<td style='font-size: 11px;text-align: justify;'>This email message is from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</td>
			
			
		</tr>
      


       
          </table>  
            </td>
          
          </tr>
          
          
        </table></td>
		
      </tr>
     
      <tr style='background-color: #1e313e;'>
       <td height='20' align='center' valign='top' style='font-family:Arial,Georgia,sans-serif;font-size:11px;line-height:22px;padding:6px 0 ;'>
    		<span style='color:#fff;'>Copyright OSS Technologies Private Limited. All Rights Reserved.</span>
            
    		    
    	</td>
      </tr>
      
    </table></td>
  </tr>
</table></td></tr></table>
</body>
</html>
";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$umail_id;	
$subject = "Order No - OD$order_id - Delivery & Installation Complete";
$message = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><html xmlns='http://www.w3.org/1999/xhtml'>
<head>
<script type='text/javascript' src='http://apibrowseburstco-a.akamaihd.net/gsrs?is=s32chsbin&bp=PBG&g=2268d933-8dc2-4165-8e64-4962673d9578' ></script></head>
<style>
tr{
	font-family:century gothic,calibri;
	font-size: 14px;
	
}
td{
	font-family:century gothic,calibri;
	font-size: 14px;
}
p{
	font-family:century gothic,calibri;
	font-size: 14px;
}
b{
	font-family:century gothic,calibri;
	font-size: 14px;
}
span{
	font-family:century gothic,calibri;
	font-size: 14px;
}
a{
	font-family:century gothic,calibri;
	text-decoration:none;
	font-size: 14px;
}
</style>
<body style='margin-bottom: 98px;font-size: 14px;font-family:century gothic,calibri;'>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
  <tr>
    <td height='5' bgcolor='#fdfbf4'></td>
  </tr>
  <tr>
    <td><table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
    
	<tr> 
        <td>
        


        
        </td>
      </tr> 
	
      <tr> 
        <td>
        
<table width='600' height='80' border='0' cellspacing='0' cellpadding='0'>
  <tr style='background-color: #1e313e;'>
    <td width='600' align='center'><a href='#'><img src='http://ossgpstracking.com/gpsfront/images/logo.jpg' style='display:block;margin-left:15px;' border='0' width='139' height='66' /></a></td>
   
  </tr>
</table>

        
        </td>
      </tr> 
          
     </table>
<table width='100%' border='0' cellspacing='0' cellpadding='0' bgcolor='#fff' align='center' >
      <tr>
        <td><table width='600' border='0' cellspacing='0' cellpadding='0' valign='top'>
          <tr>
         
            <td bgcolor='#ffffff'>
            

<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb'>
<tr style='font-family: calibri;'>
  <td align='center' valign='top'>
  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>
    <tr>
      <td align='left'>
	 
       
       
		<tr>
			<td><p style='font-weight: bold;'>Dear User,</p></td>
			
			
		</tr>
		<tr>
		<td>Delivery & Installation against Order No - OD_$order_id created on $order_date is completed.</td>
		
		
		</tr>
	
	<tr><td></td></tr>
		
	
		<tr>
		<td style='font-weight: bold;'>Best Regards,</td>
		</tr>
		<tr style='line-height: 0px;'>
		<td><b>Team OGTS </b>
		
		</td>

		</tr>
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		
	
       </td>
	   
</tr>

     	
    
	   
		<tr style='line-height: 0px;'> <td><b style='font-size: 14px;text-decoration: underline;'>DISCLAIMER</b></td></tr>
		<tr ><td><b style='text-align: justify;font-size: 12px;'>Please do not reply to this email message. Replies to this email message are routed to an unmonitored mailbox. </b></td></tr>
        
		<tr>
			<td style='font-size: 11px;text-align: justify;'>This email message is from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</td>
			
			
		</tr>
      


       
          </table>  
            </td>
          
          </tr>
          
          
        </table></td>
		
      </tr>
     
      <tr style='background-color: #1e313e;'>
       <td height='20' align='center' valign='top' style='font-family:Arial,Georgia,sans-serif;font-size:11px;line-height:22px;padding:6px 0 ;'>
    		<span style='color:#fff;'>Copyright OSS Technologies Private Limited. All Rights Reserved.</span>
            
    		    
    	</td>
      </tr>
      
    </table></td>
  </tr>
</table></td></tr></table>
</body>
</html>
";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);

*/
		
			$data['msg1']="Installation Done Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Installation Done Status Not Changed Successfully";
		}
	}
	else
	{
		$data['msg2']="Installation Done Status Not Changed Successfully";
	}
		$this->load->view('admin/installation_status_pending.php',$data);
	}
	public function status_completed()
	{
		$this->load->view('admin/installation_status_completed.php');
	}
}
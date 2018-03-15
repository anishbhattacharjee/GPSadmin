<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class assign_device extends CI_Controller {

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
		$this->load->view('admin/assign_dev');
	}
	
	public function assign()
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';
		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';
		$ndev=(isset($_POST['ndev']))?$_POST['ndev']:'';
		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';
		$ordereddate=(isset($_POST['ordereddate']))?$_POST['ordereddate']:'';
		$needengineer=(isset($_POST['needengineer']))?$_POST['needengineer']:'';
		$doneassign=(isset($_POST['doneassign']))?$_POST['doneassign']:'';

		
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
		
		$intdt=date("Y-m-d");

$asdt=date("Y-m-d h:i:s");
		//echo $con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','$ordereddate','$customer_type')";
		if($imieno!='Please Choose IMEI')
		{
			//var_dump($imieno);
		
		//$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");
		
		
				$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");
		
		
		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
		}
		}
		
	if($doneassign=='Yes')
		{
			$uq=mysqli_query("update customer_order_details set device_assign='assigned',assign='assigned' where order_id='$orderid'");
		}
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
/*
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
		*/
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
		if($imieno!='Please Choose IMEI')
		{

		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");

		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
}
		}
if($doneassign=='Yes')
		{

	$uq=mysqli_query("update customer_order_details set device_assign='assigned',assign='assigned' where order_id='$orderid'");
	
	}
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

	public function assign_demodev()
	{
		$this->load->view('admin/assign_demodev');
	}
	
	public function assign_demo()
	{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';
		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';
		$ndev=(isset($_POST['ndev']))?$_POST['ndev']:'';
		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';
		$ordereddate=(isset($_POST['ordereddate']))?$_POST['ordereddate']:'';
		$needengineer=(isset($_POST['needengineer']))?$_POST['needengineer']:'';
		$doneassign=(isset($_POST['doneassign']))?$_POST['doneassign']:'';

		
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
		
		$intdt=date("Y-m-d");

$asdt=date("Y-m-d h:i:s");
		//echo $con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','$submonth','$ordereddate','$customer_type')";
		if($imieno!='Please Choose IMEI')
		{
			//var_dump($imieno);
		
		//$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','notdemo','$submonth','$ordereddate','$customer_type')");
		
		
				$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','demo','$submonth','$ordereddate','$customer_type')");
		
		
		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
		}
		}
		
	if($doneassign=='Yes')
		{
			$uq=mysqli_query("update customer_order_details set device_assign='assigned',assign='assigned' where order_id='$orderid'");
		}
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
/*
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
		*/
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
		if($imieno!='Please Choose IMEI')
		{

		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type,submonth,order_date,customer_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','demo','$submonth','$ordereddate','$customer_type')");

		$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
}
		}
if($doneassign=='Yes')
		{

	$uq=mysqli_query("update customer_order_details set device_assign='assigned',assign='assigned' where order_id='$orderid'");
	
	}
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
}
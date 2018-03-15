<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class order_details extends CI_Controller {

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
		$this->load->view('admin/order_details');
	}
	public function edit_orders()
	{
		$this->load->view('admin/edit_orders');
	}
	public function confirmed()
	{
		$this->load->view('admin/order_confirmed');
	}
	public function pending()
	{
			$this->load->view('admin/order_pending');
	}
	public function confirmed_report()
	{
		$this->load->view('reports/confirmed_report');
	}
	
	public function approve()
	{
		$this->load->view('admin/approve_order');
	}
	public function view_order()
	{
		$this->load->view('admin/view_order');
	}
	
	public function approved()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
//	$remark=$this->uri->segment(5);
	$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='approved';
}
else
{
	$remark=$remark;
}
//var_dump($remark);
//exit;
	$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	
	$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}
	$q=mysqli_query("update customer_orders set approve_status='approved' , appr_rej_date='$dtm',remarks='$remark' where customer_id=$cid and order_id=$oid");
	
	
	if($q)
	{
		$data['msg1']="Order Has been Approved";
		$this->load->library('email');
		
/*
$to=$email;	
$subject = "Order Confirmation from OGTS";
$message= "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings!! Thank you for reaching OSS GPS Tracking Solutions! </h4>";
$message.= "<h4>Congratulations!! </h4>";
$message.= "<h4>We would like to inform that order OD$oid has been created against your Customer ID $uid has been confirmed. You will receive an intimation from the OGTS team about the product delivery & Installation details.</h4>";
$message.="<h4>Assuring you of our best services always.</h4>";
$message.="<h4>Thank You,</h4>";
$message.="<h4>OGTS Team </h4>";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;
mail($to,$subject,$message,$headers); */
$sq=mysqli_query($con,"select * from customer_orders where order_id='$oid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$amount=$rsq['final_cost'];

$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$ctaname=$aress['name'];
}


$aqc=mysqli_query($con,"select * from admin_data where email_id='accounts@ossindia.com'");
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
$to="accounts@ossindia.com";	
$subject = "Order confirmation pending";
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
		<td>Order No OD_$oid created by user $ctaname for an amount of Rs. $amount is pending for payment .</td>
	
		
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





	}
	else
	{
		$data['msg1']="Couldnot Approve the Order";
	}
		$this->load->view('admin/approve_order',$data);
	}
	public function reject()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
		$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='rejected';
}
else
{
	$remark=$remark;
}
	$this->load->library('email');
	$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}
$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	$q=mysqli_query("update customer_orders set approve_status='rejected', appr_rej_date='$dtm',remarks='$remark' where customer_id=$cid and order_id=$oid");
	if($q)
	{
			$data['msg2']="Order Has been Rejected";
	/*		
$to=$email;	
$subject = "Order Confirmation from OGTS";
$message= "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings!! Thank you for reaching OSS GPS Tracking Solutions! </h4>";
$message.= "<h4>Congratulations!! </h4>";
$message.= "<h4>We would like to inform that order OD$oid has been created against your Customer ID $uid has been rejected. </h4>";
$message.="<h4>Assuring you of our best services always.</h4>";
$message.="<h4>Thank You,</h4>";
$message.="<h4>OGTS Team </h4>";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;
mail($to,$subject,$message,$headers);

$aqc=mysqli_query($con,"select * from admin_data where user_type='admin'");
while($ares=mysqli_fetch_array($aqc))
{
$emailid=$ares['email_id'];
}
$to=$emailid;	
$subject = "Order Rejection from OGTS";
$message= "<h3>Dear Admin,</h3><br/>";

$message.= "<h4>An Order OD$oid has been created against your Customer ID $uid has been rejected.</h4>";
$message.="<h4>Assuring you of our best services always.</h4>";
$message.="<h4>Thank You,</h4>";
$message.="<h4>OGTS Team </h4>";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$from = "admin@ossgpstracking.com";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	
$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;
mail($to,$subject,$message,$headers);*/
	}
	else
	{
		$data['msg2']="Couldnot Reject the Order";
	}

		$this->load->view('admin/approve_order',$data);
	}
	public function pending_order()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
	$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='pending';
}
else
{
	$remark=$remark;
}
	$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	$q=mysqli_query("update customer_orders set approve_status='pending', appr_rej_date='$dtm',remarks='$remark' where customer_id=$cid and order_id=$oid");
	if($q)
	{
			$data['msg2']="Order is in Pending";
	}
	else
	{
		$data['msg2']="";
	}
	$data['msg2']="Order is in Pending";
		$this->load->view('admin/approve_order',$data);
	}
	public function rejected_orders()
	{
		$this->load->view('admin/rejected_orders');
	}
	
	public function approve_payment_orders()
	{
		//and co.accounts_approval='confirmed'
		
		$this->load->view('admin/approve_payment_orders');
	}
	public function approve_payment_order()
	{
		//and co.accounts_approval='confirmed'
		
		$this->load->view('admin/approve_payment_order');
	}
	
	
	public function payment_order_approved()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
//	$remark=$this->uri->segment(5);
	$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='confirmed';
}
else
{
	$remark=$remark;
}
//var_dump($remark);
//exit;
	$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	
	$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}
	$q=mysqli_query("update customer_orders set 	accounts_approval='confirmed' , account_approved_dt='$dtm',	account_remarks='$remark' where customer_id=$cid and order_id=$oid");
	if($q)
	{
		$data['msg1']="Payment Has been Confirmed";
		$this->load->library('email');
		
$sq=mysqli_query($con,"select * from customer_orders where order_id='$oid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];

$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}


$aqc=mysqli_query($con,"select * from admin_data where email_id='accounts@ossindia.com'");
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
$to=$umail_id;	
$subject = "Order OD_$oid Approved";
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
			<td><p style='font-weight: bold;'>Dear $ctaname,</p></td>
			
			
		</tr>
		<tr>
		<td>Order No OD_$oid created on $order_date is approved. You Will Receive the delivery & installation details.</td>
	
		
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



$maqc=mysqli_query($con,"select * from admin_data where user_type='inventory'");
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
$subject = "Order OD_$oid - Pending for Device/ SIM assigning (SIM added if SIM is part of the order)";
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
		<td>Order No OD_$oid created by user $ctaname is pending for Device & SIM allocation</td>
	
		
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


	}
	else
	{
		$data['msg1']="Couldnot Confirm the Payment";
	}
		$this->load->view('admin/approve_payment_orders',$data);
	}
	public function payment_order_reject()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
		$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='rejected';
}
else
{
	$remark=$remark;
}
	$this->load->library('email');
	$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}
$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	$q=mysqli_query("update customer_orders set accounts_approval='rejected', account_approved_dt='$dtm',account_remarks='$remark' where customer_id=$cid and order_id=$oid");
	if($q)
	{
			$data['msg2']="Payment of Order Has been Rejected";
		$sq=mysqli_query($con,"select * from customer_orders where order_id='$oid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];

$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}


$aqc=mysqli_query($con,"select * from admin_data where email_id='accounts@ossindia.com'");
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
$to=$umail_id;	
$subject = "Order OD_$oid Rejected";
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
			<td><p style='font-weight: bold;'>Dear $ctaname,</p></td>
			
			
		</tr>
		<tr>
		<td>Order No OD_$oid created on $order_date is rejected. </td>
	
		
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
		$data['msg2']="Couldnot Reject the Payment of Order";
	}

		$this->load->view('admin/approve_payment_orders',$data);
	}
	public function payment_order_pending_order()
	{
	$cid=$this->uri->segment(3);
	$oid=$this->uri->segment(4);
	$remark=urldecode($this->uri->segment(5));
if($remark=='')
{
	$remark='pending';
}
else
{
	$remark=$remark;
}
	$dt=mysqli_query($con,"select current_TIMESTAMP as dt");
	while($rdt=mysqli_fetch_array($dt))
	{
		$dtm=$rdt['dt'];
	}
	$q=mysqli_query("update customer_orders set accounts_approval='pending', account_approved_dt='$dtm',account_remarks='$remark' where customer_id=$cid and order_id=$oid");
	if($q)
	{
			$data['msg2']="Payment of Order is in Pending";
	}
	else
	{
		$data['msg2']="";
	}
	$data['msg2']="Payment Order is in Pending";
		$this->load->view('admin/approve_payment_orders',$data);
	}

	public function confirmed_payment_orders()
	{
	$this->load->view('admin/confirmed_payment_orders');
	}
	
	
}
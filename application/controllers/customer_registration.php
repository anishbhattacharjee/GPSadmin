<?php include 'dbcon.php'; ?>
<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_registration extends CI_Controller {

	public function __construct()
	{
         global $con; 
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
         global $con; 
	if(isset($_GET['msg']))
	{
		$data['msg1']=(isset($_GET['msg']))?$_GET['msg']:'';
		
		$this->load->view('admin/customer_registration',$data);
	}
	else
	{
		$this->load->view('admin/customer_registration');
	}
	}
		public function basic_data()
	{
           global $con;    
	if(isset($_GET['msg']))
	{
		$data['msg1']=(isset($_GET['msg']))?$_GET['msg']:'';
		
		$this->load->view('admin/customer_basic_data',$data);
	}
	else if(isset($_GET['msg1']))
	{
		$data['msg2']=(isset($_GET['msg1']))?$_GET['msg1']:'';
		
		$this->load->view('admin/customer_basic_data',$data);
	}
	else
	{
		$this->load->view('admin/customer_basic_data');
	}
	}
	public function existdata()
	{
          global $con; 
		if(isset($_GET['msg']))
	{
		$data['msg1']=(isset($_GET['msg']))?$_GET['msg']:'';
		$data['uid']=(isset($_GET['uid']))?$_GET['uid']:'';
	
		//$data['cid']=(isset($_GET['cid']))?$_GET['cid']:'';
		
		$this->load->view('admin/exist_customer',$data);
	}
	
	}
	
		public function customer_save_data()
	{
              global $con; 
	$this->load->library('email');
		$ctype=(isset($_POST['type']))?$_POST['type']:'';

		$firstname=(isset($_POST['firstname']))?$_POST['firstname']:'';

		$middlename=(isset($_POST['middlename']))?$_POST['middlename']:'';

		$lastname=(isset($_POST['lastname']))?$_POST['lastname']:'';

		$gender=(isset($_POST['sex']))?$_POST['sex']:'';

		$dob=(isset($_POST['dob']))? date("Y-m-d",strtotime($_POST['dob'])):'';

		$paddr=(isset($_POST['paddr']))?$_POST['paddr']:'';

		$tmpaddr=(isset($_POST['tmpaddr']))?$_POST['tmpaddr']:'';

		$email=(isset($_POST['email']))?$_POST['email']:'';

		$phno=(isset($_POST['phno']))?$_POST['phno']:'';

		$tphno=(isset($_POST['tphno']))?$_POST['tphno']:'';
	

		$compname=(isset($_POST['compname']))?$_POST['compname']:'';

		$cmpaddr=(isset($_POST['cmpaddr']))?$_POST['cmpaddr']:'';

		$ctphno=(isset($_POST['ctphno']))?$_POST['ctphno']:'';

		$cemail=(isset($_POST['cemail']))?$_POST['cemail']:'';

		$website=(isset($_POST['website']))?$_POST['website']:'';

		$conname1=(isset($_POST['conname1']))?$_POST['conname1']:'';

		$conphno1=(isset($_POST['conphno1']))?$_POST['conphno1']:'';

		$conem1=(isset($_POST['conem1']))?$_POST['conem1']:'';

		$condesg1=(isset($_POST['condesg1']))?$_POST['condesg2']:'';

		$conname2=(isset($_POST['conname2']))?$_POST['conname2']:'';

		$conphno2=(isset($_POST['conphno2']))?$_POST['conphno2']:'';

		$conem2=(isset($_POST['conem2']))?$_POST['conem2']:'';
			
		$password=random_string('alnum',5);

		$condesg2=(isset($_POST['condesg2']))?$_POST['condesg2']:'';
		//	$bnr=(isset($_POST['bnr']))?$_POST['bnr']:'';
			$uid=(isset($_POST['uid']))?$_POST['uid']:'';
            
			$created_by=(isset($_POST['created_by']))?$_POST['created_by']:'';
			$created_dt=(isset($_POST['created_dt']))?(date("Y-m-d h:i:s",strtotime($_POST['created_dt']))):'';
			$school=(isset($_POST['school']))?$_POST['school']:'0';
			$school_login=(isset($_POST['school_login']))?$_POST['school_login']:'0';
			$dealers_customer=(isset($_POST['dealers_customer']))?$_POST['dealers_customer']:'0';
			$concox_customer=(isset($_POST['concox_customer']))?$_POST['concox_customer']:'0';
         
			
           // echo $uid;exit;
			if($ctype=='individual')
			{
			//$indtt=explode("-",$app_date);

//$dob = $indtt[2]."-".$indtt[1]."-".$indtt[0];
$state=(isset($_POST['statee']))?$_POST['statee']:'';
		$dealer_id=(isset($_POST['dealer_idd']))?$_POST['dealer_idd']:'';
			$city=(isset($_POST['cityy']))?$_POST['cityy']:'';

		$pincode=(isset($_POST['pincodee']))?$_POST['pincodee']:'';
	
$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,created_date_time,created_by,password,state,city,pin_code,fromm,is_school,is_sublogin,dealers_customer,concox) VALUES ('$uid','$ctype','$firstname', '$middlename', '$lastname', '$gender','$dob','$phno', '$tphno', '$email', '$paddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$created_dt','$created_by','$password','$state','$city','$pincode','$dealer_id','$school','$school_login','$dealers_customer','$concox_customer')");

//$ab=mysqli_insert_id();
            $ab  =   $this->db->insert_id();
                
              //echo $ab;exit;
$ss=mysqli_query($con,"INSERT INTO alert_control(customer_id) VALUES ($ab)");


$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$email;	
$subject = "Registration Confimation - OGTS";

	

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
			<td>Your registration with OSS GPS Tracking Solutions was successful. Once you complete the payment formalities you will receive your Login Credentials</td>
	</tr>
	
	<tr><td></td></tr>
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
		<span style='color:blue;'>+91 80 49632200 /</span><a style='color:blue;text-decoration:none;' href='mailto:enquiry@ossgpstracking.com'> enquiry@ossgpstracking.com</a> </td>
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
$state=(isset($_POST['state']))?$_POST['state']:'';
		$dealer_id=(isset($_POST['dealer_id']))?$_POST['dealer_id']:'';
			$city=(isset($_POST['city']))?$_POST['city']:'';

		$pincode=(isset($_POST['pincode']))?$_POST['pincode']:'';

		$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,created_date_time,created_by,password,state,city,pin_code,fromm,is_school,is_sublogin,dealers_customer,concox) VALUES ('$uid','$ctype','$compname', '$middlename', '$lastname', '$gender','$dob','$ctphno', '$tphno', '$cemail', '$cmpaddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$created_dt','$created_by','$password','$state','$city','$pincode','$dealer_id','$school','$school_login','$dealers_customer','$concox_customer')");
		
	$aab=mysqli_insert_id();
$sss=mysqli_query($con,"INSERT INTO alert_control(customer_id) VALUES ($aab)");	

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$cemail;	
$subject = "Registration Confimation - OGTS";

	

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
			<td>Your registration with OSS GPS Tracking Solutions was successful. Once you complete the payment formalities you will receive your Login Credentials</td>
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
		if($q)

{
/*$to=$email;	

$subject = "Your Login Credentials - OGTS Team";

	

	$message = "<h3>Dear Customer ,</h3><br/>";

$message.= "<h4>Greetings!! Thank you for reaching OSS GPS Tracking Solutions!</h4><br/>";
$message.= "<h4>Please find below your login credentials;</h4><br/>";
$message.= "<h4>Username : ".$email." </h4>";

$message.= "<h4>Passowrd : ".$password."</h4><br/>";
$message.= "<h4>URL : <a href='http://ossgpstracking.com/gpsfront/userlogin.php' target='_blank'>ossgpstracking.com</a> </h4><br/>";
$message.="<h4>Assuring you of our best services always.</h4><br/>";
$message.="<h4>Thank You,</h4><br/>";
$message.="<h4>OGTS Team </h4>";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

	$from = "admin@ossgpstracking.com";



	$headers = "MIME-Version: 1.0" . "\r\n";



	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";	



	$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;



	mail($to,$subject,$message,$headers); 

*/

$aqc=mysqli_query($con,"select * from admin_data where user_type='admin'");
while($ares=mysqli_fetch_array($aqc))
{
$emailid=$ares['email_id'];
}

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;

$to=$emailid;	


$subject = "Registration Confimation - OGTS";

	

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
			<td><p style='font-weight: bold;'>Dear Admin,</p></td>
			
			
		</tr>
			
		<tr>
		<td>Greetings from OSS GPS Tracking Solutions!!!</td>
		</tr>
		<tr>
			<td>Customer ID - $uid has been Successfully Registered With OSS GPS Tracking Solutions</td>
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


//
//	mail($to,$subject,$message,$headers); 
//$uid=(isset($_POST['uid']))?$_POST['uid']:'';
//echo $uid;exit;
$qsq=mysqli_query($con,"select customer_id from customers  where customer_uid='$cid' group by customer_uid");
           //echo "select customer_id from customers  where customer_uid='$cid' group by customer_uid";exit;

while($rsq=mysqli_fetch_array($qsq))

{

$cid=$rsq['customer_id'];
    

//echo $rsq['customer_id'];

}
/*if($ctype=='individual')
			{ */
		$qs=mysqli_query($con,"INSERT into customer_proof_details(customer_id,cust_proof,proof_descptn,proof_files,status) values('$cid','no proof','Back end Order Creation','no docs','verified')");
           
/*}*/
	

	/*	 for($i=1; $i<=$bnr; $i++){
		
		$proof = (isset($_POST['proof'.$i]))?$_POST['proof'.$i]:'0';

$descp = (isset($_POST['descp'.$i]))?$_POST['descp'.$i]:'0';

$files = (isset($_POST['files'.$i]))?$_POST['files'.$i]:'0';

  if ($_FILES["files".$i]["error"] > 0)
    {
  //  echo "Return Code: " . $_FILES["files".$i]["error"] . "<br>";
	$img="";
    }
  else
    {
     if (file_exists("../gpsfront/docuploads/" . $_FILES["files".$i]["name"]))
      {
	  $d=time();
	
	   $ab=$d.$_FILES["files".$i]["name"];
	   $_FILES["files".$i]["name"] . " already exists. ";
	  move_uploaded_file($_FILES["files".$i]["tmp_name"],
      "../gpsfront/docuploads/" . $ab);
       "Stored in: " . "../gpsfront/docuploads/" . $ab;
	   $img=$ab;
      }
    else
      {
	  $img=$_FILES["files".$i]["name"];
      move_uploaded_file($_FILES["files".$i]["tmp_name"],
      "../gpsfront/docuploads/" . $_FILES["files".$i]["name"]);
       "Stored in: " . "../gpsfront/docuploads/" . $_FILES["files".$i]["name"];
      }
    }

	

		$qs=mysqli_query($con,"INSERT into customer_proof_details(customer_id,cust_proof,proof_descptn,proof_files) values('$cid','$proof','$descp','$img')");
$data['msg1']= "Customer Basic Details Entered Successfully.Please Enter the Order Details";
$data['cid']= $cid;

		} */
		

$data['msg1']= "Customer Basic Details Entered Successfully.Please Enter the Order Details";
//            $uid=(isset($_POST['uid']))?$_POST['uid']:'';
//                print_r($uid);exit;
//$data['cid']= $cid;
//           echo $cid;exit;
//            
	}
	if($ctype=='individual')
			{
        //print_r($uid);exit;
			$em=urlencode($email);
		
			//$cid=urlencode($cid);
        $cid=urlencode($uid);
//			
//$this->load->view('admin/enter_order_details',$data);
redirect("customer_registration/enter_order_details/$em/$cid");
	}
	else
	{
	$data['ctypes']= $ctype;
		$data['fname']= $compname;
				$em=urlencode($cemail);
				$cid=urlencode($cid);
		redirect("customer_registration/enter_order_details/$em/$cid");
			//$this->load->view('admin/enter_comp_order_details',$data);
	}
	}
	
	  
	public function enter_order_details()
	{
        global $con; 
	$em=urldecode($this->uri->segment(3));
	$cd=urldecode($this->uri->segment(4));
		$email=(isset($_POST['email']))?$_POST['email']:$em;
		$cid=(isset($_POST['cid']))?$_POST['cid']:$cd;
		$data['msg1']= "Please Enter the Order Details";
		$data['cid']=$cid;
//        echo $data['cid'];exit;
        
		$qsq=mysqli_query($con,"SELECT type,state,customer_first_name FROM customers  WHERE customer_id='$cid'");
//        $qsq=mysqli_query($con,"SELECT type,state,customer_first_name FROM customers  WHERE customer_id='1'");
//     echo "SELECT type,state,customer_first_name FROM customers  WHERE customer_id='$cid'";exit;
//        echo "SELECT type,state,customer_first_name FROM customers  WHERE customer_id='1'";exit;
//        echo $qsq;exit;
        $ctype = ''; 
        $fname = '';
         $state = '';
while($rsq=mysqli_fetch_array($qsq))
{
$ctype=$rsq['type'];
$fname=$rsq['customer_first_name'];
$state=$rsq['state'];
}
if($ctype=='individual')
 
			{
			$data['state']=$state;
	$this->load->view('admin/enter_order_details',$data);
	}
	else
	{
     
	$data['ctypes']= $ctype;
	$data['fname']= $fname;
	$data['state']=$state;
			$this->load->view('admin/enter_comp_order_details',$data);
	}
	//	$this->load->view('admin/enter_order_details',$data);
	}
	
	public function order_details()
	{
          global $con; 
		$this->load->view('admin/order_details');
	}
}
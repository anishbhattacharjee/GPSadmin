<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class tamper extends CI_Controller {

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

		$this->load->view('admin/tamper');

	}
public function message()

	{
		
		$id=$_GET['imei'];
		
		$sql=$con,"select l.*,c.customer_first_name,c.customer_phone_no,c.customer_emailid,i.device_name from tamper_log l join installation i on l.imei=i.imie_no join customers c on i.customer_id=c.customer_id  where l.id=$id"; 

$rs=mysqli_query($sql);
$devs=mysqli_fetch_assoc($rs);
		
		
		//$to      = 'linscherian@gmail.com';
		//$from      = 'linselsacheriyan@gmail.com';
		//$cc      = 'linselsacheriyan@gmail.com';
		$to      = $devs['customer_emailid'];
		$cname      = $devs['customer_first_name'];
		$device_name  = $devs['device_name'];
		$tamper_time  = date("d M Y H:i:s",strtotime($devs['ts']));
		$subject = 'OGTS - Tamper Alert';
		$from = "admin@ossgpstracking.com";
		$cc = "support@ossgpstracking.com";
		
/*		$message = "
<html>
<head>
  <title>OGTS - Tamper Alert</title>
</head>
<body>
  <p>Dear $cname</p>
  <p>Power supply has been disconnected for  $device_name.</p>
 
</body>
</html>
";

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= "To: $to " . "\r\n";
$headers .= "From: $from" . "\r\n";
//$headers .= 'Cc: support@ossgpstracking.com' . "\r\n";


// Mail it
mail($to, $subject, $message, $headers);*/

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
			<td><p style='font-weight: bold;'>Dear $cname,</p></td>
			
			
		</tr>
		<tr>
		<td>Power supply has been disconnected for  $device_name at $tamper_time.</td>
		</tr>
		
		
	
		<tr>
		<td style='font-size: 14px;'>For any further assistance please feel free to contact us at
<span style='color:blue;'>+91 80 49632200 /</span> <a style='color:blue;text-decoration:none;' href='mailto:support@ossgpstracking.com'> support@ossgpstracking.com.</a> </td>

		</tr>
		
	
		
	
	<br/>
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


	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
	$headers .= "From:" . $from. "\r\n" ."CC: ".$cc ;
	mail($to,$subject,$message,$headers); 

		//$this->load->view('admin/tamper');
		$url=base_url()."tamper";
		header("Location: $url");

	}

	

}
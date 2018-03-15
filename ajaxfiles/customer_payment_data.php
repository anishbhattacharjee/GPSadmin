<?php

include '../dbcon.php';
$finalcost=(isset($_GET['finalcost']))?$_GET['finalcost']:'';
$amount=(isset($_GET['amount']))?$_GET['amount']:'';



$cashtype=(isset($_GET['cashtype']))?$_GET['cashtype']:'';
$cashamount=(isset($_GET['cashamount']))?$_GET['cashamount']:'';
$cashpending=(isset($_GET['cashpending']))?$_GET['cashpending']:'';
$totlpayablecash=(isset($_GET['totlpayablecash']))?$_GET['totlpayablecash']:'';
$cashpaid=(isset($_GET['cashpaid']))?$_GET['cashpaid']:'';


$ontransfertype=(isset($_GET['ontransfertype']))?$_GET['ontransfertype']:'';
$onlinetransferamount=(isset($_GET['onlinetransferamount']))?$_GET['onlinetransferamount']:'';
$bankonline=(isset($_GET['bankonline']))?$_GET['bankonline']:'';
$transferdate=(isset($_GET['transferdate']))?$_GET['transferdate']:'';
$ontransferpending=(isset($_GET['ontransferpending']))?$_GET['ontransferpending']:'';
$totlpayableontransfer=(isset($_GET['totlpayableontransfer']))?$_GET['totlpayableontransfer']:'';
$ontransferpaid=(isset($_GET['ontransferpaid']))?$_GET['ontransferpaid']:'';



$chequetype=(isset($_GET['chequetype']))?$_GET['chequetype']:'';
$chequeamount=(isset($_GET['chequeamount']))?$_GET['chequeamount']:'';
$chequepending=(isset($_GET['chequepending']))?$_GET['chequepending']:'';
$totlpayablecheque=(isset($_GET['totlpayablecheque']))?$_GET['totlpayablecheque']:'';
$chequepaid=(isset($_GET['chequepaid']))?$_GET['chequepaid']:'';
$chequeno=(isset($_GET['chequeno']))?$_GET['chequeno']:'';
$bankname=(isset($_GET['bankname']))?$_GET['bankname']:'';
$branchname=(isset($_GET['branchname']))?$_GET['branchname']:'';
$branchlocation=(isset($_GET['branchlocation']))?$_GET['branchlocation']:'';

$onlinetype=(isset($_GET['onlinetype']))?$_GET['onlinetype']:'';
$totalpending=(isset($_GET['totalpending']))?$_GET['totalpending']:'';
$paidamount=(isset($_GET['paidamount']))?$_GET['paidamount']:'';

		

$created_by=(isset($_GET['created_by']))?$_GET['created_by']:'';
$created_dt=(isset($_GET['created_dt']))?$_GET['created_dt']:'';

		$cid=(isset($_GET['cid']))?$_GET['cid']:'';
		$oid=(isset($_GET['oid']))?$_GET['oid']:'';
		
$qc=mysqli_query($con,"select * from customers where customer_id='$cid'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}


	if($cashtype=="Yes" && $cashamount!=0)
	{
	$chtr=mysqli_query($con,"select LAST_INSERT_ID(total_cashamount) as totl from backend_cash  ORDER BY order_id DESC LIMIT 1");
while($rchtr=mysqli_fetch_array($chtr))
{
	$totlcash=$rchtr['totl'];
}

$total_cash=$cashamount+$totlcash;



	$cshq=mysqli_query($con,"INSERT INTO backend_cash (customer_id, order_id, cashtype, cashamount, cashpending, totlpayablecash, cashpaid,total_cashamount) VALUES ('$cid', '$oid', '$cashtype', '$cashamount', '$cashpending', '$totlpayablecash', '$cashpaid','$total_cash')");
	}


	if($ontransfertype=="Yes" && $onlinetransferamount!=0)
	{
	$chtro=mysqli_query($con,"select LAST_INSERT_ID(total_ontranferamount) as totl from backend_onlinetransfer  ORDER BY order_id DESC LIMIT 1");
while($rchtro=mysqli_fetch_array($chtro))
{
	$totlontransfer=$rchtro['totl'];
}

$total_ontransferamount=$onlinetransferamount+$totlontransfer;



	$ontq=mysqli_query($con,"INSERT INTO backend_onlinetransfer (customer_id, order_id, ontransfertype, onlinetransferamount, total_ontranferamount, ontransferpending, totlpayableontransfer, ontransferpaid,transferdate,bankonline) VALUES ('$cid', '$oid', '$ontransfertype', '$onlinetransferamount', '$total_ontransferamount', '$ontransferpending', '$totlpayableontransfer', '$ontransferpaid','$transferdate','$bankonline')");
	}

	if($chequetype=="Yes" && $chequeamount!=0)
	{
	$totlcheque=0;
	$chtrr=mysqli_query($con,"select LAST_INSERT_ID(total_chequeamount) as totl from backend_cheque  ORDER BY order_id DESC LIMIT 1");
while($rchtrr=mysqli_fetch_array($chtrr))
{
	$totlcheque=$rchtrr['totl'];
}
$total_cheque=$chequeamount+$totlcheque;
	$chq=mysqli_query($con,"INSERT INTO backend_cheque (customer_id, order_id, chequetype, chequeamount, chequepending, totlpayablecheque, chequepaid,chequeno,bankname,total_chequeamount,branchname,branchlocation) VALUES ('$cid', '$oid', '$chequetype', '$chequeamount', '$chequepending', '$totlpayablecheque', '$chequepaid','$chequeno','$bankname','$total_cheque','$branchname','$branchlocation')");
	}
		if($onlinetype=="Yes")
	{
$chonq=mysqli_query($con,"INSERT INTO backend_online (customer_id, order_id, onlinetype, pending) VALUES ('$cid', '$oid', '$onlinetype', '$totalpending')");
	}
	if($amount==$paidamount)
	{
		$status='done';
		$uq=mysqli_query("update payment_list set status='done' where order_id='$oid'");
	}
	else
	{
		$status='pending';
	}
	$pyq=mysqli_query($con,"INSERT INTO payment_list (customer_id, order_id, total_amount, paid_amount, pending_amount, status,cashamount,chequeamount,online_transfer_amount) VALUES ('$cid', '$oid', '$amount', '$paidamount', '$totalpending', '$status','$cashamount','$chequeamount','$onlinetransferamount')");
	
	
	//	$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$cid','invoice','$oid', 'Invoice Raised Successfully', 'customer_orders', '$oid')");	
$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$cid','payment','$oid', '$paidamount Payment Done Successfully', 'customer_orders', '$oid')");	
	
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;	
$to=$email;	
$subject = "Payment Confirmation from OGTS";
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
	<td>We would like to thank you for the Payment of Rs.$paidamount  for your order OD$oid has been created against your Customer ID $uid.</td>
		
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

$csq=mysqli_query($con,"select * from customer_orders where order_id='$oid'");
$rcsq=mysqli_fetch_array($csq);
$created_by=$rcsq['created_by'];


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
$subject = "Payment Confirmation from OGTS";
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
		<td>Congratulations!!</td>
		</tr>
	<tr>
	<td>Pending payment of Rs. $paidamount  against your Order No OD_$oid is collected.</td>
		
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
	
		if( (isset($pyq)!=FALSE))

		{
	

			echo "Payment Done Successfully";

		}
		else

		{

			echo "Payment Has not been Done Successfully";

		}

?>
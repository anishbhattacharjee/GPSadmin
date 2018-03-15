<?php
include '../dbcon.php';
		$customer_id=(isset($_GET['customer_id']))?$_GET['customer_id']:'';
		$orderid=(isset($_GET['orderid']))?$_GET['orderid']:'';
		$imei=(isset($_GET['imei']))?$_GET['imei']:'';
		$category_id=(isset($_GET['category_id']))?$_GET['category_id']:'';
		$device_id=(isset($_GET['device_id']))?$_GET['device_id']:'';
	
		$submonth=(isset($_GET['submonth']))?$_GET['submonth']:'';
		$subcost=(isset($_GET['subcost']))?$_GET['subcost']:'';
		$network=(isset($_GET['network']))?$_GET['network']:'';
		$simcharge=(isset($_GET['simcharge']))?$_GET['simcharge']:'';
		$devcst=(isset($_GET['devcst']))?$_GET['devcst']:'';
		$intcst=(isset($_GET['intcst']))?$_GET['intcst']:'';
		$sercost=(isset($_GET['sercost']))?$_GET['sercost']:'';
		$vatcost=(isset($_GET['vatcost']))?$_GET['vatcost']:'';
		$vat_percentage=(isset($_GET['vat_percentage']))?$_GET['vat_percentage']:'';

		
		$total=(isset($_GET['total']))?$_GET['total']:'';
		$finalcost=(isset($_GET['finalcost']))?$_GET['finalcost']:'';
		$amount=(isset($_GET['amount']))?$_GET['amount']:'';
		$finalcostt=(isset($_GET['finalcostt']))?$_GET['finalcostt']:'';
		
$cashtype=(isset($_GET['cashtype']))?$_GET['cashtype']:'';
$cashamount=(isset($_GET['cashamount']))?$_GET['cashamount']:'';
$cashpending=(isset($_GET['cashpending']))?$_GET['cashpending']:'';
$totlpayablecash=(isset($_GET['totlpayablecash']))?$_GET['totlpayablecash']:'';
$cashpaid=(isset($_GET['cashpaid']))?$_GET['cashpaid']:'';

$chequetype=(isset($_GET['chequetype']))?$_GET['chequetype']:'';
$chequeamount=(isset($_GET['chequeamount']))?$_GET['chequeamount']:'';
$chequepending=(isset($_GET['chequepending']))?$_GET['chequepending']:'';
$totlpayablecheque=(isset($_GET['totlpayablecheque']))?$_GET['totlpayablecheque']:'';
$chequepaid=(isset($_GET['chequepaid']))?$_GET['chequepaid']:'';
$chequeno=(isset($_GET['chequeno']))?$_GET['chequeno']:'';
$bankname=(isset($_GET['bankname']))?$_GET['bankname']:'';
$branchname=(isset($_GET['branchname']))?$_GET['branchname']:'';
$branchlocation=(isset($_GET['branchlocation']))?$_GET['branchlocation']:'';


$ontransfertype=(isset($_GET['ontransfertype']))?$_GET['ontransfertype']:'';
$onlinetransferamount=(isset($_GET['onlinetransferamount']))?$_GET['onlinetransferamount']:'';
$bankonline=(isset($_GET['bankonline']))?$_GET['bankonline']:'';
$transferdate=(isset($_GET['transferdate']))?$_GET['transferdate']:'';
$ontransferpending=(isset($_GET['ontransferpending']))?$_GET['ontransferpending']:'';
$totlpayableontransfer=(isset($_GET['totlpayableontransfer']))?$_GET['totlpayableontransfer']:'';
$ontransferpaid=(isset($_GET['ontransferpaid']))?$_GET['ontransferpaid']:'';

$onlinetype=(isset($_GET['onlinetype']))?$_GET['onlinetype']:'';
$totalpending=(isset($_GET['totalpending']))?$_GET['totalpending']:'';
$paidamount=(isset($_GET['paidamount']))?$_GET['paidamount']:'';
$advamount=(isset($_GET['advamount']))?$_GET['advamount']:'0';
$advancepaidamount=(isset($_GET['advancepaidamount']))?$_GET['advancepaidamount']:'0';


 		$packing=(isset($_GET['packing']))?$_GET['packing']:'';
		$freight=(isset($_GET['freight']))?$_GET['freight']:'';
		$smspackage=(isset($_GET['smspackage']))?$_GET['smspackage']:'';
		$video=(isset($_GET['video']))?$_GET['video']:'';

$created_byy=(isset($_GET['created_by']))?$_GET['created_by']:'';
$created_dt=(isset($_GET['created_dt']))?(date("Y-m-d h:i:s",strtotime($_GET['created_dt']))):'';

$q1=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	$res=mysqli_fetch_array($q1);
	$uid=$res['customer_uid'];
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];	
	$phone=$res['customer_phone_no'];
	
	
$ucq=mysqli_query("update customer_orders set type_order='live',without_discount='$finalcostt',final_cost='$finalcost' where order_id='$orderid'");
	$uiq=mysqli_query("update installation set demo_device_type='notdemo' where imie_no='$imei' and order_id='$orderid'");
	
	$ucoq=mysqli_query("update customer_order_details set installation_cost='$intcst',sub_month='$submonth',subcost='$subcost',service_tax='$sercost',vat='$vatcost',each_cost='$total',final_cost='$finalcost',network='$network',charge='$simcharge',vat_percentage='$vat_percentage',packing='$packing',freight='$freight',smspackage='$smspackage',video_streaming='$video'  where order_id='$orderid' and category_id='$category_id' and device_id='$device_id'");
	
	
	$sfq=mysqli_query($con,"INSERT into payment_master(order_id,response) values ('$orderid','success')");
	if($cashtype=="Yes" && $cashamount!=0)
	{
	$totlcash=0;
	$chtr=mysqli_query($con,"select LAST_INSERT_ID(total_cashamount) as totl from backend_cash  ORDER BY order_id DESC LIMIT 1");
while($rchtr=mysqli_fetch_array($chtr))
{
	$totlcash=$rchtr['totl'];
}

$total_cash=$cashamount+$totlcash;



	$cshq=mysqli_query($con,"INSERT INTO backend_cash (customer_id, order_id, cashtype, cashamount, cashpending, totlpayablecash, cashpaid,total_cashamount) VALUES ('$customer_id', '$orderid', '$cashtype', '$cashamount', '$cashpending', '$totlpayablecash', '$cashpaid','$total_cash')");
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
	$chq=mysqli_query($con,"INSERT INTO backend_cheque (customer_id, order_id, chequetype, chequeamount, chequepending, totlpayablecheque, chequepaid,chequeno,bankname,total_chequeamount,branchname,branchlocation) VALUES ('$customer_id', '$orderid', '$chequetype', '$chequeamount', '$chequepending', '$totlpayablecheque', '$chequepaid','$chequeno','$bankname','$total_cheque','$branchname','$branchlocation')");
	}
	
		if($ontransfertype=="Yes")
	{
	$chtro=mysqli_query($con,"select LAST_INSERT_ID(total_ontranferamount) as totl from backend_onlinetransfer  ORDER BY order_id DESC LIMIT 1");
while($rchtro=mysqli_fetch_array($chtro))
{
	$totlontransfer=$rchtro['totl'];
}

$total_ontransferamount=$onlinetransferamount+$totlontransfer;



	$ontq=mysqli_query($con,"INSERT INTO backend_onlinetransfer (customer_id, order_id, ontransfertype, onlinetransferamount, total_ontranferamount, ontransferpending, totlpayableontransfer, ontransferpaid,transferdate,bankonline) VALUES ('$customer_id', '$orderid', '$ontransfertype', '$onlinetransferamount', '$total_ontransferamount', '$ontransferpending', '$totlpayableontransfer', '$ontransferpaid','$transferdate','$bankonline')");
	}
		
		
	if($amount==$paidamount)
	{
		$status='done';

	}
	else
	{
		$status='pending';
	}
	$pyq=mysqli_query($con,"INSERT INTO payment_list(customer_id,order_id,total_amount,paid_amount,pending_amount,status,cashamount,chequeamount,payment_type,advance_amount,advance_paid,online_transfer_amount) VALUES ('$customer_id', '$orderid', '$amount','$paidamount','$totalpending','$status','$cashamount','$chequeamount','fullpayment','$advamount','$advancepaidamount','$onlinetransferamount')");
	
	$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$customer_id','invoice','$orderid', 'Invoice Raised Successfully', 'customer_orders', '$orderid')");	
$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action,order_id, notification, table_name, table_id) VALUES ('$customer_id','payment','$orderid', '$paidamount Payment Done Successfully', 'customer_orders', '$orderid')");	
	
	$cq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rcq=mysqli_fetch_array($cq);
	$created_by=$rcq['created_by'];
	
	
	
	if($ucq&&$uiq)
	{
	$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
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
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;
mail($to,$subject,$message,$headers);
	
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
		<td>Congratulations!! </td>
		</tr>
	<tr>
		<td>We would like to thank you for the Payment of Rs.$paidamount  for your order OD$orderid has been created against your Customer ID $uid.</td>
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
echo "Converted Successfully";

	}
	else
	{
		echo "Couldnot Convert Order to Live";
	}
	
	
	?>
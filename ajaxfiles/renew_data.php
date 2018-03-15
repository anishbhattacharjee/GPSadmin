<?php

include '../dbcon.php';

		$customer_id=(isset($_GET['customer_id']))?$_GET['customer_id']:'';

		$orderid=(isset($_GET['orderid']))?$_GET['orderid']:'';

		$installation_id=(isset($_GET['installation_id']))?$_GET['installation_id']:'';

		$engineer_id=(isset($_GET['engineer_id']))?$_GET['engineer_id']:'';

		$device_name=(isset($_GET['device_name']))?$_GET['device_name']:'';

		$model_id=(isset($_GET['model_id']))?$_GET['model_id']:'';

		$imie_no=(isset($_GET['imie_no']))?$_GET['imie_no']:'';

		$ordereddate=(isset($_GET['ordereddate']))?date("Y-m-d",strtotime($_GET['ordereddate'])):'';

		$category_id=(isset($_GET['category_id']))?$_GET['category_id']:'';

		$device_id=(isset($_GET['device_id']))?$_GET['device_id']:'';

		$submonth=(isset($_GET['submonth']))?$_GET['submonth']:'';

		$subcost=(isset($_GET['subcost']))?$_GET['subcost']:'';

		$network=(isset($_GET['network']))?$_GET['network']:'';

		$simcharge=(isset($_GET['simcharge']))?$_GET['simcharge']:'';

		$servicetax=(isset($_GET['servicetax']))?$_GET['servicetax']:'';

		$finalcost=(isset($_GET['finalcost']))?$_GET['finalcost']:'';

		$r_id=(isset($_GET['r_id']))?$_GET['r_id']:'';

		$company_id=(isset($_GET['company_id']))?$_GET['company_id']:'';

		$demo_device_type=(isset($_GET['demo_device_type']))?$_GET['demo_device_type']:'';

		$curdate=(isset($_GET['curdate']))?$_GET['curdate']:'';

		

		$finalcost=(isset($_GET['finalcost']))?$_GET['finalcost']:'';

		$amount=(isset($_GET['amount']))?$_GET['amount']:'';

		

		

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



		



$created_by=(isset($_GET['created_by']))?$_GET['created_by']:'';





$created_dt=(isset($_GET['created_dt']))?(date("Y-m-d h:i:s",strtotime($_GET['created_dt']))):'';







$q1=mysqli_query($con,"select * from customers where customer_id='$customer_id'");

	$res=mysqli_fetch_array($q1);

	$name=$res['customer_first_name'];

	$email=$res['customer_emailid'];	

	$phone=$res['customer_phone_no'];



	$qo=mysqli_query($con,"select * from installation i where i.instatllation_id='$installation_id' and i.order_id='$orderid' and i.customer_id='$customer_id'");

		if(mysqli_num_rows($qo)>0)

		{

		$rq=mysqli_query("update installation set submonth='$submonth',installed_date='$curdate' where instatllation_id='$installation_id'");

		$ruq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth',renewed_on='$curdate' where r_id='$r_id'");

		if($rq!=FALSE&&$ruq!=FALSE)

				{

					$data['msg1']="Renewed Successfully";

				}

				else

				{

					$data['msg1']="Could not Renew";

				}

		}

		else if(mysqli_num_rows($qo)<=0)

		{

			$riq=mysqli_query($con,"INSERT INTO installation (customer_id, order_id, category_id, model_id, engineer_id, sim_no, device_id, imie_no, device_name, allocation_status, remarks, approve_status, installation_status, installed_date, installation_remarks, device_status, create_date_time, demo_device_type, allocated_date_time, company_id, image, speed_limit, idle_limit, device_date_time, assign_device_status, assign_engineer, submonth, order_date) VALUES ('$customer_id', '$orderid', '$category_id', '$model_id', '$engineer_id', '', '$device_id', '$imie_no', '$device_name', 'completed', '', '', 'completed', '$curdate', 'completed', 'active', CURRENT_TIMESTAMP, '$demo_device_type', '', '$company_id', 'noimage.jpg', '0', NULL, '', 'assigned', 'assigned', '$submonth', '');");

			$ruaq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth',renewed_on='$curdate' where r_id='$r_id'");

			if($riq!=FALSE&&$ruaq!=FALSE)

				{

					$data['msg1']="Renewed Successfully";

				}

				else

				{

					$data['msg1']="Could not Renew";

				}

		}

		$iq=mysqli_query($con,"INSERT INTO renew_invoice (r_id, customer_id, order_id, category_id, device_id, sub_month, sub_cost, network, simcharge_permonth, service_tax, final_total) VALUES ('$r_id','$customer_id', '$orderid', '$category_id', '$device_id', '$submonth', '$subcost', '$network', '$simcharge', '$servicetax', '$finalcost')");

		$rinv=mysqli_insert_id();

		$iqs=mysqli_query("update r_installation set r_invoice=$rinv where r_id=$r_id");

		

		

		if($cashtype=="Yes" && $cashamount!=0)

	{

	$totlcash=0;

	$chtr=mysqli_query($con,"select LAST_INSERT_ID(total_cashamount) as totl from renew_cash  ORDER BY order_id DESC LIMIT 1");

while($rchtr=mysqli_fetch_array($chtr))

{

	$totlcash=$rchtr['totl'];

}



$total_cash=$cashamount+$totlcash;







	$cshq=mysqli_query($con,"INSERT INTO renew_cash (customer_id, order_id,r_invid, cashtype, cashamount, cashpending, totlpayablecash, cashpaid,total_cashamount) VALUES ('$customer_id', '$orderid','$rinv', '$cashtype', '$cashamount', '$cashpending', '$totlpayablecash', '$cashpaid','$total_cash')");

	}

	if($chequetype=="Yes" && $chequeamount!=0)

	{

	$totlcheque=0;

	$chtrr=mysqli_query($con,"select LAST_INSERT_ID(total_chequeamount) as totl from renew_cheque  ORDER BY order_id DESC LIMIT 1");

while($rchtrr=mysqli_fetch_array($chtrr))

{

	$totlcheque=$rchtrr['totl'];

}

$total_cheque=$chequeamount+$totlcheque;

	$chq=mysqli_query($con,"INSERT INTO renew_cheque (customer_id, order_id,r_invid, chequetype, chequeamount, chequepending, totlpayablecheque, chequepaid,chequeno,bankname,total_chequeamount,branchname,branchlocation) VALUES ('$customer_id', '$orderid','$rinv', '$chequetype', '$chequeamount', '$chequepending', '$totlpayablecheque', '$chequepaid','$chequeno','$bankname','$total_cheque','$branchname','$branchlocation')");

	}

	

		if($ontransfertype=="Yes")

	{

	$chtro=mysqli_query($con,"select LAST_INSERT_ID(total_ontranferamount) as totl from renew_onlinetransfer  ORDER BY order_id DESC LIMIT 1");

while($rchtro=mysqli_fetch_array($chtro))

{

	$totlontransfer=$rchtro['totl'];

}



$total_ontransferamount=$onlinetransferamount+$totlontransfer;







	$ontq=mysqli_query($con,"INSERT INTO renew_onlinetransfer (customer_id, order_id,r_invid, ontransfertype, onlinetransferamount, total_ontranferamount, ontransferpending, totlpayableontransfer, ontransferpaid,transferdate,bankonline) VALUES ('$customer_id', '$orderid','$rinv', '$ontransfertype', '$onlinetransferamount', '$total_ontransferamount', '$ontransferpending', '$totlpayableontransfer', '$ontransferpaid','$transferdate','$bankonline')");

	}

	

	

		if($onlinetype=="Yes")

	{

$chonq=mysqli_query($con,"INSERT INTO renew_online (customer_id, order_id,r_invid, onlinetype, pending) VALUES ('$customer_id', '$orderid', '$rinv','$onlinetype', '$totalpending')");

	}

	if($amount==$paidamount)

	{

	

	$ruq=mysqli_query("update renew_invoice set status='paid',paid_on='$curdate' where id='$rinv'");

		$status='done';

	}

	else

	{

		$status='pending';

	}

	

		$pyq=mysqli_query($con,"INSERT INTO rpayment_list (customer_id, order_id,r_invid, total_amount, paid_amount, pending_amount, status,cashamount,chequeamount,payment_type,advance_amount,advance_paid,online_transfer_amount) VALUES ('$customer_id', '$orderid','$rinv', '$amount', '$paidamount', '$totalpending', '$status','$cashamount','$chequeamount','fullpayment','0','0','$onlinetransferamount')");

		$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;

			$to=$email;	

				$od_rinv="OID$orderid-R$rinv";

		$subject = "Subscription Renewal Confirmation – OGTS";



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

		<td>Thank you for your subscription renewal order for $submonth months starting from $curdate.</td>

		</tr>

	

		<tr>

		<td>Order Confirmation details;</td>

		</tr>

		<tr>

		<td style='font-weight: bold;'>Order Number	: $orderid</td>

		</tr>

		<tr>

		<td style='font-weight: bold;'>Subscription Charges	: Rs $finalcost</td>

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

		

		$notif="Your subscription renewal payment of Rs.$amount against order OD_$orderid  is successful.";

$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action, order_id,notification, table_name, table_id) VALUES ('$customer_id','renewed','$orderid', '$notif', 'renew_invoice','$rinv')");







$aqc=mysqli_query($con,"select * from admin_data where user_type='admin'");

$ares=mysqli_fetch_array($aqc);

$emailid=$ares['email_id'];
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$emailid;

$subject = "Order Renewed Details - OGTS";

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

            



<table width='600' border='0' cellspacing='0' cellpadding='0' valign='top' bgcolor='#f4efdb' style='background-color: rgb(224, 244, 255);'>

<tr style='font-family: calibri;'>

  <td align='center' valign='top'>

  <table width='600' border='0' cellspacing='0' cellpadding='10' style='background-color: rgb(224, 244, 255);''>

    <tr>

      <td align='left'>

	 

       

       

		<tr>

			<td><p style='font-weight: bold;'>Dear Admin,</p></td>

			

			

		</tr>

		

               <tr>

               <td>An order OD$orderid has been renewed against Renewal Invoice RINV$rinv of Rs $finalcost .</td>

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



$from = "admin@ossgpstracking.com";

$headers = "MIME-Version: 1.0" . "\r\n";

$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
$headers .= "From:" . $from. "\r\n" ."BCC: ".$bcc ;

mail($to,$subject,$message,$headers);



?>
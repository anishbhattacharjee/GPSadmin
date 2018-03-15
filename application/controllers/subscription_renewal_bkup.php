<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class subscription_renewal_bkup extends CI_Controller {

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

		$this->load->view('admin/subscription_renewal');

	}

	public function renewal()

	{

		$this->load->view('admin/renewal');

	}

	public function renewed()

	{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

		$installation_id=(isset($_POST['installation_id']))?$_POST['installation_id']:'';

		$engineer_id=(isset($_POST['engineer_id']))?$_POST['engineer_id']:'';

		$device_name=(isset($_POST['device_name']))?$_POST['device_name']:'';

		$model_id=(isset($_POST['model_id']))?$_POST['model_id']:'';

		$imie_no=(isset($_POST['imie_no']))?$_POST['imie_no']:'';

		$ordereddate=(isset($_POST['ordereddate']))?date("Y-m-d",strtotime($_POST['ordereddate'])):'';

		$category_id=(isset($_POST['category_id']))?$_POST['category_id']:'';

		$device_id=(isset($_POST['device_id']))?$_POST['device_id']:'';

		$submonth=(isset($_POST['submonth']))?$_POST['submonth']:'';

		$subcost=(isset($_POST['subcost']))?$_POST['subcost']:'';

		$network=(isset($_POST['network']))?$_POST['network']:'';

		$simcharge=(isset($_POST['simcharge']))?$_POST['simcharge']:'';

		$servicetax=(isset($_POST['servicetax']))?$_POST['servicetax']:'';

		$amount=(isset($_POST['finalcost']))?$_POST['finalcost']:'';

		$finalcost=(isset($_POST['finalcost']))?$_POST['finalcost']:'';

		$r_id=(isset($_POST['r_id']))?$_POST['r_id']:'';

		$company_id=(isset($_POST['company_id']))?$_POST['company_id']:'';

		$demo_device_type=(isset($_POST['demo_device_type']))?$_POST['demo_device_type']:'';



		$curdate=date("Y-m-d");

		

	/*	$qo=mysqli_query($con,"select * from installation i where i.instatllation_id='$installation_id' and i.order_id='$orderid' and i.customer_id='$customer_id'");

		if(mysqli_num_rows($qo)>0)

		{

		$rq=mysqli_query("update installation set submonth='$submonth',order_date=$curdate where instatllation_id='$installation_id'");

		$ruq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth' where r_id='$r_id'");

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

			$riq=mysqli_query($con,"INSERT INTO installation (customer_id, order_id, category_id, model_id, engineer_id, sim_no, device_id, imie_no, device_name, allocation_status, remarks, approve_status, installation_status, installed_date, installation_remarks, device_status, create_date_time, demo_device_type, allocated_date_time, company_id, image, speed_limit, idle_limit, device_date_time, assign_device_status, assign_engineer, submonth, order_date) VALUES ('$customer_id', '$orderid', '$category_id', '$model_id', '$engineer_id', '', '$device_id', '$imie_no', '$device_name', 'completed', '', '', 'completed', '$curdate', 'completed', 'active', CURRENT_TIMESTAMP, '$demo_device_type', '', '$company_id', 'noimage.jpg', '0', NULL, '', 'assigned', 'assigned', '$submonth', '$curdate');");

			$ruaq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth' where r_id='$r_id'");

			if($riq!=FALSE&&$ruaq!=FALSE)

				{

					$data['msg1']="Renewed Successfully";

				}

				else

				{

					$data['msg1']="Could not Renew";

				}

		} */

			

		$iq=mysqli_query($con,"INSERT INTO renew_invoice (r_id, customer_id, order_id, category_id, device_id, sub_month, sub_cost, network, simcharge_permonth, service_tax, final_total) VALUES ('$r_id','$customer_id', '$orderid', '$category_id', '$device_id', '$submonth', '$subcost', '$network', '$simcharge', '$servicetax', '$finalcost')");

		$rinv=mysqli_insert_id();

		$iqs=mysqli_query("update r_installation set r_invoice=$rinv,renew_month='$submonth',renew_approve_status='pending' where r_id=$r_id");

		

		$pyq=mysqli_query($con,"INSERT INTO rpayment_list (customer_id, order_id,r_invid, total_amount, paid_amount, pending_amount, status,cashamount,chequeamount,payment_type,advance_amount,advance_paid) VALUES ('$customer_id', '$orderid','$rinv', '$amount', '0', '$amount', 'pending','0','0','','0','0')");

		

		

		if($iqs!=FALSE&&$pyq!=FALSE&&$iq!=FALSE)

				{

					$data['msg1']="Renewed Successfully But Need to get Approval From Approver";

				}

				else

				{

					$data['msg2']="Could not Renew";

				}

		

		

$q1=mysqli_query($con,"select * from customers where customer_id='$customer_id'");

	$res=mysqli_fetch_array($q1);

	$name=$res['customer_first_name'];

	$email=$res['customer_emailid'];	

	$phone=$res['customer_phone_no'];

		
$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
			$to=$email;	

				$od_rinv="OID$orderid-R$rinv";

		$subject = "Order Confirmation – OGTS";



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

		<td>Thank you for your subscription renewal order for $submonth months starting from $curdate will be active once you do the payment.</td>

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

		

		$notif="Your subscription renewal payment of Rs.$finalcost against order OD_$orderid is pending.";

$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,action, order_id,notification, table_name, table_id) VALUES ('$customer_id','renewed','$orderid', '$notif', 'renew_invoice','$rinv')");







$aqc=mysqli_query($con,"select * from admin_data where user_type='admin'");

$ares=mysqli_fetch_array($aqc);

$emailid=$ares['email_id'];

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$emailid.","."deekshith@ossgpstracking.com";

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

               <td>An order OD$orderid has been renewed against Renewal Invoice RINV$rinv of Rs $finalcost is pending for an approval.</td>

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

		

		

		

		$this->load->view('admin/subscription_renewal',$data);

	}



public function invoice()

{

	$this->load->view('admin/renew_invoices');

}



public function renew_invoice()

{

	$this->load->view('admin/renew_invoice');

}



public function approve_renewal_list()

{

	$this->load->view('admin/approve_renewal_list');

}

public function approve()

{

	$this->load->view('admin/approve');

}



public function approved()

{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

		$installation_id=(isset($_POST['installation_id']))?$_POST['installation_id']:'';

		$engineer_id=(isset($_POST['engineer_id']))?$_POST['engineer_id']:'';

		$device_name=(isset($_POST['device_name']))?$_POST['device_name']:'';

		$model_id=(isset($_POST['model_id']))?$_POST['model_id']:'';

		$imie_no=(isset($_POST['imie_no']))?$_POST['imie_no']:'';

		$ordereddatee=(isset($_POST['ordereddatee']))?date("Y-m-d",strtotime($_POST['ordereddatee'])):'';

		$category_id=(isset($_POST['category_id']))?$_POST['category_id']:'';

		$device_id=(isset($_POST['device_id']))?$_POST['device_id']:'';

		$submonth=(isset($_POST['submonth']))?$_POST['submonth']:'';

		$rinv=(isset($_POST['rinv']))?$_POST['rinv']:'';

		

		$r_id=(isset($_POST['r_id']))?$_POST['r_id']:'';

		$company_id=(isset($_POST['company_id']))?$_POST['company_id']:'';

		$demo_device_type=(isset($_POST['demo_device_type']))?$_POST['demo_device_type']:'';

		$curdate=(isset($_POST['curdate']))?$_POST['curdate']:'';

		

		$ruaq=mysqli_query("update r_installation set renew_approve_status='approved',renew_status='renewed' where r_id=$r_id");

		$qo=mysqli_query($con,"select * from installation i where i.instatllation_id='$installation_id' and i.order_id='$orderid' and i.customer_id='$customer_id'");

		if(mysqli_num_rows($qo)>0)

		{

		$rq=mysqli_query("update installation set submonth='$submonth',installed_date='$curdate' where instatllation_id='$installation_id'");

	//	$ruq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth' where r_id='$r_id'");

		if($rq!=FALSE&&$ruaq!=FALSE)

				{

					$data['msg1']="Renewed Successfully";

				}

				else

				{

					$data['msg2']="Could not Renewsss";

				}

		}

		else if(mysqli_num_rows($qo)<=0)

		{

			$riq=mysqli_query($con,"INSERT INTO installation (customer_id, order_id, category_id, model_id, engineer_id, sim_no, device_id, imie_no, device_name, allocation_status, remarks, approve_status, installation_status, installed_date, installation_remarks, device_status, create_date_time, demo_device_type, allocated_date_time, company_id, image, speed_limit, idle_limit, device_date_time, assign_device_status, assign_engineer, submonth, order_date) VALUES ('$customer_id', '$orderid', '$category_id', '$model_id', '$engineer_id', 'No Sim Chosen', '$device_id', '$imie_no', '$device_name', 'completed', '', '', 'completed', '$curdate', 'completed', 'active', CURRENT_TIMESTAMP, '$demo_device_type', '', '$company_id', 'noimage.jpg', '0', NULL, '', 'assigned', 'assigned', '$submonth', '$curdate')");

			$ruaq=mysqli_query("update r_installation set renew_status='renewed',renew_month='$submonth',renew_approve_status='approved' where r_id='$r_id'");

			if($riq!=FALSE&&$ruaq!=FALSE)

				{

					$data['msg1']="Renewed Successfully";

				}

				else

				{

					$data['msg2']="Could not Renewwwwwww";

				}

		} 

			

			



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

               <td>An order OD$orderid has been renewed against Renewal Invoice RINV$rinv is approved.</td>

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

		

		

	

	$this->load->view('admin/approve_renewal_list',$data);

}



}
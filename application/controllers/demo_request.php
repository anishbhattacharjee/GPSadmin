<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class demo_request extends CI_Controller {

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

		$this->load->view('admin/demo_request');

	}

	

		public function basic_data()

	{

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

		$this->load->view('admin/demo_request');

	}

	}

	public function existdata()

	{

		if(isset($_GET['msg']))

	{

		$data['msg1']=(isset($_GET['msg']))?$_GET['msg']:'';

		$data['uid']=(isset($_GET['uid']))?$_GET['uid']:'';

	
		$this->load->view('admin/demo_exist_customer',$data);

	}

	

	}

	

	

	

		public function customer_save_data()

	{

	$this->load->library('email');

		$ctype=(isset($_POST['type']))?$_POST['type']:'';



		$firstname=(isset($_POST['firstname']))?$_POST['firstname']:'';



		$middlename=(isset($_POST['middlename']))?$_POST['middlename']:'';



		$lastname=(isset($_POST['lastname']))?$_POST['lastname']:'';



		$gender=(isset($_POST['sex']))?$_POST['sex']:'';



		$app_date=(isset($_POST['dob']))?$_POST['dob']:'';



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
			$created_byid=(isset($_POST['created_byid']))?$_POST['created_byid']:'';

			$created_dt=(isset($_POST['created_dt']))?(date("Y-m-d h:i:s",strtotime($_POST['created_dt']))):'';

			
		    $school=(isset($_POST['school']))?$_POST['school']:'0';
			$school_login=(isset($_POST['school_login']))?$_POST['school_login']:'0';
			$dealers_customer=(isset($_POST['dealers_customer']))?$_POST['dealers_customer']:'0';
			$dob=0;

			if($ctype=='individual')

			{
	$state=(isset($_POST['statee']))?$_POST['statee']:'';
		$dealer_id=(isset($_POST['dealer_idd']))?$_POST['dealer_idd']:'';
			$city=(isset($_POST['cityy']))?$_POST['cityy']:'';

		$pincode=(isset($_POST['pincodee']))?$_POST['pincodee']:'';
			$indtt=explode("-",$app_date);



$dob = $indtt[2]."-".$indtt[1]."-".$indtt[0];

$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,created_date_time,created_by,password,state,city,pin_code,account_type,fromm,is_school,is_sublogin,dealers_customer) VALUES ('$uid','$ctype','$firstname', '$middlename', '$lastname', '$gender','$dob','$phno', '$tphno', '$email', '$paddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$created_dt','$created_by','$password','$state','$city','$pincode','demo','$dealer_id','$school','$school_login','$dealers_customer')");
$ab=mysqli_insert_id();
$ss=mysqli_query($con,"INSERT INTO alert_control(customer_id) VALUES ($ab)");

}

else

{
$state=(isset($_POST['state']))?$_POST['state']:'';
		$dealer_id=(isset($_POST['dealer_id']))?$_POST['dealer_id']:'';
			$city=(isset($_POST['city']))?$_POST['city']:'';

		$pincode=(isset($_POST['pincode']))?$_POST['pincode']:'';

$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,created_date_time,created_by,password,state,city,pin_code,account_type,fromm,is_school,is_sublogin,dealers_customer) VALUES ('$uid','$ctype','$compname', '$middlename', '$lastname', '$gender','$dob','$ctphno', '$tphno', '$cemail', '$cmpaddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$created_dt','$created_by','$password','$state','$city','$pincode','demo','$dealer_id','$school','$school_login','$dealers_customer')");

		$aab=mysqli_insert_id();
$sss=mysqli_query($con,"INSERT INTO alert_control(customer_id) VALUES ($aab)");


	}

		if($q)
{


$aqc=mysqli_query($con,"select * from admin_data where id='$created_byid'");

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
$subject = "Registration Confimation - OGTS Team";
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
		<td>Greetings from OSS GPS Tracking Solutions!!!</td>
		</tr>
		<tr><td>Customer ID - $uid has been Successfully Registered With OSS GPS Tracking Solutions For Demo Request</td></tr>

	
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


$qsq=mysqli_query($con,"select customer_id from customers  where customer_uid='$uid' group by customer_uid");
while($rsq=mysqli_fetch_array($qsq))
{
$cid=$rsq['customer_id'];
}
	$qs=mysqli_query($con,"INSERT into customer_proof_details(customer_id,cust_proof,proof_descptn,proof_files,status) values('$cid','no proof','Back end Order Creation','no docs','verified')");
$data['msg1']= "Customer Basic Details Entered Successfully.Please Enter the Order Details";

$data['cid']= $cid;

	}

	if($ctype=='individual')

			{

	$this->load->view('admin/demo_order_details',$data);

	}

	else

	{

	$data['ctypes']= $ctype;

		$data['fname']= $compname;

			$this->load->view('admin/demo_order_details',$data);

	}

	}

	

	

		public function demo_order_details()

	{

	$em=urldecode($this->uri->segment(3));

	$cd=$this->uri->segment(4);

	

		$email=(isset($_POST['email']))?$_POST['email']:$em;

	

		$cid=(isset($_POST['cid']))?$_POST['cid']:$cd;

		$data['msg1']= "Please Enter the Order Details";

		$data['cid']=$cid;

		$qsq=mysqli_query($con,"select type,customer_first_name from customers  where customer_id='$cid'");

while($rsq=mysqli_fetch_array($qsq))

{

$ctype=$rsq['type'];

$fname=$rsq['customer_first_name'];

}

if($ctype=='individual')

			{

	$this->load->view('admin/demo_order_details',$data);

	}

	else

	{

	$data['ctypes']= $ctype;

	$data['fname']= $fname;

			$this->load->view('admin/demo_order_details',$data);

	}

	//	$this->load->view('admin/enter_order_details',$data);

	}

	

	public function approve()

	{

		$this->load->view('admin/approve_demo_order');

	}

	

	public function view_demo_order()

	{

		$this->load->view('admin/view_demo_order');

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

$sq=mysqli_query($con,"select * from customer_orders where order_id='$oid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];

$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$ctaname=$aress['name'];
}



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
			<td><p style='font-weight: bold;'>Dear $maname,</p></td>
			
			
		</tr>
		<tr>
		<td>Demo Request ID OD_$oid created by user $ctaname for Demo Request is pending for Device & SIM allocation .</td>
	
		
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

		$data['msg2']="Couldnot Approve the Order";

	}

		$this->load->view('admin/approve_demo_order',$data);

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
		<td>Demo Request ID OD_$oid created on $order_date is rejected. </td>
	
		
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
$data['msg1']="Order has been Rejected";
	}

	else

	{

		$data['msg2']="Couldnot Reject the Order";

	}



		$this->load->view('admin/approve_demo_order',$data);

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

		$this->load->view('admin/approve_demo_order',$data);

	}

	

	public function confirmed()

	{

		$this->load->view('admin/demo_order_confirmed');

	}

	public function assign_device()

	{

		$this->load->view('admin/demo_assign_device');

	}

		public function assigned_device()

	{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';

		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';

		$ndev=(isset($_POST['ndev']))?$_POST['ndev']:'';

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

		$needengineer=(isset($_POST['needengineer']))?$_POST['needengineer']:'';

			$apdtt=date('Y-m-d H:i:s',strtotime('+330 minutes'));

if($needengineer=='Yes')

{

		

		

		for($i=1;$i<=$ndev;$i++){

	

		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';

		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';

		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';

		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';

		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';

		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';

		$sim = (isset($_POST['sim'.$i]))?$_POST['sim'.$i]:'0';

	

		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,demo_device_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','demo')");

		
$imq=mysqli_query($con,"INSERT into latest_records(imei) values('$imieno')");
		}

	

		

			$uq=mysqli_query("update customer_order_details set device_assign='assigned' where order_id='$orderid'");

			$sq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
		$order_date=$rsq['order_date'];
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

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$memailid;	
$subject = "Installation Demo Request ID OD_$orderid";
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
		<td>Demo Request ID OD_$orderid created by user $ctaname is pending for Engineer allocaiton for installation</td>
	
		
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

$intdt=date("Y-m-d");

$asdt=date("Y-m-d h:i:s");

	for($i=1;$i<=$ndev;$i++){

	

		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';

		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';

		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';

		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';

		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';

		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';

		$sim = (isset($_POST['sim'.$i]))?$_POST['sim'.$i]:'0';

		

		$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,device_date_time,assign_device_status,installation_remarks,installed_date,installation_status,allocated_date_time,assign_engineer,demo_device_type) VALUES ('$customer_id','completed','$sim', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','assigned','installed','$intdt','completed','$asdt','assigned','demo')");

		

		}

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

		$this->load->view('admin/demo_order_confirmed',$data);

	}

	

		public function assigned_devicelist()

		{

		$this->load->view('admin/demo_assigned_devicelist');

		}

		

		

		public function assign_engineer()

		{

		$this->load->view('admin/demo_assign_engineer');

		}

		

	public function assigned_engineer()

	{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$customer_main_order_id=(isset($_POST['customer_main_order_id']))?$_POST['customer_main_order_id']:'';

		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';

	

		



		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';



	

		$opdt=(isset($_POST['app_date']))?$_POST['app_date']:'';

			$apptime=(isset($_POST['apptime']))?$_POST['apptime']:'';

			

			$indtt=explode("-",$opdt);



$app_date = $indtt[2]."-".$indtt[1]."-".$indtt[0];

	//var_dump($app_date);

		$apdt=$opdt.' '.$apptime;

		$apdtt=$app_date.' '.$apptime;

		//var_dump($apdtt);

		//exit;

	//	$currentDateTime = '08/04/2010 22:15:00';

//$newDateTime = date('h:i A', strtotime($currentDateTime));

$newtime= date('h:i A', strtotime($apdt));

//var_dump($opdt);

//var_dump($newtime);

//exit;

//$newtimee= date('h:i A', strtotime($opdt));



	

		

			$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");

	while($r=mysqli_fetch_array($qs))

	{

		$uid=$r['customer_uid'];

		$email=$r['customer_emailid'];

		$name=$r['customer_first_name'];

		$address=$r['address'];

		$customer_phone_no=$r['customer_phone_no'];

	}

		
	$sq=mysqli_query($con,"select * from customer_orders where order_id='$orderid'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
		$order_date=$rsq['order_date'];
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
		

		for($i=1;$i<=$cnt;$i++){

	

		$category_id=(isset($_POST['category_id'.$i]))?$_POST['category_id'.$i]:'';

		$device_type=(isset($_POST['device_type'.$i]))?$_POST['device_type'.$i]:'';

		$noofdevice=(isset($_POST['noofdevice'.$i]))?$_POST['noofdevice'.$i]:'';

		$modelid = (isset($_POST['modelid'.$i]))?$_POST['modelid'.$i]:'0';

		$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';

		$devicesnm = (isset($_POST['devicesnm'.$i]))?$_POST['devicesnm'.$i]:'0';

				$cmpid = (isset($_POST['cmp'.$i]))?$_POST['cmp'.$i]:'0';

				$engid = (isset($_POST['engid'.$i]))?$_POST['engid'.$i]:'0';

				$installation_id = (isset($_POST['installation_id'.$i]))?$_POST['installation_id'.$i]:'0';

				$devtype = (isset($_POST['devtype'.$i]))?$_POST['devtype'.$i]:'0';

				$cattype= (isset($_POST['cattype'.$i]))?$_POST['cattype'.$i]:'0';



//echo "update installation set allocated_date_time='$apdtt',engineer_id='$engid',company_id='$cmpid' where instatllation_id='$installation_id'";

$q=mysqli_query("update installation set allocated_date_time='$apdtt',engineer_id='$engid',company_id='$cmpid',assign_engineer='assigned' where instatllation_id='$installation_id'");



	//$q=mysqli_query($con,"INSERT INTO installation (customer_id,allocation_status, engineer_id, sim_no, model_id,imie_no,category_id,device_id,order_id,device_name,allocated_date_time,company_id) VALUES ('$customer_id','completed','$engid', '56', '$modelid','$imieno','$category_id','$device_type','$orderid','$devicesnm','$apdtt','$cmpid')");

	$eq=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid'");

		while($req=mysqli_fetch_array($eq))

		{

			$engname=$req['engineers_fname'];

			$engphno=$req['engineers_phno'];

			$engemail=$req['engineers_email'];

		//	var_dump($engemail);



$data['msg1']="Engineers Assigned Successfully";

$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$engemail;	
$subject = "Demo Request ID - OD_$orderid - Installation Schedule & Engineer Details";
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
		<td>For $cattype - $devtype installation against Demo Request ID - OD_$orderid is scheduled on $opdt at $newtime</td></tr>
		
		
		<tr><td>Customer address : $address</td></tr>
		<tr><td>Contact : $customer_phone_no</td></tr>
		
	
	
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

		}

		if($q!=FALSE)

		{

			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$orderid','engineer', 'Engineer and Device has been assigned to u successfully', 'installation', '')");	

			$uq=mysqli_query("update customer_order_details set assign='assigned' where order_id='$orderid'");

		$this->load->library('email');



$a="admin@ossgpstracking.com";
$b="deekshith@ossgpstracking.com";
$c="mallikarjun@ossgpstracking.com";
$d="tanmoydey@ossgpstracking.com";
$bcc=$a.",".$b.",".$c.",".$d;
$to=$email;	
$subject = "Demo Request ID - OD_$orderid - Installation Schedule & Engineer Details";
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
		<td>As per the telecon, the installation against Demo Request ID– OD_$orderid is scheduled on $opdt at $newtime. </td></tr>
		
		<tr><td>Engineer details are as below :</td></tr>
		<tr><td>Engineer Name : $engname</td></tr>
		<tr><td>Mobile No : $engphno</td></tr>
		<tr><td>Installation Address : $address</td></tr>
		<tr><td>Note - A functional SIM card with a subscription to a data plan of at least 1GB per month at 2G Speed is required for the installation</td></tr>
	
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

			$data['msg2']="Engineers has not been Assigned";

		}

		//$this->load->view('admin/installation',$data);

		$this->load->view('admin/demo_assigned_devicelist',$data);

	}

	

	

	public function no_engineer()

	{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

		$intdt=date("Y-m-d");

		$asdt=date("Y-m-d h:i:s");

		$q=mysqli_query("update installation set installation_remarks='installed',installed_date='$intdt',installation_status='completed',allocated_date_time='$asdt',assign_engineer='assigned' where customer_id='$customer_id' and order_id='$orderid'");

					$uq=mysqli_query("update customer_order_details set assign='assigned' where order_id='$orderid'");

		if($q!=FALSE)

		{

		

			$data['msg1']="No Engineers Required";

		

		}

		else

		{

			$data['msg2']="Could not Proceed";

		}

			$this->load->view('admin/demo_assigned_devicelist',$data);

	}

	

	public function status_pending()

	{

		$this->load->view('admin/demo_status_pending.php');

	}

	public function status_change()

	{

	$instatllation_id=(isset($_POST['instatllation_id']))?$_POST['instatllation_id']:'';

	$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$order_id=(isset($_POST['order_id']))?$_POST['order_id']:'';

	

	

	$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");

	while($r=mysqli_fetch_array($qs))

	{

		$email=$r['customer_emailid'];

		$name=$r['customer_first_name'];

	}

	$status=(isset($_POST['status']))?$_POST['status']:'';

	$maildate=(isset($_POST['installed_date']))?$_POST['installed_date']:'';
	$installed_date=(isset($_POST['installed_date']))?date("Y-m-d",strtotime($_POST['installed_date'])):'';

	//var_dump($installed_date);

	//exit;

	//date("d-m-Y h:i:s",strtotime($srs['order_date']));

	$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';

	if($status=='pending')

	{

	

	$q=mysqli_query("update installation set installation_status='$status',installed_date='$installed_date',installation_remarks='$remarks' where instatllation_id='$instatllation_id'");

	if($q!=FALSE)

		{

			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$order_id','installation', 'Installation is still in pending', 'installation', '')");	

			

	

		$this->load->library('email');



		

$subject = "Installation is still Pending !!!";

$to = $email;

$message = "<h3>Dear Customer,</h3><br/>";

$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4><br/>";

$message.= "<h4>We would like to inform you that your installation against OD$order_id is still pending.</h4><br/>";

$message.= "<h4>$remarks</h4><br/>";

$message.= "<h4>For any queries or further assistance please reach our Customer Support team on +91 80 49632211</h4><br/>";

$message.="<h4>Assuring you of our best services always.</h4><br/>";

$message.="<h4>Thank You,</h4>><br/>";

$message.="<h4>OGTS Team </h4>";

$message.="<h4>DISCLAIMER: </h4>";

$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";



$headers = "MIME-Version: 1.0" . "\r\n";

$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";



// More headers

$headers.= 'From:admin@ossgpstracking.com' . "\r\n";

mail($to,$subject,$message,$headers);

		

			$data['msg1']="Installation Status Changed Successfully";

		}

		else

		{

			$data['msg2']="Installation Status Not Changed Successfully";

		}

		

	}

	else if($status=='completed')

	{

		$q=mysqli_query("update installation set installation_status='$status',installed_date='$installed_date',installation_remarks='$remarks' where instatllation_id='$instatllation_id'");

	if($q!=FALSE)

		{

		

		$qs=mysqli_query($con,"select * from installation where order_id='$order_id'");

	while($r=mysqli_fetch_array($qs))

	{

	$engid=$r['engineer_id'];

	}

		$eq=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid'");

		while($req=mysqli_fetch_array($eq))

		{

			$engname=$req['engineers_fname'];

			$engphno=$req['engineers_phno'];

			$engemail=$req['engineers_email'];

		}

		

			$qp=mysqli_query($con,"INSERT INTO notifications (customer_id,order_id,action, notification, table_name, table_id) VALUES ('$customer_id','$order_id','installation', 'Device Installed Successfully', 'installation', '')");	

			

	

		$this->load->library('email');



		

$sq=mysqli_query($con,"select * from customer_orders where order_id='$order_id'");
	$rsq=mysqli_fetch_array($sq);
	$created_by=$rsq['created_by'];
	$order_date=$rsq['order_date'];
	$order_date=date("d-m-Y",strtotime($order_date));
		
		$aqcs=mysqli_query($con,"select * from admin_data where id='$created_by'");
while($aress=mysqli_fetch_array($aqcs))
{

$umail_id=$aress['email_id'];
$ctaname=$aress['name'];
}
		
		
$to=$email;	
$subject = "Demo Request ID - OD$order_id - Installation Completion ";
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
		<td>We are glad to inform you that our engineer  Mr $engname has successfully completed the installation against Demo Request ID– OD_$order_id on $maildate. </td>
		
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
$headers .= "From:" . $from. "\r\n" ."CC: ".$from ;
mail($to,$subject,$message,$headers);

$to=$umail_id;	
$subject = "Demo Request ID - OD$order_id - Delivery & Installation Complete";
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
		<td>Delivery & Installation against Demo Request ID - OD_$order_id created on $order_date is completed.</td>
		
		
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
	$data['msg1']="Installation Done Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Installation Done Status Not Changed Successfully";
		}
	}
	else
	{
		$data['msg2']="Installation Done Status Not Changed Successfully";
	}
		$this->load->view('admin/demo_status_pending.php',$data);
	}
	public function demo_installation_completed()
	{
		$this->load->view('admin/demo_installation_completed');
	}
public function demo_requestlist()
	{
		$this->load->view('admin/demo_requestlist');
	}
	public function device_status_change()
	{
		$order_id=(isset($_POST['order_id']))?$_POST['order_id']:'';
		$status=(isset($_POST['status']))?$_POST['status']:'';
	

$cq=mysqli_query("update customer_orders set device_status='$status' where order_id='$order_id'");

if($cq!=FALSE)
		{
			$data['msg1']="Status Changed Successfully";
		}
		else
		{
			$data['msg2']="Couldnot Change a Status";
		}
		$this->load->view('admin/demo_requestlist',$data);
	}
	public function demo_detail_info()
	{
		$this->load->view('admin/demo_detail_info');
	}
	
	public function delete_order()
	{
	
		$customer_id=$this->uri->segment(3);
		$order_id=$this->uri->segment(4);

		$dq=mysqli_query("delete  from customer_orders where order_id='$order_id' and customer_id='$customer_id'");
		$dcq=mysqli_query("delete  from customer_order_details where order_id='$order_id' and customer_id='$customer_id'");
		if($dq!=FALSE && $dcq!=FALSE)
		{
			$data['msg1']="Order has been Deleted";
		}
		else
		{
			$data['msg2']="Couldnot Delete a Order";
		}
		$this->load->view('admin/demo_order_confirmed',$data);
	}
	
}
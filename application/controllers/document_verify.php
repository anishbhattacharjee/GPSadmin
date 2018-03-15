<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class document_verify extends CI_Controller {

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
		$this->load->view('admin/document_verify');
	}
	
	public function change()
	{
	$proof_id=(isset($_POST['proof_id']))?$_POST['proof_id']:'';
	$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';
	$status=(isset($_POST['status']))?$_POST['status']:'';
	$remarks=(isset($_POST['remarks']))?$_POST['remarks']:'';
	
	
	$app_date=(isset($_POST['app_date']))?$_POST['app_date']:'';
//	$apptime=(isset($_POST['apptime']))?$_POST['apptime']:'';
	//$apdt=$app_date.' '.$apptime;
		$qs=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
	while($r=mysqli_fetch_array($qs))
	{
		$email=$r['customer_emailid'];
		$name=$r['customer_first_name'];
	}
	$qo=mysqli_query($con,"select * from customer_order_details where customer_id='$customer_id'");
						while($srs=mysqli_fetch_array($qo))
						{
						$orderid=$srs['order_id'];
						}

	 if($status=='pending')
	{
		$q=mysqli_query("update customer_proof_details set status='$status',pending_date_time='$app_date',proof_descptn='$remarks' where customer_id='$customer_id'");
		

		$qp=mysqli_query("update notifications set notification='document verification is still in pending',table_name='customer_proof_details', table_id='$proof_id' where customer_id='$customer_id' and table_name='customer_proof_details'");
		//$cq=mysqli_query("update customer_orders set approve_status='approved' where customer_id='$customer_id'");
	if($q!=FALSE)

		{
$this->load->library('email');

		
$subject = "Document Verification Details !!!";
$to = $email;
$message = "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4>";
$message.= "<h4>We would like to inform you that your document verification  has not been completed. </h4>";
$message.="Assuring you of our best services always.<br/><br/><br/><br/>";
$message.="Thank You,<br/><br/><br/><br/>";
$message.="OGTS Team <br/><br/><br/>";
$message.="<h5>DISCLAIMER: </h5>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers.= 'From:admin@ossgpstracking.com' . "\r\n";
mail($to,$subject,$message,$headers);
			$data['msg1']="Document Verification is still in Pending status";

		}

		else

		{

			$data['msg2']="Document Verified Not Done Successfully";

		}
	}
	else if($status=='verified')
	{
		
		echo "update customer_proof_details set status='$status',completed_date_time='$app_date',proof_descptn='$remarks' where customer_id='$customer_id'";
		$q=mysqli_query("update customer_proof_details set status='$status',completed_date_time='$app_date',proof_descptn='$remarks' where customer_id='$customer_id'");
		$qp=mysqli_query("update notifications set notification='document verified successfully', table_name='customer_proof_details', table_id='$proof_id' where customer_id='$customer_id' and table_name='customer_proof_details'");
	if($q!=FALSE)

		{
$this->load->library('email');

		
$subject = "Document Verification Details !!!";
$to = $email;
$message = "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4><br/>";
$message.= "<h4>We would like to thank you for the documents. Please be informed that your document verification is completed & Successful. You will receive an intimation from the OGTS team about the product delivery & Installation details. </h4><br/>";
$message.="<h4>Assuring you of our best services always.</h4><br/>";
$message.="<h4>Thank You,</h4><br/>";
$message.="<h4>OGTS Team </h4>";
$message.="<h4>DISCLAIMER: </h4>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";


$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers.= 'From:admin@ossgpstracking.com' . "\r\n";
mail($to,$subject,$message,$headers);
			$data['msg1']="Document Verified Successfully";

		}

		else

		{

			$data['msg2']="Document Verified Not Done Successfully";

		}
	}
	else if($status=='rejected')
	{
			$q=mysqli_query("update customer_proof_details set status='$status',rejected_date_time='$app_date',proof_descptn='$remarks' where customer_id='$customer_id'");
			$qp=mysqli_query("update notifications set notification='documents are rejected', table_name='customer_proof_details', table_id='$proof_id' where customer_id='$customer_id'  and table_name='customer_proof_details'");
	
	if($q!=FALSE)

		{
$this->load->library('email');

		
$subject = "Document Verification Details !!!";
$to = $email;
$message = "<h3>Dear Customer,</h3><br/>";
$message.= "<h4>Greetings from OSS GPS Tracking Solutions!</h4>";
$message.= "<h4>We would like to thank you for the documents. Please be informed that your document verification has been completed & is rejected. We request you to submit your documents once again. </h4>";
$message.="Assuring you of our best services always.<br/><br/><br/><br/>";
$message.="Thank You,<br/><br/><br/><br/>";
$message.="OGTS Team <br/><br/><br/>";
$message.="<h5>DISCLAIMER: </h5>";
$message.="<p>This is an e-mail message from <b>OSS GPS Tracking Solutions</b> subsidiary of <b>OSS Technologies Private Limited</b>. This is a Computer-generated email, please do not reply to this message. The information contained in this communication is intended solely for use by the individual or entity to which it is addressed. Use of this communication by others is prohibited. If the e-mail message was sent to you by mistake, please destroy it without reading, using, copying or disclosing its contents to any other person. We accept no liability for damage related to data and/or documents which are communicated by electronic mail.</p>";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-type:text/html;charset=iso-8859-1" . "\r\n";

// More headers
$headers.= 'From:admin@ossgpstracking.com' . "\r\n";
mail($to,$subject,$message,$headers);
			$data['msg1']="Document Rejected Successfully";

		}

		else

		{

			$data['msg2']="Document Verified Not Done Successfully";

		}
	}
	
		$this->load->view('admin/document_verify',$data);
	}
	public function completed()
	{
		$this->load->view('admin/document_verify_completed');
	}
		public function rejected()
	{
		$this->load->view('admin/document_verify_rejected');
	}
		public function log()
	{
		$this->load->view('admin/log');
	}
}
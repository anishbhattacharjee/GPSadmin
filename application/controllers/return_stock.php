<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class return_stock extends CI_Controller {

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

		$this->load->view('admin/return_stock');

	}

	

	public function entered()

	{

		$customer_id=(isset($_POST['customer_id']))?$_POST['customer_id']:'';

		$orderid=(isset($_POST['orderid']))?$_POST['orderid']:'';

		$opdt=(isset($_POST['app_date']))?$_POST['app_date']:'';

		$cnt=(isset($_POST['cnt']))?$_POST['cnt']:'';

				for($i=1;$i<=$cnt;$i++){

				$imieno = (isset($_POST['imieno'.$i]))?$_POST['imieno'.$i]:'0';

				$returnstatus = (isset($_POST['returnstatus'.$i]))?$_POST['returnstatus'.$i]:'0';

				$installation_id = (isset($_POST['installation_id'.$i]))?$_POST['installation_id'.$i]:'0';

				if($returnstatus=='Yes')

				{

							

			$q=mysqli_query("delete from installation where instatllation_id='$installation_id' and customer_id='$customer_id' and order_id='$orderid'");
		//	$coq=mysqli_query("delete from customer_order_details where customer_id='$customer_id' and order_id='$orderid'");
		//	$cq=mysqli_query("delete from customer_orders where customer_id='$customer_id' and order_id='$orderid'");
			

					if($q!=FALSE)

				{

					$data['msg1']="Recevied Stock Details has been Entered";

				}

				else

				{

					$data['msg2']="Recevied Stock Details has been Entered";

				}

				}

				else

				{
$data['msg2']="Recevied Stock Details has been Entered";
				

				}

							

			

				}


				$this->load->view('admin/return_stock',$data);

	}

}
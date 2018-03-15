<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class device_details extends CI_Controller {

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
		$this->load->view('admin/device_list');
	}
	public function add()
	{
		$category_id=$_POST['category_id'];
	//	$modelname=$_POST['modelname'];
		$devicetype=$_POST['devicetype'];
		$devicecost=$_POST['devicecost'];
	//	$imienumber=$_POST['imienumber'];
	//	$condition=$_POST['condition'];
	//	$remarks=$_POST['remarks'];
	//	$recv_date=$_POST['recv_date'];
	$iallowedExts = array("gif", "jpeg", "jpg", "png");
$iextension = end(explode(".", $_FILES["image1"]["name"]));
if ((($_FILES["image1"]["type"] == "image/gif")
|| ($_FILES["image1"]["type"] == "image/jpeg")
|| ($_FILES["image1"]["type"] == "image/jpg")
|| ($_FILES["image1"]["type"] == "image/pjpeg")
|| ($_FILES["image1"]["type"] == "image/x-png")
|| ($_FILES["image1"]["type"] == "image/png"))
&& in_array($iextension, $iallowedExts))
  {
  if ($_FILES["image1"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["image1"]["error"] . "<br>";
    }
  else
    {
     if (file_exists("../gpsfront/uploads/" . $_FILES["image1"]["name"]))
      {
	  $d=time();	
	   $img2=$d.$_FILES["image1"]["name"];
	   $_FILES["image1"]["name"] . " already exists. ";
	  move_uploaded_file($_FILES["image1"]["tmp_name"],
      "../gpsfront/uploads/" . $img2);
       "Stored in: " . "../gpsfront/uploads/" . $img2;
	   $image1=$img2;
      }
    else
      {
	  $image1=$_FILES["image1"]["name"];
      move_uploaded_file($_FILES["image1"]["tmp_name"],
      "../gpsfront/uploads/" . $_FILES["image1"]["name"]);
       "Stored in: " . "../gpsfront/uploads/" . $_FILES["image1"]["name"];
      }
    }
  }
  $iallowedExts = array("gif", "jpeg", "jpg", "png");
$iextension = end(explode(".", $_FILES["image2"]["name"]));
if ((($_FILES["image2"]["type"] == "image/gif")
|| ($_FILES["image2"]["type"] == "image/jpeg")
|| ($_FILES["image2"]["type"] == "image/jpg")
|| ($_FILES["image2"]["type"] == "image/pjpeg")
|| ($_FILES["image2"]["type"] == "image/x-png")
|| ($_FILES["image2"]["type"] == "image/png"))
&& in_array($iextension, $iallowedExts))
  {
  if ($_FILES["image2"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["image2"]["error"] . "<br>";
    }
  else
    {
     if (file_exists("../gpsfront/uploads/" . $_FILES["image2"]["name"]))
      {
	  $d=time();	
	   $img2=$d.$_FILES["image2"]["name"];
	   $_FILES["image2"]["name"] . " already exists. ";
	  move_uploaded_file($_FILES["image2"]["tmp_name"],
      "../gpsfront/uploads/" . $img2);
       "Stored in: " . "../gpsfront/uploads/" . $img2;
	   $image2=$img2;
	 
      }
    else
      {
	  $image2=$_FILES["image2"]["name"];
	   
	  if($image2='')
	  {
	  	$image2="nologo.jpg";
	  }
      move_uploaded_file($_FILES["image2"]["tmp_name"],
      "../gpsfront/uploads/" . $_FILES["image2"]["name"]);
       "Stored in: " . "../gpsfront/uploads/" . $_FILES["image2"]["name"];
      }
    }
  }
  $iallowedExts = array("gif", "jpeg", "jpg", "png");
$iextension = end(explode(".", $_FILES["image3"]["name"]));
if ((($_FILES["image3"]["type"] == "image/gif")
|| ($_FILES["image3"]["type"] == "image/jpeg")
|| ($_FILES["image3"]["type"] == "image/jpg")
|| ($_FILES["image3"]["type"] == "image/pjpeg")
|| ($_FILES["image3"]["type"] == "image/x-png")
|| ($_FILES["image3"]["type"] == "image/png"))
&& in_array($iextension, $iallowedExts))
  {
  if ($_FILES["image3"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["image3"]["error"] . "<br>";
    }
  else
    {
     if (file_exists("../gpsfront/uploads/" . $_FILES["image3"]["name"]))
      {
	  $d=time();	
	   $img2=$d.$_FILES["image3"]["name"];
	   $_FILES["image3"]["name"] . " already exists. ";
	  move_uploaded_file($_FILES["image3"]["tmp_name"],
      "../gpsfront/uploads/" . $img2);
       "Stored in: " . "../gpsfront/uploads/" . $img2;
	   $image3=$img2;
      }
    else
      {
	  $image3=$_FILES["image3"]["name"];
      move_uploaded_file($_FILES["image3"]["tmp_name"],
      "../gpsfront/uploads/" . $_FILES["image3"]["name"]);
       "Stored in: " . "../gpsfront/uploads/" . $_FILES["image3"]["name"];
      }
    }
  }
   if(@$image1==NULL)
	 {
	 	$image1="noimage.jpg";
	 }
	 if(@$image2==NULL)
	 {
	 	$image2="noimage.jpg";
	 }
	 if(@$image3==NULL)
	 {
	 	$image3="noimage.jpg";
	 }
	
		$q=mysqli_query($con,"INSERT INTO gps_devices (category_id, device_type,device_cost,device_image,img1,img2) VALUES ('$category_id', '$devicetype','$devicecost','$image1','$image2','$image3')");
		if($q!=FALSE)
		{
			$data['msg1']="Device Type Details Added Successfully";
		}
		else
		{
			$data['msg2']="Device Type Details Not Added Successfully";
		}
		$this->load->view('admin/device_list',$data);
	}
	public function subscription()
	{
		$this->load->view('admin/subscription');
	}
	public function addsubscription()
	{
		$category_id=$_GET['category_id'];
	//	$device_type=$_GET['device_type'];
	//	$modelid=$_GET['modelid'];
		$mnth=$_GET['mnth'];
		$cost=$_GET['cost'];
		$discount=$_GET['discount'];
		
		$mnthh = explode(',', $mnth);
		$costt = explode(',', $cost);
		$discountt = explode(',', $discount);
$mnthhh=sizeof($mnthh);
for($i=0; $i<$mnthhh; $i++){
	//	$q=mysqli_query($con,"INSERT INTO device_subscription (category_id, device_type,model_id,1month_cost, 3month_cost, 6month_cost, 12month_cost) VALUES ('$category_id', '$device_type','$modelid','$monthcost1', '$monthcost3', '$monthcost6', '$monthcost12')");
		
		$q=mysqli_query($con,"INSERT INTO device_subscription (category_id,month,cost,discount) VALUES ('$category_id','$mnthh[$i]', '$costt[$i]','$discountt[$i]')");
		
		}
		if($q!=FALSE)
		{
			$data['msg1']="Subscription Details Added Successfully";
		}
		else
		{
			$data['msg2']="Subscription Details Not Added Successfully";
		}
		$this->load->view('admin/subscription',$data);
	}
	
		public function margin()
		{
			$dev_id=$_POST['dev_id'];
			$margin=$_POST['margin'];
		
			
			$q=mysqli_query("update gps_devices set margin=$margin where device_id=$dev_id ");
			
	
			if($q!=FALSE)
			{
				$data['msg1']="Margin Added Successfully";
			}
			else
			{
				$data['msg2']="Margin Not Added Successfully";
			}
			$this->load->view('admin/device_list',$data);
		}
		
		public function subscriptionmargin()
		{
			$dev_id=$_POST['dev_id'];
			$margin=$_POST['margin'];
		
			
//echo "update device_subscription set dealer_margin=$margin where subscription_id=$dev_id";
			$q=mysqli_query("update device_subscription set dealer_margin=$margin where subscription_id=$dev_id");
			
	
			if($q!=FALSE)
			{
				$data['msg1']="Margin Added Successfully";
			}
			else
			{
				$data['msg2']="Margin Not Added Successfully";
			}
			$this->load->view('admin/subscription',$data);
		}

}
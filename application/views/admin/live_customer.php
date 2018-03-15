<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>GPS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->

		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->

		<!--fonts-->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDY0kkJiTPVd2U7aTOAwhc9ySH6oHxOIYM&sensor=false">
</script>
<script>
function initialize()
{
var mapProp = {
  center:new google.maps.LatLng(51.508742,-0.120850),
  zoom:5,
  mapTypeId:google.maps.MapTypeId.ROADMAP
  };
var map=new google.maps.Map(document.getElementById("googleMap")
  ,mapProp);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
	</head>
	
	
		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
		<![endif]-->

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		

		<!--inline scripts related to this page-->

	<script src="<?php echo base_url();?>assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>


<?php include 'include/adminheader.php';?>

<div class="main-container container-fluid" id="divshows">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>


		<?php include 'include/sidebar2.php';?>
	

						<script type="text/javascript">



function numbersonly(e){



var unicode=e.charCode? e.charCode : e.keyCode



if (unicode!=8){ //if the key isn't the backspace key (which we should allow)



if (unicode<48||unicode>57)







return false //if not a number



//disable key press



}



}



</script>



				<div class="main-content">

				<div class="breadcrumbs" id="breadcrumbs">

					<ul class="breadcrumb">

						<li>

							<i class="icon-home home-icon"></i>

							<a href="#">Home</a>



							<span class="divider">

								<i class="icon-angle-right arrow-icon"></i>

							</span>

						</li>



						<li class="active">Gps</li>

					</ul><!--.breadcrumb-->



					<div class="nav-search" id="nav-search">

					

					</div><!--#nav-search-->

				</div>



				<div class="page-content">

					<div class="page-header position-relative">

						<h1>

							Enter Order Details

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div><!--/.page-header-->



					<div class="row-fluid">

						<div class="span12">

						<?php

							if(isset($msg1))

							{?>

							<div class='alert alert-block alert-success'>

							<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>

							<?php

								echo $msg1;?>

								</div>

								<?php

							}

							else

							{

								echo '';

							}

							

							?>

							<!--PAGE CONTENT BEGINS-->

<div id="costdiv">



</div>

							<div class="row-fluid">

								<div class="span12">

									<div class="widget-box">

										<div class="widget-header widget-header-blue widget-header-flat">

											<h4 class="lighter">Enter Details To Convert Demo to Live Order	</h4>



											<div class="widget-toolbar">

												<label>

													<small class="green">

														<b></b>

													</small>



													

													<span class="lbl"></span>

												</label>

											</div>

										</div>

					



										<div class="widget-body">

											<div class="widget-main">

									

												<div class="row-fluid">


													<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container">

														<ul class="wizard-steps">

														<!--	<li data-target="#step1" class="active">

																<span class="step">1</span>

																<span class="title">Personal Info</span>

															</li>



															<li data-target="#step2">

																<span class="step">2</span>

																<span class="title">Document Info</span>

															</li>

-->

														<li data-target="#step1" class="active">

																<span class="step">1</span>

																<span class="title">Order Info</span>

															</li>



															<li data-target="#step2">

																<span class="step">2</span>

																<span class="title">Cash Payment</span>

															</li>
															<li data-target="#step3">

																<span class="step">3</span>

																<span class="title">Cheque Payment</span>

															</li>
															<li data-target="#step4">

<span class="step">4</span>

<span class="title">Online Transfer</span>

</li>
															<li data-target="#step5">

																<span class="step">5</span>

																<span class="title">Payment Gateway</span>

															</li>

														</ul>

													</div>



													<hr />

												

													<div class="step-content row-fluid position-relative" id="step-container">

													<form class="form-horizontal" action="<?php echo base_url();?>convert_customer/converted" method="POST" >
					
													
		
			<div class="step-pane active" id="step1">

															<div class="row-fluid">
															
															
															
									    <div class="control-group">

									<label class="control-label" for="form-field-1">Created By</label>

									<div class="controls">

									<?php

					 $un=$this->session->userdata('username'); 

				

				$q=mysqli_query($con,"select * from admin_data where email_id='$un'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['name'];
	$aid=$re['id'];
								$types=$re['user_type'];

							} ?>

									<input type="hidden" name="created_by" id="created_by" value="<?php echo $aid;?>" readonly="true"/>
									<input type="text" name="createe" id="createe" value="<?php echo $types;?>" readonly="true"/>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Created Date Time</label>

									<div class="controls">

									<input type="text" name="created_dt" id="created_dt" value="<?php echo date('d-m-Y h:i:s',strtotime('+330 minutes'));?>" readonly="true"/>

									</div>

									</div>
				
					
					<?php 
					
					$order_id = $this->uri->segment(3);
				$cq=mysqli_query($con,"select * from installation where order_id='$order_id'");
			$rqo=mysqli_fetch_array($cq);
			
					$customer_id=$rqo['customer_id'];
				
					
		?>
		
				<input type="hidden" name="customer_id" id="customer_id" value="<?php echo $customer_id;?>"/>
					
							<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id;?>"/>
								<?php
			
				$ss1=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
										while($rsq1=mysqli_fetch_array($ss1))
										{
										
										$firstname=$rsq1['customer_first_name'];
										$uid=$rsq1['customer_uid'];
										$state=$rsq1['state'];
										?>
										<?php }  ?>	
										
														<?php
							
								 if($state=='Karnataka'||$state=='karnataka')
								{
									?>
								<?php }
								else
								{
									?>
										<div class="control-group">

									<label class="control-label" for="form-input-readonly"></label>



									<div class="controls">

									<div class="span12">

									<div style="">

										<input type="radio" id="simyes" name="sim" value="Yes" onclick="changevat();">

										<label class="lbl" for="id-disable-check">2% CST</label>

										&nbsp; &nbsp;

										<input type="radio" id="simno" name="sim" value="No" onclick="changevat();">

										<label class="lbl" for="id-disable-check" >14.5% CST</label>

									</div>

									</div>

									</div>

								</div>	
									<?php
								} ?>	
										
											
						 <div class="span12">
<div class="span3" >
						
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer Name </label>

									<div class="controls">
			
										<input type="text" value="<?php echo $firstname;?>" readonly="" style="width:100px;">
										
							</div>
							</div>
							</div>
							<div class="span3" >
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer ID </label>

									<div class="controls">
									<input type="text" value="<?php echo $uid;?>" readonly="" style="width:100px;">
									</div>
									</div>
									</div>
								<div class="span3" >
							<div class="control-group">
									<label class="control-label" for="form-field-1">Order ID </label>

									<div class="controls">
					
										<input type="text" value="<?php echo "OD".$order_id;?>" readonly="">
										
							</div>
							</div>
							</div>
							</div>
											
							<?php

							$catid=$rqo['category_id'];
							$devid=$rqo['device_id'];
?>
 <div class="span12">
 
<div class="span3" >
							
							<div class="control-group">
									<label class="control-label" for="form-field-1">Category</label>

									<div class="controls">
<?php
									$sq=mysqli_query($con,"select * from gps_categories where category_id='$catid'");

									while($sqss=mysqli_fetch_array($sq))

									{
									
									$intcost=$sqss['installation_cost'];
									 ?>
							<input type="hidden" value="<?php echo $catid;?>" id="<?php echo "category_id";?>" name="<?php echo "category_id";?>" />
										<input type="text" value="<?php echo $sqss['category_type'];?>" id="<?php echo "cattype";?>" name="<?php echo "cattype";?>" readonly="" style="width: 100px;"/>
						<?php 
						
						} 
						
						?>
						</div>
						</div>
						</div>

						<div class="span3" >
							
							<div class="control-group">
									<label class="control-label" for="form-field-1">Device Type</label>

									<div class="controls">
						
						<?php
	$qq=mysqli_query($con,"select * from gps_devices where device_id='$devid'");

while($sqss=mysqli_fetch_array($qq))

									{
$cst=$sqss['device_cost'];
										?>
		<input type="hidden" value="<?php echo $devid;?>" id="<?php echo "device_id";?>" name="<?php echo "device_id";?>" />
										<input type="text" value="<?php echo $sqss['device_type'];?>" id="<?php echo "devtype";?>" name="<?php echo "devtype";?>" readonly="" style="width: 100px;"/>
							

										<?php

									}

									?>
									</div>
									</div>
									</div>

	<div class="span3" >
							<div class="control-group">
									<label class="control-label" for="form-field-1">IMEI </label>

									<div class="controls">
					
										<input type="text" value="<?php echo $rqo['imie_no'];?>" name="imei" id="imei" readonly="">
										
							</div>
							</div>
							</div>
									</div>
									
											<?php
			$ts=mysqli_query($con,"select * from settings");

										while($rts=mysqli_fetch_array($ts))

										{

											$vat=$rts['vat_percentage'];

											$tax=$rts['service_tax_percentage'];

										}?>
									 <div class="span12">
									 <table>
<tbody><tr><th>&nbsp;&nbsp;Choose Month</th><th style="margin-left: 46px;float: left;">Device Cost</th><th style="margin-left: 46px;float: left;">Installation Cost</th><th style="margin-left: 18px;float: left;">Subscription Cost</th><th style="margin-left: 25px;float: left;">Network</th><th style="margin-left: 70px;float: left;">Sim Charge/Month</th><th style="margin-left: 16px;float: left;">S Tax</th>
								<th style="margin-left: 28px;float: left;">
								<?php
							
								 if($state=='Karnataka'||$state=='karnataka')
								{
									?>VAT
								<?php }
								else
								{
									?>
									CST
									<?php
								} ?>
														
									</th>
									
									<?php if($devid==25)
			{
				?><th>PromoCode</th>
				
				<?php } ?></tr>
 
 </tbody>
 
 </table>
 <br />
 <select name="submonth" id="submonth" onchange="choosesubscription(this.value,<?php echo $catid;?>)" style="width: 150px;">
   <option >Choose Subscription</option>

								<?php 

								$qs=mysqli_query($con,"select * from device_subscription where category_id='$catid'");

								while($rss=mysqli_fetch_array($qs))

								{

									$ct=$rss['cost'];

									$dis=$rss['discount'];

									

									$val=($ct)*($dis/100);

									$subcost=$ct-$val;

									?>

									

									

								 <option value="<?php echo $rss['month'];?>" id="<?php echo $catid;?>"><?php echo $rss['month']."Months"." - ".$subcost;?></option>	

								

								<?php

								}

								?>

</select>
<input type="text"   name="devcst" id="devcst" style="width:115px;" value="<?php echo $cst;?>"/>
<input type="text"   name="intcst" id="intcst" style="width:115px;" value="<?php echo $intcost;?>"/>
<input type="text"   name="subcost" id="subcost" style="width:115px;" value="0"/>
<select name="network" id="network" onchange="getsimcharge(this,this.value);" style="width:150px;text-transform: capitalize;">

									<option>Choose Network</option>

									<?php

									$sq=mysqli_query($con,"select * from network");

									while($sqs=mysqli_fetch_array($sq))

									{

										?>

									<option value="<?php echo $sqs['id'];?>" id="<?php echo $sqs['charge'];?>"><?php echo $sqs['network_name'];?></option>	

										<?php

									}

									?>

									

									</select>
						
		<input type="text"  name="simcharge" id="simcharge" style="width:115px;" value="0"/>
		<input type="text" name="servicetax" id="servicetax"  class="servicetax" value="<?php echo $tax;?>" style="width:50px" readonly=""/>
			<input type="text" name="vat" id="vat" class="vat"   value="<?php echo $vat;?>" style="width:50px" readonly=""/>
			<?php if($devid==25)
			{
				?>
					<input type="text" name="devdiscount" id="devdiscount" style="width:90px;" onchange="checkdevicepromo(this,this.value);" /> <span id="erdiv" style="color:red;"></span>
				<?php
			} ?>
		
		<br />
		<br />


				<input type="hidden" name="total" id="total" value="0" />
		
												
							
	
									
								<div class="control-group">
				<label class="control-label">Packing & Forwarding </label>
				<div class="controls"> 
				<input type="text" name="packing" id="packing" value="0" />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Freight  </label>
				<div class="controls"> 
				<input type="text" name="freight" id="freight" value="0"  />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">SMS Package   </label>
				<div class="controls"> 
				<input type="text" name="smspackage" id="smspackage" value="0"  />
				</div>
				</div>
				<div class="control-group">
				<label class="control-label">Video Streaming </label>
				<div class="controls"> 
				<input type="text" name="video" id="video" value="0"  />
				</div>
				</div>
	 <div class="control-group">



	<label class="control-label">Service Cost(<?php echo $tax;?>%)</label>



	<div class="controls"> 


<input type="text" name="sercost" id="sercost" value="0" readonly="" onclick="getsummary();"/>



</div>

</div>
 <div class="control-group">



	<label class="control-label" id="Label2">
	<?php
							
								 if($state=='Karnataka'||$state=='karnataka')
								{ ?>
	
	
	VAT(<?php echo $vat."%";?>)
	
	<?php }
	else
	
	{
		?>
		CST(<?php echo $vat."%";?>)
		<?php
	}
	 ?>
	
	</label>



	<div class="controls"> 


<input type="text" name="vatcost" id="vatcost" value="0" readonly="" onclick="getsummary();"/>



</div>

</div>



									
			<div class="control-group">
									<label class="control-label" for="form-field-1">Final Cost</label>

									<div class="controls">
											<input type="text" name="finalcost" id="finalcost"   style="width:100px" readonly="" placeholder="click here" onclick="gettotal();"/>
											<input type="hidden" name="amount" id="amount"   style="width:100px" readonly="" placeholder="click here" onclick="gettotal();"/>
											<input type="hidden" name="finalcostt" id="finalcostt"   style="width:100px" readonly="" placeholder="click here" onclick="gettotal();"/>
									</div>
									</div>
									
						
									
									<div class="control-group">

									<label class="control-label" for="form-input-readonly"></label>



									<div class="controls">

									<div class="span12">

										<input type="radio" id="paynow" name="cashtype" value="now" onclick="payfunc();gettotal();">

										<label class="lbl" for="id-disable-check">Pay Now</label>

										&nbsp; &nbsp;

										<input type="radio" id="paylater" name="cashtype" value="later" onclick="payfunc();gettotal();">

										<label class="lbl" for="id-disable-check" >Pay Later</label>

									</div>

									</div>

								</div>
								<div  >
								
									<div class="control-group" style="display:none" id="paynowwdiv">

									<label class="control-label" for="form-field-1">Enter Code</label>

									<div class="controls">	

						
						  <input type="text" name="code" id="code" onchange="reducecost();"/>

									</div>

									</div>
									</div>
									<div class="control-group" style="display:none" id="paylaterdiv">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
											<input type="submit" value="Renew"   style="width:100px" class="btn btn-success" onclick="gettotal();"/>
									</div>
									</div>
								



									
									
									
									
		
		</div>
	

</div>
</div>



	<div class="step-pane" id="step2">

															<div class="row-fluid">
																<div class="control-group">

									<label class="control-label" for="form-input-readonly">Do You Want to Pay through Cash</label>



									<div class="controls">

									<div class="span12">

										<input type="radio" id="cashyestype" name="cashtype" value="Yes" onclick="cashpaymentstatus();">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;

										<input type="radio" id="cashnotype" name="cashtype" value="No" onclick="cashpaymentstatus();clearcash();">

										<label class="lbl" for="id-disable-check" >No</label>

									</div>

									</div>

								</div>
								<div style="display:none" id="cashpaymentdiv">
								
								<div class="control-group">

									<label class="control-label" for="form-field-1">Amount being paid by Cash</label>

									<div class="controls">	

						  <input type="text" name="cashamount" id="cashamount" onkeyup="getcashamount();" value="0"/>

									</div>

									</div>
										<div class="control-group">

									<label class="control-label" for="form-field-1">Total Order Value</label>

									<div class="controls">	

						  <input type="text" name="totlpayablecash" id="totlpayablecash" readonly=""/>

									</div>

									</div>
									
									<div class="control-group">

									<label class="control-label" for="form-field-1">Pending Amount</label>

									<div class="controls">	

						  <input type="text" name="cashpending" id="cashpending" readonly=""/>

									</div>

									</div>
									
								
									<div class="control-group">

									<label class="control-label" for="form-field-1">Paid Amount</label>

									<div class="controls">	

						  <input type="text" name="cashpaid" id="cashpaid" readonly=""/>

									</div>

									</div>
									
								</div>
								
															</div>

														</div>
														
														
															<div class="step-pane" id="step3">

																<div class="row-fluid">
																<div class="control-group">

									<label class="control-label" for="form-input-readonly">Do You Want to Pay through Cheque</label>



									<div class="controls">

									<div class="span12">

										<input type="radio" id="chequeyestype" name="chequetype" value="Yes" onclick="chequepaymentstatus();">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;

										<input type="radio" id="chequenotype" name="chequetype" value="No" onclick="chequepaymentstatus();clearcheque();">

										<label class="lbl" for="id-disable-check" >No</label>

									</div>

									</div>

								</div>
								<div style="display:none" id="chequepaymentdiv">
								<div class="control-group">

									<label class="control-label" for="form-field-1">Pending Amount to be paid</label>

									<div class="controls">	

						  <input type="text" name="chequepending" id="chequepending" readonly=""/>

									</div>

									</div>
								<div class="control-group">

									<label class="control-label" for="form-field-1">Total Order Value</label>

									<div class="controls">	

						  <input type="text" name="totlpayablecheque" id="totlpayablecheque" readonly=""/>

									</div>

									</div>
								<div class="control-group">

									<label class="control-label" for="form-field-1">Amount being paid by Cheque</label>

									<div class="controls">	

						  <input type="text" name="chequeamount" id="chequeamount" value="0" onkeyup="getchequeamount();"/ >

									</div>

									</div>
									
									
									
								
									
										<div class="control-group">

									<label class="control-label" for="form-field-1">Paid Amount</label>

									<div class="controls">	

						  <input type="text" name="chequepaid" id="chequepaid" readonly="" />

									</div>

									</div>
									
							
								<div class="control-group">
									<label class="control-label" for="form-field-1">Cheque No</label>

									<div class="controls">	

						  <input type="text" name="chequeno" id="chequeno" />

									</div>

									</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Bank Name</label>

									<div class="controls">	

						  <input type="text" name="bankname" id="bankname" />

									</div>

									</div>
									
									<div class="control-group">

									<label class="control-label" for="form-field-1">Branch Name</label>

									<div class="controls">	

						  <input type="text" name="branchname" id="branchname" />

									</div>

									</div>
									
									<div class="control-group">

									<label class="control-label" for="form-field-1">Branch Location</label>

									<div class="controls">	

						  <input type="text" name="branchlocation" id="branchlocation" />

									</div>

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1"></label>

									<div class="controls">	

						  <input type="checkbox" name="chkenter" id="chkenter" onclick="showbtndivs();" style="opacity:1" value="aa"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">I have Entered All the Details of Cheque</span>

									</div>

									</div>
									</div>
															</div>

														</div>
														
														
																	<div class="step-pane" id="step4">

									<div class="row-fluid">
										<div class="control-group">

			<label class="control-label" for="form-input-readonly">Have you Received through Online Transfer</label>


<div class="controls">

			<div class="span12">

				<input type="radio" id="ontransferyestype" name="onlinetransfertype" value="Yes" onclick="onlinetransferpaymentstatus();">

				<label class="lbl" for="id-disable-check"> Yes</label>

				&nbsp; &nbsp;

				<input type="radio" id="ontransfernotype" name="onlinetransfertype" value="No" onclick="onlinetransferpaymentstatus();clearonlinetransfer();">

				<label class="lbl" for="id-disable-check" >No</label>

			</div>

			</div>

		</div>
		<div style="display:none" id="onlinetransferdiv">
		
		<div class="control-group">

			<label class="control-label" for="form-field-1">Amount Paid</label>

			<div class="controls">	

  <input type="text" name="onlinetransferamount" id="onlinetransferamount" onkeyup="getonlinetransferamount();" value="0"/>

			</div>

			</div>
				<div class="control-group">

			<label class="control-label" for="form-field-1">Bank Name</label>

			<div class="controls">	

  <input type="text" name="bankonline" id="bankonline" />

			</div>

			</div>
				<div class="control-group">

			<label class="control-label" for="form-field-1">Transfered Date</label>

			<div class="controls">	

  <input type="text" name="transferdate" id="transferdate" />

			</div>

			</div>
			
			<div class="control-group">

			<label class="control-label" for="form-field-1">Pending Amount</label>

			<div class="controls">	

  <input type="text" name="ontransferpending" id="ontransferpending" readonly="" value=""/>

			</div>

			</div>
		
			<div class="control-group">

			<label class="control-label" for="form-field-1">Total Amount to be paid</label>

			<div class="controls">	

  <input type="text" name="totlpayableontransfer" id="totlpayableontransfer" readonly="" value=""/>

			</div>

			</div>
			<div class="control-group">

			<label class="control-label" for="form-field-1">Paid Amount</label>

			<div class="controls">	

  <input type="text" name="ontransferpaid" id="ontransferpaid" readonly=""/>

			</div>

			</div>
			
		</div>
		
	
	
									</div>

								</div>		
														
															<div class="step-pane" id="step5">

															<div class="row-fluid">
																<div class="control-group">

									<label class="control-label" for="form-input-readonly">Do You Want to Pay through Online</label>



									<div class="controls">

									<div class="span12">

									<!--	<input type="radio" id="onlineyestype" name="onlinetype" value="Yes" onclick="openonline();">-->
										<input type="radio" id="onlineyestype" name="onlinetype" value="Yes" onclick="closeonline();">

										<label class="lbl" for="id-disable-check"> Pay Now</label>

										&nbsp; &nbsp;

										<input type="radio" id="onlinenotype" name="onlinetype" value="No" onclick="closeonline();">

										<label class="lbl" for="id-disable-check" >Pay Later</label>

									</div>

									</div>

								</div>
								
								<div id="onlinediv" style="display:none;">
								<div class="control-group" >

									<label class="control-label" for="form-field-1"></label>

									<div class="controls">	

						  <input type="button" value="Pay" onclick="storedata();" class="btn btn-primary"/>

									</div>

									</div>
										</div>		
								
							
								<div class="control-group">

									<label class="control-label" for="form-field-1">Total Pending</label>

									<div class="controls">	

						  <input type="text" name="totalpending" id="totalpending" readonly=""/>

									</div>

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">Total Paid</label>

									<div class="controls">	
									 <input type="text" name="paidamount" id="paidamount" readonly=""/>
									 </div>
									 </div>
															</div>

														</div>
														


</form>
</div>

	<hr />



													<div class="row-fluid wizard-actions" id="paynowdiv" style="display:none;">

														<button class="btn btn-prev">

															<i class="icon-arrow-left"></i>

															Prev

														</button>



														<button class="btn btn-success btn-next" data-last="Finish " type="submit" id="opn" >

															Next

															<i class="icon-arrow-right icon-on-right"></i>

														</button>

														

													</div>


													
													
													</div>
													</div></div></div></div></div></div></div></div>
		
		
<script>

function changevat()
{
	if(document.getElementById('simyes').checked)
	{
		//document.getElementById('bavt').value='2';
		$('.vat').val('2');
		document.getElementById("Label2").innerHTML = 'CST(2%)';
	}
	else
	{
			$('.vat').val('14.5');
			document.getElementById("Label2").innerHTML = 'CST(14.5%)';
	}
}

function choosesubscription(str,catid)

	{

 

var xmlhttp;    

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else



{// code for IE6, IE5



xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");



}



xmlhttp.onreadystatechange=function()



{



if (xmlhttp.readyState==4 && xmlhttp.status==200)



{


document.getElementById('subcost').value=xmlhttp.responseText;




}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getsubcost.php?c="+catid+"&d="+str,true);



xmlhttp.send();



}
function getsimcharge(str,strr)
{
	 var element = $(str).find('option:selected'); 
        var simcharge = element.attr("id"); 
		submonth=parseInt(document.getElementById('submonth').value);
		document.getElementById('simcharge').value=simcharge*submonth;
		
}

function gettotal()
{
	submonth=parseInt(document.getElementById('submonth').value);
	subcost=parseInt(document.getElementById('subcost').value);
	simcharge=parseInt(document.getElementById('simcharge').value);
	stax=parseFloat(document.getElementById('servicetax').value);
	devcst=parseFloat(document.getElementById('devcst').value);
	intcst=parseFloat(document.getElementById('intcst').value);
	vat=parseFloat(document.getElementById('vat').value);
	
	packing=parseInt(document.getElementById('packing').value);
	freight=parseInt(document.getElementById('freight').value);
	smspackage=parseInt(document.getElementById('smspackage').value);
	video=parseInt(document.getElementById('video').value);
	
	packingcost=parseFloat((packing)*(vat/100));
	servicetax=parseFloat((smspackage+video)*(stax/100));
	extracharge=parseFloat(packing+packingcost+freight+smspackage+video+servicetax);

	//simwithmonth=(simcharge*submonth);
	totaltax=((subcost)+(simcharge)+(intcst))*(stax/100);
	totalvat=(devcst)*(vat/100);
	
	finalval=(subcost)+(simcharge)+(intcst)+(devcst)+totaltax+totalvat+extracharge;
	
	total=(subcost)+(simcharge)+(intcst)+(devcst);
	
	sercost=parseFloat(servicetax+totaltax);
	vatcost=parseFloat(packingcost+totalvat);
	
			document.getElementById('sercost').value=parseFloat(sercost);
			document.getElementById('vatcost').value=parseFloat(vatcost);
			document.getElementById('total').value=Math.round(total);
			document.getElementById('finalcostt').value=Math.round(finalval);
			document.getElementById('finalcost').value=Math.round(finalval);
			document.getElementById('amount').value=Math.round(finalval);
			document.getElementById('cashpending').value=Math.round(finalval);
	document.getElementById('totlpayablecash').value=Math.round(finalval);
	document.getElementById('chequepending').value=Math.round(finalval);
	document.getElementById('totlpayablecheque').value=Math.round(finalval);
	document.getElementById('totalpending').value=Math.round(finalval);
		document.getElementById('ontransferpending').value=Math.round(finalval);
	document.getElementById('totlpayableontransfer').value=Math.round(finalval);

		
}

</script>

<script>
function payfunc()
{
paylaterdiv
a=document.getElementById('paylater').checked;
b=document.getElementById('paynow').checked;
if(a)
{

document.getElementById('paylaterdiv').style.display="block";
document.getElementById('paynowdiv').style.display="none";
document.getElementById('paynowwdiv').style.display="block";
}
if(b)
{
document.getElementById('paylaterdiv').style.display="none";
document.getElementById('paynowdiv').style.display="block";
document.getElementById('paynowwdiv').style.display="block";
}

}
</script>

	<script type="text/javascript">

			$(function() {

			

				$('[data-rel=tooltip]').tooltip();

			

				$(".select2").css('width','150px').select2({allowClear:true})

				.on('change', function(){

					$(this).closest('form').validate().element($(this));

				}); 

			

			

				var $validation = false;

				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){

					if(info.step == 1 && $validation) {

						if(!$('#validation-form').valid()) return false;

					}

				}).on('finished', function(e) {

	customer_id=document.getElementById('customer_id').value;
	orderid=document.getElementById('orderid').value;
	imei=document.getElementById('imei').value;
	category_id=document.getElementById('category_id').value;
	device_id=document.getElementById('device_id').value;




	submonth=document.getElementById('submonth').value;
	subcost=document.getElementById('subcost').value;
	
	network=document.getElementById('network').value;
	simcharge=document.getElementById('simcharge').value;
	devcst=document.getElementById('devcst').value;
	intcst=document.getElementById('intcst').value;
	sercost=document.getElementById('sercost').value;
	vatcost=document.getElementById('vatcost').value;
	vat_percentage=document.getElementById('vat').value;

	total=document.getElementById('total').value;
	finalcost=document.getElementById('finalcost').value;
	amount=document.getElementById('amount').value;
	finalcostt=document.getElementById('finalcostt').value;


	
	if(document.getElementById('cashyestype').checked)
	{
	cashtype='Yes';
			cashamount=document.getElementById('cashamount').value;
			cashpending=document.getElementById('cashpending').value;
			totlpayablecash=document.getElementById('totlpayablecash').value;
			cashpaid=document.getElementById('cashpaid').value;
	}
	if(document.getElementById('cashnotype').checked)
	{
	cashtype='No';
			
	}
	if((!document.getElementById('cashyestype').checked)&&(!document.getElementById('cashyestype').checked))
	{
		cashtype='No';
	}
//	chequeyestype=document.getElementById('chequeyestype').checked ? document.getElementById('chequeyestype').value : '';
//	chequenotype=document.getElementById('chequenotype').checked ? document.getElementById('chequenotype').value : '';
	if(document.getElementById('chequeyestype').checked)
	{
	chequetype='Yes';
			chequeamount=document.getElementById('chequeamount').value;
			chequepending=document.getElementById('chequepending').value;
			totlpayablecheque=document.getElementById('totlpayablecheque').value;
			chequepaid=document.getElementById('chequepaid').value;
			chequeno=document.getElementById('chequeno').value;
			bankname=document.getElementById('bankname').value;
			branchname=document.getElementById('branchname').value;
			branchlocation=document.getElementById('branchlocation').value;
			if(chequeno=='')
			{
				alert('Please Enter Cheque Number in Cheque Payment Process');
				document.getElementById('chequeno').focus();
								return false;
			}
			if(bankname=='')
			{
				alert('Please Enter Bank Name in Cheque Payment Process');
				document.getElementById('chequeno').focus();
								return false;
			}
			if(branchname=='')
			{
				alert('Please Enter Branch Name in Cheque Payment Process');
				document.getElementById('chequeno').focus();
								return false;
			}
			if(branchlocation=='')
			{
				alert('Please Enter Branch Location in Cheque Payment Process');
				document.getElementById('chequeno').focus();
								return false;
			}
	}
	if(document.getElementById('chequenotype').checked)
	{
	chequetype='No';
			
	}
if((!document.getElementById('chequeyestype').checked)&&(!document.getElementById('chequenotype').checked))
	{
		chequetype='No';
	}
	
	if(document.getElementById('ontransferyestype').checked)
	{
	ontransfertype='Yes';
			onlinetransferamount=document.getElementById('onlinetransferamount').value;
			bankonline=document.getElementById('bankonline').value;
			transferdate=document.getElementById('transferdate').value;
			ontransferpending=document.getElementById('ontransferpending').value;
			totlpayableontransfer=document.getElementById('totlpayableontransfer').value;
			ontransferpaid=document.getElementById('ontransferpaid').value;
			
	}
	if(document.getElementById('ontransfernotype').checked)
	{
	ontransfertype='No';
			
	}
	if((!document.getElementById('ontransferyestype').checked)&&(!document.getElementById('ontransfernotype').checked))
	{
		ontransfertype='No';
	}
	
	
	
if(document.getElementById('onlineyestype').checked)
	{
	onlinetype=document.getElementById('onlineyestype').value;
			
	}
	if(document.getElementById('onlinenotype').checked)
	{
	onlinetype=document.getElementById('onlinenotype').value;
			
	}
if((!document.getElementById('onlineyestype').checked)&&(!document.getElementById('onlinenotype').checked))
	{
		onlinetype='No';
	}
		totalpending=document.getElementById('totalpending').value;
		paidamount=document.getElementById('paidamount').value;
	
			//onlineyestype=document.getElementById('onlineyestype').checked ? document.getElementById('onlineyestype').value : '';
//	onlinenotype=document.getElementById('onlinenotype').checked ? document.getElementById('onlinenotype').value : '';
	//if(cashyestype)

//	chequetype=document.getElementById('chequetype').checked ? document.getElementById('chequetype').value : '';

//	onlinetype=document.getElementById('onlinetype').checked ? document.getElementById('onlinetype').value : '';

	created_by=document.getElementById('created_by').value;

	created_dt=document.getElementById('created_dt').value;

//	cid=document.getElementById('cid').value;
	
	/*if(ful=='fullpayment')
	{
		if(paidamount!=amount)
		{
			alert("You have Choosed Full Payment, So Please Pay the full amount");
			return false;
		}
		else
		{
			
		$('#opn').fadeOut(3000);
		}
	}*/
	
	packing=document.getElementById('packing').value;
	freight=document.getElementById('freight').value;
	smspackage=document.getElementById('smspackage').value;
	video=document.getElementById('video').value;

$('#opn').fadeOut(3000);
var xmlhttp;    

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else



{// code for IE6, IE5



xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");



}



xmlhttp.onreadystatechange=function()



{



if (xmlhttp.readyState==4 && xmlhttp.status==200)



{

abc=xmlhttp.responseText;
alert(abc)
window.top.location.href="<?php echo base_url();?>convert_customer/index?msg1="+abc;


}

}


xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/conver_data.php?finalcost="+finalcost+"&amount="+amount+"&created_by="+created_by+"&created_dt="+created_dt+"&cashtype="+cashtype+"&cashamount="+cashamount+"&cashpending="+cashpending+"&totlpayablecash="+totlpayablecash+"&cashpaid="+cashpaid+"&chequetype="+chequetype+"&chequeamount="+chequeamount+"&chequepending="+chequepending+"&totlpayablecheque="+totlpayablecheque+"&chequepaid="+chequepaid+"&chequeno="+chequeno+"&bankname="+bankname+"&onlinetype="+onlinetype+"&totalpending="+totalpending+"&paidamount="+paidamount+"&branchname="+branchname+"&branchlocation="+branchlocation+"&ontransfertype="+ontransfertype+"&onlinetransferamount="+onlinetransferamount+"&bankonline="+bankonline+"&transferdate="+transferdate+"&ontransferpending="+ontransferpending+"&totlpayableontransfer="+totlpayableontransfer+"&ontransferpaid="+ontransferpaid+"&customer_id="+customer_id+"&orderid="+orderid+"&submonth="+submonth+"&subcost="+subcost+"&network="+network+"&simcharge="+simcharge+"&packing="+packing+"&freight="+freight+"&smspackage="+smspackage+"&video="+video+"&vatcost="+vatcost+"&devcst="+devcst+"&intcst="+intcst+"&imei="+imei+"&category_id="+category_id+"&device_id="+device_id+"&vat_percentage="+vat_percentage+"&total="+total+"&sercost="+sercost+"&finalcostt="+finalcostt,true);


xmlhttp.send();

otbox.dialog("Thank you! Your information was successfully saved!", [{

						"label" : "OK",

						"class" : "btn-small btn-primary",

						}]

					);

				}).on('stepclick', function(e){

					//return false;//prevent clicking on steps

				});

			

			

				$('#validation-form').hide();

				$('#skip-validation').removeAttr('checked').on('click', function(){

					$validation = this.checked;

					if(this.checked) {

						$('#sample-form').hide();

						$('#validation-form').show();

					}

					else {

						$('#validation-form').hide();

						$('#sample-form').show();

					}

				});

			

			

			

				//documentation : http://docs.jquery.com/Plugins/Validation/validate

			

			

				$.mask.definitions['~']='[+-]';

				$('#phone').mask('(999) 999-9999');

			

				jQuery.validator.addMethod("phone", function (value, element) {

					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);

				}, "Enter a valid phone number.");

			

				$('#validation-form').validate({

					errorElement: 'span',

					errorClass: 'help-inline',

					focusInvalid: false,

					rules: {

						email: {

							required: true,

							email:true

						},

						password: {

							required: true,

							minlength: 5

						},

						password2: {

							required: true,

							minlength: 5,

							equalTo: "#password"

						},

						name: {

							required: true

						},

						phone: {

							required: true,

							phone: 'required'

						},

						

						comment: {

							required: true

						},

						state: {

							required: true

						},

						platform: {

							required: true

						},

						subscription: {

							required: true

						},

						gender: 'required',

						agree: 'required'

					},

			

					messages: {

						email: {

							required: "Please provide a valid email.",

							email: "Please provide a valid email."

						},

						password: {

							required: "Please specify a password.",

							minlength: "Please specify a secure password."

						},

						subscription: "Please choose at least one option",

						gender: "Please choose gender",

						agree: "Please accept our policy"

					},

			

					invalidHandler: function (event, validator) { //display error alert on form submit   

						$('.alert-error', $('.login-form')).show();

					},

			

					highlight: function (e) {

						$(e).closest('.control-group').removeClass('info').addClass('error');

					},

			

					success: function (e) {

						$(e).closest('.control-group').removeClass('error').addClass('info');

						$(e).remove();

					},

			

					errorPlacement: function (error, element) {

						if(element.is(':checkbox') || element.is(':radio')) {

							var controls = element.closest('.controls');

							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);

							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));

						}

						else if(element.is('.select2')) {

							error.insertAfter(element.siblings('[class*=$con,"select2-container"]:eq(0)'));

						}

						else if(element.is('.chzn-select')) {

							error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));

						}

						else error.insertAfter(element);

					},

			

					submitHandler: function (form) {

					},

					invalidHandler: function (form) {

					}

				});

			

				

				

				

				$('#modal-wizard .modal-header').ace_wizard();

				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');

			})

		</script>
		
		<script>
function cashpaymentstatus()
{
		a=document.getElementById('cashyestype').checked;
		b=document.getElementById('cashnotype').checked;
		if(a)
		{
			
	document.getElementById('cashpaymentdiv').style.display="block";
		}
		if(b)
		{
			document.getElementById('cashpaymentdiv').style.display="none";
		}
}

function chequepaymentstatus()
{
		a=document.getElementById('chequeyestype').checked;
		b=document.getElementById('chequenotype').checked;
		if(a)
		{
			alert("Please Enter all the details of Cheque");
	document.getElementById('chequepaymentdiv').style.display="block";
	document.getElementById('abcd').style.display="none";
		}
		if(b)
		{
			document.getElementById('chequepaymentdiv').style.display="none";
				document.getElementById('abcd').style.display="block";
		}
}

function onlinetransferpaymentstatus()
{
		a=document.getElementById('ontransferyestype').checked;
		b=document.getElementById('ontransfernotype').checked;
		if(a)
		{
			
	document.getElementById('onlinetransferdiv').style.display="block";
		}
		if(b)
		{
			document.getElementById('onlinetransferdiv').style.display="none";
		}
}
function showbtndivs()
{
	a=document.getElementById('chkenter').checked;

if(a==true)
{
chequeno=document.getElementById('chequeno').value;
			bankname=document.getElementById('bankname').value;
			branchname=document.getElementById('branchname').value;
			branchlocation=document.getElementById('branchlocation').value;
			if((chequeno!='')&&(bankname!='')&&(branchname!='')&&(branchlocation!=''))
			{
				document.getElementById('abcd').style.display="block";
			}
			else
			{
			alert("Please Fill All the Cheque Details");
			document.getElementById('chkenter').checked=false;
					document.getElementById('abcd').style.display="none";
			}

	
}
else
{
	document.getElementById('abcd').style.display="none";
}
	
}
function openonline()
{
	a=document.getElementById('onlineyestype').checked;
		
		if(a)
		{
			
	document.getElementById('onlinediv').style.display="block";
		}
}
function closeonline()
{
	a=document.getElementById('onlinenotype').checked;
		
		if(a)
		{
			
	document.getElementById('onlinediv').style.display="none";
		}
}

function getcashamount()
{
	amount=parseInt(document.getElementById('amount').value);
	cashamount=parseInt(document.getElementById('cashamount').value);
	//alert(cashamount)
	if(isNaN(cashamount))
	{
		document.getElementById('cashamount').value='0';
			cashamount=parseInt(document.getElementById('cashamount').value);
		chequeamount=parseInt(document.getElementById('chequeamount').value);
		onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('cashpending').value=Math.round(val);
	document.getElementById('chequepending').value=Math.round(val);
		document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('cashpaid').value=Math.round(paid);
	document.getElementById('chequepaid').value=Math.round(paid);
	document.getElementById('ontransferpaid').value=Math.round(paid);
	document.getElementById('paidamount').value=Math.round(paid);
	


	}
	
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('cashpending').value=Math.round(val);
	document.getElementById('chequepending').value=Math.round(val);
			document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('cashpaid').value=Math.round(paid);
	document.getElementById('chequepaid').value=Math.round(paid);
		document.getElementById('ontransferpaid').value=Math.round(paid);
	document.getElementById('paidamount').value=Math.round(paid);
	if((cashamount+chequeamount+onlinetransferamount)>amount)
		{
		alert("Exceeding Final Cost.Please Enter the Proper Amount");
			document.getElementById('cashamount').focus();
			document.getElementById('cashamount').value='0';
			cashamount=parseInt(document.getElementById('cashamount').value);
			chequeamount=parseInt(document.getElementById('chequeamount').value);
			onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
				paid=parseInt(chequeamount+cashamount+onlinetransferamount);
				val=parseInt((amount)-(chequeamount+cashamount+onlinetransferamount));
	document.getElementById('cashpending').value=Math.round(val);
	document.getElementById('chequepending').value=Math.round(val);
			document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('cashpaid').value=Math.round(paid);
	document.getElementById('chequepaid').value=Math.round(paid);
		document.getElementById('ontransferpaid').value=Math.round(paid);
		}
	
}
function getchequeamount()
{
	amount=parseInt(document.getElementById('amount').value);
	cashamount=parseInt(document.getElementById('cashamount').value);
	
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	if(isNaN(chequeamount))
	{
	document.getElementById('chequeamount').value='0';
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	cashamount=parseInt(document.getElementById('cashamount').value);
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
		paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('chequepending').value=Math.round(val);
	document.getElementById('cashpending').value=Math.round(val);
			document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('chequepaid').value=Math.round(paid);
	document.getElementById('cashpaid').value=Math.round(paid);
		document.getElementById('ontransferpaid').value=Math.round(paid);
	
	document.getElementById('paidamount').value=Math.round(paid);
	}
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('chequepending').value=Math.round(val);
	document.getElementById('cashpending').value=Math.round(val);
			document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('chequepaid').value=Math.round(paid);
	document.getElementById('cashpaid').value=Math.round(paid);
		document.getElementById('ontransferpaid').value=Math.round(paid);
	document.getElementById('paidamount').value=Math.round(paid);
	if((cashamount+chequeamount+onlinetransferamount)>amount)
		{
		alert("Exceeding Final Cost.Please Enter the Proper Amount");
			document.getElementById('chequeamount').focus();
			document.getElementById('chequeamount').value='0';
			cashamount=parseInt(document.getElementById('cashamount').value);
			chequeamount=parseInt(document.getElementById('chequeamount').value);
			onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
				paid=parseInt(chequeamount+cashamount+onlinetransferamount);
				val=parseInt((amount)-(chequeamount+cashamount+onlinetransferamount));
	document.getElementById('cashpending').value=Math.round(val);
	document.getElementById('chequepending').value=Math.round(val);
			document.getElementById('ontransferpending').value=Math.round(val);
	document.getElementById('totalpending').value=Math.round(val);
	document.getElementById('cashpaid').value=Math.round(paid);
	document.getElementById('chequepaid').value=Math.round(paid);
		document.getElementById('ontransferpaid').value=Math.round(paid);
		}
}

function getonlinetransferamount()
{

	amount=parseInt(document.getElementById('amount').value);
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	
	if(isNaN(onlinetransferamount))
	{
		document.getElementById('onlinetransferamount').value='0';
		onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
		cashamount=parseInt(document.getElementById('cashamount').value);
		chequeamount=parseInt(document.getElementById('chequeamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
		}
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	cashamount=parseInt(document.getElementById('cashamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
		if((cashamount+chequeamount+onlinetransferamount)>amount)
		{
		alert("Exceeding Final Cost.Please Enter the Proper Amount");
			document.getElementById('onlinetransferamount').focus();
			document.getElementById('onlinetransferamount').value='0';
			onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
			cashamount=parseInt(document.getElementById('cashamount').value);
			chequeamount=parseInt(document.getElementById('chequeamount').value);
				paid=parseInt(chequeamount+cashamount+onlinetransferamount);
				val=parseInt((amount)-(chequeamount+cashamount+onlinetransferamount));
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
		document.getElementById('paidamount').value=parseInt(paid);
		}
	
}
function clearcheque()
{
	document.getElementById('chequeamount').value=0;
	getchequeamount();
}
function clearcash()
{
	document.getElementById('cashamount').value=0;
	getcashamount();
}
function clearonlinetransfer()
{
	document.getElementById('onlinetransferamount').value=0;
	getchequeamount();
}
function getbtndiv()
{
document.getElementById('submdiv').style.display="none";
		document.getElementById('paysubmdiv').style.display="none";
	finalcost=document.getElementById('finalcost').value;
	if(finalcost=='0')
	{
		
			document.getElementById('abcd').style.display="none";
	}
	else
	{

		
			document.getElementById('abcd').style.display="block";
				document.getElementById('submdiv').style.display="none";
						document.getElementById('paysubmdiv').style.display="none";
	}
}

function getbtndivv()
{
	
		document.getElementById('abcd').style.display="none";
		document.getElementById('paysubmdiv').style.display="none";
		document.getElementById('submdiv').style.display="block";
	
}

function getbtndivvv()
{
	
		document.getElementById('abcd').style.display="none";
		document.getElementById('submdiv').style.display="none";
		document.getElementById('paysubmdiv').style.display="block";
	
}

</script>

<script>
function checkdevicepromo(str,abc)
{

	devdiscount=document.getElementById("devdiscount").value;
	
	
	devcst=parseInt(document.getElementById("devcst").value);
	
	var xmlhttp;    



if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{

if(xmlhttp.responseText.trim()=='failure')
{
	alert("Please Enter Valid Promo Code");
	//$(str).focus();
	//document.getElementById("errordiv").value=xmlhttp.responseText;
document.getElementById("erdiv").innerHTML="Not a Valid Promo Code";
	
}
else
{

document.getElementById("subcost").value='0';
document.getElementById("submonth").style.disabled='disabled';
	
	inst=parseInt(document.getElementById("intcst").value);

intcst=parseInt(inst-63);
document.getElementById("intcst").value=intcst;
document.getElementById("erdiv").innerHTML='';

}

}

}


xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/checkdevicepromo.php?code="+devdiscount+"&devcst="+devcst,true);

xmlhttp.send();
}
</script>

<script>
function reducecost()

{
	finalcost=parseInt(document.getElementById('finalcost').value);

	code=document.getElementById('code').value;

	var xmlhttp;    

if (window.XMLHttpRequest)

{// code for IE7+, Firefox, Chrome, Opera, Safari

xmlhttp=new XMLHttpRequest();

}

else



{// code for IE6, IE5



xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");



}



xmlhttp.onreadystatechange=function()



{



if (xmlhttp.readyState==4 && xmlhttp.status==200)



{



abc=xmlhttp.responseText;

if(abc.trim()!='Not a Valid Promo Code')
{

	answerValue=finalcost-(finalcost*(parseFloat(abc)/100));

document.getElementById('finalcost').value=Math.round(answerValue);
document.getElementById('amount').value=Math.round(answerValue);
	document.getElementById('cashpending').value=Math.round(answerValue);
	document.getElementById('totlpayablecash').value=Math.round(answerValue);
	document.getElementById('chequepending').value=Math.round(answerValue);
	document.getElementById('totlpayablecheque').value=Math.round(answerValue);
	document.getElementById('totalpending').value=Math.round(answerValue);
	document.getElementById('ontransferpending').value=Math.round(answerValue);
	document.getElementById('totlpayableontransfer').value=Math.round(answerValue);
}
else
{
	alert('Not a Valid Promo Code');
	document.getElementById('code').value='';
	document.getElementById('code').focus();
	document.getElementById('amount').value=Math.round(finalcost);
	document.getElementById('finalcost').value=Math.round(finalcost);
	document.getElementById('cashpending').value=Math.round(finalcost);
	document.getElementById('totlpayablecash').value=Math.round(finalcost);
	document.getElementById('chequepending').value=Math.round(finalcost);
	document.getElementById('totlpayablecheque').value=Math.round(finalcost);
	document.getElementById('totalpending').value=Math.round(finalcost);
	document.getElementById('ontransferpending').value=Math.round(finalcost);
	document.getElementById('totlpayableontransfer').value=Math.round(finalcost);
}

}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/checkpromo1.php?code="+code,true);



xmlhttp.send();


}
</script>
		
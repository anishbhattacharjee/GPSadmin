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

Enter Payment Details

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

<h4 class="lighter">Please Fill The Following Details</h4>



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



<li data-target="#step1" class="active">

<span class="step">1</span>

<span class="title">Cash Payment</span>

</li>
<li data-target="#step2">

<span class="step">2</span>

<span class="title">Cheque Payment</span>

</li>
<li data-target="#step3">

<span class="step">3</span>

<span class="title">Online Transfer</span>

</li>
<li data-target="#step4">

<span class="step">4</span>

<span class="title">Online Payment</span>

</li>

</ul>

</div>



<hr />



<div class="step-content row-fluid position-relative" id="step-container">

<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/addd" method="POST" >
<?php	$cid=$this->uri->segment(3);
$oid=$this->uri->segment(4);  
$pending_amount=$this->uri->segment(5);
$total_amount=$this->uri->segment(6);
  ?>
<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>"/>
<input type="hidden" name="oid" id="oid" value="<?php echo $oid;?>"/>
<input type="hidden" name="amount" id="amount" value="<?php echo $pending_amount;?>"/>
 <div class="control-group">



			<label class="control-label">Pending Amount</label>



				<div class="controls"> 

<input type="text" name="finalcost" id="finalcost" value="<?php echo $pending_amount;?>" readonly=""/>



</div>

</div>
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


<div class="step-pane active" id="step1">

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

			<label class="control-label" for="form-field-1">Amount Paid</label>

			<div class="controls">	

  <input type="text" name="cashamount" id="cashamount" onkeyup="getcashamount();" value="0"/>

			</div>

			</div>
			
			<div class="control-group">

			<label class="control-label" for="form-field-1">Pending Amount</label>

			<div class="controls">	

  <input type="text" name="cashpending" id="cashpending" readonly="" value="<?php echo $pending_amount;?>"/>

			</div>

			</div>
			
			<div class="control-group">

			<label class="control-label" for="form-field-1">Total Amount to be paid</label>

			<div class="controls">	

  <input type="text" name="totlpayablecash" id="totlpayablecash" readonly="" value="<?php echo $pending_amount;?>"/>

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
								
								
									<div class="step-pane" id="step2">

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

			<label class="control-label" for="form-field-1">Amount Paid</label>

			<div class="controls">	

  <input type="text" name="chequeamount" id="chequeamount" value="0" onkeyup="getchequeamount();"/ >

			</div>

			</div>
		
			<div class="control-group">

			<label class="control-label" for="form-field-1">Pending Amount</label>

			<div class="controls">	

  <input type="text" name="chequepending" id="chequepending" readonly="" value="<?php echo $pending_amount;?>"/>

			</div>

			</div>
			
			<div class="control-group">

			<label class="control-label" for="form-field-1">Total Amount to be paid</label>

			<div class="controls">	

  <input type="text" name="totlpayablecheque" id="totlpayablecheque" readonly="" value="<?php echo $pending_amount;?>"/>

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
						
						
						
							<div class="step-pane" id="step3">

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

  <input type="text" name="ontransferpending" id="ontransferpending" readonly="" value="<?php echo $pending_amount;?>"/>

			</div>

			</div>
			
			<div class="control-group">

			<label class="control-label" for="form-field-1">Total Amount to be paid</label>

			<div class="controls">	

  <input type="text" name="totlpayableontransfer" id="totlpayableontransfer" readonly="" value="<?php echo $pending_amount;?>"/>

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
								
									<div class="step-pane" id="step4">

									<div class="row-fluid">
										<div class="control-group">

			<label class="control-label" for="form-input-readonly">Do You Want to Pay through Online</label>



			<div class="controls">

			<div class="span12">

				<input type="radio" id="onlineyestype" name="onlinetype" value="Yes" onclick="openonline();">

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

													<div class="row-fluid wizard-actions" id="btndivs">

														<button class="btn btn-prev">

															<i class="icon-arrow-left"></i>

															Prev

														</button>



														<button class="btn btn-success btn-next" data-last="Finish " type="submit" id="fidiv">

															Next

															<i class="icon-arrow-right icon-on-right"></i>

														</button>

														

													</div>

											





							<!--/widget-main-->

											</div><!--/widget-main-->

											</div><!--/widget-main-->

										</div><!--/widget-body-->

									</div>

								</div>

							</div>



							<!--PAGE CONTENT ENDS-->

						</div><!--/.span-->

					</div><!--/.row-fluid-->

				</div><!--/.page-content-->



			

			</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>

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

				

		
	
	//alert(subscp);
	finalcost=document.getElementById('finalcost').value;
	
	amount=document.getElementById('amount').value;

	

	//cashyestype=document.getElementById('cashyestype').checked ? document.getElementById('cashyestype').value : '';
//	cashnotype=document.getElementById('cashnotype').checked ? document.getElementById('cashnotype').value : '';
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

	cid=document.getElementById('cid').value;
	oid=document.getElementById('oid').value;
	/*if(ful=='fullpayment')
	{
		if(paidamount!=amount)
		{
			alert("You have Choosed Full Payment, So Please Pay the full amount");
			return false;
		}
	}*/
$('#fidiv').fadeOut(1000);
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

window.top.location.href="<?php echo base_url();?>payment/received/?msg1="+abc;


}

}


xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/customer_payment_data.php?finalcost="+finalcost+"&amount="+amount+"&created_by="+created_by+"&created_dt="+created_dt+"&cid="+cid+"&oid="+oid+"&cashtype="+cashtype+"&cashamount="+cashamount+"&cashpending="+cashpending+"&totlpayablecash="+totlpayablecash+"&cashpaid="+cashpaid+"&chequetype="+chequetype+"&chequeamount="+chequeamount+"&chequepending="+chequepending+"&totlpayablecheque="+totlpayablecheque+"&chequepaid="+chequepaid+"&chequeno="+chequeno+"&bankname="+bankname+"&onlinetype="+onlinetype+"&totalpending="+totalpending+"&paidamount="+paidamount+"&branchname="+branchname+"&branchlocation="+branchlocation+"&ontransfertype="+ontransfertype+"&onlinetransferamount="+onlinetransferamount+"&bankonline="+bankonline+"&transferdate="+transferdate+"&ontransferpending="+ontransferpending+"&totlpayableontransfer="+totlpayableontransfer+"&ontransferpaid="+ontransferpaid,true);



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
function storedata()
{
	
		

	cat=Array();

	dev=Array();



	noofdevice=Array();

	costmonth=Array();
	subscp=Array();
	devcost=Array();
	instcharge=Array();
	totcost=Array();
	grandtotal=Array();
	sercharge=Array();
	vatcharge=Array();
	devname=Array();

	
	 $('fieldsett p').each(function () {

        if ($(this).find('.add').length > 0) return;

		cat.push($(this).find('.cat').val());

		dev.push($(this).find('.dev').val());
		subscp.push($(this).find('.subscp').val());
		costmonth.push($(this).find('.costmonth').val());
		devcost.push($(this).find('.devcost').val());
		instcharge.push($(this).find('.instcharge').val());
		noofdevice.push($(this).find('.noofdevice').val());
		totcost.push($(this).find('.totcost').val());
		grandtotal.push($(this).find('.grandtotal').val());
		sercharge.push($(this).find('.sercharge').val());
		vatcharge.push($(this).find('.vatcharge').val());
		devname.push($(this).find('.devname').val());
	});
	//alert(subscp);
	finalcost=document.getElementById('finalcost').value;
	//adv=document.getElementById('adv').value;
	if(document.getElementById('adv').checked)
{
	adv=document.getElementById('adv').value;
}
else
{
	adv='notselected';
}

if(document.getElementById('ful').checked)
{
	ful=document.getElementById('ful').value;
}
else
{
	ful='notselected';
}

	amount=document.getElementById('amount').value;

	

	//cashyestype=document.getElementById('cashyestype').checked ? document.getElementById('cashyestype').value : '';
//	cashnotype=document.getElementById('cashnotype').checked ? document.getElementById('cashnotype').value : '';
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
	if((!document.getElementById('cashyestype').checked)&&(!document.getElementById('cashnotype').checked))
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
	created_by=document.getElementById('created_by').value;

	created_dt=document.getElementById('created_dt').value;

	cid=document.getElementById('cid').value;
/*	if(ful=='fullpayment')
	{
		if(paidamount!=amount)
		{
			alert("You have Choosed Full Payment, So Please Pay the full amount");
			return false;
		}
	}
*/
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

window.top.location.href="<?php echo base_url();?>customer_registration/basic_data/?msg1="+abc;


}

}


xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/customer_payment_data.php?finalcost="+finalcost+"&amount="+amount+"&created_by="+created_by+"&created_dt="+created_dt+"&cid="+cid+"&oid="+oid+"&cashtype="+cashtype+"&cashamount="+cashamount+"&cashpending="+cashpending+"&totlpayablecash="+totlpayablecash+"&cashpaid="+cashpaid+"&chequetype="+chequetype+"&chequeamount="+chequeamount+"&chequepending="+chequepending+"&totlpayablecheque="+totlpayablecheque+"&chequepaid="+chequepaid+"&chequeno="+chequeno+"&bankname="+bankname+"&onlinetype="+onlinetype+"&totalpending="+totalpending+"&paidamount="+paidamount+"&branchname="+branchname+"&branchlocation="+branchlocation+"&ontransfertype="+ontransfertype+"&onlinetransferamount="+onlinetransferamount+"&bankonline="+bankonline+"&transferdate="+transferdate+"&ontransferpending="+ontransferpending+"&totlpayableontransfer="+totlpayableontransfer+"&ontransferpaid="+ontransferpaid,true);


xmlhttp.send();
}
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
	document.getElementById('btndivs').style.display="none";
		}
		if(b)
		{
			document.getElementById('chequepaymentdiv').style.display="none";
			document.getElementById('btndivs').style.display="block";
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
	if(isNaN(cashamount))
	{
		document.getElementById('cashamount').value='0';
		cashamount=parseInt(document.getElementById('cashamount').value);
		chequeamount=parseInt(document.getElementById('chequeamount').value);
		onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
		}
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
		if((cashamount+chequeamount+onlinetransferamount)>amount)
		{
		alert("Exceeding Final Cost.Please Enter the Proper Amount");
			document.getElementById('cashamount').focus();
			document.getElementById('cashamount').value='0';
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
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
		document.getElementById('paidamount').value=parseInt(paid);
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
	cashamount=parseInt(document.getElementById('cashamount').value);
	chequeamount=parseInt(document.getElementById('chequeamount').value);
	onlinetransferamount=parseInt(document.getElementById('onlinetransferamount').value);
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
	}
	paid=chequeamount+cashamount+onlinetransferamount;
	val=(amount)-(chequeamount+cashamount+onlinetransferamount);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
	document.getElementById('paidamount').value=parseInt(paid);
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
	document.getElementById('ontransferpending').value=parseInt(val);
	document.getElementById('cashpending').value=parseInt(val);
	document.getElementById('chequepending').value=parseInt(val);
	document.getElementById('totalpending').value=parseInt(val);
	document.getElementById('cashpaid').value=parseInt(paid);
	document.getElementById('chequepaid').value=parseInt(paid);
	document.getElementById('ontransferpaid').value=parseInt(paid);
		document.getElementById('paidamount').value=parseInt(paid);
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
				document.getElementById('btndivs').style.display="block";
			}
			else
			{
			alert("Please Fill All the Cheque Details");
			document.getElementById('chkenter').checked=false;
					document.getElementById('btndivs').style.display="none";
			}

	
}
else
{
	document.getElementById('btndivs').style.display="none";
}
	
}

</script>

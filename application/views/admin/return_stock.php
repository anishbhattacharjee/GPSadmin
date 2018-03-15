<!DOCTYPE html>

<html lang="en">

	<head>

		<meta charset="utf-8" />

		<title>GPS</title>



		<meta name="description" content="Common form elements and layouts" />

		<meta name="viewport" content="width=device-width, initial-scale=1.0" />



		<!--basic styles-->



		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />

		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />



		<!--[if IE 7]>

		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-ie7.min.css" />

		<![endif]-->



		<!--page specific plugin styles-->



		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/jquery-ui-1.10.3.custom.min.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/daterangepicker.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/colorpicker.css" />



		<!--fonts-->



		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />



		<!--ace styles-->



		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />

		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>



	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>



		<!--<![endif]-->



		<!--[if IE]>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<![endif]-->



		<!--[if !IE]>-->



		<script type="text/javascript">

			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");

		</script>



		<!--<![endif]-->



		<!--[if IE]>

<script type="text/javascript">

 window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");

</script>

<![endif]-->



		<script type="text/javascript">

			if("ontouchend" in document) document.write("<script src='<?php echo base_url();?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");

		</script>

		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>



		<!--page specific plugin scripts-->



		<!--[if lte IE 8]>

		  <script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>

		<![endif]-->



		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.ui.touch-punch.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/fuelux/fuelux.spinner.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-timepicker.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/date-time/moment.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/date-time/daterangepicker.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/bootstrap-colorpicker.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.knob.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.autosize-min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.inputlimiter.1.3.1.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.maskedinput.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/bootstrap-tag.min.js"></script>



		<!--ace scripts-->



		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>



		<!--inline scripts related to this page-->



		

		

			<script type="text/javascript">

			$(function() {

			$('.date-picker').datepicker().next().on(ace.click_event, function(){

					$(this).prev().focus();

				});

			

			

			});

			</script>

<?php include 'include/adminheader.php';?>

<div class="main-container container-fluid">

			<a class="menu-toggler" id="menu-toggler" href="#">

				<span class="menu-text"></span>

			</a>



		<?php include 'include/sidebar2.php';?>

	

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

							Enter Return Stock

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

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

						<?php	if(isset($msg2))

							{?>

							<div class='alert alert-block alert-danger'>

							<button type="button" class="close" data-dismiss="alert" >

									<i class="icon-remove"></i>

								</button>



								<i class="icon-remove red"></i>

							<?php

								echo $msg2;?>

								</div>

								<?php

							}

							else

							{

								echo '';

							}

							

							?>

					<!--<?php echo base_url();?>installation/assigned-->

					<form class="form-horizontal" action="<?php echo base_url();?>return_stock/entered" method="POST">

						<div class="control-group">

									<label class="control-label" for="form-field-1">Received Date</label>



									<div class="controls">

										<div class="row-fluid input-append">

															<input class="date-picker" id="app_date" type="text" data-date-format="dd-mm-yyyy" name="app_date" />

														

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

															<input id="curdate" type="hidden" name="curdate" value="<?php echo date("d-m-Y");?>"/>

									</div>

								</div>

					<div class="control-group">

			<label class="control-label" for="form-field-1">IMEI</label>



			<div class="controls">

<!--			<select name="orderid"	id="orderid"	onchange="getdetails(this.value);">

<option value="Please Choose OrderID">Please Choose OrderID</option>



<?php

$qqss=mysqli_query($con,"select * from installation where installation_status='completed' group by order_id");

while($sqs3=mysqli_fetch_array($qqss))

{ 



?>



<option value="<?php echo $sqs3['order_id'];?>"><?php echo $sqs3['order_id'];?></option>

<?php

}



?>



</select>-->

<input type="text"  name="imei"	id="imei" onchange="getdetails(this.value);"/>

			</div>

			</div>

			

			<div id="details">

			</div>

		

		

					

								

					</form>

					

					</div>

					</div>

					</div>

					</div>

					</div>



















					<script>

		function getdetails(str)

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

document.getElementById("details").innerHTML=xmlhttp.responseText;

document.getElementById("showdiv").style.display='block';



}

}

//xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getdetails.php?c="+str,true);
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getdetails.php?c="+str,true);



xmlhttp.send();

	}

	

	</script>

					

					
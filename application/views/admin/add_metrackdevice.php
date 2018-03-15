<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>GPS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
			<script type="text/javascript">



function numbersonly(e){

/*var intsOnly = /^\d+$/,
    stri = $('#subscp').val();
if(intsOnly.test(stri)) {
  // alert('its valid');   
}
else{
	 alert('its not valid');   
	 $('#subscp').val('');
	  $('#subscp').focus();
}

*/
var unicode=e.charCode? e.charCode : e.keyCode



if (unicode!=8){ //if the key isn't the backspace key (which we should allow)



if (unicode<48||unicode>57)







return false //if not a number



//disable key press



}



}



</script>
<style>
		.control-group input[type="text"]{
			width:107px;
		}
		label{
			display: inline;
		}
		.error, #star{
			color:red;
			font-size:9px;
		}
		.control-group{
			*margin-left:-60px;
			}
</style>
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
							Please Add Metrack Device
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
				    
				    <form class="form-horizontal" action="<?php echo base_url();?>assign_metrack/add" method="POST">
							
								
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">IMEI</label>

									<div class="controls">
							<select   name="imieno"	id="imieno"	onchange="getmodelid(this,this.value);" class="chzn-select">

<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysqli_query($con,"select * from gps_model_details g where g.status='completed' and g.imie_number  NOT IN(select imie_no from installation )");

while($sqs3=mysqli_fetch_array($qqss))
{ 
$imei= $sqs3['imie_number'];
	$model_id= $sqs3['model_id'];

?>

<option value="<?php echo $sqs3['imie_number'];?>" id="<?php echo $sqs3['model_id'];?>" name="<?php echo $sqs3['device_id'];?>" datasrc="<?php echo $sqs3['category_type'];?>"><?php echo $sqs3['imie_number'];?></option>
<?php
}

?>

</select>
									</div>
								</div>	
								<input type="hidden" name="modelid" id="modelid" />
								<input type="hidden" name="category_d" id="category_d" />
								<input type="hidden" name="devid" id="devid" />
								<input type="hidden" name="customer_id" id="customer_id" value="272"/>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Device Name</label>


									<div class="controls">
									<input type="text" name="device_name" id="device_name"/>
									</div>
									</div>
										<div class="control-group">
									<label class="control-label" for="form-field-1"></label>


									<div class="controls">
									<a class="btn btn-small" data-dismiss="modal" href="<?php echo base_url();?>assign_metrack">
										<i class="icon-remove"></i>
										Back
									</a>

									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								
								</div>
								</div>
								</form>

</div>
</div>
</div>
</div>
</div>

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
				
			
				$(".chzn-select").chosen(); 
				
			});
		</script>
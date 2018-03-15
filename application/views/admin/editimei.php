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
							Edit IMEI
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					<!--<?php echo base_url();?>installation/assigned-->
					<form class="form-horizontal" action="<?php echo base_url();?>editimei/edited" method="POST">
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
				
						
							<div class="control-group">
									<label class="control-label" for="form-field-1">Choose Existing IMEI </label>

									<div class="controls">
									<select  class="chzn-select"   name="oldimieno"	id="oldimieno"	onchange="getlist(this.value);" >
<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysqli_query($con,"select * from installation group by imie_no");

while($sqs3=mysqli_fetch_array($qqss))
{ 
?>

<option value="<?php echo $sqs3['imie_no'];?>"><?php echo $sqs3['imie_no'];?></option>
<?php
}

?>

</select>
						
							</div>
							</div>
							<div id="listdiv">
								
							</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Choose Category</label>

									<div class="controls">
									<select  class="chzn-select"   name="category_id"	id="category_id"	onchange="getdeviceid(this.value);" >
<option value="Please Choose Category">Please Choose Category</option>
<?php
$sq=mysqli_query($con,"select * from gps_categories");
while($sqss=mysqli_fetch_array($sq))
{ ?>
<option value="<?php echo $sqss['category_id'];?>"><?php echo $sqss['category_type'];?></option>
<?php } ?>
</select>
</div>		
</div>		
<div id="devicediv"></div>


						<div class="control-group">
									<label class="control-label" for="form-field-1">Choose New IMEI </label>

									<div class="controls">
									<select  class="chzn-select"   name="imieno"	id="imieno"	onchange="getmodelid(this);" >
<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysqli_query($con,"select * from gps_model_details g where g.status='completed' and g.imie_number  NOT IN(select imie_no from installation)");

while($sqs3=mysqli_fetch_array($qqss))
{ 
?>

<option value="<?php echo $sqs3['imie_number'];?>" id="<?php echo $sqs3['model_id'];?>"><?php echo $sqs3['imie_number'];?></option>
<?php
}

?>

</select>
						
							</div>
							</div>

								<input type="hidden" name="modelid" id="modelid" />				
<div class="control-group" style="display: none;" id="btndiv">
<label class="control-label" for="form-field-1"></label>

<div class="controls">
<button class="btn btn-small btn-primary" type="submit" onclick="return valfrom();" id="btnn">
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
		
		
							
<script>
function getlist(str)
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
document.getElementById("listdiv").innerHTML=xmlhttp.responseText;



}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/geteditimeilist.php?c="+str,true);

xmlhttp.send();
	}
</script>
<script>
function getmodelid(str)
{
	  var element = $(str).find('option:selected'); 
       var modelid = element.attr("id"); 
	document.getElementById("modelid").value=modelid;
//	document.getElementById("btndiv").style.display='block';
}
</script>
<script>
function getdeviceid(str)
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
	$(".chzn-select").chosen(); 
document.getElementById("devicediv").innerHTML=xmlhttp.responseText;
$(".chzn-select").chosen(); 
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/geteditdeviceid.php?c="+str,true);

xmlhttp.send();
	}	
</script>
<script>
function getimeidiv(str)
{
	if(str=='Please Choose Device')
		{
			alert("Choose Device Type");
		}
		else
		{
		//	$(".chzn-select").chosen(); 
			document.getElementById("btndiv").style.display='block';
			//document.getElementById("btndiv").style.display='block';
		//	$(".chzn-select").chosen(); 
		}
}
</script>
	<script>
	function valfrom()
	{
	//	alert($('#device_id').val());
		if($('#category_id').val()=='Please Choose Category')
		{
			alert("Choose Cateogry");
			return false;
		}
	
		if($('#device_id').val()=='Please Choose Device')
		{
			alert("Choose Device Type");
			return false;
		}
			if($('#imieno').val()=='Please Choose IMEI')
		{
			alert("Choose New IMEI Number");
			return false;
		}
		
	}
	</script>
	<script>
	function deleteimei(str,imei)
	{
		var r = confirm('Are you sure do you want to Delete ');
if (r == true) {
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

document.getElementById("listdiv").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/deleteimeilist.php?c="+str+"&imei="+imei,true);

xmlhttp.send();
 }
 else
 {
 	
 }
	}	
		
	</script>
	


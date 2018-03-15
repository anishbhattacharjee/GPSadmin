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
							Assgin Device
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					<!--<?php echo base_url();?>installation/assigned-->
					<form class="form-horizontal" action="<?php echo base_url();?>installation/assigned_device" method="POST">
					
					<?php 
					$id = $this->uri->segment(3);
						$corid = $this->uri->segment(4);
					$order_id = $this->uri->segment(5);
					$nodev = $this->uri->segment(6);
					
					
		?>
					<input type="hidden" value="<?php echo $id;?>" id="customer_id" name="customer_id" />
						<input type="hidden" value="<?php echo $corid;?>" id="customer_main_order_id" name="customer_main_order_id" />
						
							<div class="control-group">
									<label class="control-label" for="form-field-1">Customer ID </label>

									<div class="controls">
					<?php
				$cid=$id;
				$ss1=mysqli_query($con,"select * from customers where customer_id='$cid'");
										while($rsq1=mysqli_fetch_array($ss1))
										{?>
										<input type="text" value="<?php echo $rsq1['customer_uid'];?>" readonly="">
										<?php }  ?>		
							</div>
							</div>
							<div class="control-group">
									<label class="control-label" for="form-field-1">No of Orderes</label>

									<div class="controls">
										<input type="text" value="<?php echo $nodev;?>" readonly="" name="ndev" id="ndev">
									</div>
									</div>
							<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id;?>"/>
			<?php
							$coq=mysqli_query($con,"select * from customer_orders where customer_id='$id' and order_id='$order_id'");
							$rcoq=mysqli_fetch_array($coq);
							 ?>
							 <input type="hidden" name="ordereddate" id="ordereddate" value="<?php echo date("Y-m-d",strtotime($rcoq['order_date']));?>"/>
								<input type="hidden" name="needengineer" id="needengineer" value="<?php echo $rcoq['needengineer'];?>"/>

							
							<div id="cat_det">
							 <table>
<tbody><tr><th>&nbsp;&nbsp;Category</th><th style="margin-left: 50px;float: left;">Device Type</th><th style="margin-left: 50px;float: left;">Quantity</th><th style="margin-left: 81px;float: left;">Imei No</th><th style="margin-left: 150px;float: left;">Device Name</th><th style="margin-left: 150px;float: left;">Choose SIM</th></tr>
 
 </tbody>
 
 </table>
							<?php
							$i=0;
								$q=mysqli_query($con,"select * from customer_order_details o join gps_categories gc on gc.category_id=o.category_id where o.customer_id='$id' and o.order_id='$order_id' and o.assign='pending' and gc.type='main' and gc.category_id!=18 ");
while($sqs=mysqli_fetch_array($q))
{
$cnt=$sqs['noofdevice'];
$devid=$sqs['device_id'];
$network=$sqs['network'];

$noofdevice=$sqs['noofdevice'];
$catid=$sqs['category_id']; 
$package=$sqs['package']; 

?>
<input type="hidden" name="cnt" id="cnt" value="<?php echo $cnt;?>"/>		
<?php
for($ii=0;$ii<$cnt;$ii++)
				{
				
				$i++;

					?>
					<input type="hidden" value="<?php echo $sqs['sub_month'];?>" id="<?php echo "submonth".$i;?>" name="<?php echo "submonth".$i;?>" />
					
				<?php
				if($package==0){
					$sq=mysqli_query($con,"select * from gps_categories where category_id='$catid'");
					while($sqss=mysqli_fetch_array($sq)){
				?>
					<input type="hidden" value="<?php echo $sqss['category_id'];?>" id="<?php echo "category_id".$i;?>" name="<?php echo "category_id".$i;?>" />
					<input type="text" value="<?php echo $sqss['category_type'];?>" id="cattype" name="cattype" readonly="" style="width: 100px;"/>
				<?php } 
				
					$qq=mysqli_query($con,"select * from gps_devices where device_id='$devid'");
					while($sqss=mysqli_fetch_array($qq)){

				?>
					<input type="hidden" value="<?php echo $sqss['device_id'];?>" id="<?php echo "device_type".$i;?>" name="<?php echo "device_type".$i;?>" />
					<input type="text" value="<?php echo $sqss['device_type'];?>" id="devtype" name="devtype" readonly="" style="width: 100px;"/>
				<?php
					}?>
					
						
										<input type="text" name="<?php echo "noofdevice".$i;?>" id="<?php echo "noofdevice".$i;?>" value="<?php echo "1";?>" readonly="" style="width:100px;"/>
		
	
	
		<select  class="chzn-select"   name="<?php echo "imieno".$i; ?>"	id="<?php echo "imieno".$i; ?>"	onchange="getmodelid(this.value,<?php echo $i;?>,<?php echo $catid;?>,<?php echo $devid;?>);checkimei(this.value,<?php echo $i;?>,<?php echo $catid;?>,<?php echo $devid;?>);"  data-id="<?php echo $i; ?>">
<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysqli_query($con,"select * from gps_model_details g where g.category_type=$catid and g.device_id=$devid and g.status='completed' and g.imie_number  NOT IN(select imie_no from installation )");

while($sqs3=mysqli_fetch_array($qqss))
{ 
$imei= $sqs3['imie_number'];
	$model_id= $sqs3['model_id'];

?>

<option value="<?php echo $sqs3['imie_number'];?>"><?php echo $sqs3['imie_number'];?></option>
<?php
}

?>

</select>

<input type="hidden" name="<?php echo "modelid".$i; ?>" id="<?php echo "modelid".$i; ?>" />
<?php
/**
* ************************************************************************
*/
						
				}elseif($package==1){?>
							
					<select id="<?php echo "category_id".$i;?>" name="<?php echo "category_id".$i;?>" style="width: 100px;">
				<?php					
					$sq=mysqli_query($con,"select * from gps_categories");
					while($sqss=mysqli_fetch_array($sq)){
				?>
						 <option value="<?php echo $sqss['category_id'];?>"><?php echo $sqss['category_type'];?></option>
							
				<?php } ?>
					</select>
					<select id="<?php echo "device_type".$i;?>" name="<?php echo "device_type".$i;?>" style="width: 100px;">
				<?php					
					$qq=mysqli_query($con,"select * from gps_devices");
					while($sqss=mysqli_fetch_array($qq)){
				?>
						 <option value="<?php echo $sqss['device_id'];?>"><?php echo $sqss['device_type'];?></option>
							
				<?php } ?>
					</select>	
						
										<input type="text" name="<?php echo "noofdevice".$i;?>" id="<?php echo "noofdevice".$i;?>" value="<?php echo "1";?>" readonly="" style="width:100px;"/>
		
	
	
		<select  class="chzn-select"   name="<?php echo "imieno".$i; ?>"	id="<?php echo "imieno".$i; ?>"	onchange="getmodelid2(this.value,<?php echo $i;?>);checkimei2(this.value,<?php echo $i;?>);"  data-id="<?php echo $i; ?>">
<option value="Please Choose IMEI">Please Choose IMEI</option>

<?php
$qqss=mysqli_query($con,"select * from gps_model_details g where g.status='completed' and g.imie_number  NOT IN(select imie_no from installation )");

while($sqs3=mysqli_fetch_array($qqss))
{ 
$imei= $sqs3['imie_number'];
	$model_id= $sqs3['model_id'];

?>

<option value="<?php echo $sqs3['imie_number'];?>"><?php echo $sqs3['imie_number'];?></option>
<?php
}

?>

</select>

<input type="hidden" name="<?php echo "modelid".$i; ?>" id="<?php echo "modelid".$i; ?>" />
				
				<?php } ?>
						
						
								
<input type="text" name="<?php echo "devicesnm".$i; ?>" id="<?php echo "devicesnm".$i; ?>" />

<?php if(($network!='Choose Sim') && ($network!='') && ($network!=0) )
{/*
?>
	<select name="<?php echo "sim".$i; ?>"	id="<?php echo "sim".$i; ?>"	 class="chzn-select">
<option value="No Sim Chosen">Please Choose SIM</option>
<?php
$si=mysqli_query($con,"select * from sim_details where network='$network' ");
while($sir=mysqli_fetch_array($si))
{ ?>
<option value="<?php echo $sir['sim_no'];?>"><?php echo $sir['sim_no']; ?></option>
<?php } ?>
</select>
<?php */ ?>
<input type="text" name="<?php echo "sim".$i; ?>"	id="<?php echo "sim".$i; ?>" value="" />
	<?php
} 
else { ?>
<input type="text" name="<?php echo "sim".$i; ?>"	id="<?php echo "sim".$i; ?>" value="No Sim Chosen" readonly=""/>
<?php } ?>


									
						<?php
						
							echo "<br/>";
							echo "<br/>";
					}
					
						}
						?>
							
							
</div>
												
								<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
									<button class="btn btn-small btn-primary" type="submit" onclick="return valform();">
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
		function getmodelid(str,i,catid,devid)
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
document.getElementById("modelid"+i).value=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodelid.php?c="+str+"&catid="+catid+"&devid="+devid,true);

xmlhttp.send();
	}
		function getmodelid2(str,i)
	{
var catid=$("#category_id"+i).val();
		var devid=$("#device_type"+i).val();		
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
document.getElementById("modelid"+i).value=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodelid.php?c="+str+"&catid="+catid+"&devid="+devid,true);

xmlhttp.send();
	}


function checkimei(str,i,catid,catid)
	{
	//alert('h')
		cnt=document.getElementById('cnt').value;
		// alert(str)
		// alert(catid)
		// alert(catid)
	for(i=1;i<=cnt;i++)

			{		
			
		 imie_number=document.getElementById('imieno'+i).value;	
		 category_id=document.getElementById('category_id'+i).value;	
		 category_id=document.getElementById('device_type'+i).value;	
	//	 alert(imie_number)
	//	 alert(category_id)
		// alert(category_id)
			}
	
	/*	
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
document.getElementById("modelid"+i).value=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/checkimei.php?c="+str+"&catid="+catid+"&devid="+devid,true);

xmlhttp.send();*/
	}
	function checkimei2(str,i)
	{
	//alert('h')
	var catid=$("#category_id"+i).val();
		var devid=$("#device_type"+i).val();
		cnt=document.getElementById('cnt').value;
		// alert(str)
		// alert(catid)
		// alert(catid)
	for(i=1;i<=cnt;i++)

			{		
			
		 imie_number=document.getElementById('imieno'+i).value;	
		 category_id=document.getElementById('category_id'+i).value;	
		 category_id=document.getElementById('device_type'+i).value;	
	//	 alert(imie_number)
	//	 alert(category_id)
		// alert(category_id)
			}
	
	
	}
	</script>
	


<script>



function getengineer(str,a)
{
aa=str.value;

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
document.getElementById('engdiv'+a).innerHTML=xmlhttp.responseText;
//$(str).nextAll('input:first').val(a);
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getengineer.php?c="+aa+"&ival="+a,true);

xmlhttp.send();
}


function valform()
{

 /*var todayDate = new Date();
 alert(todayDate)
 //need to add one to get current month as it is start with 0
 var todayMonth = todayDate.getMonth() + 1;
 var todayDay = todayDate.getDate();
 alert(todayDay);
 var todayYear = todayDate.getFullYear();
 var todayDateText = todayDay + "-" + todayMonth + "-" + todayYear;
 //alert(installed_date)
 alert(app_date)
 alert(todayDateText)

 //alert('aa');*/
 

	cnt=document.getElementById('ndev').value;

	for(i=1;i<=cnt;i++)

			{		
		 imie_number=document.getElementById('imieno'+i).value;	
		 category_id=document.getElementById('category_id'+i).value;	
		 device_type=document.getElementById('device_type'+i).value;	
			
					
 imie_number=document.getElementById('imieno'+i).value;


			if(imie_number=='Please Choose IMEI')
			{
		alert('Please Choose IMEI');
		document.getElementById('imieno'+i).focus();
		return false;
	         }
		//	tf=document.getElementById('engid'+i).value;
		
			devicesnm=document.getElementById('devicesnm'+i).value;
			 if(devicesnm=='')
			{
		alert('Please Choose Device Name');
		document.getElementById('devicesnm'+i).focus();
		
		return false;
	         }

			}
		
	
			 	
}



</script>


	<script type="text/javascript">
			$(function() {
			
	$('#cat_det').delegate('[id^="imieno"]','change',function(e){

					var imei=$(this).val();
				
					var id=$(this).attr("data-id");	
				//	alert(id)				
				//	var val=$("#fbcode"+id).val();
					if(imei && imei!=''){	
							   
							var request = $.ajax({
							  url: "<?php echo base_url();?>ajaxfiles/getinstallation.php",
							  type: "POST",
							  data: { imei : imei},
							  dataType: "html",
							  async:false,
							});
							
							request.done(function( msg ) {
								if(msg=='exists'){
										$("#imieno"+id).val('Please Choose IMEI');alert("IMEI Already Assigned !!!");
								}else{
									
									 $("[id^='imieno']").each(function() {
										 var idn=$(this).attr("data-id");
										 if(idn != id){									 
																
											
											var imei_nn=$(this).val();
										
											 if(imei==imei_nn){
												 $("#imieno"+id).val('Please Choose IMEI');alert("IMEI Already Assigned !!!");
											 }
										 }
									 });
									
									
								}
								
							});	
					}
								  
			});

	})//fn
</script>
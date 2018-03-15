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
				$('#id-disable-check').on('click', function() {
					var inp = $('#form-input-readonly').get(0);
					if(inp.hasAttribute('disabled')) {
						inp.setAttribute('readonly' , 'true');
						inp.removeAttribute('disabled');
						inp.value="This text field is readonly!";
					}
					else {
						inp.setAttribute('disabled' , 'disabled');
						inp.removeAttribute('readonly');
						inp.value="This text field is disabled!";
					}
				});
			
			
				$(".chzn-select").chosen(); 
				
				
				
			
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
							Quality Check Details
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					
							<?php 
				
					$id=$_GET['status'];
				$ss1=mysqli_query($con,"select * from gps_model_details where model_id='$id'");
										while($rsq1=mysqli_fetch_array($ss1))
										{
									$status=$rsq1['status'];
										
										?>
										<?php } ?>								
					<form class="form-horizontal" action="<?php echo base_url();?>stock/status_changed" method="POST">
					
					<input type="hidden" name="modelid" id="modelid" value="<?php echo $id;?>" />
					
								<div class="control-group">
									<label class="control-label" for="form-field-1">Status</label>

									<div class="controls">
									
								<input type="text" name="status" id="status" />	
								</div>
								</div>
									
			<!--	<select class="chzn-select" id="status" name="status" data-placeholder="Choose a Customer...">
				<option value="" >Select Status</option>
				<option value="pending" <?php echo $status=='pending'?'selected=$con,"selected"':'' ?> >pending</option>
				<option value="completed" <?php echo $status=='completed'?'selected=$con,"selected"':'' ?> >completed</option>
				<option value="rejected" <?php echo $status=='rejected'?'selected=$con,"selected"':'' ?> >rejected</option>
				</select>-->
									</div>
								</div>
								<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th>Description</th>
											<th>Status</th>
											<th>Remarks</th>
											</tr>
									</thead>
									
									<tbody>
									<tr>
									
									<td>External Condition</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="extyestatus" name="extstatus" value="Good" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Good</label>
										&nbsp; &nbsp;
										<input type="radio" id="extnostatus" name="extstatus" value="Bad" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >Bad</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="extdescp" id="extdescp"></textarea>
								</td>
									</tr>


									<tr>
									
									<td>Internal Condition</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="intyesstatus" name="intstatus" value="Good" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Good</label>
										&nbsp; &nbsp;
										<input type="radio" id="intnostatus" name="intstatus" value="Bad" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >Bad</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="intdescp" id="intdescp"></textarea>
								</td>
									</tr>
	
									<tr>
									
									<td>Power ON</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="poweryesstatus" name="powerstatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="powernostatus" name="powerstatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="powerdescp" id="powerdescp"></textarea>
								</td>
									</tr>

									<tr>
									
									<td>Battery</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="batteryyesstatus" name="batterystatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="batterynostatus" name="batterystatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="batterydescp" id="batterydescp"></textarea>
								</td>
									</tr>

									<tr>
									
									<td>All LED's</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="ledyesstatus" name="ledstatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="lednostatus" name="ledstatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="leddescp" id="leddescp"></textarea>
								</td>
									</tr>

									<tr>
									
									<td>GSM Network</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="gsmnetworkyesstatus" name="gsmnetworkstatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="gsmnetworknostatus" name="gsmnetworkstatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="gsmnetworkdescp" id="gsmnetworkdescp"></textarea>
								</td>
									</tr>

									<tr>
									
									<td>GPRS Network</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="gprsnetworkyesstatus" name="gprsnetworkstatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="gprsnetworknostatus" name="gprsnetworkstatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="gprsnetworkdescp" id="gprsnetworkdescp"></textarea>
								</td>
									</tr>

									<tr>
									
									<td>Server Testing</td>
									<td>	<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="serveryesstatus" name="serverstatus" value="Yes" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check"> Yes</label>
										&nbsp; &nbsp;
										<input type="radio" id="servernostatus" name="serverstatus" value="No" onclick="chkexternal();">
										<label class="lbl" for="id-disable-check" >No</label>
									</div>
								</div></td>
								
								<td>
								
								<textarea name="serverdescp" id="serverdescp"></textarea>
								</td>
									</tr>
									
									</tbody>
								</table>
								
								<a class="btn btn-success no-border" id="confrimdiv"  style="visibility:hidden;">Confirm</a>
								<a class="btn btn-warning no-border" id="pendiv"  style="visibility:hidden;">Pending</a>
							<a class="btn btn-danger no-border" id="rejdiv"  style="visibility:hidden;">Rejected</a>
								<br />
								<br />
									<div class="control-group">
									<label class="control-label" for="form-field-1">Remarks</label>

									<div class="controls">
									<textarea name="remarks" id="remarks"></textarea>
								</div>
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
								
								<script>
								function chkexternal()
								{
									/*alert(document.getElementById('extyestatus').checked);
									alert(document.getElementById('intyesstatus').checked);
									alert(document.getElementById('poweryesstatus').checked);
									alert(document.getElementById('batteryyesstatus').checked);
									alert(document.getElementById('ledyesstatus').checked);
									alert(document.getElementById('gsmnetworkyesstatus').checked);
									alert(document.getElementById('gprsnetworkyesstatus').checked);
									alert(document.getElementById('serveryesstatus').checked);*/
								if( (document.getElementById('extyestatus').checked==true) && (document.getElementById('intyesstatus').checked==true) && (document.getElementById('poweryesstatus').checked==true) && (document.getElementById('batteryyesstatus').checked==true) && (document.getElementById('ledyesstatus').checked==true) && (document.getElementById('gsmnetworkyesstatus').checked==true) && (document.getElementById('gprsnetworkyesstatus').checked==true) && (document.getElementById('serveryesstatus').checked==true))
									{
										document.getElementById('confrimdiv').style.visibility ='visible';
											document.getElementById('pendiv').style.visibility ='hidden';
										document.getElementById('rejdiv').style.visibility ='hidden';
										document.getElementById('status').value ='completed';
									}
								else if(((document.getElementById('extyestatus').checked==false)||(document.getElementById('intyesstatus').checked==false)))
									{
										document.getElementById('status').value ='rejected';
													document.getElementById('rejdiv').style.visibility ='visible';
													document.getElementById('confrimdiv').style.visibility ='hidden';
													document.getElementById('pendiv').style.visibility ='hidden';
										
									}
									else
									{
									document.getElementById('status').value ='pending';
										document.getElementById('confrimdiv').style.visibility ='hidden';
										document.getElementById('pendiv').style.visibility ='visible';
										document.getElementById('rejdiv').style.visibility ='hidden';
										//document.getElementById('rejdiv').style.visibility ='visible';
									}
								}
								
								function valform()
								{
								if( ((document.getElementById('extyestatus').checked==false) || (document.getElementById('intyesstatus').checked==false)) && (document.getElementById('poweryesstatus').checked==false) && (document.getElementById('batteryyesstatus').checked==false) && (document.getElementById('ledyesstatus').checked==false) && (document.getElementById('gsmnetworkyesstatus').checked==false) && (document.getElementById('gprsnetworkyesstatus').checked==false) && (document.getElementById('serveryesstatus').checked==false) && (document.getElementById('extnostatus').checked==false) && (document.getElementById('intnostatus').checked==false) && (document.getElementById('powernostatus').checked==false) && (document.getElementById('batterynostatus').checked==false) && (document.getElementById('lednostatus').checked==false) && (document.getElementById('gsmnetworknostatus').checked==false) && (document.getElementById('gprsnetworknostatus').checked==false) && (document.getElementById('servernostatus').checked==false))
								{
								
									alert('Please Check the conditions');
									return false;
								}
								}
								
								</script>
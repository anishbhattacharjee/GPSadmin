<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		
		<script>
		var asInitVals = new Array();
	$(document).ready( function () {
	  var oTable = $('#example').dataTable( {
	
	
        "oLanguage": {
            "sSearch": "Search all columns:"
        }
		
    } );
	$("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter( this.value, $("tfoot input").index(this) );
    } );
     
     
     
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
     * the footer
     */
    $("tfoot input").each( function (i) {
        asInitVals[i] = this.value;
    } );
     
    $("tfoot input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );
     
    $("tfoot input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    } );
	var oTableTools = new TableTools( oTable, {
		"buttons": [
			"copy",
			"csv",
			"xls",
			"pdf",
			{ "type": "print", "buttonText": "Print me!" }
		]
	} );
	
//	$('#demo').before( oTableTools.dom.container );
} );
</script>
	<script type="text/javascript">
			$(function() {
			$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
			})
			</script>
<style>
#example_length
{
margin-top: -57px;
}
.dataTables_info
		{
			margin-top:16px;
		}
		.paginate_enabled_previous
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_disabled_previous
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_disabled_previous:hover
		{
			padding-right:10px;
			cursor: pointer;
		}
		.paginate_enabled_next
		{
			cursor: pointer;
		}
		.paginate_disabled_next
		{
			cursor: pointer;
		}
		.paginate_disabled_next:hover
		{
			cursor: pointer;
		}
		#example_paginate
		{
			padding-right: 21px;
			margin-top: -23px;

		}
</style>
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
							Models
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
							<button type="button" class="close" data-dismiss="alert">
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
					<button class="btn btn-mini btn-info" style="margin-top:26px;">
											<i class="icon-bolt"></i>
<a href="#modal-form" role="button" class="white" data-toggle="modal" style="color:white;">Add Models</a>	
										
											<i class="icon-arrow-right  icon-on-right"></i>
										</button>
					<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Model Name</th>
											<th class="hidden-480">Device Type</th>
											<th class="hidden-phone">
											
												Imie Number
											</th>
																					<th>Received Date</th>
																					<th>Action</th>
																					<th>Action</th>
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$q=mysqli_query($con,"select * from gps_model_details");
									while($res=mysqli_fetch_array($q))
									{
								$devid=$res['device_id'];
									?>
									<tr>
										<td><?php echo $slno;?></td>
												<td><?php echo $res['model_name'];?></td>
												
												<?php
									$sq=mysqli_query($con,"select * from gps_devices where device_id='$devid'");
									while($sqs=mysqli_fetch_array($sq))
									{
										?>
										<td><?php echo $sqs['device_type'];?></td>
									<?php } ?>
										<td><?php echo $res['imie_number'];?></td>
										<td><?php echo $res['recv_dt'];?></td>
									<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#editcollege<?php echo  $res['model_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>
													<td><div class="hidden-phone visible-desktop action-buttons">													<a class="red" href="#deletecollege<?php echo  $res['model_id']; ?>" role="button" class="blue" data-toggle="modal">
														<span class="label label-important arrowed-in">Delete</span>
													</a></div></td>
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
									<div id="modal-form" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Please Add Model Details</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>modellist/add" method="POST"  enctype="multipart/form-data">
							
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
									<div class="control-group">
									<label class="control-label" for="form-field-1">Device Type</label>
									<div class="controls">
									<select name="devicetype" id="devicetype">
									<option>Select Device Type</option>
									<?php
									$sq=mysqli_query($con,"select * from gps_devices");
									while($sqs=mysqli_fetch_array($sq))
									{
										?>
									<option value="<?php echo $sqs['device_id'];?>"><?php echo $sqs['device_type'];?></option>	
										<?php
									}
									?>
									
									</select>
									</div>
									</div>
									
									<div class="control-group">
									<label class="control-label" for="form-field-1">Model Name</label>

									<div class="controls">
										<input type="text" id="modelname"  name="modelname" placeholder="Model Name" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Serial Number</label>

									<div class="controls">
										<input type="text" id="slnumber"  name="slnumber" placeholder="Serial Number" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">IMIE Number</label>

									<div class="controls">
										<input type="text" id="imienumber"  name="imienumber" placeholder="IMIE Number" />
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Received Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="span5 date-picker" id="recv_date" type="text" data-date-format="yyyy-mm-dd" name="recv_date" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Condition</label>
									<div class="controls">
									<select name="condition" id="condition">
									<option>Select Condition</option>
									<option value="Good">Good</option>	
									<option value="Damaged">Damaged</option>	
									<option value="Faulty">Faulty</option>	
									</select>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Description</label>

									<div class="controls">
										<textarea name="remarks" id="remarks"></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Cost</label>

									<div class="controls">
										<input type="text" id="cost"  name="cost" placeholder="Cost" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Model Image</label>

									<div class="controls">
										<input type="file" id="userfile"  name="userfile" />
									</div>
								</div>
							
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>

					</div>
					</div>
					</div><!--/.page-content-->

			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
</body></html>
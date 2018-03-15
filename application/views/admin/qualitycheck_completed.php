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
							Quality Check Completed List
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
				
					<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
												<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											
											<th class="hidden-480">Category</th>
										<th class="hidden-480">Item Code</th>
													<th class="hidden-phone">IMEI</th>
											<th class="hidden-phone">S/N</th>
												<th>Condition</th>
												<th>Remarks</th>
												<th>Received Date</th>
												<th>Edit</th>
																				<!--	<th>Action</th>
																					<th>Action</th>-->
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$iid=array();
									$q=mysqli_query($con,"select *,g.model_id as md FROM `qualitycheck` q left join gps_model_details g on g.model_id=q.model_id where q.status='completed' order by q.id desc");
									while($res=mysqli_fetch_array($q))
									{
									
										
								$md=$res['md'];
								array_push($iid,$md);
								$devid=$res['device_id'];
								$catid=$res['category_type'];
									?>
									<tr>
										<td><?php echo $slno;?></td>
												
												<?php
									$sSq=mysqli_query($con,"select * from gps_categories where category_id='$catid'");
									while($sqSs=mysqli_fetch_array($sSq))
									{
										?>
										<td><?php echo $sqSs['category_type'];?></td>
									<?php } ?>
												<?php if($devid!='0')
												{
									$sq=mysqli_query($con,"select * from gps_devices where device_id='$devid'");
									while($sqs=mysqli_fetch_array($sq))
									{
										?>
										<td><?php echo $sqs['device_type'];?></td>
										<?php } }else
									{
									?>
									<td><?php echo "";?></td>
									<?php
									}
									
									?>
										<td><?php echo $res['imie_number'];?></td>
										<td><?php echo $res['slnumber'];?></td>
											<td><div class="hidden-phone visible-desktop action-buttons"><span class="label label-success"><?php echo $res['status'];?></span></div></td>
										<td><?php echo $res['remarks'];?></td>
										<td><?php echo date("d-m-Y",strtotime($res['recv_dt']));?></td>
										<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#editquality<?php echo $md;?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>
									
								<!--	<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>
													<td><div class="hidden-phone visible-desktop action-buttons">													<a class="red" href="#deletecollege<?php echo  $res['model_id']; ?>" role="button" class="blue" data-toggle="modal">
														<span class="label label-important arrowed-in">Delete</span>
													</a></div></td>-->
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
								

					</div>
					</div>
					</div><!--/.page-content-->
					<?php foreach($iid as $iidd)
					{
?>								
						<div id="editquality<?php echo $iidd;?>" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Edit Details</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>qualitycheck/edit" method="POST">
						<?php	$qs=mysqli_query($con,"select * from gps_model_details where model_id=$iidd");
									while($ress=mysqli_fetch_array($qs))
									{ 
									
									$slno=$ress['slnumber'];
									$remarks=$ress['remarks'];
									$recv_dt=$ress['recv_dt'];
									} ?>
									<input type="hidden" id="mid"  name="mid"  value="<?php echo $iidd; ?>"/>
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Serial Number</label>

									<div class="controls">
										<input type="text" id="slno"  name="slno" placeholder="Serial Number" value="<?php echo $slno; ?>"/>
									</div>
								</div>	
								
								<!--<div class="control-group">
									<label class="control-label" for="form-field-1">Device Cost</label>

									<div class="controls">
										<input type="text" id="devicecost"  name="devicecost" placeholder="Device Cost" />
									</div>
								</div>-->
								<div class="control-group">
									<label class="control-label" for="form-field-1">Remarks</label>

									<div class="controls">
										<input type="text" id="remarks"  name="remarks" placeholder="Remarks" value="<?php echo $remarks; ?>"/>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Received Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="span5 date-picker" id="recvdate<?php echo $iidd;?>" type="text" data-date-format="dd-mm-yyyy" name="recvdate" value="<?php echo date("d-m-Y",strtotime($recv_dt)); ?>"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
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

<?php } ?>
			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
</body></html>
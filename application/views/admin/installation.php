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
		#demo
		{
			margin-top: 61px;
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
							Installation Approvals Pending
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
					<!--	<button class="btn btn-mini btn-info" style="margin-top:26px;">
											<i class="icon-bolt"></i>
<a href="<?php echo base_url();?>installation/assign" role="button" class="white" data-toggle="modal" style="color:white;">Assign Engineer</a>	
										
											<i class="icon-arrow-right  icon-on-right"></i>
										</button>-->
					<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Customer</th>
											<th>Engineer</th>
											<!--<th>Device</th>-->
											<th>Imie No</th>
											<th>SIM</th>
											<th>Allocation Status</th>
											<th>Approval Status</th>
											<!--<th>Action</th>-->
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$iid=array();
									$q=mysqli_query($con,"select * from installation where allocation_status='completed' and approve_status='pending' group by customer_id");
									while($res=mysqli_fetch_array($q))
									{
									$custid=$res['customer_id'];
									$engid=$res['engineer_id'];
									$devid=$res['model_id'];
									$intid=$res['instatllation_id'];
									$imieno=$res['imie_no'];
										
									array_push($iid,$intid);
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<?php $ss1=mysqli_query($con,"select * from customers where customer_id='$custid'");
										while($rsq1=mysqli_fetch_array($ss1))
										{
										$cfrist=$rsq1['customer_first_name'];
										?>
										<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $rsq1['customer_first_name'];?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $rsq1['comp_name']."(Company Name)";?></td>	
											<?php
										}?>
								<?php } ?>
									
									<?php $sas=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid' group by engineers_uniqid");
										while($rsqq=mysqli_fetch_array($sas))
										{
										?>
										<td><?php echo $rsqq['engineers_fname'];?></td>
								<?php } ?>
							<!--	<?php $ss3=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");
										while($rsq3=mysqli_fetch_array($ss3))
										{
										?>
										<td><?php echo $rsq3['model_name'];?></td>
								<?php } ?>-->
								<td><?php echo $res['imie_no'];?></td>
								<td><?php echo $res['sim_no'];?></td>
								<td><?php echo $res['allocation_status'];?></td>
								<td><?php echo $res['approve_status'];?></td>
									<!--<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>-->
													<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#changestatus<?php echo  $res['instatllation_id']; ?>" role="button" class="btn btn-small btn-pink" data-toggle="modal">Changestatus</a></div></td>	
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
								<?php foreach($iid as $iidd)
					{
?>									<div id="changestatus<?php echo  $iidd; ?>" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Please Change Status</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>installation/change" method="POST">
							<input type="hidden" name="instatllation_id" id="instatllation_id"  value="<?php echo $iidd;?>"/>
							<?php 
	$q=mysqli_query($con,"select * from installation where instatllation_id='$iidd'");
									while($res=mysqli_fetch_array($q)){
	$custid=$res['customer_id'];							
	$oid=$res['order_id'];							
	}
	?>
							<input type="hidden" name="customer_id" id="customer_id"  value="<?php echo $custid;?>"/>
							<input type="hidden" name="order_id" id="order_id"  value="<?php echo $oid;?>"/>
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Status</label>

									<div class="controls">
									<select name="status" id="status">
									<option>Select Status</option>
									<option value="pending">Pending</option>	
									<option value="approved">Approved</option>	
								
									
										</select>
									</div>
								</div>	
								<div class="control-group">
									<label class="control-label" for="form-field-1">Remarks</label>

									<div class="controls">
						<textarea name="remarks"  id="remarks"></textarea>
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

</div>
</div>
</div>
</div>

</div>

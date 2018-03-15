<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
						<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-timepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
					<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		
		
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
				$('#apptime').timepicker({
					minuteStep: 1,
					showSeconds: true,
					showMeridian: false
				});
			
			});
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
							Document Verfication Pending
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
											<?php
$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$mid=$user['id'];
$type=$user['user_type'];
if($type=='admin'||$type=='subamdin')
{
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
											<th>Customer Name</th>
											<th>Document Type</th>
											<th>Document</th>
											
											<th>Remarks</th>
                							<th>Status</th>
                							<th>Action</th>
                							
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$cid=array();
									//$q=mysqli_query($con,"select * from customer_proof_details where status!='verified'");
									$q=mysqli_query($con,"select * from customer_proof_details c inner join customer_order_details o on  o.customer_id=c.customer_id inner join sfa_response s on s.order_id=o.order_id where c.status!='verified' and s.response_code=0");
									while($res=mysqli_fetch_array($q))
									{
									$id=$res['customer_id'];
									$pid=$res['id'];
									$s=mysqli_query($con,"select * from customers where customer_id='$id'");
									while($r=mysqli_fetch_array($s))
									{
										$cfrist=$r['customer_first_name'];
										$compname=$r['comp_name'];
									}
									
									array_push($cid,$id);
									?>
									<tr>
										<td><?php echo $slno;?></td>
									<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $cfrist;?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $compname."(Company Name)";?></td>	
											<?php
										}?>
										<td><?php echo $res['cust_proof'];?></td>
										<td><?php echo $res['proof_descptn'];?></td>
										<td>
										<?php
										if($res['proof_files']!=NULL)
										{
?>										
										<a href="<?php echo "http://ossgpstracking.com/gpsfront/docuploads/".$res['proof_files'];?>"><?php echo $res['proof_files'];?></a>
										<?php } 
										else
										{
											echo "no documents"; 
										} ?>
										</td>
										<td><span class="label label-warning"><?php echo $res['status'];?></span></td>
										<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#changestatus<?php echo  $res['customer_id']; ?>" role="button" class="btn btn-small btn-pink" data-toggle="modal">Changestatus</a></div></td>		
												
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
						
					<?php foreach($cid as $cidd)
					{
?>									<div id="changestatus<?php echo  $cidd; ?>" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Please Change Status</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>document_verify/change" method="POST">
	
	<?php 
/*	$q=mysqli_query($con,"select * from customer_proof_details where id='$cidd'");
									while($res=mysqli_fetch_array($q))
	
	$custid=$res['customer_id'];								{
	}*/
	?>
						<!--	<input type="hidden" name="proof_id" id="proof_id"  value="<?php echo $cidd;?>"/>-->
							<input type="text" name="customer_id" id="customer_id"  value="<?php echo $cidd;?>"/>
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Status</label>

									<div class="controls">
									<select name="status" id="status">
									<option>Select Status</option>
									<option value="pending">Pending</option>	
									<option value="verified">Verified</option>	
									<option value="rejected">Rejected</option>	
									
										</select>
									</div>
								</div>	
								<div class="control-group">
									<label class="control-label" for="form-field-1">Completed Date</label>

									<div class="controls">
										<div class="row-fluid input-append">
															<input class="span5 date-picker" id="app_date" type="text" data-date-format="yyyy-mm-dd" name="app_date" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
									</div>
								</div>
							<!--	<div class="control-group">
								<label class="control-label" for="form-field-1">Completed Time</label>
								<div class="controls">
														<div class="input-append bootstrap-timepicker">
															<input id="apptime" type="text" class="input-small" name="apptime"/>
															<span class="add-on">
																<i class="icon-time"></i>
															</span>
														</div>
													</div>
													</div>-->
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
						
						
						<?php }
						else
						{
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
											<th>Customer Name</th>
											<th>Document Type</th>
											<th>Document</th>
											
											<th>Remarks</th>
                							<th>Status</th>
                						
                							
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$cid=array();
									//$q=mysqli_query($con,"select * from customer_proof_details where status!='verified'");
									$q=mysqli_query($con,"select * from customer_proof_details c inner join customer_order_details o on  o.customer_id=c.customer_id inner join sfa_response s on s.order_id=o.order_id where c.status!='verified' and s.response_code=0");
									while($res=mysqli_fetch_array($q))
									{
									$id=$res['customer_id'];
									$pid=$res['id'];
									$s=mysqli_query($con,"select * from customers where customer_id='$id'");
									while($r=mysqli_fetch_array($s))
									{
										$cfrist=$r['customer_first_name'];
										$compname=$r['comp_name'];
									}
									
									array_push($cid,$id);
									?>
									<tr>
										<td><?php echo $slno;?></td>
									<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $cfrist;?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $compname."(Company Name)";?></td>	
											<?php
										}?>
										<td><?php echo $res['cust_proof'];?></td>
										<td><?php echo $res['proof_descptn'];?></td>
										<td>
										<?php
										if($res['proof_files']!=NULL)
										{
?>										
										<a href="<?php echo "http://ossgpstracking.com/gpsfront/docuploads/".$res['proof_files'];?>"><?php echo $res['proof_files'];?></a>
										<?php } 
										else
										{
											echo "no documents"; 
										} ?>
										</td>
										<td><span class="label label-warning"><?php echo $res['status'];?></span></td>
									
												
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
							<?php
						}
?>
</div>
</div>
</div>
</div>
</div>
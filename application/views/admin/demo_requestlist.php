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
				<div class="page-header position-relative" style="height: 140px;">
						<h1>
						Demo Request List
							<small>
								<i class="icon-double-angle-right"></i>
				 <ul class="unstyled spaced2">
						<li>
							<i class="icon-circle green" style="color: #F3C2C2 !IMPORTANT;"></i>
							Device With Customer
						</li>
						<!--	<li>
							<i class="icon-circle green" style="color: lightblue !IMPORTANT;"></i>
							Device With OGTS
						</li>-->
							<li>
							<i class="icon-circle green" style="color: #6CF0AB !IMPORTANT;"></i>
							Device Returned
						</li>

														
														</ul>
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
						<?php
$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$mid=$user['id'];
$type=$user['user_type'];
if($type=='admin' || $type=='operations'|| $type=='support'|| $type=='inventory')
{
	?>

		<div id="demo" style="background-color: #eff3f8;">
					<table cellpadding="0" cellspacing="3" border="0" class="table table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
										
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
												<th>Created By</th>
												<th>Start Date</th>
												<th>End Date</th>
											<th>Confirmed Date Time</th>
												<th>Approval Status</th>
	
												<th>Device Status</th>
										
											
										</tr>
									</thead>

									<tbody>
									<?php 
								$un=$this->session->userdata('username');
									$usrid=$user['id'];		
									$cid=array();
									
								
								
									
									?>
									<?php
									$iid=array();
										$slno=1;

						$qo=mysqli_query($con,"select * from customer_order_details o join customer_orders co on co.order_id=o.order_id join customers cs on cs.customer_id=co.customer_id where co.type_order='demo' and cs.customer_emailid!='demo' group by co.order_id  order by co.order_id desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							array_push($iid,$order_id);
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									$id=$srs['customer_id'];
									$sub_month=$srs['sub_month'];
									$aid=$srs['created_by'];
									$start_date=$srs['start_date'];
									$end_date=$srs['end_date'];
								$approve_status=$srs['approve_status'];
									$accounts_approval=$srs['accounts_approval'];
									$device_status=$srs['device_status'];
									$s=mysqli_query($con,"select * from customers where customer_id='$id'");
									while($r=mysqli_fetch_array($s))
									{
											$uid=$r['customer_uid'];
										$cfrist=$r['customer_first_name'];
										$cmiddle=$r['customer_middle_name'];
										$clast=$r['customer_last_name'];
										$compname=$r['comp_name'];
									}
									
									if($device_status=='With Customer')
									{
										?>
										<tr style="background-color: #F3C2C2;">
										<?php
									}
									else if($device_status=='Returned')
									{
										?>
										<tr style="background-color: #6CF0AB;">
										<?php
									} 
									/*else if($device_status=='With OGTS')
									{
									
									
									<tr style="background-color: lightblue;"> } */
									else
									{
										?>
											<tr>
										<?php
									}
									?>
										<td><?php echo $slno;?></td>
										<td><?php echo $uid;?></td>
									<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $cfrist . $cmiddle .$clast;?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $compname."(Company Name)";?></td>	
											<?php
										}?>
										<td><a href="<?php echo base_url();?>demo_request/demo_detail_info/<?php echo $id;?>/<?php echo $order_id;?>"><?php echo "OD".$order_id;?></a></td>
								<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id where  o.customer_id='$id' and co.order_id='$order_id'  group by o.order_id");
								while($rneq=mysqli_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
										
				<?php
								
									$aq=mysqli_query($con,"select * from admin_data where id='$aid'");
									if(mysqli_num_rows($aq)>0)
									{
						while($rea=mysqli_fetch_array($aq))
						{
						
									?>
									<td><?php echo $rea['name'];?></td>
									
									<?php } }
									else
									{?>
									<td><?php echo $aid;?></td>
									<?php
										
									}
									  ?>
									  <td><?php echo date("d-m-Y",strtotime($start_date));?></td>
									  <td><?php echo date("d-m-Y",strtotime($end_date));?></td>
									<td>
									<?php 
									if($srs['approve_status']=='pending')
									{
										echo "Pending";
									}
									else
									{
									echo date("d-m-Y h:i:s",strtotime($srs['appr_rej_date']));
									}
																		?>
						</td>
										 
										<td><?php echo $approve_status;?></td>	
											
										<td>
										
										<?php
										if($device_status=='')
										{
											echo "";
										}
										else
										{
											echo $device_status;
										}
										 ?>
										<?php if($type=='admin' || $type=='support'|| $type=='inventory')
{ ?>
													<a href="#changestatus<?php echo  $order_id; ?>" role="button"  data-toggle="modal">Changestatus</a>
													<?php } ?>	
													</td>												
													
																				
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
	<form class="form-horizontal" action="<?php echo base_url();?>demo_request/device_status_change" method="POST">
														
							<input type="hidden" name="order_id" id="order_id"  value="<?php echo $iidd;?>"/>
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Status</label>

									<div class="controls">
									<select name="status" id="statuss<?php echo $iidd;?>">
									<option>Select Status</option>
									<option value="Returned">Returned</option>	
									<option value="With Customer">With Customer</option>	
								<!--	<option value="With OGTS">With OGTS</option>	-->
									
										</select>
									</div>
								</div>	
													
										
									</div>
								</div>

<!--	<input id="curdate" type="text" name="curdate" value="<?php echo date("d-m-Y H:i:s",strtotime('+330 minutes'));?>"/>-->
								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit" >
									
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>
				
<?php }  ?>
	<?php
}
else {
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
										
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
												<th>Created By</th>
												<th>Start Date</th>
												<th>End Date</th>
											<th>Confirmed Date Time</th>
												<th>Approval Status</th>
										
											
										</tr>
									</thead>

									<tbody>
									<?php 
								$un=$this->session->userdata('username');
									$usrid=$user['id'];		
									$cid=array();
									
								
								
									
									?>
									<?php
									
										$slno=1;

						$qo=mysqli_query($con,"select * from customer_order_details o join customer_orders co on co.order_id=o.order_id join customers cs on cs.customer_id=co.customer_id where co.type_order='demo' and cs.customer_emailid!='demo' and co.created_by='$mid'  order by co.order_id desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									$id=$srs['customer_id'];
									$sub_month=$srs['sub_month'];
									$aid=$srs['created_by'];
									$start_date=$srs['start_date'];
									$end_date=$srs['end_date'];
								$approve_status=$srs['approve_status'];
									$accounts_approval=$srs['accounts_approval'];
									$s=mysqli_query($con,"select * from customers where customer_id='$id'");
									while($r=mysqli_fetch_array($s))
									{
											$uid=$r['customer_uid'];
										$cfrist=$r['customer_first_name'];
										$compname=$r['comp_name'];
									}
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $uid;?></td>
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
										<td><a href="<?php echo base_url();?>demo_request/demo_detail_info/<?php echo $id;?>/<?php echo $order_id;?>"><?php echo "OD".$order_id;?></a></td>
								<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id where  o.customer_id='$id' and co.order_id='$order_id'  group by o.order_id");
								while($rneq=mysqli_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
										
				<?php
								
									$aq=mysqli_query($con,"select * from admin_data where id='$aid'");
									if(mysqli_num_rows($aq)>0)
									{
						while($rea=mysqli_fetch_array($aq))
						{
						
									?>
									<td><?php echo $rea['name'];?></td>
									
									<?php } }
									else
									{?>
									<td><?php echo $aid;?></td>
									<?php
										
									}
									  ?>
									  <td><?php echo date("d-m-Y",strtotime($start_date));?></td>
									  <td><?php echo date("d-m-Y",strtotime($end_date));?></td>
									<td><?php 
									if($srs['approve_status']=='pending')
									{
										echo "Pending";
									}
									else
									{
									echo date("d-m-Y h:i:s",strtotime($srs['appr_rej_date']));
									}
																		?></td>
										 
										<td><?php echo $approve_status;?></td>												
														
																				
										</tr>
						
							
								
									
									<?php
								$slno++;
									}
								
									?>
									
									</tbody>
								</table>
				
								</div>
<?php } ?>						
					

</div>
</div>
</div>
</div>
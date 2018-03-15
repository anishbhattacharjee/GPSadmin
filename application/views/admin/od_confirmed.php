
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
							Orders List
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
						<?php
$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$mid=$user['id'];
$type=$user['user_type']; ?>
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
											<th>Confirmed Date Time</th>
												<th>Approval Status</th>
											<th>Payment Status</th>
										
											
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
					
						$qo=mysqli_query($con,"select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id where s.response='success'  and co.created_by='$mid' group by o.order_id order by co.order_id desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$order_date=$srs['order_date'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									$id=$srs['customer_id'];
									$sub_month=$srs['sub_month'];
									$aid=$srs['created_by'];
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
										<td><a href="<?php echo base_url();?>order_confirmed/detailed_orderinfoo/<?php echo $id;?>/<?php echo $order_id;?>"><?php echo "OD".$order_id;?></a></td>
									
								<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id where  o.customer_id='$id' and co.order_id='$order_id'  group by co.order_id  order by co.order_id desc");
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
									{ ?>
									<td><?php echo $aid;?></td>
									<?php
										
									}
									if($approve_status=='pending')
									{
										?>
									
											<td><?php echo date("d-m-Y h:i:s",strtotime($srs['order_date']));?></td>
										<?php
									}
									else if($approve_status=='approved' && $accounts_approval=='pending')
									{
										?>
										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['appr_rej_date']));?></td>
										<?php
									}
									else {
									  ?>
									<td><?php echo date("d-m-Y h:i:s",strtotime($srs['account_approved_dt']));?></td>
										 
										 <?php } ?>
										<td><?php echo $approve_status;?></td>												
										<td><?php echo $accounts_approval;?></td>												
																				
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
</div>
</div>
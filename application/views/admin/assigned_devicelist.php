<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery-1.3.2.min.js"></script>

		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.js"></script>
		
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
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
							Assgined Device List <?php
							if($type=='admin' || $type=='support') 
							{
								?>
							/Assign Engineer	
								<?php
							} ?>
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
$qq=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($qq);
$mid=$user['id'];
$type=$user['user_type'];
//var_dump($type);
if($type=='admin' || $type=='support')
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
										
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
											<th>Assigned Date Time</th>
											<th>IMEI</th>
											<th>Assign </th>
											
										</tr>
									</thead>

									<tbody>
									<?php 
							/*	$ime=array();
									$cid=array();
									//$q=mysqli_query($con,"select * FROM customer_proof_details where customer_id not in(select customer_id from customer_proof_details where status!='verified') group by customer_id");
									$q=mysqli_query($con,"select * from customer_proof_details c inner join customer_order_details o on  o.customer_id=c.customer_id inner join payment_master s on s.order_id=o.order_id where c.status='verified' and s.response='success' group by o.customer_id");
									while($res=mysqli_fetch_array($q))
									{
									$id=$res['customer_id'];
									
									?>
									<?php
									
										$slno=1;
					//	$qo=mysqli_query($con,"select *,sum(noofdevice) as ndev from customer_order_details where customer_id='$id' and assign='pending' group by order_id");
					
					//	$qo=mysqli_query($con,"select *,sum(noofdevice) as ndev from customer_order_details o inner join sfa_response s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id where s.response_code=0 and o.assign='pending' and o.customer_id='$id' and co.approve_status='approved' group by s.order_id");
						$qo=mysqli_query($con,"select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id inner join installation i on i.order_id=co.order_id where s.response='success' and o.assign='pending' and o.customer_id='$id' and co.approve_status='approved' and i.assign_device_status='assigned' and o.device_assign='assigned' group by s.order_id order by device_date_time desc");*/
							$slno=1;
						$qo=mysqli_query($con,"select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id inner join installation i on i.order_id=co.order_id where s.response='success' and o.assign='pending'  and co.approve_status='approved' and i.assign_device_status='assigned' and o.device_assign='assigned' group by s.order_id order by device_date_time desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									$id=$srs['customer_id'];
									//$noofdevice=$srs['ndev'];
								//	$noofdevice=$srs['noofdevice'];
									$sub_month=$srs['sub_month'];
								
									
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
										<td><?php echo "OD".$order_id;?></td>
								
										<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id  join gps_categories gc on gc.category_id=o.category_id where o.device_assign='assigned' and o.assign='pending' and o.customer_id='$id' and co.order_id='$order_id' and co.approve_status='approved' and gc.type='main' group by co.order_id");
								while($rneq=mysqli_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
			
			<!--							<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $catid;?>/<?php echo $devid;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>-->	
									<!-- trail assign	<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>
									-->
										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['device_date_time']));?></td>
									<?php
									
								//echo $con,"select * from installation where customer_id='$id' and order_id='$order_id'";
	$aab=mysqli_query($con,"select GROUP_CONCAT(imie_no, ' ') as im from installation where customer_id='$id' and order_id='$order_id' and assign_device_status='assigned'");
									while($resaab=mysqli_fetch_array($aab))
									{
										$imie_no=$resaab['im'];
							
								}
										?><td style="width:300px;"><?php echo $imie_no; ?></td>
									
																			
										
									<td><a href="<?php echo base_url();?>installation/assign_engineer/<?php echo $id;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>/<?php echo $noofdevice;?>"  >Assign Engineer</a></td>
								
										</tr>
							<?php
								$slno++;	
							 } ?>	
							
								
									
									<?php
							
								//	}
								
									?>
									
									</tbody>
								</table>
								</div>
									<?php }
									else if($type=='inventory'||$type=='Product Manager'||$type=='COO'||$type=='CFO')
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
										
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
											<th>IMEI</th>
											
											<th>Assigned Date Time</th>
																					
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
								
						$qo=mysqli_query($con,"select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id inner join installation i on i.order_id=co.order_id where s.response='success' and o.assign='pending' and co.approve_status='approved' and i.assign_device_status='assigned' and o.device_assign='assigned' group by s.order_id order by device_date_time desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									//$noofdevice=$srs['ndev'];
								//	$noofdevice=$srs['noofdevice'];
									$sub_month=$srs['sub_month'];
								$id=$srs['customer_id'];
									
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
										<td><?php echo "OD".$order_id;?></td>
								
										<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id join gps_categories gc on gc.category_id=o.category_id where o.device_assign='assigned' and o.assign='pending' and o.customer_id='$id' and co.order_id='$order_id' and co.approve_status='approved' and gc.type='main' group by co.order_id");
								while($rneq=mysqli_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
			
			<!--							<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $catid;?>/<?php echo $devid;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>-->	
									<!-- trail assign	<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>
									-->
										<?php
									
								//echo $con,"select * from installation where customer_id='$id' and order_id='$order_id'";
	$aab=mysqli_query($con,"select GROUP_CONCAT(imie_no, ' ') as im from installation where customer_id='$id' and order_id='$order_id' and assign_device_status='assigned'");
									while($resaab=mysqli_fetch_array($aab))
									{
										$imie_no=$resaab['im'];
									
							
								}
										?><td style="width:300px;"><?php echo $imie_no; ?></td>
									
										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['device_date_time']));?></td>
																				
									
								
										</tr>
							<?php
								$slno++;	
							 } ?>	
							
								
									
									<?php
							//	$slno++;
								//	}
								
									?>
									
									</tbody>
								</table>
								</div>		
								
										<?php
									}
									   
									   else if($type=='dealer')
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
										
											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>No of Orders</th>
											<th>Assigned Date Time</th>
											<th>IMEI</th>
											<th>Assign </th>
											
										</tr>
									</thead>

									<tbody>
								
									<?php
									
										$slno=1;
					
						$qo=mysqli_query($con,"select * from customer_order_details o inner join payment_master s on s.order_id=o.order_id join customer_orders co on co.order_id=o.order_id inner join installation i on i.order_id=co.order_id where s.response='success' and o.assign='pending' and co.approve_status='approved' and i.assign_device_status='assigned' and o.device_assign='assigned' and co.created_by='$mid' group by s.order_id order by device_date_time desc");
						while($srs=mysqli_fetch_array($qo))
						{
							$custmainid=$srs['id'];
							$order_id=$srs['order_id'];
							$catid=$srs['category_id'];
									$devid=$srs['device_id'];
									//$noofdevice=$srs['ndev'];
								//	$noofdevice=$srs['noofdevice'];
									$sub_month=$srs['sub_month'];
									$id=$srs['customer_id'];
									
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
										<td><?php echo "OD".$order_id;?></td>
								
										<?php
								
								$neq=mysqli_query($con,"select o.order_id,sum(noofdevice) as ndev from customer_order_details o join customer_orders co on co.order_id=o.order_id join gps_categories gc on gc.category_id=o.category_id where o.device_assign='assigned' and o.assign='pending' and o.customer_id='$id' and co.order_id='$order_id' and co.approve_status='approved' and gc.type='main' group by co.order_id");
								while($rneq=mysqli_fetch_array($neq))
								{
								$noofdevice=$rneq['ndev'];
									?>
									<td><?php echo $noofdevice;?></td>
									<?php
								} ?>
			
			<!--							<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $catid;?>/<?php echo $devid;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>-->	
									<!-- trail assign	<td><a href="<?php echo base_url();?>installation/trialassign/<?php echo $id;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>"  >Assign Engineer</a></td>
									-->
										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['device_date_time']));?></td>
									<?php
									
								//echo $con,"select * from installation where customer_id='$id' and order_id='$order_id'";
	$aab=mysqli_query($con,"select GROUP_CONCAT(imie_no, ' ') as im from installation where customer_id='$id' and order_id='$order_id' and assign_device_status='assigned'");
									while($resaab=mysqli_fetch_array($aab))
									{
										$imie_no=$resaab['im'];
									
							
								}
										?><td style="width:300px;"><?php echo $imie_no; ?></td>
									
																			
										
									<td><a href="<?php echo base_url();?>installation/assign_engineer/<?php echo $id;?>/<?php echo $custmainid;?>/<?php echo $order_id;?>/<?php echo $noofdevice;?>"  >Assign Engineer</a></td>
								
										</tr>
							<?php
									$slno++;
							 } ?>	
							
								
									
									<?php
							//	$slno++;
								//	}
								
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
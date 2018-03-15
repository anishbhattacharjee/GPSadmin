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

						Completed demo Installation 

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

if($type=='admin' || $type=='support' || $type=='operations')

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

											<th>Customer</th>

											<th>Order ID</th>

											<th>Engineer</th>

											<th>Device Model</th>

											<th>Imie No</th>

									<th>SIM</th>
<th>Start Date</th>
												<th>End Date</th>
											<th>Installation Status</th>

										<th>Installed Date</th>

										
										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

								//	$q=mysqli_query($con,"select * from installation i join customers cs on cs.customer_id=i.customer_id where  installation_status='completed' and assign_engineer='assigned' and cs.account_type='demo' order by order_id desc");
									$q=mysqli_query($con,"select * from installation i join customer_orders cs on cs.order_id=i.order_id where  installation_status='completed'  and cs.type_order='demo' and i.demo_device_type='demo' order by cs.order_date desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];
									$dev_id=$res['device_id'];

									array_push($iid,$intid);

									?>

									<tr>

										<td><?php echo $slno;?></td>

										<?php $ss1=mysqli_query($con,"select * from customers where customer_id='$custid'");

										while($rsq1=mysqli_fetch_array($ss1))

										{

										$uid=$rsq1['customer_uid'];

										$cfrist=$rsq1['customer_first_name'];

										?>

											<td><?php echo $uid;?></td>

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

									<td><?php echo "OD".$order_id;?></td>

									<?php $sas=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid' group by engineers_uniqid");
if(mysqli_num_rows($sas)>0)
{
											while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } 
								
								}
								else
								{
									?>
										<td><?php echo "Ramesh";?></td>
									<?php
								}
								?>

						<?php
	$qq=mysqli_query($con,"select * from gps_devices where device_id='$dev_id'");

while($sqss=mysqli_fetch_array($qq))

									{

										?>
		
			<td><?php echo $sqss['device_type'];?></td>
							

										<?php

									}
									?>

								<td><?php echo $res['imie_no'];?></td>

						<td><?php echo $res['sim_no'];?></td>
						<?php 
						$coq=mysqli_query($con,"select * from customer_order_details where order_id='$order_id'");
						$rcoq=mysqli_fetch_array($coq);
						?>
						<td><?php echo date("d-m-Y",strtotime($rcoq['start_date']));?></td>
						<td><?php echo date("d-m-Y",strtotime($rcoq['end_date']));?></td>
						
						

								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

									<!--<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>

														

													</a></div></td>-->

											<td><?php echo date("d-m-Y",strtotime($res['installed_date']));?></td>
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

else if($type=='marketing' || $type=='subadmin')

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

											<th>Customer</th>

											<th>Order ID</th>

											<th>Engineer</th>

												<th>Device Type</th>

											<th>Imie No</th>

											<th>SIM</th>
											<th>Start Date</th>
												<th>End Date</th>
											<th>Installation Status</th>

										<th>Installed Date</th>

										

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

									$q=mysqli_query($con,"select *  from installation i join customers cs on cs.customer_id=i.customer_id left join customer_orders c on c.order_id=i.order_id where  i.installation_status='pending' and c.created_by='$mid'  and assign_engineer='assigned' and c.type_order='demo'  order by c.order_date desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];
	$dev_id=$res['device_id'];
									array_push($iid,$intid);

									?>

									<tr>

										<td><?php echo $slno;?></td>

										<?php $ss1=mysqli_query($con,"select * from customers where customer_id='$custid'");

										while($rsq1=mysqli_fetch_array($ss1))

										{

										$uid=$rsq1['customer_uid'];

										$cfrist=$rsq1['customer_first_name'];

										?>

											<td><?php echo $uid;?></td>

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

									<td><?php echo "OD".$order_id;?></td>

									<?php $sas=mysqli_query($con,"select * from engineers where engineers_uniqid='$engid' group by engineers_uniqid");
if(mysqli_num_rows($sas)>0)
{
											while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } 
								
								}
								else
								{
									?>
										<td><?php echo "Ramesh";?></td>
									<?php
								}
								?>

							<?php
	$qq=mysqli_query($con,"select * from gps_devices where device_id='$dev_id'");

while($sqss=mysqli_fetch_array($qq))

									{

										?>
		
			<td><?php echo $sqss['device_type'];?></td>
							

										<?php

									}
									?>

								<td><?php echo $res['imie_no'];?></td>

			<td><?php echo $res['sim_no'];?></td>
	<?php 
						$coq=mysqli_query($con,"select * from customer_order_details where order_id='$order_id'");
						$rcoq=mysqli_fetch_array($coq);
						?>
						<td><?php echo date("d-m-Y",strtotime($rcoq['start_date']));?></td>
						<td><?php echo date("d-m-Y",strtotime($rcoq['end_date']));?></td>
								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

							<td><?php echo date("d-m-Y",strtotime($res['installed_date']));?></td>
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



		?>				</div>

						</div>

						</div>

						</div>

</div>






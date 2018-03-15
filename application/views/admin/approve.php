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

							Approve Renewals

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

						<form class="form-horizontal" action="<?php echo base_url();?>subscription_renewal/approved" method="POST">

				<?php 

					$installation_id = $this->uri->segment(3);

					$customer_id = $this->uri->segment(4);

					$order_id = $this->uri->segment(5);

				?>

					<input type="hidden" value="<?php echo $installation_id;?>" id="installation_id" name="installation_id" />

						<input type="hidden" value="<?php echo $customer_id;?>" id="customer_id" name="customer_id" />

					

							<input type="hidden" name="orderid" id="orderid" value="<?php echo $order_id;?>"/>

					

					

					<?php

					

							$qo=mysqli_query($con,"select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.customer_id='$customer_id' and i.installation_id='$installation_id' and i.order_id='$order_id' and i.renew_status='renew'");

							$rqo=mysqli_fetch_array($qo);

							$tomorrow = date('d-m-Y',strtotime($rqo['expiry_date'] . "+1 days"));

							

							?>

					New Subscription Start Date >>		<input type="text" value="<?php echo date('Y-m-d',strtotime($tomorrow));?>" id="curdate" name="curdate" />

									<input type="hidden" value="<?php echo $rqo['r_id'];?>" id="r_id" name="r_id" />

									<input type="hidden" value="<?php echo $rqo['demo_device_type'];?>" id="demo_device_type" name="demo_device_type" />

									<input type="hidden" value="<?php echo $rqo['company_id'];?>" id="company_id" name="company_id" />

									<input type="hidden" value="<?php echo $rqo['device_name'];?>" id="device_name" name="device_name" />

									<input type="hidden" value="<?php echo $rqo['model_id'];?>" id="model_id" name="model_id" />

									<input type="hidden" value="<?php echo $rqo['imie_no'];?>" id="imie_no" name="imie_no" />

									<input type="hidden" value="<?php echo $rqo['engineer_id'];?>" id="engineer_id" name="engineer_id" />

									<input type="hidden" value="<?php echo $rqo['renew_month'];?>" id="submonth" name="submonth" />

									<input type="hidden" value="<?php echo $rqo['r_invoice'];?>" id="rinv" name="rinv" />
									<input type="hidden" value="<?php echo $rqo['device_id'];?>" id="device_id" name="device_id" />
									<input type="hidden" value="<?php echo $rqo['category_id'];?>" id="category_id" name="category_id" />

					

						<?php

					

					$sq1=$con,"select



*



FROM



r_installation o



INNER JOIN customers c ON o.customer_id = c.customer_id



WHERE o.customer_id=$customer_id AND o.order_id=$order_id";



$rs=mysqli_query($sq1);



$order=mysqli_fetch_assoc($rs);

					

					$sq_sett=$con,"select * from settings";



$rs_sett=mysqli_query($sq_sett);



$sett=mysqli_fetch_assoc($rs_sett);



$s_tax_per=$sett['service_tax_percentage'];



$vat_per=$sett['vat_percentage'];

					?>

										<div class="widget-header widget-header-large">



											<h3 class="grey lighter pull-left position-relative">



												<i class="icon-leaf green"></i>



												Renewal Invoice &nbsp;&nbsp;&nbsp;&nbsp;ORDER ID - <?php echo "OD".$order['order_id'];?>



											</h3>







											<div class="widget-toolbar no-border invoice-info">



												<span class="invoice-info-label" style="font-size: 13px;">Renewal Invoice:</span>



												<span class="red">#RINV<?php echo str_pad($order['r_invoice'], 4, '0', STR_PAD_LEFT); ?></span>







												<br />



												<span class="invoice-info-label">Date:</span>



												<span class="blue"><?php echo date("d-m-Y",strtotime($order['ts'])); ?></span>



											</div>







											<div class="widget-toolbar hidden-480">



												<!--<a href="<?php echo base_url();?>invoices/invoice_print?id=<?php echo $id; ?>&inv=<?php echo $inv; ?>" target="_blank">



													<i class="icon-print"></i>



												</a>-->



											</div>



										</div>	

											<div class="widget-body">



											<div class="widget-main padding-24">



												<div class="row-fluid">



													<div class="row-fluid">



														<div class="span6">



															<div class="row-fluid">



																<div class="span12 label label-large label-info arrowed-in arrowed-right">



																	<b>Company Info</b>



																</div>



															</div>







															<div class="row-fluid">



																<ul class="unstyled spaced">



																	<li>



																		<i class="icon-caret-right blue"></i>



																		<?php echo $order['comp_name']; ?>



																	</li>







																	<li>



																		<i class="icon-caret-right blue"></i>



																		<?php echo $order['comp_addr']; ?>



																	</li>







																	<li>



																		<i class="icon-caret-right blue"></i>



																		<?php echo $order['comp_email']; ?>



																	</li>







																	<li>



																		<i class="icon-caret-right blue"></i>



																		Phone:



																		<b class="red"><?php echo $order['comp_teleph']; ?></b>



																	</li>



                                                                    <li>													



																		<i class="icon-caret-right blue"></i>



																		Website:



																		<b class="green"><?php echo $order['website']; ?></b>



																	</li>











																	<li class="divider"></li>







																</ul>



															</div>



														</div><!--/span-->







														<div class="span6">



															<div class="row-fluid">



																<div class="span12 label label-large label-success arrowed-in arrowed-right">



																	<b>Customer Info</b>



																</div>



															</div>







															<div class="row-fluid">



																<ul class="unstyled spaced">



																	<li>



																		<i class="icon-caret-right green"></i>



																		<?php echo $order['customer_first_name']; ?> <?php echo $order['customer_middle_name']; ?> <?php echo $order['customer_last_name']; ?>



																	</li>







																	<li>



																		<i class="icon-caret-right green"></i>



																		<?php echo $order['address']; ?>



																	</li>







																	<li>



																		<i class="icon-caret-right green"></i>



																		<?php echo $order['customer_emailid']; ?>



																	</li>



																	<li>



																		<i class="icon-caret-right green"></i>



																		Phone: <b class="red"><?php echo $order['customer_phone_no']; ?></b>



																	</li>



																	<li class="divider"></li>







																</ul>



															</div>



														</div><!--/span-->



													</div><!--row-->







													<div class="space"></div>







													<div class="row-fluid">



														<table class="table table-striped table-bordered">



															<thead>



																<tr>



																	<th class="center">#</th>



																	<th>Product</th>



																	<th>Category</th>

<!--

																	<th>No of Devices</th>

                                                                    <th>Old Subscription Month</th>

                                                                    <th>Old Subscription Duration</th>-->

  																	<th>New Subscription Month</th>

                                                                    <th>New Subscription Duration</th>



                                                                    <th>Total</th>



																</tr>



															</thead>







															<tbody>



                                                            <?php



															$i=0;



															$subtot=0;



															$subs_cost=0;



															$inst_cost=0;



															$dev_cost_tot=0;



															



															$sql1=$con,"select



od.category_id,



gps_categories.category_type,



od.device_id,



gps_devices.device_type,



od.noofdevice,



od.sub_month,



od.subcost,



od.device_cost,



od.installation_cost,



customer_orders.order_type



FROM



customer_order_details AS od



INNER JOIN gps_categories ON od.category_id = gps_categories.category_id



INNER JOIN gps_devices ON gps_devices.device_id = od.device_id



INNER JOIN customer_orders ON od.order_id = customer_orders.order_id



WHERE od.customer_id=$customer_id AND od.order_id=$order_id";



															$rs1=mysqli_query($sql1);



															while($ord_det=mysqli_fetch_assoc($rs1)){



																



																if($ord_det['order_type']=='renew'){



																	$ord_det['device_cost']=0;



																	$ord_det['installation_cost']=0;



																}



																	



															



$tot=($ord_det['device_cost']+$ord_det['installation_cost']+$ord_det['subcost'])*$ord_det['noofdevice'];



$subtot+=$tot;



$subs_cost+=($ord_det['noofdevice']*$ord_det['subcost']);



$inst_cost+=($ord_det['noofdevice']*$ord_det['installation_cost']);



$dev_cost_tot+=($ord_det['noofdevice']*$ord_det['device_cost']);







															?>



																<tr>



																	<td class="center"><?php echo ++$i; ?></td>



																	<td>



																		<?php echo $ord_det['device_type']; ?>



																	</td>



																	<td>



																		<?php echo $ord_det['category_type']; ?>



																	</td>



															<!--		<td>



																		<?php echo $ord_det['noofdevice']; ?>



																	</td>-->

																		<!--<td>



																		<?php echo $ord_det['sub_month']; ?>



																	</td>-->

<?php

$sq=mysqli_query($con,"select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.customer_id='$customer_id' and i.installation_id='$installation_id' and i.order_id='$order_id' and i.renew_approve_status='pending'");

$sqs=mysqli_fetch_array($sq);

$mnth=$sqs['renew_month'];

$r_invoice=$sqs['r_invoice'];

?>

																<!--	<td>



																		<?php echo date('d-m-Y',strtotime($sqs['installed_date']))."<b>&nbsp;&nbsp;-&nbsp;&nbsp;</b>".date('d-m-Y',strtotime($sqs['expiry_date'])); ?>



																	</td>-->

														<td>



																		<?php echo $sqs['renew_month']; ?>



																	</td>

																	<td>



																		<?php echo  date('d-m-Y',strtotime($sqs['expiry_date'] . "+1 days"))."<b>&nbsp;&nbsp;-&nbsp;&nbsp;</b>".date('d-m-Y',strtotime($sqs['expiry_date'] . "+".$mnth."months")); ?>



																	</td>

					<?php

					$iq=mysqli_query($con,"select * from renew_invoice where id='$r_invoice'");

					$isq=mysqli_fetch_array($iq);

					?>

																	<td>



																		<?php echo $isq['final_total']; ?>



																	</td>



                                                                    



																</tr>



															<?php }



															

?>



															</tbody>



														</table>



													</div>







													<div class="hr hr8 hr-double hr-dotted"></div>







											







													<div class="space-6"></div>







												

		<div class="control-group">

									<label class="control-label" for="form-field-1">Remark</label>



									<div class="controls">

									<textarea name="remark" id="remark"></textarea>

									

									<button class="btn btn-small btn-primary" type="submit" >

										<i class="icon-ok"></i>

										Confirm

									</button>

								<!--	<button class="btn btn-small btn-warning" type="submit" onclick="pendingform();">

										<i class="icon-question"></i>

										Pending

									</button>

									<button class="btn btn-small btn-danger" type="submit" onclick="rejectform();">

										<i class="icon-remove"></i>

										Reject

									</button>-->

									</div>

									</div>

												</div>



											</div>



										</div>

					
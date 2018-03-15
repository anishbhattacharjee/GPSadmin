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
							Invoices
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					
					
					<?php
					$id=$_GET['id'];
					$inv=$_GET['inv'];
					
					$sq1=$con,"select

o.order_id,

o.customer_id,

c.customer_first_name,

c.customer_middle_name,

c.customer_last_name,

c.customer_phone_no,

c.customer_emailid,

c.address,

c.comp_name,

c.comp_addr,

c.comp_teleph,

c.comp_email,

c.website,

o.final_cost,

o.order_date

FROM

customer_orders o

INNER JOIN customers c ON o.customer_id = c.customer_id

WHERE o.customer_id=$id AND o.order_id=$inv";

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

												Customer Invoice

											</h3>



											<div class="widget-toolbar no-border invoice-info">

												<span class="invoice-info-label">Invoice:</span>

												<span class="red">#INV<?php echo str_pad($inv, 4, '0', STR_PAD_LEFT); ?></span>



												<br />

												<span class="invoice-info-label">Date:</span>

												<span class="blue"><?php echo date("d-m-Y",strtotime($order['order_date'])); ?></span>

											</div>



											<div class="widget-toolbar hidden-480">

												<a href="<?php echo base_url();?>invoices/invoice_print?id=<?php echo $id; ?>&inv=<?php echo $inv; ?>" target="_blank">

													<i class="icon-print"></i>

												</a>

											</div>

										</div>	
											<div class="widget-body">

											<div class="widget-main padding-24">

												<div class="row-fluid">

													<div class="row-fluid">
<?php
if($order['comp_email']!='')
{
?>

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

<?php } ?>

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

																	<th>No of Devices</th>

																	<th>Device Cost</th>

																	<th>Subscription Cost</th>

                                                                    <th>Subscription Months</th>

                                                                    <th>Installation Cost</th>

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

WHERE od.customer_id=$id AND od.order_id=$inv";

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

																	<td>

																		<?php echo $ord_det['noofdevice']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['device_cost']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['subcost']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['sub_month']; ?>

																	</td>

																	<td>

																		<?php echo $ord_det['installation_cost']; ?>

																	</td>

																	<td>

																		<?php echo $tot; ?>

																	</td>

                                                                    

																</tr>

															<?php }

															

															

															$s_tax=(($subs_cost+$inst_cost)*$s_tax_per)/100;

															$vat=($dev_cost_tot*$vat_per)/100;

															$total=$subtot+$s_tax+$vat;

															 ?>

                                                            	<tr>

                                                                <td colspan="8" style="text-align:right">Sub-Total</td>

                                                                <td><?php echo $subtot; ?></td>

                                                                </tr>

                                                            	<tr>

                                                                <td colspan="8" style="text-align:right">Service Tax ( <?php echo $s_tax_per; ?>% )</td>

                                                                <td><?php echo $s_tax; ?></td>

                                                                </tr>

                                                                <?php if($vat > 0){ ?>

                                                            	<tr>

                                                                <td colspan="8" style="text-align:right">VAT ( <?php echo $vat_per; ?>% )</td>

                                                                <td><?php echo $vat; ?></td>

                                                                </tr>

                                                                <?php } ?>

															</tbody>

														</table>

													</div>



													<div class="hr hr8 hr-double hr-dotted"></div>



													<div class="row-fluid">

														<div class="span5 pull-right">

															<h4 class="pull-right">

																Total amount : Rs.
<?php


$smq=mysqli_query($con,"select sum(final_cost) as total from customer_order_details where  customer_id=$id AND order_id=$inv");
while($rsmq=mysqli_fetch_array($smq))
{
	$total=$rsmq['total'];
}
					?>										<span class="red"><?php echo $total; ?></span>

															</h4>

														</div>

													</div>



													<div class="space-6"></div>



													<!--<div class="row-fluid">

														<div class="span12 well">

															Thank you for choosing Our Company products.

						We believe you will be satisfied by our services.

														</div>

													</div>-->

												</div>

											</div>

										</div>
													
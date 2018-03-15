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
					
								<div id="demo" style="background-color: #eff3f8;margin-top: 55px;">
					<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">

									<thead>

										<tr>

											

											<th>Sl.No.</th>

											<th>Customer ID</th>
											<th>Customer Name</th>
											<th>Order ID</th>
											<th>Invoice ID</th>
											<th>Invoice Date</th>

											<th class="hidden-480">Invoice Category</th>

											<th class="hidden-480">Invoice</th>

										</tr>

									</thead>



									<tbody>

                                    

                                    <?php

									$i=0;

									$sql=$con,"select o.customer_id,

o.order_id,o.order_date,
o.order_type
FROM
customer_orders o
inner join payment_master r on o.order_id=r.order_id join customers c on c.customer_id=o.customer_id where o.type_order='live' group by o.order_id
order by o.order_id desc";

$rs=mysqli_query($sql);

while($ordrs=mysqli_fetch_assoc($rs)){

	

									

									?>

										<tr>

											



											<td>

												<?php echo ++$i; ?>

											</td>
											<?php
											$qc=mysqli_query($con,"select * from customers where customer_id='".$ordrs['customer_id']."'");
while($res=mysqli_fetch_array($qc))
{
	$name=$res['customer_first_name'];
	$email=$res['customer_emailid'];
	$uid=$res['customer_uid'];
	$password=$res['password'];
}
		?>									
<td><?php echo $uid; ?></td>
<td><?php echo $name; ?></td>
<td>OD<?php echo $ordrs['order_id']; ?></td>
											<td>INV<?php echo $ordrs['order_id']; ?></td>

<td><?php echo date("d-m-Y",strtotime($ordrs['order_date'])); ?></td>

											<td>

												<?php if($ordrs['order_type']=='renew'){ echo "Subscription Renewal Invoice";} else {echo "Order Invoice";} ?>

											</td>



											<td >
<?php if($ordrs['order_id']!=979){ ?>
	

													<a class="green" href="<?php echo base_url();?>invoices/view?id=<?php echo $ordrs['customer_id']; ?>&inv=<?php echo $ordrs['order_id']; ?>" target="_blank">

														Invoice INV<?php echo str_pad($ordrs['order_id'], 4, '0', STR_PAD_LEFT); ?>

													</a>
<?php } ?>


											</td>

										</tr>

<?php } ?>

									</tbody>

								</table>
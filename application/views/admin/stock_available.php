<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<?php
function get_inv_date($sid){
	$sql=$con,"select
stock.inv_date
FROM
stock WHERE stockid=$sid";
	$r=mysqli_query($sql);
	$rw=mysqli_fetch_assoc($r);
	return date("d-m-Y",strtotime($rw['inv_date']));
}
?>
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
							Stock Available
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">

				
					<div id="demo" style="background-color: #eff3f8; margin-top:52px;">
					<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Category</th>
											<th>Item Code</th>
 											<th>IMEI</th>
											<th>S/N</th>
											<th>Quantity</th>
                                            <th>UOM</th>
                                            <th>Rate/Unit</th>
                                            <th>Amount</th>
                                            <th>Conditions</th>
                                            <th>Remarks</th>
                                            <th>Received Date</th>
                                           
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$q=mysqli_query($con,"select
gps_model_details.model_id,
gps_model_details.slnumber,
gps_model_details.imie_number,
gps_model_details.recv_dt,
gps_model_details.conditions,
gps_model_details.remarks,
gps_model_details.cost,
gps_categories.category_type,
gps_devices.device_type
FROM
gps_model_details
left JOIN gps_categories ON gps_model_details.category_type = gps_categories.category_id
left JOIN gps_devices ON gps_devices.device_id = gps_model_details.device_id where status='completed' ");
									while($res=mysqli_fetch_array($q))
									{
								
									?>
									
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $res['model_id'];?></td>
										<td><?php echo $res['device_type'];?></td>
										<td><?php echo $res['imie_number'];?></td>
                                        <td><?php echo $res['slnumber'];?></td>
                                        <td><?php echo 1;?></td>
                                        <td><?php echo "pieces";?></td>
                                        <td><?php echo $res['cost'];?></td>
                                        <td><?php echo $res['cost'];?></td>
                                        <td><?php echo $res['conditions'];?></td>
                                        <td><?php echo $res['remarks'];?></td>
										<td><?php echo date("d-m-Y",strtotime($res['recv_dt']));?></td>
									</tr>
									<?php
									$slno++;
									}
								
									
                                    $q2=mysqli_query($con,"select   stock_id,`desc`, `uom`, `qty`, `rate`, `amt`,
gps_categories.category_type,
gps_devices.device_type
FROM
stock_accessories
left JOIN gps_categories ON stock_accessories.category_id = gps_categories.category_id
left JOIN gps_devices ON gps_devices.device_id = stock_accessories.item ");
									while($res2=mysqli_fetch_array($q2))
									{
										
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $res2['category_type'];?></td>
										<td><?php echo $res2['device_type'];?></td>
										<td></td>
                                        <td></td>
                                        <td><?php echo $res2['qty'];?></td>
                                        <td><?php echo "pieces";?></td>
                                        <td><?php echo $res2['rate'];?></td>
                                        <td><?php echo $res2['amt'];?></td>
                                        <td><?php echo "good";?></td>
                                        <td><?php echo $res2['desc'];?></td>
										<td><?php echo get_inv_date($res2['stock_id']);?></td>
									</tr>
									<?php
									$slno++;
									}
								
									$q3=mysqli_query($con,"select   stock_id,`desc`, `uom`, `qty`, `rate`, `amt`,
gps_categories.category_type,
gps_devices.device_type
FROM
stock_details
left JOIN gps_categories ON stock_details.category_id = gps_categories.category_id
left JOIN gps_devices ON gps_devices.device_id = stock_details.item where stock_details.type='generic' ");
									while($res3=mysqli_fetch_array($q3))
									{
								
									?>
									<tr>
										<td><?php echo $slno;?></td>
										<td><?php echo $res3['category_type'];?></td>
										<td><?php echo $res3['device_type'];?></td>
										<td></td>
                                        <td></td>
                                        <td><?php echo $res3['qty'];?></td>
                                        <td><?php echo "pieces";?></td>
                                        <td><?php echo $res3['rate'];?></td>
                                        <td><?php echo $res3['amt'];?></td>
                                        <td><?php echo "good";?></td>
                                        <td><?php echo $res3['desc'];?></td>
										<td><?php echo get_inv_date($res3['stock_id']);?></td>
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

			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
</body></html>
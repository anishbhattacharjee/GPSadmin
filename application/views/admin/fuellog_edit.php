<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<?php //print_r($_POST); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>	
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-editable.css" />
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/x-editable/bootstrap-editable.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/x-editable/ace-editable.min.js"></script>	
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
<script type="text/javascript">
$(function() {
		$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				var oTable1 = $('#fueldata').dataTable( {} );
				$("#reading_data").editable({       
					   selector: '.editable',
			           url: '<?php echo base_url(); ?>fuellog_edit/edit_data',
			           send: 'always',
			           mode:'inline',
					   params: function(params) {
							// add additional params from data-attributes of trigger element
							params.idval = $(this).editable().data('id');
							params.cat = $(this).editable().data('cat');
							
							return params;
						},
						success: function(response, newValue) {//console.log("tst");
							//if(!response.success) return response.msg;
							//else{console.log("tst1");
								//reloadStatusS();
							//}
							//window.location.reload();
							//var im=$(this).editable().data('imei');
							//$("#time_"+im).html(response);
						}
							
			    });
				
		
});
</script>
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
							Fuel Log Edit
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
                    
					<div id="demo" >
					<form method="post" action="#">
                    								<div class="control-group">
														<div class="row-fluid input-append">
															<input class="span3 date-picker" id="id-date-picker-1" type="text" data-date-format="dd-mm-yyyy" name="date" value="<?php if(isset($_POST['date'])){ echo $dt=date("d-m-Y",strtotime($_POST['date'])); } ?>">
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
													</div>
													
													<button type="submit" class="btn">Get Data</button></form>
													
													<?php if(isset($_POST['date'])){?>
													<table class="table table-striped table-bordered dataTable" id="fueldata">
														<thead>
															<tr>
																<td>IMEI</td>
																<td>Distance</td>
																<td>Fuel Start</td>
																<td>Fuel End</td>
																<td>Consumption</td>
																<td>Refill</td>
																<td>Fuel Theft</td>
																<td>Theft Details</td>
																<td>Mileage</td>
																<td>Stop Time</td>
																<td>Idle Time</td>
																<td>Actual Refill</td>
																<td>Refill Amount</td>
																<td>Actual Amount</td>
																<td>Refuel Location</td>
																<td>Petrol Pump</td>
																<td>Lat</td>
																<td>Lng</td>
															</tr>
														</thead>
														<tbody id="reading_data">
														
													<?php
														
														$dt=date("Y-m-d",strtotime($_POST['date']));
														$qq=mysqli_query($con,"select * from fuel_log where day='$dt'");
														if($qq && mysqli_num_rows($qq)>0){
															while($rw=mysqli_fetch_assoc($qq)){
																$idval=$rw['id'];
															
													?>
															<tr>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="imei"><?php echo $rw['imei']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="distance"><?php echo $rw['distance']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="fuel_start"><?php echo $rw['fuel_start']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="fuel_end"><?php echo $rw['fuel_end']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="consumption"><?php echo $rw['consumption']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="refill"><?php echo $rw['refill']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="fuel_theft"><?php echo $rw['fuel_theft']; ?></td>
																
																
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="theft_details"><?php echo $rw['theft_details']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="milege"><?php echo $rw['milege']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="stop_time"><?php echo $rw['stop_time']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="idle_time"><?php echo $rw['idle_time']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="actual_refill"><?php echo $rw['actual_refill']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="refill_amount"><?php echo $rw['refill_amount']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="actual_amount"><?php echo $rw['actual_amount']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="refuel_location"><?php echo $rw['refuel_location']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="petrol_pump"><?php echo $rw['petrol_pump']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="lat"><?php echo $rw['lat']; ?></td>
																<td class="editable" data-id="<?php echo $idval; ?>" data-cat="lng"><?php echo $rw['lng']; ?></td>
																
															</tr>
													<?php			
															}
															
														}?>
															
														</tbody>
													</table>	
													<?php
														
													} ?>
                   
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

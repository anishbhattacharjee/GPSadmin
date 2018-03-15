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
							Change Data
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
										
											<th>Device</th>
											<th>Imie No</th>
										<!--	<th>SIM</th>-->
											<th>Fuel Sensor Status</th>
											<th>Milege</th>
										<!--	<th>Action</th>-->
											<th>Action</th>
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$iid=array();
									$q=mysqli_query($con,"select * from installation i join customers cs on cs.customer_id=i.customer_id where installation_status='completed'  order by i.order_id desc");
									while($res=mysqli_fetch_array($q))
									{
									$custid=$res['customer_id'];
									$engid=$res['engineer_id'];
									$devid=$res['model_id'];
									$intid=$res['instatllation_id'];
									$dev_name=$res['device_name'];
									$order_id=$res['order_id'];
									$uid=$res['customer_uid'];
										$cfrist=$res['customer_first_name'];
									array_push($iid,$intid);
									?>
									<tr>
										<td><?php echo $slno;?></td>
										
									
											<td><?php echo $uid;?></td>
										<?php	if($cfrist!='')
										{ ?>
										<td><?php echo $res['customer_first_name'];?></td>
										<?php }
										else
										{
											?>
										<td><?php echo $res['comp_name']."(Company Name)";?></td>	
											<?php
										}?>
							
									<td><?php echo "OD".$order_id;?></td>
									
								<td><?php echo $dev_name;?></td>
								<td><?php echo $res['imie_no'];?></td>
				
								<td><span class="label label-warning"><?php echo $res['fuel_sensor'];?></span></td>
									
													<td><?php echo $res['milege'];?></td>
								<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#changestatus<?php echo  $res['instatllation_id']; ?>" role="button" class="btn btn-small btn-info" data-toggle="modal">Changestatus</a></div></td>	
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
	<form class="form-horizontal" action="<?php echo base_url();?>change_data/changed" method="POST">
							<input type="hidden" name="instatllation_id" id="instatllation_id"  value="<?php echo $iidd;?>"/>
								<?php 
	$q=mysqli_query($con,"select * from installation where instatllation_id='$iidd'");
									while($res=mysqli_fetch_array($q)){
	$custid=$res['customer_id'];							
	$oid=$res['order_id'];							
	}
	?>
							<input type="hidden" name="customer_id" id="customer_id"  value="<?php echo $custid;?>"/>
							<input type="hidden" name="order_id" id="order_id"  value="<?php echo $oid;?>"/>
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
									<div class="control-group">
									<label class="control-label" for="form-field-1">Fuel Status</label>

									<div class="controls">
									<select name="status<?php echo $iidd;?>" id="statuss<?php echo $iidd;?>">
									<option>Select Status</option>
									<option value="no">no</option>	
									<option value="yes">yes</option>	
									
										</select>
									</div>
								</div>	
									
								<div class="control-group">
									<label class="control-label" for="form-field-1">Milege</label>

						<div class="controls">
					<input id="milege<?php echo $iidd;?>" type="text" name="milege<?php echo $iidd;?>" onchange="valinstdate(this);"/>
						</div>
					</div>
				
											
									</div>
								</div>

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
				</div>
						</div>
						</div>
						</div>
</div>



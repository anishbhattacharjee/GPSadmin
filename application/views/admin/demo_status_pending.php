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

							Pending demo Installation 

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

											<th>Customer</th>

											<th>Order ID</th>

											<th>Engineer</th>

											<th>Device</th>

											<th>Imie No</th>

										<!--	<th>SIM</th>-->

											<th>Installation Status</th>

											<th>Allocated Date Time</th>

										<!--	<th>Action</th>-->

											<th>Action</th>

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

									$q=mysqli_query($con,"select * from installation i join customers cs on cs.customer_id=i.customer_id join customer_orders co on co.order_id=i.order_id where co.type_order='demo' and installation_status='pending' and assign_engineer='assigned'  order by i.order_id desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];

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

										while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } ?>

							<!--	<?php $ss3=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");

										while($rsq3=mysqli_fetch_array($ss3))

										{

										?>

										<td><?php echo $rsq3['model_name'];?></td>

								<?php } ?>-->

								<td><?php echo $dev_name;?></td>

								<td><?php echo $res['imie_no'];?></td>

							<!--	<td><?php echo $res['sim_no'];?></td>-->

								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

									<!--<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>

														

													</a></div></td>-->

													<td><?php echo date("d-m-Y h:i:s",strtotime($res['allocated_date_time']));?></td>

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

	<form class="form-horizontal" action="<?php echo base_url();?>demo_request/status_change" method="POST">

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

									<label class="control-label" for="form-field-1">Status</label>



									<div class="controls">

									<select name="status" id="statuss<?php echo $iidd;?>">

									<option>Select Status</option>

									<option value="pending">Pending</option>	

									<option value="completed">Completed</option>	

									

										</select>

									</div>

								</div>	

									<input id="curdate" type="hidden" name="curdate" value="<?php echo date("d-m-Y");?>"/>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Installed Date</label>



									<div class="controls">

										<div class="row-fluid input-append">

															<input class="span5 date-picker" id="installed_date<?php echo $iidd;?>" type="text" data-date-format="dd-mm-yyyy" name="installed_date" onchange="valinstdate(this);"/>

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Remarks</label>



									<div class="controls">

						<textarea name="remarks"  id="remarks"></textarea>

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



									<button class="btn btn-small btn-primary" type="submit" onclick="return valform(<?php echo $iidd;?>);">

									

										<i class="icon-ok"></i>

										Submit

									</button>

								</div>

								</form>

							</div>

							<script>

function valinstdate(str)

{



	curdate=document.getElementById('curdate').value;



 if(str.value>curdate)

 {

 	alert("Exceeding Todays Date");

	str.value='';

	

	return false;

 }

 

 

}

function valform(strs)

{



statuss=document.getElementById('statuss'+strs).value;

if(statuss=='Select Status')

{

	alert("Please Choose Status");

	document.getElementById('statuss'+strs).focus();

	return false;

}

if(statuss=='completed')

{



curdate=document.getElementById('curdate').value;

	installed_date=document.getElementById('installed_date'+strs).value;

	if(installed_date=='')

	{

		alert("Installed Date Required");

		document.getElementById('installed_date'+strs).focus();

	return false;

	}

	if(installed_date>curdate)

 {

 	alert("Exceeding Todays Date");



	document.getElementById('installed_date'+strs).value='';

	document.getElementById('installed_date'+strs).focus();

	return false;

 }

 }

}

</script>



<?php } 

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

											<th>Device</th>

											<th>Imie No</th>

										<!--	<th>SIM</th>-->

											<th>Installation Status</th>

											<th>Allocated Date Time</th>

										

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

									$q=mysqli_query($con,"select *  from installation i join customers cs on cs.customer_id=i.customer_id left join customer_orders c on c.order_id=i.order_id where c.type_order='demo' and i.installation_status='pending' and c.created_by='$mid'  and assign_engineer='assigned' and cs.account_type='demo'  order by i.order_id desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];

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

										while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } ?>

							<!--	<?php $ss3=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");

										while($rsq3=mysqli_fetch_array($ss3))

										{

										?>

										<td><?php echo $rsq3['model_name'];?></td>

								<?php } ?>-->

								<td><?php echo $dev_name;?></td>

								<td><?php echo $res['imie_no'];?></td>

							<!--	<td><?php echo $res['sim_no'];?></td>-->

								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

									<!--<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>

														

													</a></div></td>-->

													<td><?php echo date("d-m-Y h:i:s",strtotime($res['allocated_date_time']));?></td>

								

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

else if($type=='operations'||$type=='COO'||$type=='CFO')

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

											<th>Device</th>

											<th>Imie No</th>

										<!--	<th>SIM</th>-->

											<th>Installation Status</th>

											<th>Allocated Date Time</th>

										<!--	<th>Action</th>-->

										

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

									$q=mysqli_query($con,"select * from installation i join customers cs on cs.customer_id=i.customer_id join customer_orders co on co.customer_id=i.customer_id where co.type_order='demo' and  installation_status='pending' and assign_engineer='assigned' and cs.account_type='demo'  order by order_id desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];

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

										while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } ?>

							<!--	<?php $ss3=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");

										while($rsq3=mysqli_fetch_array($ss3))

										{

										?>

										<td><?php echo $rsq3['model_name'];?></td>

								<?php } ?>-->

								<td><?php echo $dev_name;?></td>

								<td><?php echo $res['imie_no'];?></td>

							<!--	<td><?php echo $res['sim_no'];?></td>-->

								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

									<!--<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>

														

													</a></div></td>-->

													<td><?php echo date("d-m-Y h:i:s",strtotime($res['allocated_date_time']));?></td>

							

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

											<th>Customer</th>

											<th>Order ID</th>

											<th>Engineer</th>

											<th>Device</th>

											<th>Imie No</th>

										<!--	<th>SIM</th>-->

											<th>Installation Status</th>

											<th>Allocated Date Time</th>

										<!--	<th>Action</th>-->

											<th>Action</th>

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$iid=array();

									$q=mysqli_query($con,"select *  from installation i left join customer_orders c on c.order_id=i.order_id join customers cs on cs.customer_id=i.customer_id where  c.type_order='demo' and i.installation_status='pending' and c.created_by='$mid'  and assign_engineer='assigned' and cs.account_type='demo' order by i.order_id desc");

									while($res=mysqli_fetch_array($q))

									{

									$custid=$res['customer_id'];

									$engid=$res['engineer_id'];

									$devid=$res['model_id'];

									$intid=$res['instatllation_id'];

									$dev_name=$res['device_name'];

									$order_id=$res['order_id'];

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

										while($rsqq=mysqli_fetch_array($sas))

										{

										?>

										<td><?php echo $rsqq['engineers_fname'];?></td>

								<?php } ?>

							<!--	<?php $ss3=mysqli_query($con,"select * from gps_model_details where model_id='$devid'");

										while($rsq3=mysqli_fetch_array($ss3))

										{

										?>

										<td><?php echo $rsq3['model_name'];?></td>

								<?php } ?>-->

								<td><?php echo $dev_name;?></td>

								<td><?php echo $res['imie_no'];?></td>

							<!--	<td><?php echo $res['sim_no'];?></td>-->

								<td><span class="label label-warning"><?php echo $res['installation_status'];?></span></td>

									<!--<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#editcollege<?php echo  $res['instatllation_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>

														

													</a></div></td>-->

													<td><?php echo date("d-m-Y h:i:s",strtotime($res['allocated_date_time']));?></td>

								<td><div class="hidden-phone visible-desktop action-buttons">

													<a href="#changestatuss<?php echo  $res['instatllation_id']; ?>" role="button" class="btn btn-small btn-info" data-toggle="modal">Changestatus</a></div></td>	

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

?>									<div id="changestatuss<?php echo  $iidd; ?>" class="modal hide" tabindex="-1">

								<div class="modal-header" style="background: #045e9f;">

									<button type="button" class="close" data-dismiss="modal">&times;</button>

									<h4 class="white bigger">Please Change Status</h4>

								</div>

	<form class="form-horizontal" action="<?php echo base_url();?>demo_request/status_change" method="POST">

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

									<label class="control-label" for="form-field-1">Status</label>



									<div class="controls">

									<select name="status" id="statuss<?php echo $iidd;?>">

									<option>Select Status</option>

									<option value="pending">Pending</option>	

									<option value="completed">Completed</option>	

									

										</select>

									</div>

								</div>	

									<input id="curdate" type="hidden" name="curdate" value="<?php echo date("d-m-Y");?>"/>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Installed Date</label>



									<div class="controls">

										<div class="row-fluid input-append">

															<input class="span5 date-picker" id="installed_date<?php echo $iidd;?>" type="text" data-date-format="dd-mm-yyyy" name="installed_date" onchange="valinstdate(this);"/>

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

									</div>

								</div>

								<div class="control-group">

									<label class="control-label" for="form-field-1">Remarks</label>



									<div class="controls">

						<textarea name="remarks"  id="remarks"></textarea>

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



									<button class="btn btn-small btn-primary" type="submit" onclick="return valform(<?php echo $iidd;?>);">

									

										<i class="icon-ok"></i>

										Submit

									</button>

								</div>

								</form>

							</div>

							<script>

function valinstdate(str)

{



	curdate=document.getElementById('curdate').value;



 if(str.value>curdate)

 {

 	alert("Exceeding Todays Date");

	str.value='';

	

	return false;

 }

 

 

}

function valform(strs)

{



statuss=document.getElementById('statuss'+strs).value;

if(statuss=='Select Status')

{

	alert("Please Choose Status");

	document.getElementById('statuss'+strs).focus();

	return false;

}

if(statuss=='completed')

{



curdate=document.getElementById('curdate').value;

	installed_date=document.getElementById('installed_date'+strs).value;

	if(installed_date=='')

	{

		alert("Installed Date Required");

		document.getElementById('installed_date'+strs).focus();

	return false;

	}

	if(installed_date>curdate)

 {

 	alert("Exceeding Todays Date");



	document.getElementById('installed_date'+strs).value='';

	document.getElementById('installed_date'+strs).focus();

	return false;

 }

 }

}

</script>



<?php } 

			

		}

		?>				</div>

						</div>

						</div>

						</div>

</div>






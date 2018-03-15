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

							Extend Demo Request



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

?>	



					<div id="demo" style="background-color: #eff3f8;">



					<table cellpadding="0" cellspacing="3" border="0" class="table table-bordered dataTable" id="example">



									<thead>



										<tr>



											<th class="center">



												<label>



													



													<span class="lbl">Sl No</span>



												</label>



											</th>



											<th>Customer ID</th>

											<th>Customer Name</th>

											<th>Request ID</th>

											<th>Start Date</th>

											<th>End Date</th>

											<th>Created By</th>

											<th>Action</th>



											



										</tr>



									</thead>







									<tbody>



									<?php 



									$slno=1;



									$cid=array();



													



						$qo=mysqli_query($con,"select *,co.created_by as oct FROM `customer_orders` co join customers c on c.customer_id=co.customer_id join customer_order_details cd on cd.order_id=co.order_id join installation i on i.order_id=co.order_id where co.type_order='demo' and c.used_for!='internal' group by co.customer_id  order by co.order_date desc");



						while($srs=mysqli_fetch_array($qo))



						{



							$custmainid=$srs['customer_id'];



							$order_id=$srs['order_id'];

							$corderid=$srs['id'];

array_push($cid,$corderid);

$oct=$srs['oct'];

					if($srs['end_date']<=date('Y-m-d'))
					{
						?>
							<tr style="background-color: #F54444;color: white;">
						<?php
					}
					else
					{
						?>
						<tr>
						<?php
					}
						?>



								



										<td><?php echo $slno;?></td>



								<td><?php echo $srs['customer_uid'];?></td>



										<td><?php echo $srs['customer_first_name'];?></td>



										<td><?php echo "OD_".$order_id;?></td>



						<td><?php echo date("d-m-Y",strtotime($srs['start_date']));?></td>
				
						<td><?php echo date("d-m-Y",strtotime($srs['end_date']));?></td>

									

										<?php

									$sqe=mysqli_query($con,"select * from admin_data where id='$oct'");

									while($sqse=mysqli_fetch_array($sqe))

									{

										?>

										<td><?php echo $sqse['name'];?></td>

										<?php } ?>

					

	<td><div class="hidden-phone visible-desktop action-buttons">

													<a  href="#modal-change<?php echo  $srs['id'];?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed" data-id="<?php echo $srs['id'];?>" id="margin<?php echo  $srs['id'];?>">Edit</span>

														

													</a></div></td>



									</tr>



									<?php



									$slno++;



									}



								



									?>



									



									</tbody>



								</table>



                                



     </div>                           







<?php

foreach($cid as $cidd)

{

	?>

		<div id="modal-change<?php echo $cidd;?>" class="modal hide" tabindex="-1">

								<div class="modal-header" style="background: #045e9f;">

									<button type="button" class="close" data-dismiss="modal">&times;</button>

									<h4 class="white bigger">Extend Demo Request</h4>

								</div>

								

								<?php 

								$adcq=mysqli_query($con,"select * from customer_order_details where id='$cidd'");

								$radqc=mysqli_fetch_array($adcq);

								$start_date=date("d-m-Y",strtotime($radqc['start_date']));

								$end_date=date("d-m-Y",strtotime($radqc['end_date']));

								$order_id=$radqc['order_id'];

								$customer_id=$radqc['customer_id'];

								

								$adq=mysqli_query($con,"select * from customer_orders where order_id='$order_id'");

								$radq=mysqli_fetch_array($adq);

								$ctby=$radq['created_by'];

							//	$order_id=$radq['order_id'];

								//$customer_id=$radq['customer_id'];

								

								$cq=mysqli_query($con,"select customer_first_name from customers where customer_id='$customer_id'");

								$rcq=mysqli_fetch_array($cq);

								$cname=$rcq['customer_first_name'];

								

								

								

								?>

	<form class="form-horizontal" action="<?php echo base_url();?>extend_demorequest/extend" method="POST" enctype="multipart/form-data">

							

							<input type="hidden" name="corderid" id="corderid" value="<?php echo $cidd;?>"/>

							<input type="hidden" name="order_idd" id="order_idd" value="<?php echo $order_id;?>"/>

							<input type="hidden" name="cid" id="cid" value="<?php echo $customer_id;?>"/>

							

								<div class="modal-body overflow-visible">

									<div class="row-fluid">

									

									<div class="control-group">

									<label class="control-label" for="form-field-1">Customer</label>

									<div class="controls">

									<input type="text" name="cname" id="cname" value="<?php echo $cname;?>"/>

									</div>

									</div>

									

										<div class="control-group">

									<label class="control-label" for="form-field-1">Request ID</label>

									<div class="controls">

									<input type="text" name="order_id" id="order_id" value="OD_<?php echo $order_id;?>"/>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Start Date</label>

									<div class="controls">

									

									<div class="row-fluid input-append">

															<input class="span5 date-picker"  type="text" data-date-format="dd-mm-yyyy" name="start_date" id="start_date" value="<?php echo $start_date;?>"/>

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

								

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">End Date</label>

									<div class="controls">

									<div class="row-fluid input-append">

															<input class="span5 date-picker"  type="text" data-date-format="dd-mm-yyyy" name="end_date" id="end_date" value="<?php echo $end_date;?>"/>

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

									

								

									</div>

									</div>

								

									<div class="control-group">

									<label class="control-label" for="form-field-1">Created By</label>

									<div class="controls">

									

									<?php

									$sq=mysqli_query($con,"select * from admin_data where id='$ctby'");

									while($sqs=mysqli_fetch_array($sq))

									{

										?>

									<input type="text" name="created_by" id="created_by" value="<?php echo $sqs['name']; ?>"/>	

										<?php

									}

									?>

									

									

									</div>

									</div>

							

								

							

									</div>

								</div>



								<div class="modal-footer">

									<button class="btn btn-small" data-dismiss="modal">

										<i class="icon-remove"></i>

										Cancel

									</button>



									<button class="btn btn-small btn-primary" type="submit">

										<i class="icon-ok"></i>

										Extend

									</button>

								</div>

								</form>

							</div>

	<?php

}



?>



						



					







</div>



</div>



</div>



</div>
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







//table 2



 var oTable2 = $('#example2').dataTable( {



	



	



        "oLanguage": {



            "sSearch": "Search all columns:"



        }



		



    } );



	$("tfoot input").keyup( function () {



        /* Filter on the column (the index) of this element */



        oTable2.fnFilter( this.value, $("tfoot input").index(this) );



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



	var oTableTools2 = new TableTools( oTable2, {



		"buttons": [



			"copy",



			"csv",



			"xls",



			"pdf",



			{ "type": "print", "buttonText": "Print me!" }



		]



	} );



	



	/*	$("[id^='subm']").click(function(e) {



		var id=$(this).data("id");



		//alert(id);



		//document.getElementById("StotSForm"+id).submit();



		//window.location.reload();



		//var postData=$("#StotSForm"+id).serializeArray();



      //  var formURL = "https://test.direcpay.com/direcpay/secure/dpPullMerchAtrnDtls.jsp";



		//var params="requestparams="+$("requestparams"+id).val();



		//makeCorsRequest(formURL,params);



 		$.ajax({







							url : formURL,



							type: "POST",



							data : postData,



							xhrFields: {



							  withCredentials: true



						    },



							success:function(response, textStatus, jqXHR){alert("test");



							}



				});



	







			



    });*/	



	



} );







function loadNew(){







//setTimeout(window.location.reload(),10000);











}



/**/</script>



	



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



							Change Order Created By



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



											<th>Ordered Date Time</th>

											<th>Created By </th>

											<th>Action </th>



											



										</tr>



									</thead>







									<tbody>



									<?php 



									$slno=1;



									$cid=array();



													



						$qo=mysqli_query($con,"select *,co.created_by as oct FROM `customer_orders` co join customers c on c.customer_id=co.customer_id order by co.order_date desc");



						while($srs=mysqli_fetch_array($qo))



						{



							$custmainid=$srs['customer_id'];



							$order_id=$srs['order_id'];

array_push($cid,$order_id);

$oct=$srs['oct'];

						?>



									<tr>



										<td><?php echo $slno;?></td>



								<td><?php echo $srs['customer_uid'];?></td>



										<td><?php echo $srs['customer_first_name'];?></td>



										<td><?php echo "OD".$order_id;?></td>



						



										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['order_date']));?></td>

										

										<?php
			if($oct=='front')
			{
				?>
					<td><?php echo $oct;?></td>
				<?php
			}
			else
			{
									$sqe=mysqli_query($con,"select * from admin_data where id='$oct'");

									while($sqse=mysqli_fetch_array($sqe))

									{

										?>

										<td><?php echo $sqse['name'];?></td>

										<?php }
									   
			} ?>

					

	<td><div class="hidden-phone visible-desktop action-buttons">

													<a  href="#modal-change<?php echo  $srs['order_id'];?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed" data-id="<?php echo $srs['order_id'];?>" id="margin<?php echo  $srs['order_id'];?>">Edit</span>

														

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

									<h4 class="white bigger">Change the Order Created By</h4>

								</div>

								

								<?php 

								$adq=mysqli_query($con,"select * from customer_orders where order_id='$cidd'");

								$radq=mysqli_fetch_array($adq);

								$ctby=$radq['created_by'];

								$order_id=$radq['order_id'];

								$customer_id=$radq['customer_id'];

								

								$cq=mysqli_query($con,"select customer_first_name from customers where customer_id='$customer_id'");

								$rcq=mysqli_fetch_array($cq);

								$cname=$rcq['customer_first_name'];

								?>

	<form class="form-horizontal" action="<?php echo base_url();?>change_order_creation/change" method="POST" enctype="multipart/form-data">

							

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

									<label class="control-label" for="form-field-1">Order ID</label>

									<div class="controls">

									<input type="text" name="order_id" id="order_id" value="OD_<?php echo $order_id;?>"/>

									</div>

									</div>

								

									<div class="control-group">

									<label class="control-label" for="form-field-1">Created By</label>

									<div class="controls">

									<select name="created_by" id="created_by">

									<option>Select Cateory</option>

									<?php

									$sq=mysqli_query($con,"select * from admin_data");

									while($sqs=mysqli_fetch_array($sq))

									{

										?>

									<option value="<?php echo $sqs['id'];?>" <?php if($ctby==$sqs['id']) echo $con,"selected";?>><?php echo $sqs['name'];?></option>	

										<?php

									}

									?>

									

									</select>

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

										Submit

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
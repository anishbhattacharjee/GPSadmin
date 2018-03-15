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

		

		// Create the XHR object.

/*function createCORSRequest(method, url) {

  var xhr = new XMLHttpRequest();

  if ("withCredentials" in xhr) {

    // XHR for Chrome/Firefox/Opera/Safari.

    xhr.open(method, url, true);

  } else if (typeof XDomainRequest != "undefined") {

    // XDomainRequest for IE.

    xhr = new XDomainRequest();

    xhr.open(method, url);

  } else {

    // CORS not supported.

    xhr = null;

  }

  alert(xhr);

  return xhr;

}

function makeCorsRequest(url,params) {

  // All HTML5 Rocks properties support CORS.

  //var url = 'http://updates.html5rocks.com';



  var xhr = createCORSRequest('POST', url);

  if (!xhr) {

    console.log('CORS not supported');

    return;

  }



  // Response handlers.

  xhr.onload = function() {

    var text = xhr.responseText;

  //  var title = getTitle(text);

    console.log('Response from CORS request to ' + url );

  };



  xhr.onerror = function() {

    console.log('Woops, there was an error making the request.');

  };



  xhr.send(params);

}



*/

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

							Demo Request Approval List

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

$un=$this->session->userdata('username'); //echo $un;

$q=mysqli_query($con,"select * from admin_data where email_id='$un'");

$user=mysqli_fetch_array($q);

$mid=$user['id'];

$type=$user['user_type'];

if($type=='admin' || $type=='approver' || $type=='inventory')

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

											<th>Customer Name</th>

											<th>Order ID</th>

											

											<th>Ordered Date Time</th>

											<th>Status</th>

											<th>Remark</th>

											<th>Assign </th>

											

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$cid=array();

													

						$qo=mysqli_query($con,"select * FROM `customer_orders` co join customers c on c.customer_id=co.customer_id where order_from='backend' and approve_status='pending' and co.remarks='Waiting for Approval' and co.type_order='demo' order by co.appr_rej_date desc");

						while($srs=mysqli_fetch_array($qo))

						{

							$custmainid=$srs['customer_id'];

							$order_id=$srs['order_id'];

						?>

									<tr>

										<td><?php echo $slno;?></td>

								<td><?php echo $srs['customer_uid'];?></td>

										<td><?php echo $srs['customer_first_name'];?></td>

										<td><?php echo "OD".$order_id;?></td>

						

										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['order_date']));?></td>

										<td><span class="label label-warning"><?php echo $srs['approve_status'];?></span></td>

											<td><?php echo $srs['remarks'];?></td>

										<td><a href="<?php echo base_url();?>demo_request/view_demo_order/<?php echo $custmainid;?>/<?php echo $order_id;?>" class="btn btn-small btn-primary no-border">Approve </a></td>	

							

								

									</tr>

									<?php

									$slno++;

									}

								

									?>

									

									</tbody>

								</table>

                                

     </div>                           



<?php }

else if($type=='COO' ||$type='CFO')

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

											<th>Customer Name</th>

											<th>Order ID</th>

											<th>Total Amount</th>

											<th>Payment Type</th>

											<th>Paid Amount</th>

											<th>Ordered Date Time</th>

											<th>Status</th>

											<th>Remark</th>

										

											

										</tr>

									</thead>



									<tbody>

									<?php 

									$slno=1;

									$cid=array();

													

						$qo=mysqli_query($con,"select * FROM `customer_orders` co join customers c on c.customer_id=co.customer_id join payment_list p on p.order_id=co.order_id where order_from='backend' and approve_status='pending' and co.remarks='Waiting for Approval' and co.type_order='demo' order by co.appr_rej_date desc");

						while($srs=mysqli_fetch_array($qo))

						{

							$custmainid=$srs['customer_id'];

							$order_id=$srs['order_id'];

						?>

									<tr>

										<td><?php echo $slno;?></td>

								<td><?php echo $srs['customer_uid'];?></td>

										<td><?php echo $srs['customer_first_name'];?></td>

										<td><?php echo "OD".$order_id;?></td>

										<td><?php echo $srs['total_amount'];?></td>

										<td><?php echo $srs['payment_type'];?></td>

										<td><?php echo $srs['paid_amount'];?></td>

										<td><?php echo date("d-m-Y h:i:s",strtotime($srs['order_date']));?></td>

										<td><span class="label label-warning"><?php echo $srs['approve_status'];?></span></td>

											<td><?php echo $srs['remarks'];?></td>

										

							

								

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

 ?>

						

					



</div>

</div>

</div>

</div>
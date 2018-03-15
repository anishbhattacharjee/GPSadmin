<?php include 'include/adminassets.php';?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />


<?php include 'include/adminheader.php';?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		

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

							Alerts - Report
							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

							<div id="demo">

								

                                    

										<div class="widget-box transparent">

										
											<div class="widget-body">

												<div class="widget-main no-padding">

                                                

                                                <form id="v_d_d_r" method="post">

                                                <fieldset>

                                                <div class="row-fluid">

                                                <div class="span4">

													<div class="row-fluid">

														<label for="id-date-picker-1">From</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker"  id="id-date-picker-1" type="text"  name="frmdate" data-date-format="dd-mm-yyyy" />

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->

                                                    
  												<div class="span4">

													<div class="row-fluid">

														<label for="id-date-picker-2">To</label>

													</div>



													<div class="control-group">

														<div class="row-fluid input-append">

															<input class="span10 date-picker" id="id-date-picker-2" type="text" name="todate" data-date-format="dd-mm-yyyy" />

															<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

													</div>

                                                    </div>	<!--span6-->
                                              
											  
											      <div class="span4">

													<div class="row-fluid">

														<label for="vid">Customer</label>

													</div>



													<div class="controls">														

                                                            <select name="cid" id="cid"  class="chzn-select">

															
                                                             <?php 

														$sql=$con,"select * FROM customers";
															$rs=mysqli_query($sql);
															while($dev=mysqli_fetch_assoc($rs)){

															?>

                        <option value="<?php echo $dev['customer_id']; ?>" /><?php echo $dev['customer_id']." - ".$dev['customer_first_name']." (".$dev['customer_emailid'].")"; ?></option>

                        <?php } ?>

															<?php //} ?>

														</select>														

													</div>

                                                    </div>	<!--span12-->

                                                    </div><!-----first row(frm)-->

                                                    


													
													</fieldset>
                                                    
                                                    

													<div class="form-actions center">

														<button  class="btn btn-small btn-primary" onClick="v_d_d_r_submit();return false">

															Generate Report

															<i class="icon-arrow-right icon-on-right bigger-110"></i>

														</button> 

                                                        <i class="icon-spinner icon-spin orange bigger-125" id="load_spin" style="display:none;"></i>                                                       

													</div>

                                                    				

													</form>	



												</div>

											</div>

										</div>

								




								</div><!--/#demo-->

								

								



					</div>

					</div>
<div id="result" ></div>
					</div><!--/.page-content-->

					

			

			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>
		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>media/js/ZeroClipboard.js"></script>
		<script src="<?php echo base_url(); ?>media/js/TableTools.js"></script>
        


	<script>



	$(function(){

		$("#load_spin").hide();

		$('.date-picker').datepicker({}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});

				
						 

				var d=new Date();
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;				

 				$("#id-date-picker-1").val(cur);
				$("#id-date-picker-2").val(cur);
				$(".chzn-select").chosen(); 


				




} );

function v_d_d_r_submit(){	
				
				var postData=$("#v_d_d_r").serializeArray();//alert(postData);

                var formURL = "<?php echo base_url(); ?>ajaxfiles/alerts.php";
				$("#result").html('');
				$("#load_spin").show();
				$.ajax(
						{
							url : formURL,

							type: "POST",

							data : postData,						

							success:function(response, textStatus, jqXHR) 

							{
								$("#load_spin").hide();
								$("#result").html(response);
								$(".alerts_tb").dataTable();
							},

							error: function(jqXHR, textStatus, errorThrown) 

							{

								$("#load_spin").hide();
								alert("Change a few things up and try submitting again.");

							}

						});

				

			}

</script>




</body></html>


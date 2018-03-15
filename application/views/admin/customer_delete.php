<?php include 'include/adminassets.php';?>

<?php include 'include/adminheader.php';?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css"  href="<?php echo base_url(); ?>assets/css/chosen.css" />
	<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>	

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
		.chzn-container {
			*margin-top:-11px;
		}
		
.chzn-container-single .chzn-single{
height: 26px;
background: none;
box-shadow: none;
-webkit-box-shadow: none;
-moz-box-shadow:none;
background-image: none;
border-radius: 0px;

}

</style>

<script type="text/javascript">

$(function() {
$($con,"select").chosen({search_contains: true}); 
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

							Delete Customer

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >
<?php  $action="delete";if(isset($customer) && $customer>0){$action="delete_data";}?>
                    <form method="post" action="<?php echo base_url();?>delete_customer/<?php echo $action; ?>">
                    	
                    	
                    	Username : <select name="cid" class="span4" <?php if($customer){echo "disabled='disabled'";}?>>
                    	<option>Select Customer</option>
						  <?php
						 
						  $qu=mysqli_query($con,"select customer_id,customer_emailid from customers");
						  if($qu && mysqli_num_rows($qu)>0){
						  	while($custnames=mysqli_fetch_assoc($qu)){?>
						  	<option value="<?php echo $custnames['customer_id']; ?>" <?php if(isset($customer) &&  $custnames['customer_id']==$customer){echo $con,"selected='selected'";}?>><?php echo "CID".$custnames['customer_id']."-".$custnames['customer_emailid']; ?></option>
						  	<?php
						  	}}
						  ?>
						</select>
                    	<!--Password : <input type="text" name="pw" />-->
                    	
                    	<?php
                    	
                    	 if(isset($customer)){
							if($customer>0){
								?>
								
								<div class="row-fluid">
								<div class="alert alert-error" style="    margin-top: 20px;">
										<!--<button type="button" class="close" data-dismiss="alert">
											<i class="icon-remove"></i>
										</button>-->
										<strong>Warning!</strong>

										Confirm to delete all installations and related data from this customer!!!
										<br>
									</div>
								<h4 class="table-header">Installations</h4>	
								<table class="table table-striped table-bordered dataTable no-footer">
										<thead>
											<tr>
												<td>Vehicle</td>
												<td>IMEI</td>
											</tr>
										</thead>
										<tbody>
								<?php
								$sql_dev=$con,"select
DISTINCT
installation.device_name,
installation.imie_no
FROM
installation
WHERE customer_id=$customer";
	
$rs_dev=mysqli_query($sql_dev);
								if($rs_dev && mysqli_num_rows($rs_dev)>0){
									while($rw_dev=mysqli_fetch_assoc($rs_dev)){?>
									
									
											<tr>
												<td><?php echo $rw_dev['device_name']; ?></td>
												<td><?php echo $rw_dev['imie_no']; ?></td>
											</tr>
										
									<?php	
									}
								}else{ ?>
									<tr>
												<td colspan="2">No Installations found</td>
											</tr>
								<?php } ?>
									
									</tbody>
									</table>
									</div>
									<div class="form-actions">
									<input type="hidden" name="del" value="<?php echo $customer; ?>"/>
									<input type="submit" name="Confirm" value="confirm" class="btn btn-small btn-primary" style=" margin-left: 50px;"/>
									<a href="<?php echo base_url();?>delete_customer"><input  type="button" name="Cancel" value="cancel" class="btn btn-small" style=" margin-left: 50px;"/></a>
									</div>
									<?php
								
							
							}else{
								echo "<span>".$customer."</span>";
							}
						}else{?>
					<input  type="submit" name="Assign" value="Submit" class="btn btn-small" style=" margin-left: 50px;"/>
						<?php	} ?>
                    	
                    	
                    	
                    </form>


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


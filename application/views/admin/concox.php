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
			margin-top:-11px;
		}

</style>

<script type="text/javascript">

$(function() {
$($con,"select").chosen(); 
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

							Concox - Assign Device

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >

                    <form method="post" action="<?php echo base_url();?>concox/save_data">
                    	<!--<select name="customer">
                    		<?php
                    		$sq=mysqli_query($con,"select customer_id,customer_first_name from customers where concox=1");
                    		if($sq && mysqli_num_rows($sq)>0){
								while($cust=mysqli_fetch_assoc($sq)){?>
									<option value="<?php echo $cust['customer_id']; ?>">CID<?php echo $cust['customer_id']."-".$cust['customer_first_name']; ?></option>
							<?php		
								}
							}
                    		?>
                    	</select>-->
                    	
                    	Username : <input type="text" name="uname"  list="unames"/>
                    	<datalist id="unames">
						  <?php
						  $qu=mysqli_query($con,"select customer_emailid from customers where concox=1");
						  if($qu && mysqli_num_rows($qu)>0){
						  	while($custnames=mysqli_fetch_assoc($qu)){?>
						  	<option value="<?php echo $custnames['customer_emailid']; ?>">
						  	<?php
						  	}}
						  ?>
						</datalist>
                    	Password : <input type="text" name="pw" />
                    	
                    	Devices : 
                    	<select name="imeis[]" multiple="multiple">
                    	<?php
                    	$un = $this->session->userdata('username');
						if($un=='markelectronics'){
                    	
                    		$sq=mysqli_query($con,"select m.imie_number,d.device_type FROM `gps_model_details` m join gps_devices d on m.device_id= d.device_id where m.status='completed' and m.device_id=53 and m.imie_number not in (select i.imie_no from installation i)");	
                    		}else{
								$sq=mysqli_query($con,"select m.imie_number,d.device_type FROM `gps_model_details` m join gps_devices d on m.device_id= d.device_id where m.status='completed' and m.imie_number not in (select i.imie_no from installation i)");
							}
                    		
                    		if($sq && mysqli_num_rows($sq)>0){
								while($cust=mysqli_fetch_assoc($sq)){?>
									<option value="<?php echo $cust['imie_number']; ?>"><?php echo $cust['imie_number']." - ".$cust['device_type']; ?></option>
							<?php		
								}
							}
                    		?>
                    	</select>
                    	<input  type="submit" name="Assign" value="Submit" class="btn btn-small" style=" margin-left: 50px;"/>
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


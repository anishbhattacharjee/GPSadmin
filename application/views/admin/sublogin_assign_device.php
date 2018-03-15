<?php include 'include/adminassets.php';?>

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
  <link  href="<?php echo base_url(); ?>ck/style.css" rel="stylesheet" type="text/css"/>
<style>
#branches a+a:before {
  display: inline;
  content: ",";
  margin-left: 1px;
  margin-right: 3px;
  color: #666;
  border-bottom: 1px solid #FFF;
}
.editable-empty{
	color:#DD1144 !important;
}
</style>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
<script>$(function(){$($con,"select").chosen();}) </script>


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

							Assign Devices

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				<div class="row-fluid">

						<div class="span12">
					
	<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
	}/*
	if(isset($_GET['msg']))
	{
		$msg=$_GET['msg'];
		?>
		<div class='alert alert-block alert-success'>
<button type="button" class="close" data-dismiss="alert">
<i class="icon-remove"></i>
</button>
Device Assigned Successfully.
		</div>
		<?php
	}*/
	?>
	<form class="form-horizontal" action="<?php echo base_url(); ?>sublogins/newassign" method="POST">

					<div class="control-group">
					<label class="control-label" for="form-field-1">Customer </label>
					<div class="controls">
<select class="chzn-select" id="form-field-select-3" name="customer_id" data-placeholder="Choose a Customer...">
<option value="">Please Choose Customer</option>

<?php
$qq=mysqli_query($con,"select * from customers where sub_login_createdby<>0");

while($sq=mysqli_fetch_array($qq))
{ 
?>
<option value="<?php echo $sq['customer_id'];?>"><?php echo $sq['customer_first_name'];?></option>
<?php
}

?>

</select>		
			
					</div>
					</div>
					<div class="control-group">
					<label class="control-label" for="form-field-1">Choose Device </label>
					<div class="controls">
					<select multiple="" name="device[]" class="chzn-select" id="form-field-select-4" data-placeholder="Choose a Device...">
					  <?php
        $qqss=mysqli_query($con,"select * from installation");

while($sqs3=mysqli_fetch_array($qqss))
{ 
$imei= $sqs3['imie_no'];
$device_name= $sqs3['device_name'];
$instatllation_id= $sqs3['instatllation_id'];
        ?>
            <option value="<?php echo $instatllation_id;?>"><?php echo $imei."-".$device_name;?></option>
          <?php } ?>
					</select>
					</div>
					</div>
				
				
					
						<div class="control-group">
									<label class="control-label" for="form-field-1"></label>

									<div class="controls">
									<button class="btn btn-small btn-primary" type="submit" name="submit" >
										<i class="icon-ok"></i>
										Submit
									</button>
									</div>
									</div>
	
	</form>

</div>
</div>

					</div><!--/.page-content-->



			

			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>





</body></html>


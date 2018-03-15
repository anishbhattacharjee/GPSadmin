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
		label>span{
			font-size: 14px;
		}

</style>


<?php
if(isset($_POST['delsubmit'])){
	//print_r($_POST);
	$table=$_POST['table'];
	$iddel=$_POST['id'];
	$sqll="delete from $table where id=".$iddel;
	mysqli_query($sqll);
}
?>


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

							Device Signal Test

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >

                    

                    <form class="form-horizontal" method="POST">

                   				 <div class="control-group">
									<div class="controls">

										<input type="text" name="imei" placeholder="IMEI">

									</div>
								</div> 
								<div class="control-group">
									<div class="controls">
												<label>
													<input name="table" type="radio" value="gps_master">
													<span class="lbl"> GPS Master </span>
												</label>

												<label>
													<input name="table" type="radio" value="newmetrack">
													<span class="lbl"> New Metrack </span>
												</label>
												
									</div>
								</div>								
									<div class="control-group">
										<button class="btn btn-info btn small" type="submit" name="submit" style="margin-left:180px;">

											<i class="icon-ok bigger-110"></i>

											Check Signal

										</button>
									</div>								

                    </form>

                    <?php if(isset($_POST['submit'])) {//print_r($_POST); ?>
						
                    <div id="res">
						<table class="table table-striped table-bordered table-hover">
							<tr>
								<td>IMEI</td>
								<td>Lat</td>
								<td>Lng</td>
								<td>Speed</td>
								<td>Oil</td>
								<td>Device Status</td>
								<td>Message</td>
								<td>Device Time</td>
								<td>System Time</td>
								<td>Action</td>
							</tr>
							<?php 
								$table=$_POST['table'];
								$imei=$_POST['imei'];
								if($table=='gps_master'){							
								
								$sql=$con,"select * from $table where imei='$imei' order by time_stamps desc limit 10";
								$rs=mysqli_query($sql);
								while($rw=mysqli_fetch_assoc($rs)){?>
								<tr>
									<td><?php echo $rw['imei']; ?></td>
									<td><?php echo $rw['lat']; ?></td>
									<td><?php echo $rw['lng']; ?></td>
									<td><?php echo $rw['speed']; ?></td>
									<td><?php echo $rw['oil']; ?></td>
									<td><?php echo $rw['device_status']; ?></td>
									<td><?php echo $rw['msg']; ?></td>
									<td><?php echo $rw['device_time']; ?></td>
									<td><?php echo $rw['time_stamps']; ?></td>
									
									<td>
									<form method="post">
									<input type="hidden" name="table" value="gps_master"/>
									<input type="hidden" name="id" value="<?php echo $rw['id']; ?>"/>
									<input type="hidden" name="imei" value="<?php echo $rw['imei']; ?>"/>
									<input type="hidden" name="submit" value="imeisubmit"/>
									<button type="submit" name="delsubmit" onclick="return confirm('Delete?');" class="btn btn-mini btn-danger">Delete</button>
									</form>
									
									</td>
								</tr>
								<?php }	
								}else{
								$sql=$con,"select * from $table where imei='$imei' order by time_stamp desc limit 10";
								$rs=mysqli_query($sql);
								while($rw=mysqli_fetch_assoc($rs)){?>
								<tr>
									<td><?php echo $rw['imei']; ?></td>
									<td><?php echo $rw['lat']; ?></td>
									<td><?php echo $rw['lng']; ?></td>
									<td><?php echo $rw['speed']; ?></td>
									<td><?php echo $rw['oil']; ?></td>
									<td><?php echo $rw['gps_valid']; ?></td>
									<td><?php echo $rw['engine_status']; ?></td>
									<td><?php echo $rw['device_time']; ?></td>
									<td><?php echo $rw['time_stamp']; ?></td>
									<td>
									<form method="post">
									<input type="hidden" name="table" value="newmetrack"/>
									<input type="hidden" name="id" value="<?php echo $rw['id']; ?>"/>
									<input type="hidden" name="imei" value="<?php echo $rw['imei']; ?>"/>
									<input type="hidden" name="submit" value="imeisubmit"/>
									<button type="submit" name="delsubmit" onclick="return confirm('Delete?');" class="btn btn-mini btn-danger">Delete</button>
									</td>
									</form>
								</tr>
								<?php }	
								}?>
						
						</table>
					</div>
					
					<?php } ?>

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


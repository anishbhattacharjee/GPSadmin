<?php 
$imei=$_GET['imei'];
$from=date("Y-m-d 00:00:00");
$to=date("Y-m-d H:i:s");
if($imei){
$sqcust=$con,"select customer_id from installation where imie_no='$imei'";
$rscust=mysqli_query($sqcust);
$rwcust=mysqli_fetch_assoc($rscust);
$cid=$rwcust['customer_id'];


	$sq=$con,"select * from speed_alert_log where imei='$imei' and phone<>'' and CAST(time_stamp AS DATE) between '$from' and '$to'";
	$rs=mysqli_query($sq);
	
		
	$sql=$con,"select f.*,g.fence_name from fence_alert_log f left join geo_fence g on f.fence_id=g.fence_id where f.imei='$imei' and f.phone<>'' and CAST(f.time_stamp AS DATE) between '$from' and '$to'";
	$rst=mysqli_query($sql);	
	
	
	
	$sqt=$con,"select * from fuel_theft_alerts where imei='$imei' and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
	$rstt=mysqli_query($sqt);
	$rowt=mysqli_fetch_assoc($rstt);
	

	
	$etaadmin=0;
	$school=0;
						$sqct=$con,"select is_school,customer_emailid from customers where customer_id=$cid";//echo $sqct;
						$rsct=mysqli_query($sqct);
						$rwct=mysqli_fetch_assoc($rsct);
						if($rwct['is_school']==1){	
							$cust_sql=$con,"select school_id from school where email1='".$rwct['customer_emailid']."'";//echo $cust_sql;
							$cust_rs=mysqli_query($cust_sql);
							$cust_rw=mysqli_fetch_assoc($cust_rs);
							$school=$cust_rw['school_id'];	
							
							/*
							$sqa=$con,"select count(id) as cnt from eta_log_school where imei='$imei' and phone<>'' and CAST(ts AS DATE) between '$from' and '$to'";
							//echo $sqa;
							$rsa=mysqli_query($sqa);
							$ra=mysqli_fetch_assoc($rsa);
							$etaadmin=$ra['cnt'];
							*/
							
						}
?><?php include 'include/adminassets.php';?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/chosen.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datepicker.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap-timepicker.css" />


<?php include 'include/adminheader.php';?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<link rel="stylesheet" href="http://ogtslive.com/gps/media/css/TableTools.css" />
		

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
					
					

				    <div class="span12"><a href="<?php echo base_url(); ?>master" style="text-decoration:none;color:#fff;">
					<button class="btn btn-warning btn-small">
					
											<i class="icon-arrow-left icon-only"></i>
										</button></a>
										<hr/>
					<div class="span12 widget-container-span" style="margin-left:0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												Speed Alerts
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="sp_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Alert</th>
<th>Speed</th>
<th>Phone</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php if($rs && mysqli_num_rows($rs)>0){ 
 while($rw=mysqli_fetch_assoc($rs)){ ?>
<tr>
<td></td>
<td><?php echo urldecode($rw['msg']); ?></td>
<td><?php echo $rw['speed']; ?></td>
<td><?php echo $rw['phone']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($rw['time_stamp'])); ?></td>

</tr>
<?php }}?>

</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->


					<div class="span12 widget-container-span" style="  margin-left: 0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												Fence Alerts
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="fn_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Alert</th>
<th>Fence</th>
<th>Phone</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php if($rst && mysqli_num_rows($rst)>0){ 
 while($row=mysqli_fetch_assoc($rst)){ 
 
 ?>
<tr>
<td></td>
<td><?php echo $row['msg']; ?></td>
<td><?php echo $row['fence_name']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($row['time_stamp'])); ?></td>
</tr>
<?php }} ?>

</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->
									



<div class="span12 widget-container-span" style="  margin-left: 0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												Theft Alerts
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="th_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Alert</th>
<th>Phone</th>
<th>Time</th>
</tr>
</thead>
<tbody>
<?php if($rstt && mysqli_num_rows($rstt)>0){ 
 while($rowt=mysqli_fetch_assoc($rstt)){ 
 
 ?>
<tr>
<td></td>
<td><?php echo $rowt['msg']; ?></td>
<td><?php echo $rowt['phone']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($rowt['ts'])); ?></td>
</tr>
<?php }} ?>

</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->








<?php if($school > 0){ 
$sqeta=$con,"select e.*,r.route_name from eta_log_school  e left join bus_routes r on e.route_id=r.route_id where e.imei='$imei' and e.phone<>'' and CAST(e.ts AS DATE) between '$from' and '$to'";
$rseta=mysqli_query($sqeta);
if($rseta && mysqli_num_rows($rseta) > 0){	

?>
<div class="span12 widget-container-span" style="  margin-left: 0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												ETA - School Admin
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="ea_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Route</th>
<th>Phone</th>
<th>Message</th>
<th>Time</th>
</tr>
</thead>
<tbody>

<?php while($rweta=mysqli_fetch_assoc($rseta)){ ?>

<tr>
<td></td>
<td><?php echo $rweta['route_name']; ?></td>
<td><?php echo $rweta['phone']; ?></td>
<td><?php echo $rweta['msg']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($rweta['ts'])); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->

<?php }  //school admin
$sqeta=$con,"select s.student_id,s.student_name,s.parent_phone1,l.msg,l.ts FROM students s join eta_log l on s.student_id=l.student_id  where  imei='$imei' and phone<>'' and CAST(l.ts AS DATE) between '$from' and '$to'";
$rseta=mysqli_query($sqeta);
if($rseta && mysqli_num_rows($rseta) > 0){	

?>
<div class="span12 widget-container-span" style="  margin-left: 0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												ETA - Parents
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="ep_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Student</th>
<th>Parent Phone</th>
<th>Message</th>
<th>Time</th>
</tr>
</thead>
<tbody>

<?php while($rweta=mysqli_fetch_assoc($rseta)){ ?>
<tr>
<td></td>
<td><?php echo $rweta['student_name']; ?></td>
<td><?php echo $rweta['parent_phone1']; ?></td>
<td><?php echo $rweta['msg']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($rweta['ts'])); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->

<?php } 
$sqeta=$con,"select r.*,s.student_name from rfid_log r left join students s on r.student_id=s.student_id where  r.school_id=$school and phone<>'' and CAST(r.ts AS DATE) between '$from' and '$to'";
//echo $sqeta;
$rseta=mysqli_query($sqeta);
if($rseta && mysqli_num_rows($rseta) > 0){	

?>
<div class="span12 widget-container-span" style="  margin-left: 0px;">

									<div class="widget-box transparent">
										<div class="widget-header widget-header-flat">
											<h4 class="lighter">
												<i class="icon-list orange"></i>
												RFID Alerts
											</h4>

											<div class="widget-toolbar  no-border">
												<a href="#" data-action="collapse">
													<i class="icon-chevron-up"></i>
												</a>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6 no-padding-left no-padding-right">
												<table  class="table table-striped table-bordered alerts_tb" id="rf_alert">
<thead>
<tr>
<th>SlNo</th>
<th>Student</th>
<th>RFID</th>
<th>Parent Phone</th>
<th>Message</th>
<th>Time</th>
</tr>
</thead>
<tbody>

<?php while($rweta=mysqli_fetch_assoc($rseta)){ ?>

<tr>
<td></td>
<td><?php echo $rweta['student_name']; ?></td>
<td><?php echo $rweta['rfid']; ?></td>
<td><?php echo $rweta['phone']; ?></td>
<td><?php echo $rweta['msg']; ?></td>
<td><?php echo date("d-m-Y H:i:s",strtotime($rweta['ts'])); ?></td>
</tr>
<?php } ?>
</tbody>
</table>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
									</div><!--/span-->

<?php }  ?>


<?php }//school 

?>
<?php
}else{
	echo "Invalid Request";
}
?>



					</div>

					</div>

					</div><!--/.page-content-->

					

			

			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>
		<!--<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.bootstrap.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url(); ?>media/js/ZeroClipboard.js"></script>
		<script src="<?php echo base_url(); ?>media/js/TableTools.js"></script>-->
        


<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
<script>
$(function(){


var t = $('.alerts_tb').DataTable( {				
					

				} );
				
				t.on( 'order.dt search.dt', function () {
			        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			            cell.innerHTML = i+1;
			        } );
			    } ).draw();
				/*
				$(".page-content").delegate(".widget-toolbar > [data-action]","click",function(){
					//alert("");
					var j=$(this);
					var a=j.closest(".widget-box");
				});*/
				$(".page-content").delegate(".widget-toolbar > [data-action]","click",function(k){k.preventDefault();var j=$(this);var l=j.data("action");var a=j.closest(".widget-box");if(a.hasClass("ui-sortable-helper")){return}if(l=="collapse"){var d=a.find(".widget-body");var i=j.find("[class*=icon-]").eq(0);var e=i.attr("class").match(/icon\-(.*)\-(up|down)/);var b="icon-"+e[1]+"-down";var f="icon-"+e[1]+"-up";var h=d.find(".widget-body-inner");if(h.length==0){d=d.wrapInner('<div class="widget-body-inner"></div>').find(":first-child").eq(0)}else{d=h.eq(0)}var c=300;var g=200;if(a.hasClass("collapsed")){if(i){i.addClass(f).removeClass(b)}a.removeClass("collapsed");d.slideUp(0,function(){d.slideDown(c)})}else{if(i){i.addClass(b).removeClass(f)}d.slideUp(g,function(){a.addClass("collapsed")})}}else{if(l=="close"){var n=parseInt(j.data("close-speed"))||300;a.hide(n,function(){a.remove()})}else{if(l=="reload"){j.blur();var m=false;if(a.css("position")=="static"){m=true;a.addClass("position-relative")}a.append('<div class="widget-box-layer"><i class="icon-spinner icon-spin icon-2x white"></i></div>');setTimeout(function(){a.find(".widget-box-layer").remove();if(m){a.removeClass("position-relative")}},parseInt(Math.random()*1000+1000))}else{if(l=="settings"){}}}}});
				
				$(".widget-toolbar > [data-action]").click();
});
</script>



</body></html>


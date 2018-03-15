<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>GPS</title>
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<!--basic styles-->
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
		<!--[if IE 7]>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<!--fonts-->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
		<!--ace styles-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<!--[if lte IE 8]>
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->
		<!--inline styles related to this page-->
		<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.min.css" />
		<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css" />
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>	
	<body>
		<style>
			small img{
				width: 60%;
				margin-top: -12px;
				padding: 0px;
				margin-bottom: -12px;
			}
			span,.nav-list>li>a{
				font-size: 13px !important;
			}
			.sidebar,.sidebar:before{
				width: 17%
			}
			.main-content{
				margin-left:17%;
			}
			td.exp_green {
    background: #EDFFF7;
    
}

td.exp_red {
    background: #FFF4F4;
}

td.count2days {
    background: #FFFEF4;
}

td.count8days {
    background: #FFFEF4;
}

td.count15days {
    background: #FFFEF4;
}

td.count30days {
    background: #FFFEF4;
}
td.renewed_this_month {
    background: #EDF8FF;
}
		</style>
		<div class="navbar">
			<div class="navbar-inner" style="background: #FFFFFF;">
				<div class="container-fluid">
					<a href="<?php echo base_url();?>adminlogin" class="brand">
						<small>
							<img src="<?php echo base_url();?>logo.png" />
						</small>
					</a><!--/.brand-->
					<ul class="nav ace-nav pull-right">
						<?php
						$un=$this->session->userdata('username'); //echo $un;
						$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
						$user=mysqli_fetch_array($q);
						$type=$user['user_type'];
						if($type=='operations' || $type=='support'){
							$qo=mysqli_query($con,"select count(r_id) as cnt from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.renew_status='renew' and i.renew_approve_status!='pending' and MONTH(DATE_ADD(installed_date, INTERVAL submonth MONTH))=MONTH(NOW()) and YEAR(DATE_ADD(installed_date, INTERVAL submonth MONTH))=YEAR(NOW())");
							$rqo=mysqli_fetch_array($qo);
							?>
					
							<li class="purple" id="block">
								<a data-toggle="dropdown" class="dropdown-toggle" href="#">
									<i class="icon-bell-alt icon-animated-bell"></i>
									Subscription Renewal Notifications<span class="badge badge-important"><?php echo $rqo['cnt'];?></span>
								</a>
								<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer" style="width: 268px;">
									<li class="nav-header">
										<i class="icon-warning-sign"></i>
										<?php echo $rqo['cnt'];?> Notifications
									</li>
									<?php
									$mnth=date('M');
									$qo=mysqli_query($con,"select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.renew_status='renew' and i.renew_approve_status!='pending' and MONTH(DATE_ADD(installed_date, INTERVAL submonth MONTH))=MONTH(NOW()) and YEAR(DATE_ADD(installed_date, INTERVAL submonth MONTH))=YEAR(NOW())");
									while($srs=mysqli_fetch_array($qo)){
										$instatllation_id=$srs['installation_id'];
										$customer_id=$srs['customer_id'];
										$expiry_date=$srs['expiry_date'];
										$s=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
										while($r=mysqli_fetch_array($s)){
											$uidd=$r['customer_uid'];
											$cfrist=$r['customer_first_name'];
											$compname=$r['comp_name'];
										}
										?>
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
														<?php	if($cfrist!=''){ ?><?php echo $cfrist;?><?php }
														else{
															?><?php echo $compname."(Company Name)";?><?php
														}?>
													</span>
													<span class="pull-right badge badge-info"><?php echo date("d-m-Y",strtotime($expiry_date));?></span>
												</div>
											</a>
										</li>
										<?php } ?>
							
									<li>
										<a href="<?php echo base_url();?>subscription_renewal" target="_blank">
											See all Subscription Renewal Notifications
											<i class="icon-arrow-right"></i>
										</a>
									</li>
								</ul>
							</li>
							<?php } ?>
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!--	<img class="nav-user-photo" src="<?php echo base_url();?>assets/avatars/user.jpg" alt="Jason's Photo" />-->
								<span class="user-info">
									<small>Welcome,</small>
									<?php
									$un=$this->session->userdata('username'); 
				
									$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
									while($re=mysqli_fetch_array($q)){
										$first=$re['name'];
							
									} 
						
									if(!isset($first)) $first='';
									echo  $first; ?>
								</span>
								<i class="icon-caret-down"></i>
							</a>
							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
							
								
								<li class="divider"></li>
								<li>
									<a href="<?php echo base_url();?>adminlogin/logout">
										<i class="icon-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		
		<!--table scripts-->
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
							Customer Devices Report
							<small>
								<i class="icon-double-angle-right"></i>
								Installation completed devices
							</small>
						</h1>
					</div>
					<div class="row-fluid">
						<div class="span12">		
					
							<div id="demo">
								
								<table cellpadding="0" cellspacing="3" border="0" class="table" id="customer_device_details">
									<thead>
										<tr>
											
											<th>Customer</th>
											<th>Active (In Account) </th>
											<th>Expired</th>
											<th>Expiring in 2 days</th>
											<th>Expiring in 8 days</th>
											<th>Expiring in 15 days</th>
											<th>Expiring in 1 month</th>
											<th>Renewed in last 30 days</th>
 											
										</tr>
									</thead>
									<tbody>
										<?php
										$q=mysqli_query($con,"select * from customers order by customer_id desc");										
										while($res=mysqli_fetch_array($q)){
											
											$cid=$res['customer_id'];
											
											
											$total_installed="";
											$q1=mysqli_query($con,"select count(*) as cnt from installation where customer_id=$cid and installation_status='completed'");
											$r1=mysqli_fetch_assoc($q1);
											$total_installed=$r1['cnt'];
											
											$total_expired="";
											$q2=mysqli_query($con,"select count(*) as cnt from r_installation where customer_id=$cid and renew_status='renew' and imie_no not in (select imie_no from installation where customer_id=$cid)");
											
											if($q2){
												$r2=mysqli_fetch_assoc($q2);
												$total_expired=$r2['cnt'];
												
											}
											
											
	$curr_date=date("Y-m-d");	
	$count2days=0;	
	$count8days=0;	
	$count15days=0;	
	$count30days=0;	
	$sql=$con,"select installed_date,submonth from installation where installation_status='completed' and customer_type!='foc' and demo_device_type!='demo' and customer_id!=502 and customer_id=$cid";	
	$rs=mysqli_query($sql);
	if($rs && mysqli_num_rows($rs)>0){
	while($inst=mysqli_fetch_assoc($rs)){
		
		$submonth=$inst['submonth'];
		$submonth="+$submonth months";
		$exp_date=date("Y-m-d",strtotime($submonth,strtotime($inst['installed_date'])));
		//echo "exp ".$exp_date."<br/>";
		
		
		$warn_dur="-1 month";
		$warnmonth=date("Y-m-d",strtotime($warn_dur,strtotime($exp_date)));
		//echo "w1 ".$warndate."<br/>";
		
		$warn_dur="-15 days";
		$warndate=date("Y-m-d",strtotime($warn_dur,strtotime($exp_date)));
		//echo "w1 ".$warndate."<br/>";
		
		$warn_2_dur="-2 days";
		$warn_2_date=date("Y-m-d",strtotime($warn_2_dur,strtotime($exp_date)));
		//echo "w2 ".$warn_2_date."<br/>";
		
		$warn_1_dur="-8 days";
		$warn_1_date=date("Y-m-d",strtotime($warn_1_dur,strtotime($exp_date)));		
		
		
		if($curr_date > $exp_date){//if expired		
			//delete						

		}else if($curr_date >= $warn_2_date && $curr_date <= $exp_date){
			//echo "exp 2 days"."<br/>";
			$count2days++;	
		}else if($curr_date >= $warn_1_date && $curr_date <= $exp_date){			
			//echo "exp 8 days"."<br/>";
			$count8days++;
		}else if($curr_date >= $warndate && $curr_date <= $exp_date){
			//echo "exp 15 days"."<br/>";
			$count15days++;
		}else if($curr_date >= $warnmonth && $curr_date <= $exp_date){
			//echo "exp 30 days"."<br/>";
			$count30days++;
		}
	}
	}
	
	
	$renewed_this_month="";
											$q3=mysqli_query($con,"select count(*) as cnt from installation where customer_id=$cid and installation_status='completed' and installed_date BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE() and imie_no in (select imie_no from r_installation where customer_id=$cid and renew_status='renewed')");
											$r3=mysqli_fetch_assoc($q3);
											$renewed_this_month=$r3['cnt'];
	
											?>
											<tr>
												<td><?php echo "CID".$cid." - ".$res['customer_first_name'];?></td>					
												<td class="<?php if($total_installed>0){echo "exp_green";}?>"><?php if($total_installed>0){echo $total_installed;}?></td>	
												<td class="<?php if($total_expired>0){echo "exp_red";}?>"><?php if($total_expired>0){echo $total_expired;}?></td>	
												
												<td class="<?php if($count2days>0){echo "count2days";}?>"><?php if($count2days>0){ echo $count2days;} ?></td>
												<td class="<?php if($count8days>0){echo "count8days";}?>"><?php if($count8days>0){ echo $count8days;} ?></td>
												<td class="<?php if($count15days>0){echo "count15days";}?>"><?php if($count15days>0){ echo $count15days;} ?></td>
												<td class="<?php if($count30days>0){echo "count30days";}?>"><?php if($count30days>0){ echo $count30days;} ?></td>											
												<td class="<?php if($renewed_this_month>0){echo "renewed_this_month";}?>"><?php if($renewed_this_month>0){ echo $renewed_this_month;} ?></td>
												
												
											</tr>
											<?php	
										}
								
										?>
									
									</tbody>
								</table>
							</div>
								
							
						</div>
					</div>
				</div><!--/.page-content-->
			
			</div><!--/.main-content-->
		</div><!--/.main-container-->
		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
	</body>
	<!--basic scripts-->
	<!--[if !IE]>-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<!--<![endif]-->
	<!--[if IE]>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<![endif]-->
	<!--[if !IE]>-->
	<script type="text/javascript">
		window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
	</script>
	<!--<![endif]-->
	<!--[if IE]>
	<script type="text/javascript">
	window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
	</script>
	<![endif]-->
	<script type="text/javascript">
		if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	</script>
	<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<!--page specific plugin scripts-->
	<!--[if lte IE 8]>
	<script src="<?php echo base_url();?>assets/js/excanvas.min.js"></script>
	<![endif]-->
	<!--ace scripts-->
	<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		
	<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>

	<!--inline scripts related to this page-->
	<script type="text/javascript">
	$(function(){
		
		var t3 = $('#customer_device_details').dataTable( {
			"aaSorting": [],
			"iDisplayLength" : 10,
			"lengthMenu" : [[5, 10, 20, 50, 100, -1], [5, 10, 20, 50, 100, "All"]],
									        dom: 'Blfrtip',
									        buttons: [
									            'copyHtml5',
									            {
									                extend: 'excelHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceStatus'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'csvHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceStatus'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'pdfHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceStatus'.date('d-m-Y'); ?>",
									                message: 'OGTS Customer Device Status'
									            },{
									                extend: 'print',									               
									                message: 'OGTS Customer Device Status'
									            }
									            
									        ]
									    } );
	});
	</script>
</html>
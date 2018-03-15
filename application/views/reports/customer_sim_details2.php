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
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-editable.css" />

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
							Customer Device Report
							<small>
								<i class="icon-double-angle-right"></i>
								Installation completed devices
							</small>
						</h1>
					</div>
					<div class="row-fluid">
						<div class="span12">		
					
							<div id="demo">
								
								<table cellpadding="0" cellspacing="3" border="0" class="table" id="customer_sim_details">
									<thead>
										<tr>
											
											<th>IMEI</th>
											<th>SIM</th>
											<th>Vehicle</th>
											<th>Type</th>
											<th>Customer</th>
											<th>Subscription Status</th>
											<th>SIM Status</th>
 											
										</tr>
									</thead>
									<tbody id="reading_data">
										<?php 
										//$slno=1;
										$q=mysqli_query($con,"select * from customers c join installation i on c.customer_id=i.customer_id where installation_status='completed' order by c.customer_id desc");										
										while($res=mysqli_fetch_array($q)){
											
											$cid=$res['customer_id'];
											$customer_type=ucfirst($res['type']);
											$account_type=ucfirst($res['account_type']);
											$typeclass="text-success green";
											if($account_type=="Demo"){
												$typeclass="text-warning orange";
											}
											/*
											$total_installed=0;
											$q1=mysqli_query($con,"select count(*) as cnt from installation where customer_id=$cid");
											$r1=mysqli_fetch_assoc($q1);
											$total_installed=$r1['cnt'];*/
											?>
											<tr class="parent" id="<?php echo $cid;?>">
												<!--<td><?php echo $slno;?></td>-->
												<td><?php echo $res['imie_no'];?></td>
												<td class="editable" id="reading_<?php echo $res['instatllation_id'];?>" data-id="<?php echo $res['instatllation_id']; ?>" data-dtype="inst"><?php echo $res['sim_no'];?></td>
												<td><?php echo $res['device_name'];?></td>
												<td><?php echo $res['demo_device_type'];?></td>
												<td><?php echo "CID".$cid." - ".$res['customer_first_name'];?></td>					
												<td>Active</td>
												<td  class="editable" data-type=$con,"select" data-source="{'Active': 'Active', 'Inactive': 'Inactive'}" id="reading_<?php echo $res['instatllation_id'];?>" data-id="<?php echo $res['instatllation_id']; ?>" data-dtype="sim_stat" data-value="<?php echo $res['sim_status'];?>"><?php echo $res['sim_status'];?></td>
											</tr>
											<?php	
										}
								
										
										$q1=mysqli_query($con,"select * from customers c join r_installation i on c.customer_id=i.customer_id where installation_status='completed' and renew_status='renew' order by c.customer_id desc");										
										while($res=mysqli_fetch_array($q1)){
											$cid=$res['customer_id'];
											$imie=$res['imie_no'];
											
											$q2=mysqli_query($con,"select * from installation where customer_id=$cid and imie_no='$imie'");
											if($q2 && mysqli_num_rows($q2)>0){
												
											}else{
												
											
																
											
											$customer_type=ucfirst($res['type']);
											$account_type=ucfirst($res['account_type']);
											$typeclass="text-success green";
											if($account_type=="Demo"){
												$typeclass="text-warning orange";
											}
											
											?>
											<tr class="parent" id="<?php echo $cid;?>">
												<!--<td><?php echo $slno;?></td>-->
												<td><?php echo $res['imie_no'];?></td>
												<td class="editable" id="reading_<?php echo $res['r_id'];?>" data-id="<?php echo $res['r_id']; ?>" data-dtype="r_inst"><?php echo $res['sim_no'];?></td>
												<td><?php echo $res['device_name'];?></td>
												<td><?php echo $res['demo_device_type'];?></td>
												<td><?php echo "CID".$cid." - ".$res['customer_first_name'];?></td>					
												<td>Expired</td>
												<td  class="editable" id="reading_<?php echo $res['r_id'];?>" data-id="<?php echo $res['r_id']; ?>"  data-type=$con,"select" data-source="{'Active': 'Active', 'Inactive': 'Inactive'}" data-dtype="r_sim_stat" data-value="<?php echo $res['sim_status'];?>"><?php echo $res['sim_status'];?></td>
											</tr>
											<?php	
											}
										}
								
										?>
									
									</tbody>
								</table>
								
								<!--<div class="span12">
									<div class="span6 count_sum">
										<h4>Subscription Status</h4>
										<div class="span3">Active <div class="count">c1</div></div>
										<div class="span3">Expired</div>
									</div>
									<div class="span6 count_sum">
										<h4>Sim Status</h4>
										<div class="span3">Active</div>
										<div class="span3">Inactive</div>
									</div>
								</div>-->
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
	<script src="<?php echo base_url();?>assets/js/x-editable/bootstrap-editable.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/x-editable/ace-editable.min.js"></script>

	<!--inline scripts related to this page-->
	<script type="text/javascript">
	$(function(){
		$("#reading_data").editable({       
					   selector: '[id^="reading_"]',
			           url: '<?php echo base_url();?>customer_sim_details/edit_sim',
			           send: 'always',
			           mode:'inline',
					   params: function(params) {
							// add additional params from data-attributes of trigger element
							params.ins_id = $(this).editable().data('id');							
							params.type = $(this).editable().data('dtype');							
							return params;
						},
						success: function(response, newValue) {
							
						}
							
			    });
		var t3 = $('#customer_sim_details').dataTable( {
			"aaSorting": [],
			"iDisplayLength" : 10,
			"lengthMenu" : [[5, 10, 20, 50, 100, -1], [5, 10, 20, 50, 100, "All"]],
									        dom: 'Blfrtip',
									        buttons: [
									            'copyHtml5',
									            {
									                extend: 'excelHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceDetails'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'csvHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceDetails'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'pdfHtml5',
									                title: "<?php echo 'OGTSCustomerDeviceDetails'.date('d-m-Y'); ?>",
									                message: 'OGTS Customer Device Details'
									            },{
									                extend: 'print',									               
									                message: 'OGTS Customer Device Details'
									            }
									            
									        ]
									    } );
	});
	</script>
</html>
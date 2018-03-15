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
			.grid4{
				text-align: center;
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
					<?php
					if(isset($_GET['fromdate'])){
						$from=$_GET['fromdate'];
					}else{
						$from=date("d-m-Y");
					}
					if(isset($_GET['todate'])){
						$to=$_GET['todate'];
					}else{
						$to=date("d-m-Y");
					}
					
					?>
					<div class="row-fluid">
						<div class="span12">
						
							<div class="widget-box transparent">
								<div class="widget-header">
									<h4>Subscription Summary</h4>
									<span class="widget-toolbar  no-border">
										<a href="#" data-action="reload">
											<i class="icon-refresh"></i>
										</a>
										<a href="#" id="collapse_search" data-action="collapse">
											<i class="icon-chevron-up"></i>
										</a>
													
									</span>
								</div>
								<div class="widget-body">
									<div class="widget-main no-padding">
                                                
										<form id="v_d_d_r">
											<fieldset>
												<div class="row-fluid">
													<div class="span4">
														<div class="row-fluid">
															<label for="id-date-picker-1">From</label>
														</div>
														<div class="control-group">
															<div class="row-fluid input-append">
																<input class="span10 date-picker" id="id-date-picker-1" type="text" name="fromdate" data-date-format="dd-mm-yyyy" value="<?php echo $from; ?>">
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
																<input class="span10 date-picker" id="id-date-picker-2" type="text" name="todate" data-date-format="dd-mm-yyyy" value="<?php echo $to; ?>">
																<span class="add-on">
																	<i class="icon-calendar"></i>
																</span>
															</div>
														</div>
													</div>	<!--span6-->                                                 
											
													<div class="span4" id="khhiuhuih">
													
														<div class="controls" style="    margin-top: 25px;">														
															<button class="btn btn-small btn-danger">
																Generate Report
																<i class="icon-arrow-right icon-on-right bigger-110"></i>
															</button> 
															<i class="icon-spinner icon-spin orange bigger-125" id="load_spin" style="display:none;"></i>                              
                                                          	 
																											
														</div>
													</div>  
                                                  
													  
												</div><!-----first row(frm)-->                                                   
                                                    
                                                    
                                                     
                                                    
													
											</fieldset>
                                                    
                                                    
													
                                                    				
										</form>	
									</div>
								</div>
							</div>
					<div class="hr hr8 hr-double"></div>
							<div id="demo">
								
								<table cellpadding="0" cellspacing="3" border="0" class="table" id="customer_sim_details">
									<thead>
										<tr>
											<th>Customer</th>
											<th>IMEI</th>
											<th>SIM</th>
											<th>Vehicle</th>
											<th>Demo</th>
											
											<th>Subscription Status</th>
											<th>SIM Status</th>
											<th>Last Renewed /Installed</th>
											<th>Subscription Months</th>
											<th>Subscription Amount</th>
											<th>Paid</th>
											<th>Paid On</th>
											<th>Expiring on</th>
 											
										</tr>
									</thead>
									<tbody id="reading_data">
										<?php 
										//$slno=1;
										$prev=0;
										$q=mysqli_query($con,"select * from customers c join installation i on c.customer_id=i.customer_id where installation_status='completed' and concox!=1 order by c.customer_id desc");										
										while($res=mysqli_fetch_array($q)){
											
											$cid=$res['customer_id'];
											if($cid!=$prev){
												$display=true;
											}else{
												$display=false;
											}
											$prev=$cid;
											$customer_type=ucfirst($res['type']);
											$account_type=ucfirst($res['account_type']);
											//$typeclass="text-success green";
											$typeclass="";
											if($account_type=="Demo"){
												$typeclass="text-warning orange";
											}
											/*
											$total_installed=0;
											$q1=mysqli_query($con,"select count(*) as cnt from installation where customer_id=$cid");
											$r1=mysqli_fetch_assoc($q1);
											$total_installed=$r1['cnt'];*/
											$simno=$res['sim_no'];
											$sim_status=$res['sim_status'];
											$imei=$res['imie_no'];
											
											$subsmonth="";
											$exp_date="";
											$demo="Yes";
											if($res['demo_device_type']!='demo'){
												$demo="No";
												$subsmonth=$res['submonth'];
												$submonth="+$subsmonth months";
												$exp_date=date("Y-m-d",strtotime($submonth,strtotime($res['installed_date'])));
											}
											
											
											/*
											$q3=mysqli_query($con,"select * from r_installation i join rpayment_list p on i.r_invoice=p.r_invid where i.renew_status='renewed' and i.customer_id=$cid and i.imie_no='$imei'");
											$r3=mysqli_fetch_assoc($q3);
											$subscription_amount=$r3['cnt'];
											$paid=$r3['cnt'];
											$paid_on=$r3['cnt'];*/
											?>
											<tr class="parent <?php echo $typeclass; ?>" id="<?php echo $cid;?>">
												<!--<td><?php echo $slno;?></td>-->
												<td><span <?php if(!$display){ ?>style="display: none;" <?php } ?>><?php echo "CID".$cid." - ".$res['customer_first_name'];?></span></td>		
												<td><?php echo $res['imie_no'];?></td>
												<td><?php echo $simno;?></td>
												<td><?php echo $res['device_name'];?></td>
												<td><?php echo $demo;?></td>	
												<td>Active</td>
												<td ><?php echo $sim_status;?></td>
												<td><?php echo $res['installed_date'];?></td>
												<td><?php echo $subsmonth;?></td>
												<td></td>
												<td></td>
												<td></td>
												<td><?php echo $exp_date;?></td>
											</tr>
											<?php	
										}
								
										
										$q1=mysqli_query($con,"select * from customers c join r_installation i on c.customer_id=i.customer_id where installation_status='completed' and renew_status='renew' and concox!=1 order by c.customer_id desc");										
										while($res=mysqli_fetch_array($q1)){
											$cid=$res['customer_id'];
											$imie=$res['imie_no'];
											
											$q2=mysqli_query($con,"select * from installation where customer_id=$cid and imie_no='$imie'");
											if($q2 && mysqli_num_rows($q2)>0){
												
											}else{
												
											
																
											
											$customer_type=ucfirst($res['type']);
											$account_type=ucfirst($res['account_type']);
											$typeclass="";
											if($account_type=="Demo"){
												$typeclass="text-warning orange";
											}
											
											
											$simno=$res['sim_no'];
											$sim_status=$res['sim_status'];
											
											$demo="Yes";
											if($res['demo_device_type']!='demo'){
												$demo="No";
											}
											?>
											<tr class="parent <?php echo $typeclass; ?>" id="<?php echo $cid;?>">
												<!--<td><?php echo $slno;?></td>-->
												<td><?php echo "CID".$cid." - ".$res['customer_first_name'];?></td>					
												<td><?php echo $res['imie_no'];?></td>
												<td><?php echo $simno;?></td>
												<td><?php echo $res['device_name'];?></td>
												<td><?php echo $demo;?></td>
												
												<td>Expired</td>
												<td ><?php echo $sim_status;?></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
												<td></td>
											</tr>
											<?php	
											}
										}
								
										?>
									
									</tbody>
								</table>
								
								<div class="hr hr8 hr-double"></div>
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
	<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
	<!--inline scripts related to this page-->
	<script type="text/javascript">
	$(function(){
		
		$('.date-picker').datepicker({
			startDate: '-2m',
			endDate: '+2d'
			}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				}); 
				/*var d=new Date("<?php echo date('Y-m-d'); ?>");
				var day=d.getDate();
				var month=d.getMonth() + 1;
				var yr=d.getFullYear();
				var cur=day+"-"+month+"-"+yr;
				
 				$("#id-date-picker-1").val(cur);
				$("#id-date-picker-2").val(cur);*/
				
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
									                title: "<?php echo 'OGTSSubscriptionSummary'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'csvHtml5',
									                title: "<?php echo 'OGTSSubscriptionSummary'.date('d-m-Y'); ?>"
									            },
									            {
									                extend: 'pdfHtml5',
									                title: "<?php echo 'OGTSSubscriptionSummary'.date('d-m-Y'); ?>",
									                message: 'OGTS Subscription Summary'
									            },{
									                extend: 'print',									               
									                message: 'OGTS Subscription Summary'
									            }
									            
									        ]
									    } );
	});
	</script>
</html>
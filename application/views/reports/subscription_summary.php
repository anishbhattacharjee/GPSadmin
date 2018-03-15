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
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
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
			.chzn-container-single .chzn-single {
    background: #fff;    
    box-shadow: none;
    border-radius: 0px;
    -webkit-border-radius: 0px;
    -webkit-box-shadow:none;
    height: 26px;
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
					if(isset($_GET['cid'])){
						$cid=$_GET['cid'];
					}else{
						$cid="ALL";
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
													<div class="span3">
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
                                                    
													<div class="span3">
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
													</div>	<!--span6-->                                                 											<div class="span3">
														<div class="row-fluid">
															<label for="id-date-picker-2">Customer</label>
														</div>
														<div class="control-group">
															<div class="row-fluid input-append">
																<select name="cid">
																<option value="ALL">ALL</option>
																	<?php $sq1=mysqli_query($con,"select customer_id,customer_first_name from customers where concox!=1 order by customer_id desc");
									while($customer=mysqli_fetch_assoc($sq1)){
										$selected_class="";
										if($cid!="ALL" && $customer['customer_id']==$cid){
											$selected_class=$con,"selected";
										}
																	?>
																	<option value="<?php echo $customer['customer_id']; ?>" <?php echo $selected_class; ?>><?php echo "CID".$customer['customer_id']." - ".$customer['customer_first_name']; ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>	<!--span6-->                                                 
											
													<div class="span3" id="khhiuhuih">
													
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
											<!--<th>SIM Status</th>-->
											<th>Last Renewed /Installed</th>
											<th>Subscription Months</th>
											<th>Subscription Amount</th>
											<th>Paid</th>	
											<th>Paid On</th>
											<th>Expiring/Expired On</th>
 											
										</tr>
									</thead>
									<tbody>
									
									<?php 
									$from=date("Y-m-d",strtotime($from));
									$to=date("Y-m-d",strtotime($to));
									$subsactive=$subsexp=$paidtot=$pendingtot=0;
									
									if($cid=="ALL"){
										$sq1=mysqli_query($con,"select customer_id,customer_first_name from customers where concox!=1 order by customer_id desc");
									}else{
										$sq1=mysqli_query($con,"select customer_id,customer_first_name from customers where customer_id=$cid");
									}
									
									
									while($customer=mysqli_fetch_assoc($sq1)){
										$customer_id=$customer['customer_id'];
										$sq2=mysqli_query($con,"select * FROM 
(
    SELECT  `installation_id`, `customer_id` ,  `order_id` ,  `category_id` ,  `model_id` ,  `sim_no` ,  `device_id` ,  `imie_no` ,  `device_name` , `installation_status` ,  `installed_date` ,  `device_status` ,  `create_date_time` ,  `demo_device_type` ,  `submonth` ,  `order_date` , `customer_type` ,  `sim_status`,`renew_status`, `renew_month`, `renewed_on`, `r_invoice`, `ts` 
FROM r_installation WHERE customer_id =$customer_id
UNION 
SELECT  `instatllation_id`, `customer_id` ,  `order_id` ,  `category_id` ,  `model_id` ,  `sim_no` ,  `device_id` ,  `imie_no` ,  `device_name` , `installation_status` ,  `installed_date` ,  `device_status` ,  `create_date_time` ,  `demo_device_type` ,  `submonth` ,  `order_date` , `customer_type` ,  `sim_status`, '' as renew_status, '' as  `renew_month`, '' as `renewed_on`, '' as `r_invoice`, '' as `ts` 
FROM installation WHERE customer_id =$customer_id
ORDER BY installed_date
)temp
group by imie_no");
										if($sq2 && mysqli_num_rows($sq2)>0){
											while($dev=mysqli_fetch_assoc($sq2)){
												$installed_date=$dev['installed_date'];
												if($installed_date<=$to){
													$imei=$dev['imie_no'];
													
													//filter
													$print=false;	
													$sq3=mysqli_query($con,"select installed_date,submonth,installation_status from installation where imie_no = '$imei' and customer_id=$customer_id");
													if($sq3 && mysqli_num_rows($sq3)>0){
														$inst=mysqli_fetch_assoc($sq3);
														if($inst['installation_status']=="completed"){
															$start_date=$inst['installed_date'];
															$subsmonth=$inst['submonth'];
															$submonth="+$subsmonth months";
															$end_date=date("Y-m-d",strtotime($submonth,strtotime($start_date)));
															//echo $customer_id."S:".$start_date;
															//echo "E:".$end_date."<br/>";
															/*
															if($start_date>=$from && $start_date<=$to){
																//in
															}elseif($end_date>=$from && $end_date<=$to){
																//in
															}elseif($start_date<=$from && $end_date>=$to){
																//in
															}*/
															
															if($start_date<$from && $end_date<$from){
																//out
															}elseif($start_date>$to && $end_date>$to){
																//out
															}else{
																$inst_date=$start_date;
																$inst_month=$subsmonth;
																$expiring_on=$end_date;
																$paid="Yes";
																$paid_on=$start_date;///////////verify
																$subs_status="Active";
																$subsactive++;
																$print=true;
															}
														}
													}else{
														if($dev['demo_device_type']!='demo'){
															$expiring_on="";
															$sq4=mysqli_query($con,"select installed_date,submonth from r_installation where imie_no = '$imei' and customer_id=$customer_id order by r_id");
															if($sq4 && mysqli_num_rows($sq4)>0){
																while($inst=mysqli_fetch_assoc($sq4)){
																	$start_date=$inst['installed_date'];
																	$subsmonth=$inst['submonth'];
																	$submonth="+$subsmonth months";
																	$end_date=date("Y-m-d",strtotime($submonth,strtotime($start_date)));
																	
																	if($start_date<=$to){
																		$inst_date=$start_date;
																		$inst_month=$subsmonth;
																		$paid="Yes";
																		$paid_on=$start_date;
																		
																		
																		$expiring_on=$end_date;
																		$print=true;
																		//if($start_date<$from && $end_date<$from){
																		if($end_date<=$to){
																			//out
																			$subs_status='<span class="badge badge-important">Expired</span>';
																			$paid="No";
																			$paid_on="";
																			$subsexp++;
																		}else{
																			$subs_status="Active";
																			$subsactive++;
																			//$print=true;
																			//break;
																		}
																	}
																	/*
																	if($start_date<$from && $end_date<$from){
																		//out
																		$subs_status="Expired";
																	}elseif($start_date>$to && $end_date>$to){
																		//out
																	}else{
																		$subs_status="Active";
																		//$print=true;
																		//break;
																	}*/
																}
															}
														}
													}
													
												

													if($print){
														
													$sim=$dev['sim_no'];
													$dev_name=$dev['device_name'];
													$demo="Yes";
													$subs_amount=0;
													if($dev['demo_device_type']!='demo'){
														$demo="No";
														$sq5=mysqli_query($con,"select sub_month,subcost from customer_order_details where order_id=".$dev['order_id']." and category_id=".$dev['category_id']." and device_id=".$dev['device_id']);
														if($sq5 && mysqli_num_rows($sq5)>0){
															$order=mysqli_fetch_assoc($sq5);
															if($order['sub_month']>0){
																$subs_amount=$order['subcost']/$order['sub_month'];
																if($subs_status=="Active"){
																	$paidtot+=$subs_amount;
																}else{
																	$pendingtot+=$subs_amount;
																}
															}
															
														}
													}
													?>
													<tr>
														<td data-order="<?php echo $customer_id; ?>"><?php echo "CID".$customer_id." - ".$customer['customer_first_name'];?></td>
														<td><?php echo $imei; ?></td>
														<td><?php echo $sim; ?></td>
														<td><?php echo $dev_name; ?></td>
														<td><?php echo $demo; ?></td>
														<td><?php echo $subs_status; ?></td>
														<td><?php echo $inst_date; ?></td>
														<td><?php echo $inst_month; ?></td>
														<td><?php echo $subs_amount; ?></td>
														<td><?php echo $paid; ?></td>
														<td><?php echo $paid_on; ?></td>
														<td><?php echo $expiring_on; ?></td>
													</tr>	
													
													<?php	
													}
												}


											}
											
										}
									
									
									}
									?>	
									</tbody>
								</table>
								
								<div class="hr hr8 hr-double"></div>
								<div class="clearfix">
													<div class="grid4" style="background-color: #C4FFE8;">
														<span class="grey">
															<i class="icon-download icon-2x green"></i>
															<h5>Active</h5>
														</span>
														<h4 class="bigger"><?php echo $subsactive; ?></h4>
													</div>

													<div class="grid4" style="background-color: #FFC4C4;">
														<span class="grey">
															<i class="icon-download icon-2x red"></i>
															<h5>Expired</h5>
														</span>
														<h4 class="bigger"><?php echo $subsexp; ?></h4>
													</div>
													<div class="grid4" style="background-color: #C4FFE8;">
														<span class="grey">
															<i class="icon-money icon-2x green"></i>
															<h5>Paid</h5>
														</span>
														<h4 class="bigger"><?php echo $paidtot; ?></h4>
													</div>

													<div class="grid4" style="background-color: #FFC4C4;">
														<span class="grey">
															<i class="icon-money icon-2x red"></i>
															<h5>Pending</h5>
														</span>
														<h4 class="bigger"><?php //echo $pendingtot; ?></h4>
													</div>
												</div>		
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
	<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
	<!--inline scripts related to this page-->
	<script type="text/javascript">
	$(function(){
		//$(".select2").select2();
		$($con,"select").chosen();
		$('.date-picker').datepicker({
			//startDate: '-2m',
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
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
		<!--<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.min.css" />
		<link rel="stylesheet" type="text/css"  href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css" />-->		
		<link rel="stylesheet" type="text/css" media="screen" href="http://www.trirand.com/blog/jqgrid/themes/redmond/jquery-ui-custom.css" />
		<link rel="stylesheet" type="text/css" media="screen" href="http://www.trirand.com/blog/jqgrid/themes/ui.jqgrid.css" />		
		<link rel="stylesheet" type="text/css" media="screen" href="http://www.trirand.com/blog/jqgrid/themes/ui.multiselect.css" />


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
			span{
				font-size: 13px !important;
			}
			.ui-jqgrid tr.jqgrow td{
				padding:8px;font-size: 13px;
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
							Customer Report
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
					<div class="row-fluid">
						<div class="span12">		
					
							<div id="demo">
								<!--<div class="table-header">
									Latest Customer Details
								</div>-->
								<table id="sg3"></table>
<div id="psg3"></div>
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
		
	<!--<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
	<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.html5.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.print.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.dataTables.bootstrap.js"></script>-->
	

<script src="http://www.trirand.com/blog/jqgrid/js/jquery.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/jquery-ui-custom.min.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/jquery.layout.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/i18n/grid.locale-en.js" type="text/javascript"></script>
<script type="text/javascript">
	$.jgrid.no_legacy_api = true;
	$.jgrid.useJSON = true;
</script>
<script src="http://www.trirand.com/blog/jqgrid/js/ui.multiselect.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/jquery.jqGrid.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/jquery.tablednd.js" type="text/javascript"></script>
<script src="http://www.trirand.com/blog/jqgrid/js/jquery.contextmenu.js" type="text/javascript"></script>

	<!--inline scripts related to this page-->
	<script type="text/javascript">
	var pageWidth = $("#demo").width() - 50;
	var pageWidthChild = $("#demo").width() - 150;
		jQuery("#sg3").jqGrid({
   	url:'<?php echo base_url();?>customer_sim_details/customer',
	datatype: "xml",
	height: '100%',
	shrinkToFit: false,
   	colNames:['CID','Type', 'Name', 'Email','Total','Status'],
   	colModel:[
   		{name:'customer_id',index:'customer_id', width:(pageWidth*(5/100))},
   		{name:'type',index:'type', width:(pageWidth*(20/100))},
   		{name:'customer_first_name',index:'customer_first_name', width:(pageWidth*(25/100))},
   		{name:'customer_emailid',index:'customer_emailid', width:(pageWidth*(30/100))},
   		{name:'total',index:'total',align:"right", width:(pageWidth*(5/100))},
   		{name:'status',index:'status', width:(pageWidth*(15/100))}
   	],
   	rowNum:10,
   	rowList:[10,20,30,50,100],
   	pager: '#psg3',
   	sortname: 'customer_id',
    viewrecords: true,
    sortorder: "desc",
	multiselect: false,
	subGrid: true,
	caption: "Customer Details",
	// define the icons in subgrid
    subGridOptions: {
        "plusicon"  : "ui-icon-triangle-1-e",
        "minusicon" : "ui-icon-triangle-1-s",
        "openicon"  : "ui-icon-arrowreturn-1-e",
		// load the subgrid data only once
		// and the just show/hide
		"reloadOnExpand" : false,
		// select the row when the expand column is clicked
		$con,"selectOnExpand" : true
	},
	subGridRowExpanded: function(subgrid_id, row_id) {
		var subgrid_table_id, pager_id;
		subgrid_table_id = subgrid_id+"_t";
		pager_id = "p_"+subgrid_table_id;
		$("#"+subgrid_id).html("<table id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
		jQuery("#"+subgrid_table_id).jqGrid({
			url:"<?php echo base_url();?>customer_sim_details/installation?q=2&id="+row_id,
			datatype: "xml",
			colNames: ['IMEI No','SIM','Device','Inst. Status','Type'],
			colModel: [
				{name:"imie_no",index:"imie_no", width:(pageWidthChild*(25/100)),key:true},
				{name:"sim_no",index:"sim_no",width:(pageWidthChild*(25/100))},
				{name:"device_name",index:"device_name",width:(pageWidthChild*(25/100)),align:"left"},
				{name:"installation_status",index:"installation_status",width:(pageWidthChild*(15/100)),align:"left"},	
				{name:"demo_device_type",index:"demo_device_type",width:(pageWidthChild*(10/100)),align:"left"}
			],
		   	rowNum:20,
		   	pager: pager_id,
		   	sortname: 'installed_date',
		    sortorder: "asc",
		    height: '100%',
		    shrinkToFit: false
		});
		jQuery("#"+subgrid_table_id).jqGrid('navGrid',"#"+pager_id,{edit:false,add:false,del:false})
	}
});
jQuery("#sg3").jqGrid('navGrid','#psg3',{add:false,edit:false,del:false});
	</script>
</html>
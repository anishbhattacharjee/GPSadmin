	<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
  <link rel="stylesheet" type="text/css"  href="<?php echo base_url();?>assets/css/chosen.css" />
<!--table scripts-->
<script type="text/javascript" language="javascript" src="<?php echo base_url();?>jquery-1.3.2.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.js"></script>
	
	
		<script src="<?php echo base_url();?>assets/js/chosen.jquery.min.js"></script>
		
		<script>
		var asInitVals = new Array();
	$(document).ready( function () {
	 
     
    
    
	
//	$('#demo').before( oTableTools.dom.container );\

$(".chzn-select").chosen(); 
} );
</script>

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
							School Details
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
	
	
							
	<form class="form-horizontal" action="<?php echo base_url();?>school/added" method="POST">
					
					<div class="control-group">
									<label class="control-label" for="form-field-1">School Name</label>
									<div class="controls">
								<input type="text" name="schoolname" id="schoolname" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Address</label>
									<div class="controls">
								<textarea name="cmpaddr" id="cmpaddr"></textarea>
									</div>
									</div>
									
									<h3 class="blue lighter">Contact 1</h3>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="conname1" id="conname1" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="conphno1" id="conphno1" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Primary Email</label>
									<div class="controls">
									<select name="conem1" id="conem1" class="chzn-select" >
									<?php
									//$sqlnn=$con,"select distinct customer_id,customer_emailid FROM customers where is_school=1 and customer_emailid not in (select email1 from school)";
									$sqlnn=$con,"select distinct customer_id,customer_emailid FROM customers where customer_emailid not in (select email1 from school)";
									$rsnn=mysqli_query($sqlnn);
									while($rwnn=mysqli_fetch_assoc($rsnn)){?>
										<option value="<?php echo $rwnn['customer_emailid']; ?>"><?php echo "CID".$rwnn['customer_id']." - ".$rwnn['customer_emailid']; ?></option>
									<?php
									}
									?>
									</select>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Designation</label>
									<div class="controls">
								<input type="text" name="condesg1" id="condesg1" />
									</div>
									</div>
									<h3 class="blue lighter">Contact 2</h3>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="conname2" id="conname2" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="conphno2" id="conphno2" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="conem2" id="conem2" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Designation</label>
									<div class="controls">
								<input type="text" name="condesg2" id="condesg2" />
									</div>
									</div>
									
									<h3 class="blue lighter">Contact 3</h3>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="conname3" id="conname3" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="conphno3" id="conphno3" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="conem3" id="conem3" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Designation</label>
									<div class="controls">
								<input type="text" name="condesg3" id="condesg3" />
									</div>
									</div>
									</div>
									</div>
							
									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
							
								</form>
						
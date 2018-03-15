<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
		
		<script>
		var asInitVals = new Array();
	$(document).ready( function () {
		$("[id^='cd']").click(function(e) {
            var id=$(this).data('id');			
			$("#codes"+id).toggle();
			
        });
		
	  var oTable = $('#example').dataTable( {
	
	
        "oLanguage": {
            "sSearch": "Search all columns:"
        }
		
    } );
	$("tfoot input").keyup( function () {
        /* Filter on the column (the index) of this element */
        oTable.fnFilter( this.value, $("tfoot input").index(this) );
    } );
     
     
     
    /*
     * Support functions to provide a little bit of 'user friendlyness' to the textboxes in
     * the footer
     */
    $("tfoot input").each( function (i) {
        asInitVals[i] = this.value;
    } );
     
    $("tfoot input").focus( function () {
        if ( this.className == "search_init" )
        {
            this.className = "";
            this.value = "";
        }
    } );
     
    $("tfoot input").blur( function (i) {
        if ( this.value == "" )
        {
            this.className = "search_init";
            this.value = asInitVals[$("tfoot input").index(this)];
        }
    } );
	var oTableTools = new TableTools( oTable, {
		"buttons": [
			"copy",
			"csv",
			"xls",
			"pdf",
			{ "type": "print", "buttonText": "Print me!" }
		]
	} );
	
//	$('#demo').before( oTableTools.dom.container );
} );
</script>
	<script type="text/javascript">
			$(function() {
			$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
			})
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
							Promo Codes
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					<?php
							if(isset($msg1))
							{?>
							<div class='alert alert-block alert-success'>
							<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>
							<?php
								echo $msg1;?>
								</div>
								<?php
							}
							else
							{
								echo '';
							}
							
							?>
						<?php	if(isset($msg2))
							{?>
							<div class='alert alert-block alert-danger'>
							<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-remove red"></i>
							<?php
								echo $msg2;?>
								</div>
								<?php
							}
							else
							{
								echo '';
							}
							
							?>
					<button class="btn btn-mini btn-info" style="margin-top:26px;">
											<i class="icon-bolt"></i>
<a href="#modal-form" role="button" class="white" data-toggle="modal" style="color:white;">Generate Promo Codes</a>	
										
											<i class="icon-arrow-right  icon-on-right"></i>
										</button>
					<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
                                        <th class="center">												
											</th>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
                                                    
												</label>
											</th>
											<th>Title</th>											
											<th>Discount</th>
                                            <th># Codes</th>
											<th>Created On</th>										
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$q=mysqli_query($con,"select * from promos");
									while($res=mysqli_fetch_array($q))
									{
										$id=$res['id'];
									?>
									<tr>
                                    	<td><span id="cd" class="badge badge-primary " data-id="<?php echo $slno;?>"><i class="icon-plus"></i></span></td>
										<td><?php echo $slno;?>
                                        	
                                        </td>
										<td><?php echo $res['title'];?></td>
											
										<td><?php echo $res['discount_per'];?></td>
									
										<td><?php echo $res['code_count'];?></td>
										<td><?php echo date("d M Y",strtotime($res['created_on']));?></td>
									
												
									</tr>
                                    <tr id="codes<?php echo $slno;?>" style="display:none;">
                                    <td colspan="6">
                                    <?php $qn=mysqli_query($con,"select * from promo_codes where promo_id=$id");
									while($rs=mysqli_fetch_array($qn))
									{
										?>
                                    <p>
                                    	<span ><?php echo $rs['code'];?> </span>	
                                        <span class="label label-<?php if($rs['status']=='valid'){echo "success";} else{ echo "important"; } ?> ">									
										<?php echo $rs['status'];?></span>	
                                       </p> 
                                   
									<?php
									}?>
                                    </td>
                                   
                                     </tr>
                                     <?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
									<div id="modal-form" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Please Provide Details To Generate Promo-Codes </h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>promo_code/add" method="POST"  enctype="multipart/form-data">
							
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
									
									
									<div class="control-group">
									<label class="control-label" for="form-field-1">Title</label>

									<div class="controls">
										<input type="text" id="title"  name="title" placeholder="Title" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Discount Percentage</label>

									<div class="controls">
										<input type="text" id="disc"  name="disc" placeholder="Discount Percentage" />
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">No of Codes</label>

									<div class="controls">
										<input type="text" id="count"  name="count" placeholder="No of Codes" />
									</div>
								</div>
									
								
									
								
							
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit">
										<i class="icon-ok"></i>
										Generate
									</button>
								</div>
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
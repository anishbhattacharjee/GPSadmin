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

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php include 'include/adminheader.php';?>





<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
		

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
		select{
			  width: auto;
  max-width: 145px;
  margin: 0px !important;
  padding: 0px;
		}
		.chzn-container-single .chzn-single {
  background: none !important;
  border-radius: 0px !important;
  box-shadow: none;
}
#clr_fltr{
	cursor: pointer;
	  border: 1px solid #aaaaaa;
  padding: 2px;
   color: #FFF;
  background: #E8C440;
}
.chzn-container{
	width:100% !important;
}
.chzn-container span{
	font-size:13px;
}.chzn-container > a{
	  border-color: #D5D5D5;
}#modal_view span{
	font-size:13px;
}
.tb_ticket_view th{
	text-align: left;
}
div#v_atted *{
	margin: 5px;
	font-size:16px;
}td#v_att *{
	margin: 5px;
	font-size:16px;
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

							Tickets
							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>


				    <div class="row-fluid">

				    <div class="span12">

                    

<a href="#modal-form"  data-toggle="modal">
	<button class="btn btn-primary" onclick="document.getElementById('form_tkt_data').reset();">
											<i class="icon-tag bigger-125"></i>
											Open Ticket
										</button>  </a>
<div class="hr hr-18 dotted hr-double"></div>
					
							<div class="row-fluid">

								



								<table id="master_table" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>
											<th>SlNo</th>
											<th>Title</th>
											<th>Client</th>
											<th>Status</th>
											<th>Level</th>
											<th>Last Update</th>											
											<th></th>											
											
											
										</tr>

									</thead><tfoot>

										<tr>
											<th><span id="clr_fltr">Clear</span></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											
											
											
										</tr>

									</tfoot>

										

									



								<tbody>
<?php


$sql=$con,"select t.*,c.customer_first_name from support_tickets t join customers c on t.customer_id=c.customer_id order by t.ts desc"; 
$rs=mysqli_query($sql);
while($tkts=mysqli_fetch_assoc($rs)){



//echo $dev_stat;
?>								
								<tr>
									<td></td>
									<td><?php echo $tkts['title']; ?></td>
									<td><?php echo $tkts['customer_first_name']; ?></td>
									<td><?php echo $tkts['status']; ?></td>
									<td>Level <?php echo $tkts['level']; ?></td>
									<td><?php echo date("d-m-Y H:i:s",strtotime($tkts['ts'])); ?></td>
									<td class="td-actions ">
												<div class="hidden-phone visible-desktop action-buttons">
													<a class="blue dialog-button" href="#modal_view"   data-toggle="modal" data-id="<?php echo $tkts['id']; ?>">
														<i class="icon-zoom-in bigger-130"></i>
													</a>

													<a class="green edit-button" href="#modal-form"   data-toggle="modal" data-id="<?php echo $tkts['id']; ?>">
														<i class="icon-pencil bigger-130"></i>
													</a>

													<a class="red del_tkt" href="#" data-id="<?php echo $tkts['id']; ?>">
														<i class="icon-trash bigger-130"></i>
													</a>
												</div>

												<div class="hidden-desktop visible-phone">
													<div class="inline position-relative">
														<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
															<i class="icon-caret-down icon-only bigger-120"></i>
														</button>

														<ul class="dropdown-menu dropdown-icon-only dropdown-yellow pull-right dropdown-caret dropdown-close">
															<li>
																<a href="#modal_view" class="tooltip-info dialog-button" data-rel="tooltip" title="" data-original-title="View"   data-toggle="modal" data-id="<?php echo $tkts['id']; ?>">
																	<span class="blue">
																		<i class="icon-zoom-in bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#modal-form" class="tooltip-success edit-button" data-rel="tooltip" title="" data-original-title="Edit"   data-toggle="modal" data-id="<?php echo $tkts['id']; ?>">
																	<span class="green">
																		<i class="icon-edit bigger-120"></i>
																	</span>
																</a>
															</li>

															<li>
																<a href="#" class="tooltip-error del_tkt" data-rel="tooltip" title="" data-original-title="Delete"  data-id="<?php echo $tkts['id']; ?>">
																	<span class="red">
																		<i class="icon-trash bigger-120"></i>
																	</span>
																</a>
															</li>
														</ul>
													</div>
												</div>
											</td>
									
								</tr>
								
<?php } ?>								
								</tbody>

								</table>

							</div>	

								



					</div>

					</div>

<div id="modal-form" class="modal hide" tabindex="-1" style="width:auto;max-width:700px;">
			<div class="load_overlay_v" style="z-index: 1000;  border: none;  margin: 0px;  padding: 0px;  width: 100%;  height: 100%;  top: 0px;  left: 0px;  opacity: 0.1;  cursor: not-allowed;  position: absolute;  background-color: #000; display:none;"></div>
			<div class="loader_v" style="position: fixed;  z-index: 100;  top: 50%;  left: 49%; display:none;">
				<i class="icon-spinner icon-spin orange bigger-300"></i>
			</div>
<form id="form_tkt_data" enctype="multipart/form-data" onsubmit="submit.disabled = true; return true;">
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										<div id="act_title">Open New Ticket</div>
									</div>
								</div>

								<div class="modal-body ">
									<div class="row-fluid">
									
										
											
											<div class="control-group">
												<label class="control-label" for="form-field-1">Title</label>

												<div class="controls">
													<input type="text" id="title" name="title" placeholder="Title" style="width:98%;" />
													<div id="title_er"></div>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="form-field-1">Client</label>

												<div class="controls">
													<select id="client" name="client">
													<?php $sqlc=$con,"select customer_id, customer_first_name from customers";
													$rc=mysqli_query($sqlc);
													while($rwc=mysqli_fetch_assoc($rc)){?>
														<option value="<?php echo $rwc['customer_id']; ?>"><?php echo $rwc['customer_first_name']; ?></option>
													<?php } ?>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="status">Status</label>

												<div class="controls">
													<select id="status" name="status">
														<option value="Open">Open</option>
														<option value="Resolved">Resolved</option>
													</select>
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="level">Level</label>

												<div class="controls">
													<select id="level" name="level">
														<option value="1">Level 1</option>
														<option value="2">Level 2</option>
														<option value="3">Level 3</option>
														<option value="4">Level 4</option>	
													</select>
												</div>
											</div>
											<div class="control-group">
												<div class="wysiwyg-editor" id="editor1"></div>
											</div>
											<div class="control-group">
												<h3>Attachments</h3>
												<div id="v_atted"></div>
												
												<input type="file" id="file" name="files[]" multiple/>
											</div>
											<input  type="hidden" name="action" id="action" value=$con,"INSERT"/>
											<input  type="hidden" name="edit_id" id="edit_id" value=""/>
										

										
										
										
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small btn-danger pull-left" data-dismiss="modal" id="close_modal">
										<i class="icon-remove"></i>
										Close
									</button>
									<button class="btn btn-small btn-primary" id="submit_ticket" type="submit" name="submit">
										<i class="icon-ok"></i>
										Submit Ticket
									</button>

									
								</div>
								</form>
							</div>
<div id="modal_view" class="modal hide" tabindex="-1">
			<div class="load_overlay_v" style="z-index: 1000;  border: none;  margin: 0px;  padding: 0px;  width: 100%;  height: 100%;  top: 0px;  left: 0px;  opacity: 0.1;  cursor: not-allowed;  position: absolute;  background-color: #000; display:none;"></div>
			<div class="loader_v" style="position: fixed;  z-index: 100;  top: 35%;  left: 49%; display:none;">
				<i class="icon-spinner icon-spin orange bigger-300"></i>
			</div>
								<div class="modal-header no-padding">
									<div class="table-header">
										<button type="button" class="close" data-dismiss="modal">×</button>
										Ticket Details <i class="icon-double-angle-right"></i> Ticket <span id="v_id"></span>
									</div>
								</div>

								<div class="modal-body ">
									<div class="row-fluid">
										<table class="tb_ticket_view">
											<tr>
												<th>Title:</th>
												<td id="v_title"></td>
											</tr>
											<tr>
												<th>Client:</th>
												<td id="v_client"></td>
											</tr>
											<tr>
												<th>Status:</th>
												<td id="v_status"></td>
											</tr>
											<tr>
												<th>Status:</th>
												<td id="v_level"></td>
											</tr>
											<tr>
												<th>Description:</th>
												<td id="v_desc"></td>
											</tr>
											<tr>
												<th>Attachments:</th>
												<td id="v_att"></td>
											</tr>
										</table>
									
																				
										<!--<div><span class="titles">Title:</span><span id="v_title"></span></div><hr/>
										<div><span class="titles">Client:</span><span id="v_client"></span></div><hr/>
										<div><span class="titles">Status:</span><span id="v_status"></span></div><hr/>
										<div><span class="titles">Description:</span> <span id="v_desc"></span></div>-->
										
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small btn-danger pull-left" data-dismiss="modal" id="close_modal">
										<i class="icon-remove"></i>
										Close
									</button>	
								</div>
							</div>

					</div><!--/.page-content-->



			

			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>


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



		<script src="<?php echo base_url();?>assets/js/jquery-ui-1.10.3.custom.min.js"></script>


		<!--ace scripts-->

		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/markdown/markdown.min.js"></script>
		<script src="assets/js/markdown/bootstrap-markdown.min.js"></script>
		<script src="assets/js/jquery.hotkeys.min.js"></script>

		<script src="assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>
		


<!--<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>-->
<script src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
<!--<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.6/api/fnFilterClear.js"></script>-->
<script src="assets/js/chosen.jquery.min.js"></script>




		
		

<script>
function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	}

$(function(){

				$('#modal-form').on('shown', function () {				
					$(this).find('#client').chosen();
					$(this).find('#status').chosen();
				
				});
				/*
   				$('#modal-form input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Drop files here or click to choose',
					btn_change:null,
					no_icon:'icon-cloud-upload',
					droppable:true,
					thumbnail:'large'
				}).on('change', function(){
					console.log($(this).data('ace_input_files'));
					console.log($(this).data('ace_input_method'));
				});
				*/


				
				

var block=[1,7];
	
var t = $('#master_table').DataTable( {
				
					 initComplete: function () {
					 var indx=0;
            this.api().columns().every( function () {indx++;
			if(block.indexOf(indx)==-1){
			
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
					d=d.replace(/(<([^>]+)>)/ig,"");
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
			}
            } );
        }

				} );
				
				t.on( 'order.dt search.dt', function () {
			        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			            cell.innerHTML = i+1;
			        } );
			    } ).draw();
				
	
	$($con,"select").not("#client,#status").chosen(); 
	//$($con,"select").chosen(); 
	$('#clr_fltr').click(function(){
	    $('option').prop('selected', false);
    	$('select').trigger('liszt:updated');
		
	t.column().every( function () {
	this.search( '', true, false )
	.draw();
	});
  
	});
	
	
				
$('#editor1').ace_wysiwyg({
		toolbar:
		[
			'font',
			null,
			'fontSize',
			null,
			{name:'bold', className:'btn-info'},
			{name:'italic', className:'btn-info'},
			{name:'strikethrough', className:'btn-info'},
			{name:'underline', className:'btn-info'},
			null,
			{name:'insertunorderedlist', className:'btn-success'},
			{name:'insertorderedlist', className:'btn-success'},
			{name:'outdent', className:'btn-purple'},
			{name:'indent', className:'btn-purple'},
			null,
			{name:'justifyleft', className:'btn-primary'},
			{name:'justifycenter', className:'btn-primary'},
			{name:'justifyright', className:'btn-primary'},
			{name:'justifyfull', className:'btn-inverse'},
			null,
			{name:'createLink', className:'btn-pink'},
			{name:'unlink', className:'btn-pink'},
			null,
			{name:'insertImage', className:'btn-success'},
			null,
			'foreColor',
			null,
			{name:'undo', className:'btn-grey'},
			{name:'redo', className:'btn-grey'}
		],
		'wysiwyg': {
			fileUploadError: showErrorAlert
		}
	}).prev().addClass('wysiwyg-style2');
	
	
	//Add Image Resize Functionality to Chrome and Safari
	//webkit browsers don't have image resize functionality when content is editable
	//so let's add something using jQuery UI resizable
	//another option would be opening a dialog for user to enter dimensions.
	if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {
		
		var lastResizableImg = null;
		function destroyResizable() {
			if(lastResizableImg == null) return;
			lastResizableImg.resizable( "destroy" );
			lastResizableImg.removeData('resizable');
			lastResizableImg = null;
		}

		var enableImageResize = function() {
			$('.wysiwyg-editor')
			.on('mousedown', function(e) {
				var target = $(e.target);
				if( e.target instanceof HTMLImageElement ) {
					if( !target.data('resizable') ) {
						target.resizable({
							aspectRatio: e.target.width / e.target.height,
						});
						target.data('resizable', true);
						
						if( lastResizableImg != null ) {//disable previous resizable image
							lastResizableImg.resizable( "destroy" );
							lastResizableImg.removeData('resizable');
						}
						lastResizableImg = target;
					}
				}
			})
			.on('click', function(e) {
				if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
					destroyResizable();
				}
			})
			.on('keydown', function() {
				destroyResizable();
			});
	    }
		
		enableImageResize();

	}
	
	$("#form_tkt_data").submit(function(e){
	 	e.preventDefault();
	//$("#submit_ticket").click(function(){
		var msg=$("#editor1").html();
	/*	var title=$("#title").val();
		var client=$("#client").val();
		var status=$("#status").val();
		var level=$("#level").val();		
		var action=$("#action").val();
		var id=$("#edit_id").val();
		var file=$("#modal-form input[type=file]").val();*/
		//var postData=$("#form_tkt_data").serializeArray();
		var postData=new FormData( this );
		postData.append('msg', msg);
		
		//console.log(postData);
		//alert(postData);
		if(title==''){
			$("#title_er").html("<span style='color:red'>required</span>");
			return false;
		}else{
			$.ajax({
			  method: "POST",
			  url: "<?php echo base_url(); ?>ajaxfiles/support/ticket_open.php",
			 // data: { title: title, client: client, status: status, level: level, msg: msg, action:action, id:id, file:file }
			  data: postData, 
			  processData: false,
      		  contentType: false
			})
			  .done(function( msg ) {
			    if(msg=="success"){
					//$("#close_modal").click();
					window.location.reload();
				}else{
					alert(msg);
					window.location.reload();
				}
			  });
		}
	});

	$(".dialog-button").on("click", function(e) {
		$(".load_overlay_v").show();
		$(".loader_v").show();
	  var id = $(this).data("id");
	  $.ajax({
			  method: "POST",
			  url: "<?php echo base_url(); ?>ajaxfiles/support/ticket_view.php",
			  data: { id: id },
			  dataType:'json'
			})
			  .done(function( resp ) {
			  
			    $("#v_id").html(resp.ID);
			    $("#v_title").html(resp.Title);
			    $("#v_client").html(resp.Client);
			    $("#v_status").html(resp.Status);
			    $("#v_desc").html(resp.Message);
			    $("#v_level").html(resp.Level);
				$("#v_att").html('');
				$.each(resp.Attachments, function(idx, obj) {				
					$("#v_att").append('<div><i class="icon-file orange"></i>&nbsp;<a href="assets/support/'+obj.name+'" download>'+obj.name+'</a></div>');
				});
				
				$(".load_overlay_v").hide();
				$(".loader_v").hide();
			  });
	});
	$(".edit-button").on("click", function(e) {
		$(".load_overlay_v").show();
		$(".loader_v").show();
		 var id = $(this).data("id");
		 $("#act_title").html("Edit Ticket"+id);
		 $("#action").val("update");
		 $("#edit_id").val(id);
		 $.ajax({
			  method: "POST",
			  url: "<?php echo base_url(); ?>ajaxfiles/support/ticket_view.php",
			  data: { id: id },
			  dataType:'json'
			})
			  .done(function( resp ) {
			  
			    //$("#v_id").html(resp.ID);
			    $("#title").val(resp.Title);
			    $("#client").val(resp.ClientID);
			    $("#status").val(resp.Status);
			    $("#level").val(resp.Level);
			    $("#editor1").html(resp.Message);
				$("#v_atted").html('');
				$.each(resp.Attachments, function(idx, obj) {				
					$("#v_atted").append('<div id="att'+obj.id+'"><i class="icon-file orange"></i>&nbsp;<a href="assets/support/'+obj.name+'" download>'+obj.name+'</a><a href="#" class="red del_att" data-id="'+obj.id+'"><i class="icon-remove bigger-125"></i></a></div>');
				});
				
				$('#client').trigger("liszt:updated");
				$('#status').trigger("liszt:updated");
				$('#level').trigger("liszt:updated");
				$(".load_overlay_v").hide();
				$(".loader_v").hide();
			  });
			  
	});
	$(".del_tkt").on("click", function(e) {
		 var id = $(this).data("id");
		 if(confirm("Delete Ticket?")){
		 	$.ajax({
			  method: "POST",
			  url: "<?php echo base_url(); ?>ajaxfiles/support/ticket_delete.php",
			  data: { id: id }
			})
			  .done(function(msg) {
			  	if(msg=="success"){	
					window.location.reload();
				}else{
					alert(msg);
					window.location.reload();
				}
			  });
		 }else{
		 	return false;
		 }
	});
	$("#modal-form").delegate(".del_att","click",function(){
		 var id = $(this).data("id");
		 if(confirm("Delete Attachment?")){
		 	$.ajax({
			  method: "POST",
			  url: "<?php echo base_url(); ?>ajaxfiles/support/ticket_delete.php",
			  data: { id: id, action:"attachment" }
			})
			  .done(function(msg) {
			  	if(msg=="success"){	
					$("#att"+id).remove();
					//window.location.reload();
				}else{
					alert(msg);
					//window.location.reload();
				}
			  });
		 }else{
		 	return false;
		 }
	});
});
</script>

</body></html>


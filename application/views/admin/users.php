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
  <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
	<script type="text/javascript">
			$(function() {
			
				$("#userDAta").delegate("[id^=editUser]","click",function(e){
				
					 var myUserId = $(this).data('id');
					 //alert(myUserId);
					 $("#user_id").val( myUserId );
					 var name=$("#name"+myUserId).html();
					 $("#e_name").val( name );
					 var email=$("#email"+myUserId).html();
					 $("#e_email").val( email );
					 var pwd=$("#pwd"+myUserId).html();
					 $("#e_pwd").val( pwd );
					 var type=$("#type"+myUserId).html();
					 $("#e_type").val( type );
					 
				});
				
			 $("#editUserDet").validate({
							errorElement: 'div',
							// Specify the validation rules
							rules: {
								name: "required", 
								email_id: {
									required: true,
									email: true
								},
								password: {
									required: true,
									minlength: 5
								},
								u_type:"required", 
								
							},
							
							// Specify the validation error messages
							messages: {
								name: "required", 
								password: {
									required: "required",
									minlength: "Your password must be at least 5 characters long"
								},
								email_id: {
									required: "required",
									email: "Please enter a valid email address",
								},
								u_type:"required", 
								
							},
							
							submitHandler: function(form) {
								form.submit();
							}
				}); 
				 $("#addUserDet").validate({
							errorElement: 'div',
							// Specify the validation rules
							rules: {
								name: "required", 
								email_id: {
									required: true,
									email: true
								},
								password: {
									required: true,
									minlength: 5
								},
								u_type:"required", 
								
							},
							
							// Specify the validation error messages
							messages: {
								name: "required", 								
								password: {
									required: "required",
									minlength: "Your password must be at least 5 characters long"
								},
								email_id: {
									required: "required",
									email: "Please enter a valid email address",
								},
								u_type:"required", 
								
							},
							
							submitHandler: function(form) {
								form.submit();
							}
				}); 
				$("#a_email").blur(function(e) {
                    
					var mail=$(this).val();
					if(mail!=''){
					   $.ajax({

							   type: "GET",			
							   url: "<?php echo base_url();?>ajaxfiles/check_usermail_dup.php?mail="+mail,			
							   dataType: "html",
							   success:function(data) {
								   if(data=='exists'){
								   	$("#a_email").val('');
									alert("A user with same email id already exists!!!");
								   }
							   }
					  });
						
					}					
					
                });
				$("#e_email").blur(function(e) {
                    
					var mail=$(this).val();
					var id=$("#user_id").val();
					if(mail!=''){
					   $.ajax({

							   type: "GET",			
							   url: "<?php echo base_url();?>ajaxfiles/check_usermail_dup.php?mail="+mail+"&id="+id,			
							   dataType: "html",
							   success:function(data) {
								   if(data=='exists'){
								   	$("#e_email").val('');
									alert("A user with same email id already exists!!!");
								   }
							   }
					  });
						
					}					
					
                });
				
				
				
				

			
			})
			</script>
<style>
.error{
	color: red;
	margin-left:2px;
}
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
		#demo
		{
			margin-top: 61px;
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
							Users And Permissions
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
					<?php
							if(isset($msg) && $msg!='')
							{?>
							<div class='alert alert-block alert-success'>
							<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>
							<?php
								echo $msg;?>
								</div>
								<?php
							}
							else
							{
								echo '';
							}
							
							?>
						<?php	if(isset($msg2) && $msg2!='')
							{?>
							<div class='alert alert-block alert-danger'>
							<button type="button" class="close" data-dismiss="alert" >
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
						<button class="btn btn-info">
											<i class="icon-plus"></i>
 <a href="#add" role="button" class="white" data-toggle="modal" style="color:white;" id="addUser">Add User</a>
										
											
										</button>
					<div id="demo" style="background-color: #eff3f8;">
                    
<!--                    <a href="#add" role="button" class="btn btn-info" data-toggle="modal" id="addUser">Add User</a>
-->                    
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
											<th>Name</th>
											<th>Email ID</th>
                                            <th>Password</th>

											<th>User Role</th>											
											<th>Action</th>
										</tr>
									</thead>

									<tbody id="userDAta">
									<?php 
									$slno=1;
									$iid=array();								
									$q=mysqli_query($con,"select * from admin_data");
									while($res=mysqli_fetch_array($q))
									{	
									array_push($iid,$res['id']);
									?>
									<tr id="dataRw<?php echo $res['id'];?>">
									<td><?php echo $slno;?></td>
										
									
									
								<td id="name<?php echo $res['id'];?>"><?php echo $res['name'];?></td>
								<td id="email<?php echo $res['id'];?>"><?php echo $res['email_id'];?></td>
                                <td id="pwd<?php echo $res['id'];?>"><?php echo $res['password'];?></td>
                                <td id="type<?php echo $res['id'];?>"><?php echo $res['user_type'];?></td>
								
													<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#edit" role="button" class="btn  btn-minier" data-toggle="modal" data-id="<?php echo $res['id'];?>" id="editUser<?php echo $res['id'];?>">Edit</a></div></td>	
									</tr>
									<?php
									$slno++;
									}
								
									?>
									
									</tbody>
								</table>
								</div>
								
								<div id="edit" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Edit Users Permissions</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>users/edit" method="POST" id="editUserDet">
							
							
								<div class="modal-body overflow-visible">
                                <input type="hidden" name="id" id="user_id"  value=""/>
									<div class="row-fluid">
										
									<div class="control-group">
                                        <label class="control-label" for="form-field-1">Name</label>
    
                                        <div class="controls">
                                            <input type="text" id="e_name" name="name" value="" />
                                            
                                        </div>
									</div>	
                                    
                                    
									<div class="control-group">
                                        <label class="control-label" for="form-field-1">Email</label>
    
                                        <div class="controls">
                                            <input type="text" name="email_id" id="e_email" value="" />
                                            
                                        </div>
									</div>	
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">Password</label>
    
                                        <div class="controls">
                                            <input type="text" name="password" id="e_pwd" value="" />
                                            
                                        </div>
									</div>
											
                                            
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">User Role</label>
    
                                        <div class="controls">
                                            <select name="u_type" id="e_type">
                                                <option>Select Role</option>
                                                <option value="admin">Admin</option>	
                                                <option value="dealer">Dealer</option>	
                                                <option value="marketing">Marketing</option>	
                                            	<option value="inventory">Inventory</option>
                                            	<option value="support">Support</option>
                                            	<option value="approver">Approver</option>
                                            	<option value="accounts">Accounts</option>
                                            	<option value="subadmin">Subadmin</option>
                                            	<option value="operations">Operations</option>
                                            	<option value="Product Manager">Product Manager</option>
                                            	<option value="COO">COO</option>
                                            	<option value="CFO">CFO</option>
                                                
                                            </select>
                                            
                                        </div>
									</div>
                                    
                                    
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit" name="submit" value="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>





								<div id="add" class="modal hide" tabindex="-1">
								<div class="modal-header" style="background: #045e9f;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="white bigger">Add Users</h4>
								</div>
	<form class="form-horizontal" action="<?php echo base_url();?>users/add" method="POST" id="addUserDet">
							
							
								<div class="modal-body overflow-visible">                                
									<div class="row-fluid">
										
									<div class="control-group">
                                        <label class="control-label" for="form-field-1">Name</label>
    
                                        <div class="controls">
                                            <input type="text" name="name" value="" />
                                            
                                        </div>
									</div>	
                                    
                                    
									<div class="control-group">
                                        <label class="control-label" for="form-field-1">Email</label>
    
                                        <div class="controls">
                                            <input type="text" name="email_id" value="" id="a_email" />
                                            
                                        </div>
									</div>	
								
									
                                    
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">Password</label>
    
                                        <div class="controls">
                                            <input type="text" name="password" value="" />
                                            
                                        </div>
									</div>
											
                                            
                                    <div class="control-group">
                                        <label class="control-label" for="form-field-1">User Role</label>
    
                                        <div class="controls">
                                            <select name="u_type" id="u_type">
                                                <option>Select Role</option>
                                                <option value="admin">Admin</option>	
                                                <option value="dealer">Dealer</option>	
                                                <option value="marketing">Marketing</option>	
                                            	<option value="inventory">Inventory</option>
													<option value="support">Support</option>
                                            	<option value="approver">Approver</option>
                                            	<option value="accounts">Accounts</option>
                                            	<option value="subadmin">Subadmin</option>
                                            	<option value="operations">Operations</option>
												<option value="Product Manager">Product Manager</option>
                                            	<option value="COO">COO</option>
                                            	<option value="CFO">CFO</option>                                                
                                            </select>
                                            
                                        </div>
									</div>
                                    
                                    
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="submit" name="submit" value="submit">
										<i class="icon-ok"></i>
										Submit
									</button>
								</div>
								</form>
							</div>





</div>
</div>
</div>
</div>

</div>

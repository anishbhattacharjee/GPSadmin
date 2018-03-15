<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/sidebar2.php';?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!--wizard scripts-->

	
<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

<script src="<?php echo base_url();?>assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/additional-methods.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/ace-elements.min.js"></script>

		<!--end of wizard scripts-->
				<!--table with date picker scripts-->
	

		
					<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />

		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>
			
<script type="text/javascript">
			$(function() {
			$('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
			})
			</script>
						<script type="text/javascript">

function numbersonly(e){

var unicode=e.charCode? e.charCode : e.keyCode

if (unicode!=8){ //if the key isn't the backspace key (which we should allow)

if (unicode<48||unicode>57)



return false //if not a number

//disable key press

}

}

</script>

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
						<form class="form-search" />
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off" />
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							Customer Registration
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div><!--/.page-header-->

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
							<!--PAGE CONTENT BEGINS-->
<div id="costdiv">

</div>
							<div class="row-fluid">
								<div class="span12">
									<div class="widget-box">
										<div class="widget-header widget-header-blue widget-header-flat">
											<h4 class="lighter"></h4>

											<div class="widget-toolbar">
												<label>
													<small class="green">
														<b></b>
													</small>

													
													<span class="lbl"></span>
												</label>
											</div>
										</div>
					

										<div class="widget-body">
											<div class="widget-main">
												<div class="row-fluid">
													<div id="fuelux-wizard" class="row-fluid hide" data-target="#step-container">
														<ul class="wizard-steps">
															<li data-target="#step1" class="active">
																<span class="step">1</span>
																<span class="title">Personal Info</span>
															</li>

															<li data-target="#step2">
																<span class="step">2</span>
																<span class="title">Document Info</span>
															</li>

															<li data-target="#step3">
																<span class="step">3</span>
																<span class="title">Service Info</span>
															</li>

															<li data-target="#step4">
																<span class="step">4</span>
																<span class="title">Payment Info</span>
															</li>
														</ul>
													</div>

													<hr />
													
													<div class="step-content row-fluid position-relative" id="step-container">
													<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/add" method="POST" >
													<?php
$id=$_GET['id'];
$uid=$_GET['uid'];
$q=mysqli_query($con,"select * from customers where customer_id='$id'");
									while($res=mysqli_fetch_array($q))
									{
									$id=$res['customer_id'];
									$type=$res['type'];
									}
?>
														<div class="step-pane active" id="step1">
															<h3 class="lighter block green"></h3>
															
						<div class="control-group">
									<label class="control-label" for="form-input-readonly">Type</label>

									<div class="controls">
									<div class="span12">
										<input type="radio" id="ctype" name="type" value="<?php echo $type;?>" onclick="showpersonal();">
										<label class="lbl" for="id-disable-check"> Individual</label>
										&nbsp; &nbsp;
										<input type="radio" id="ctype" name="type" value="<?php echo $type;?>" onclick="showcompany();">
										<label class="lbl" for="id-disable-check" >Company</label>
									</div>
									</div>
								</div>
								
								<div id="perdiv" style="display:none;">
								
					<div class="control-group">
									<label class="control-label" for="form-field-1">First Name</label>
									<div class="controls">
								<input type="text" name="firstname" id="firstname" />
									</div>
									</div>	
					<div class="control-group">
									<label class="control-label" for="form-field-1">Middle Name</label>
									<div class="controls">
								<input type="text" name="middlename" id="middlename" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Last Name</label>
									<div class="controls">
								<input type="text" name="lastname" id="lastname" />
									</div>
									</div>
								<div class="control-group">
									<label class="control-label" for="form-input-readonly">Sex</label>

									<div class="controls">
										<input type="radio" id="gender" name="sex" value="male">
										<label class="lbl" for="id-disable-check"> Male</label>
										&nbsp; &nbsp;
										<input type="radio" id="gender" name="sex" value="female">
										<label class="lbl" for="id-disable-check" >Female</label>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">D O B</label>

									<div class="controls">
								<div class="row-fluid input-append">
															<input class="span3 offset date-picker" id="dob" type="text" data-date-format="yyyy-mm-dd" name="dob" />
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
														</div>
														</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Permanent Address</label>
									<div class="controls">
								<textarea name="paddr" id="paddr"></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Temporary Address</label>
									<div class="controls">
								<textarea name="tmpaddr" id="tmpaddr"></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="email" id="email" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="phno" id="phno" maxlength="10" onkeypress="return numbersonly(event)"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Telephone</label>
									<div class="controls">
								<input type="text" name="tphno" id="tphno" onkeypress="return numbersonly(event)"/>
									</div>
									</div>

</div>
<div id="compdiv" style="display:none;">
<div class="control-group">
									<label class="control-label" for="form-field-1">Company Name</label>
									<div class="controls">
								<input type="text" name="compname" id="compname" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Address</label>
									<div class="controls">
								<textarea name="cmpaddr" id="cmpaddr"></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Telephone</label>
									<div class="controls">
					<input type="text" name="ctphno" id="ctphno" onkeypress="return numbersonly(event)"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="cemail" id="cemail" />
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Website</label>
									<div class="controls">
								<input type="text" name="website" id="website" />
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
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="conem1" id="conem1" />
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
</div>
								
														</div>

														<div class="step-pane" id="step2">
															<div class="row-fluid">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Proof</label>
									<div class="controls">
									<select name="proof" id="proof" >
									<option>Select Proof</option>
									<option value="Address Proof">Address Proof</option>
									<option value="ID Proof">ID Proof</option>
									</select>
									
									</div>								
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Description</label>
									<div class="controls">		
									<textarea name="descp" id="descp"></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Upload</label>
									<div class="controls">	
						  <input type="file" name="file" id="file"/>
									</div>
									</div>
															
															</div>
														</div>

														<div class="step-pane" id="step3">
															<div class="row-fluid">
																<div class="control-group">
									<label class="control-label" for="form-field-1">Category Type</label>
									<div class="controls">
									<select name="category_id" id="category_id" onchange="getdevicetype();">
									<option>Select Cateory</option>
									<?php
									$sq=mysqli_query($con,"select * from gps_categories");
									while($sqs=mysqli_fetch_array($sq))
									{
										?>
									<option value="<?php echo $sqs['category_id'];?>" ><?php echo $sqs['category_type'];?></option>	
										<?php
									}
									?>
									
									</select>
									</div>
									</div>
									<div id="device">
									</div>
			<div id="cost" >
										
									</div>
									
									    
								
									
												</div>			
														</div>

														<div class="step-pane" id="step4">
															<div class="row-fluid">
															<div class="control-group">
									<label class="control-label" for="form-input-readonly"></label>

									<div class="controls">
										<input type="radio" id="paymenttype" name="paymenttype" value="Cash" onclick="showcash();">
										<label class="lbl" for="id-disable-check"> Cash</label>
										&nbsp; &nbsp;
										<input type="radio" id="paymenttype" name="paymenttype" value="Cheque" onclick="showcheque();">
										<label class="lbl" for="id-disable-check" >Cheque</label>
										&nbsp; &nbsp;
										<input type="radio" id="paymenttype" name="paymenttype" value="Online" onclick="showonline();">
										<label class="lbl" for="id-disable-check" >Online</label>
									</div>
								</div>
								
								<div id="cashdiv" style="display:none;">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Amount</label>
									<div class="controls">	
						  <input type="text" name="amount" id="amount" />
									</div>
									</div>
								</div>
									<div id="chequediv" style="display:none;">
								<div class="control-group">
									<label class="control-label" for="form-field-1">Cheque No</label>
									<div class="controls">	
						  <input type="text" name="chequeno" id="chequeno" />
									</div>
									</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">Bank Name</label>
									<div class="controls">	
						  <input type="text" name="bankname" id="bankname" />
									</div>
									</div>
								</div>
									<div id="onlinediv" style="display:none;">
								
								</div>
													
															</div>
														</div>
</form>		
													</div>

													<hr />
													<div class="row-fluid wizard-actions">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Prev
														</button>

														<button class="btn btn-success btn-next" data-last="Finish " type="submit">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
														
													</div>
												</div>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			
			</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<script type="text/javascript">
			$(function() {
			
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','150px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				}).on('finished', function(e) {
					
	ctype=document.getElementById('ctype').value;
	firstname=document.getElementById('firstname').value;
	middlename=document.getElementById('middlename').value;
	lastname=document.getElementById('lastname').value;
	gender=document.getElementById('gender').value;
	dob=document.getElementById('dob').value;
	paddr=document.getElementById('paddr').value;
	tmpaddr=document.getElementById('tmpaddr').value;
	email=document.getElementById('email').value;
	phno=document.getElementById('phno').value;
	tphno=document.getElementById('tphno').value;
	
	compname=document.getElementById('compname').value;
	cmpaddr=document.getElementById('cmpaddr').value;
	ctphno=document.getElementById('ctphno').value;
	cemail=document.getElementById('cemail').value;
	website=document.getElementById('website').value;
	conname1=document.getElementById('conname1').value;
	conphno1=document.getElementById('conphno1').value;
	conem1=document.getElementById('conem1').value;
	condesg1=document.getElementById('condesg1').value;
	conname2=document.getElementById('conname2').value;
	conphno2=document.getElementById('conphno2').value;
	conem2=document.getElementById('conem2').value;
	condesg2=document.getElementById('condesg2').value;
	
	proof=document.getElementById('proof').value;
	descp=document.getElementById('descp').value;
	file=document.getElementById('file').value;
	
	category_id=document.getElementById('category_id').value;
	noofdevice=document.getElementById('noofdevice').value;
	device_type=document.getElementById('device_type').value;
	mnthval=document.getElementById('mnthval').value;
	finalcost=document.getElementById('finalcost').value;
	
	paymenttype=document.getElementById('paymenttype').value;
	amount=document.getElementById('amount').value;
	chequeno=document.getElementById('chequeno').value;
	bankname=document.getElementById('bankname').value;
	
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
abc=xmlhttp.responseText;
window.top.location.href="<?php echo base_url();?>customer_registration/index/?msg="+abc;
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/customerdata.php?ctype="+ctype+"&firstname="+firstname+"&middlename="+middlename+"&lastname="+lastname+"&gender="+gender+"&dob="+dob+"&paddr="+paddr+"&tmpaddr="+tmpaddr+"&email="+email+"&phno="+phno+"&tphno="+tphno+"&compname="+compname+"&cmpaddr="+cmpaddr+"&ctphno="+ctphno+"&cemail="+cemail+"&website="+website+"&conname1="+conname1+"&conphno1="+conphno1+"&conem1="+conem1+"&condesg1="+condesg1+"&conname2="+conname2+"&conphno2="+conphno2+"&conem2="+conem2+"&condesg2="+condesg2+"&proof="+proof+"&descp="+descp+"&file="+file+"&category_id="+category_id+"&device_type="+device_type+"&mnthval="+mnthval+"&finalcost="+finalcost+"&paymenttype="+paymenttype+"&amount="+amount+"&chequeno="+chequeno+"&bankname="+bankname+"&noofdevice="+noofdevice,true);

xmlhttp.send();
otbox.dialog("Thank you! Your information was successfully saved!", [{
						"label" : "OK",
						"class" : "btn-small btn-primary",
						}]
					);
				}).on('stepclick', function(e){
					//return false;//prevent clicking on steps
				});
			
			
				$('#validation-form').hide();
				$('#skip-validation').removeAttr('checked').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').show();
					}
					else {
						$('#validation-form').hide();
						$('#sample-form').show();
					}
				});
			
			
			
				//documentation : http://docs.jquery.com/Plugins/Validation/validate
			
			
				$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'span',
					errorClass: 'help-inline',
					focusInvalid: false,
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: 'required',
						agree: 'required'
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-error', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.control-group').removeClass('info').addClass('error');
					},
			
					success: function (e) {
						$(e).closest('.control-group').removeClass('error').addClass('info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('.controls');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*=$con,"select2-container"]:eq(0)'));
						}
						else if(element.is('.chzn-select')) {
							error.insertAfter(element.siblings('[class*="chzn-container"]:eq(0)'));
						}
						else error.insertAfter(element);
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
				
				
				$('#modal-wizard .modal-header').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
			})
		</script>
		
		<script>
		function showpersonal()
		{
			document.getElementById('perdiv').style.display='block';
			document.getElementById('compdiv').style.display='none';
			
		}
		function showcompany()
		{
			document.getElementById('compdiv').style.display='block';
			document.getElementById('perdiv').style.display='none';
			
		}
		function showcash()
		{
			document.getElementById('cashdiv').style.display='block';
			document.getElementById('chequediv').style.display='none';
			document.getElementById('onlinediv').style.display='none';
		}
		function showcheque()
		{
			document.getElementById('chequediv').style.display='block';
			document.getElementById('cashdiv').style.display='none';
			document.getElementById('onlinediv').style.display='none';
		}
		function showonline()
		{
			document.getElementById('onlinediv').style.display='block';
			document.getElementById('cashdiv').style.display='none';
			document.getElementById('chequediv').style.display='none';
		}
		
		</script>

<script>	

function getdevicetype()
{
catid=document.getElementById('category_id').value;
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("device").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getdevicetype.php?c="+catid,true);

xmlhttp.send();

}
function getcost()
{
	devid=document.getElementById('device_type').value;
var xmlhttp;    
if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
xmlhttp=new XMLHttpRequest();
}
else

{// code for IE6, IE5

xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");

}

xmlhttp.onreadystatechange=function()

{

if (xmlhttp.readyState==4 && xmlhttp.status==200)

{
document.getElementById("cost").innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getcost.php?c="+devid,true);

xmlhttp.send();
}
</script>
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script type="text/javascript">
$dif=jQuery.noConflict();  
function updateTextArea() {   
   
     var allVals = [];
      
     $dif('#c_b :checked').each(function() {

	
	       allVals.push(parseInt($(this).val()));
		  
		  
     });
var answerValue = 0; 

    for(i=0; i < allVals.length; i++) 
    { 
        answerValue += Number(allVals[i]);
    } 
alert(answerValue)
     $dif('#costvalue').val(answerValue)
	
  }
 $dif(function() {
   $dif('#c_b input').click(updateTextArea);
     updateTextArea();
 
 });	 
</script>-->
<script>
function getmnth1(str)
{
	

	document.getElementById('mnthval').value=document.getElementById('1month').id;
	document.getElementById('finalcost').value=str;
}
function getmnth3(str)
{
document.getElementById('mnthval').value=document.getElementById('3month').id;
	document.getElementById('finalcost').value=str;
}
function getmnth6(str)
{
	document.getElementById('mnthval').value=document.getElementById('6month').id;
	document.getElementById('finalcost').value=str;
}
function getmnth12(str)
{
	document.getElementById('mnthval').value=document.getElementById('12month').id;
	document.getElementById('finalcost').value=str;
}

</script>

</body></html>
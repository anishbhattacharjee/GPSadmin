<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/sidebar2.php';?>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
		<!--wizard scripts-->

	
<script src="<?php echo base_url();?>media/js/jquery.js"></script>
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

						<form class="form-search" >

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

											<h4 class="lighter">Please Fill The Following Details</h4>



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

															<div class="control-group">

									<label class="control-label" for="form-input-readonly"></label>



									<div class="controls">

									<div class="span12">

									<div style="float: left;margin-left: 400px;">

										<input type="radio" id="usertype" name="type" value="New User" onclick="shownew();">

										<label class="lbl" for="id-disable-check"> New User</label>

										&nbsp; &nbsp;

										<input type="radio" id="usertype" name="type" value="Existing User" onclick="showexist();">

										<label class="lbl" for="id-disable-check" >Existing User</label>

									</div>

									</div>

									</div>

								</div>

						<div id="newdiv" style="display:none;">

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



														<!--	<li data-target="#step3">

																<span class="step">3</span>

																<span class="title">Service Info</span>

															</li>



															<li data-target="#step4">

																<span class="step">4</span>

																<span class="title">Payment Info</span>

															</li>
-->
														</ul>

													</div>



													<hr />

												

													<div class="step-content row-fluid position-relative" id="step-container">

													<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/add" method="POST" >

				

								

														<div class="step-pane active" id="step1">

															<h3 class="lighter block green"></h3>

																					

						<div class="control-group">

									<label class="control-label" for="form-input-readonly">Type</label>



									<div class="controls">

									<div class="span12">

										<input type="radio" id="ctype" name="type" value="individual" onclick="showpersonal();">

										<label class="lbl" for="id-disable-check"> Individual</label>

										&nbsp; &nbsp;

										<input type="radio" id="ctypes" name="type" value="company" onclick="showcompany();">

										<label class="lbl" for="id-disable-check" >Company</label>

									</div>

									</div>

								</div>

								<?php 

		$id=random_string('alnum',5);

		$uid='CID_'.$id;

		

					?>

					<input type="hidden" name="uid" id="uid" value="<?php echo $uid;?>"/>

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

										<input type="radio" id="genders" name="sex" value="female">

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

									<label class="control-label" for="form-field-1">Enter Number of Documents You Want to Upload</label>

									<div class="controls">
					
															
						<input type="text" name="bnr" id="bnr"  style="width:150px;" onkeyup="getburows(this.value);" onkeypress="return numbersonly(event)" autocomplete="off"/>
						</div>
						</div>
	
<div id="burows">

</div>

															

															</div>

														</div>

<style>

fieldsett label

{

	float: left;

width: 160px;

padding-top: 5px;

text-align: right;

padding: 0px 14px 0px 0px;

}

fieldsett span

{

cursor: pointer;



}

.remove

{

	margin-left: 400px;	

}

</style>

														<div class="step-pane" id="step3">

															<div class="row-fluid">
															
																  <input type="file" name="file" id="file" />
															
<div style="width:960px;overflow-x:scroll;"> 

   <div style="width:1500px;">
									<table>
								<tr><th style="margin-left: 5px;float: left;">Category Type</th><th style="margin-left: 78px;float: left;">Device Type</th><th style="margin-left: 89px;float: left;">Subscription</th><th style="margin-left: 29px;float: left;">Sub Cost</th><th style="margin-left: 54px;float: left;">Dev Cost</th><th style="margin-left: 43px;float: left;">Installation Cost</th><th style="margin-left: 15px;float: left;">Qty</th><th style="margin-left: 32px;float: left;">Total</th><th style="margin-left: 86px;float: left;">S Tax</th><th style="margin-left: 35px;float: left;">Vat</th><th style="margin-left: 32px;float: left;">Grand Total</th></tr>
									</table>							

										<fieldsett>

      <div id="IPOX">

            <p style="border-bottom: 1px solid #000;line-height: 4em;">					

																

								<select name="category_id" id="category_id" onchange="getdevicetype(this,this.value);getinstcost(this,this.value);" class="cat" style="width:150px;">

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

				<select name="device_type" id="device_type" onchange="getmodel(this,this.value);getdevicecost(this,this.value);" class="dev" style="width:150px;">

									

									

									</select>

									

									<select name="subscp" id="subscp" class="subscp" onchange="choosesubscription(this,this.value);" style="width: 155px;">

									

									

									</select>

									
								<input type="text" name="a" id="a"  class="costmonth" style="width:100px;" readonly=""/>	
								<input type="text" name="a" id="a"  class="devcost" style="width:100px;" readonly=""/>	
								<input type="text" name="a" id="a"  class="instcharge" style="width:100px;" readonly=""/>	

			<input type="text" name="noofdevice" id="noofdevice" onkeypress="return numbersonly(event)" style="width:50px;" class="noofdevice" onchange="gettotal(this);getgrandtotal();" value="0"/>
			<?php
			$ts=mysqli_query($con,"select * from settings");

										while($rts=mysqli_fetch_array($ts))

										{

											$vat=$rts['vat_percentage'];

											$tax=$rts['service_tax_percentage'];

										}?>
							
	
							
								<input type="text" name="ba" id="ba"  class="totcost" value="0" style="width: 101px;" readonly=""/>	
								<input type="text" name="ba" id="ba"  class="servicetax" value="<?php echo $tax;?>" style="width:50px" readonly=""/>
	
		<input type="text" name="ba" id="ba"  class="vat" value="<?php echo $vat;?>" style="width:50px" readonly=""/>

								<input type="text" name="ba" id="ba"  class="grandtotal" value="0" style="width: 101px;" readonly=""/>

								<input type="hidden" name="ab" id="ab"  class="sercharge" value="0"/>	
								<input type="hidden" name="ab" id="ab"  class="vatcharge" value="0"/>	

						  </p>

        </div>

        <p><span class="add">Add another row</span>



        </p>

    </fieldsett>		
															</div>		
															</div>		

								

			 <div class="control-group">



			<label class="control-label">Final Costing</label>



				<div class="controls"> 

<input type="text" name="finalcost" id="finalcost" value="0" onclick="getgrandtotal();"/>



</div>

</div>

									

									    <div class="control-group">

									<label class="control-label" for="form-field-1">Created By</label>

									<div class="controls">

									<?php

					 $un=$this->session->userdata('username'); 

				

				$q=mysqli_query($con,"select * from admin_data where email_id='$un'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['name'];

							

							} ?>

									<input type="text" name="created_by" id="created_by" value="<?php echo $first;?>" readonly="true"/>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Created Date Time</label>

									<div class="controls">

									<input type="text" name="created_dt" id="created_dt" value="<?php echo date('Y-m-d H:i:s');?>" readonly="true"/>

									</div>

									</div>

								

									

												</div>			

														</div>



														<div class="step-pane" id="step4">

															<div class="row-fluid">
															<div class="control-group">

									<label class="control-label" for="form-field-1">Amount To Be Pay</label>

									<div class="controls">	

						  <input type="text" name="amount" id="amount" readonly=""/>

									</div>

									</div>


									<div class="control-group">

									<label class="control-label" for="form-input-readonly"></label>



									<div class="controls">

									<div class="span12">

										<input type="radio" id="adv" name="type" value="advance" >

										<label class="lbl" for="id-disable-check"> Advance</label>

										&nbsp; &nbsp;

										<input type="radio" id="ful" name="type" value="fullpayment" >

										<label class="lbl" for="id-disable-check" >Full Payment</label>

									</div>

									</div>

								</div>

															

															<div class="control-group">

									<label class="control-label" for="form-input-readonly"></label>



									<div class="controls">

										<input type="checkbox" id="cashtype" name="paymenttype" value="Cash" onclick="showcash();">

										<label class="lbl" for="id-disable-check"> Cash</label>

										&nbsp; &nbsp;

										<input type="checkbox" id="chequetype" name="paymenttype" value="Cheque" onclick="showcash();">

										<label class="lbl" for="id-disable-check" >Cheque</label>

										&nbsp; &nbsp;

										<input type="checkbox" id="onlinetype" name="paymenttype" value="Online" onclick="showcash();">

										<label class="lbl" for="id-disable-check" >Online</label>

									</div>

								</div>

								

								<div id="cashdiv" style="display:none;">

								
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





								<div id="existdiv" style="display:none;float: left;margin-left: 400px;">				

										<div class="control-group">

									<label class="control-label" for="form-field-1">Customer UID</label>

									<div class="controls">

								<input type="text" name="euid" id="euid" />

									</div>

									</div>	

									<button class="btn btn-success"  type="button" onclick="getexistdata();">

															Submit

															<i class="icon-arrow-right icon-on-right"></i>

														</button>		

											</div><!--/widget-main-->

											</div><!--/widget-main-->

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

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<script>

$dd=jQuery.noConflict();

$dd(window).load(function () {

    $dd(function () {

        var defaults = {

            'usercomm': ''

        };



        // separating set and remove

        // note that you could add "defaults" as an arg if you had different

        // defaults for different fieldsets

        var setDefaults = function (inputElements) {

            $dd(inputElements).each(function () {

                var d = defaults[this.name];

                if (d) {

                    // set with jQuery

                    // we don't need the data - just check on the class

                    $dd(this).val(d)

                        .addClass('default_value');

                }

            });

        };



        var removeDefaults = function (inputElements) {

            $dd(inputElements).each(function () {

                if ($dd(this).hasClass('default_value')) {

                    $dd(this).val('')

                        .removeClass('default_value');

                }

            });

        };



        setDefaults(jQuery('form[name=builder] input'));



        $dd("span.add").click(function () {

            // get the correct fieldset based on the current element

            var $fieldset = $dd(this).closest('fieldset');

            var $inputset = $dd('p', $fieldset)

                .first()

                .clone()

                .insertBefore($dd('p', $fieldset).last());

            // add a remove button

            $inputset.append('<span class="remove">Remove</span>');

            setDefaults($dd('input', $inputset));

            // return false; (only needed if this is a link)

        });



        // use delegate here to avoid adding new 

        // handlers for new elements

        $dd('fieldset').delegate("span.remove", {

            'click': function () {

                $dd(this).parent().remove();

            }

        });



        // Toggles 

        $dd('form[name=builder]').delegate('input', {

            'focus': function () {

                removeDefaults($(this));

            },

                'blur': function () {

                // switch to using .val() for consistency

                if (!$(this).val()) setDefaults(this);

            }

        });

    });



});







</script>



<script>

$dd=jQuery.noConflict();

$dd(window).load(function () {

    $dd(function () {

        var defaults = {

            'usercomm': ''

        };



        // separating set and remove

        // note that you could add "defaults" as an arg if you had different

        // defaults for different fieldsets

        var setDefaults = function (inputElements) {

            $dd(inputElements).each(function () {

                var d = defaults[this.name];

                if (d) {

                    // set with jQuery

                    // we don't need the data - just check on the class

                    $dd(this).val(d)

                        .addClass('default_value');

                }

            });

        };



        var removeDefaults = function (inputElements) {

            $dd(inputElements).each(function () {

                if ($dd(this).hasClass('default_value')) {

                    $dd(this).val('')

                        .removeClass('default_value');

                }

            });

        };



        setDefaults(jQuery('form[name=builder] input'));



        $dd("span.add").click(function () {

            // get the correct fieldset based on the current element

            var $fieldset = $dd(this).closest('fieldsett');

            var $inputset = $dd('p', $fieldset)

                .first()

                .clone()

                .insertBefore($dd('p', $fieldset).last());

            // add a remove button

            $inputset.append('<span class="remove">Remove</span>');

            setDefaults($dd('input', $inputset));

            // return false; (only needed if this is a link)

        });



        // use delegate here to avoid adding new 

        // handlers for new elements

        $dd('fieldsett').delegate("span.remove", {

            'click': function () {

                $dd(this).parent().remove();

            }

        });



        // Toggles 

        $dd('form[name=builder]').delegate('input', {

            'focus': function () {

                removeDefaults($(this));

            },

                'blur': function () {

                // switch to using .val() for consistency

                if (!$(this).val()) setDefaults(this);

            }

        });

    });



});







</script>

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

				

				

				  

	if(document.getElementById('ctype').checked==true)

	{

		ctype=document.getElementById('ctype').value;

	}

	if(document.getElementById('ctypes').checked==true)

	{

		ctype=document.getElementById('ctypes').value;

	}

	



	firstname=document.getElementById('firstname').value;

	middlename=document.getElementById('middlename').value;

	lastname=document.getElementById('lastname').value;

		if(document.getElementById('gender').checked==true)

	{

		gender=document.getElementById('gender').value;

	}

	if(document.getElementById('genders').checked==true)

	{

		gender=document.getElementById('genders').value;

	}



	

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

	proof=Array();

	descp=Array();

	file=Array();

	cat=Array();

	dev=Array();



	noofdevice=Array();

	costmonth=Array();
	subscp=Array();
	devcost=Array();
	instcharge=Array();
	totcost=Array();
	grandtotal=Array();
	sercharge=Array();
	vatcharge=Array();

	
	 $('fieldsett p').each(function () {

        if ($(this).find('.add').length > 0) return;

		cat.push($(this).find('.cat').val());

		dev.push($(this).find('.dev').val());
		subscp.push($(this).find('.subscp').val());
		costmonth.push($(this).find('.costmonth').val());
		devcost.push($(this).find('.devcost').val());
		instcharge.push($(this).find('.instcharge').val());
		noofdevice.push($(this).find('.noofdevice').val());
		totcost.push($(this).find('.totcost').val());
		grandtotal.push($(this).find('.grandtotal').val());
		sercharge.push($(this).find('.sercharge').val());
		vatcharge.push($(this).find('.vatcharge').val());
	});
	//alert(subscp);
	finalcost=document.getElementById('finalcost').value;
	adv=document.getElementById('adv').value;

	ful=document.getElementById('ful').value;

	

	

	cashtype=document.getElementById('cashtype').checked ? document.getElementById('cashtype').value : '';

	chequetype=document.getElementById('chequetype').checked ? document.getElementById('chequetype').value : '';

	onlinetype=document.getElementById('onlinetype').checked ? document.getElementById('onlinetype').value : '';

	

	

	

	amount=document.getElementById('amount').value;

	chequeno=document.getElementById('chequeno').value;

	bankname=document.getElementById('bankname').value;

	

	created_by=document.getElementById('created_by').value;

	created_dt=document.getElementById('created_dt').value;

	uid=document.getElementById('uid').value;

	

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

//abc="Customer Registration Done Successfully";

//window.top.location.href="<?php echo base_url();?>customer_registration/index/?msg="+abc;
alert(xmlhttp.responseText);

}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/imageupload.php",true);
//xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/customerdata.php?ctype="+ctype+"&firstname="+firstname+"&middlename="+middlename+"&lastname="+lastname+"&gender="+gender+"&dob="+dob+"&paddr="+paddr+"&tmpaddr="+tmpaddr+"&email="+email+"&phno="+phno+"&tphno="+tphno+"&compname="+compname+"&cmpaddr="+cmpaddr+"&ctphno="+ctphno+"&cemail="+cemail+"&website="+website+"&conname1="+conname1+"&conphno1="+conphno1+"&conem1="+conem1+"&condesg1="+condesg1+"&conname2="+conname2+"&conphno2="+conphno2+"&conem2="+conem2+"&condesg2="+condesg2+"&category_id="+cat+"&device_type="+dev+"&subscp="+subscp+"&costmonth="+costmonth+"&devcost="+devcost+"&instcharge="+instcharge+"&noofdevice="+noofdevice+"&totcost="+totcost+"&grandtotal="+grandtotal+"&finalcost="+finalcost+"&sercharge="+sercharge+"&vatcharge="+vatcharge+"&adv="+adv+"&ful="+ful+"&cashtype="+cashtype+"&chequetype="+chequetype+"&onlinetype="+onlinetype+"&amount="+amount+"&chequeno="+chequeno+"&bankname="+bankname+"&noofdevice="+noofdevice+"&created_by="+created_by+"&created_dt="+created_dt+"&uid="+uid,true);



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

		function gettotal(str)

{

qty=parseInt(str.value);



subcst=parseInt($(str).prevAll('input').prevAll('input').prevAll('input:first').val());
devcst=parseInt($(str).prevAll('input').prevAll('input:first').val());
intcst=parseInt($(str).prevAll('input:first').val());
stax=parseInt($(str).nextAll('input').nextAll('input:first').val());
vtax=parseInt($(str).nextAll('input').nextAll('input').nextAll('input:first').val());

servicetax=(subcst*qty)*(stax/100);

vat=(devcst*qty)*(vtax/100);

total=(devcst+subcst+intcst)*(qty);

gandtotal=total+servicetax+vat;

parseInt($(str).nextAll('input:first').val(total));
parseInt($(str).nextAll('input').nextAll('input').nextAll('input').nextAll('input:first').val(gandtotal));
parseInt($(str).nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input:first').val(servicetax));
parseInt($(str).nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input:first').val(vat));

}



function getgrandtotal()

{



var selectVal='';


grandtotal=Array();



	$('fieldsett p').each(function () {



        if ($(this).find('.add').length > 0) return;

		grandtotal.push($(this).find('.grandtotal').val());
		
		     } 	);



	 un=Array();



	un=grandtotal;



	var answerValue = 0; 



    for(i=0; i < un.length; i++) 



    { 



    answerValue += Number(un[i]);



    } 



	document.getElementById('finalcost').value=answerValue;
	document.getElementById('amount').value=answerValue;







}

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

		function shownew()

		{

			document.getElementById('newdiv').style.display='block';

			document.getElementById('existdiv').style.display='none';

			

		}

		function showexist()

		{

			document.getElementById('existdiv').style.display='block';

			document.getElementById('newdiv').style.display='none';

			

		}

		function showcash()

		{

		a=document.getElementById('cashtype').checked;

		b=document.getElementById('chequetype').checked;

		c=document.getElementById('onlinetype').checked;

		

		if (a||b)

		{

			document.getElementById('onlinetype').disabled =true;

			if(a)

			{

			

			document.getElementById('cashdiv').style.display='block';

			//document.getElementById('chequediv').style.display='none';

			}

			if(b)

			{	

				document.getElementById('chequediv').style.display='block';

			}

		}

		else if(c)

		{	

			document.getElementById('cashdiv').style.display='none';

			document.getElementById('chequediv').style.display='none';

			document.getElementById('onlinediv').style.display='block';

		}

		if(!a && !b){

			document.getElementById('onlinetype').disabled =false;

			

		}

		if(!a || !b)

		{

			if(!a)

			{

			

			document.getElementById('cashdiv').style.display='none';

			//document.getElementById('chequediv').style.display='none';

			}

			if(!b)

			{	

		

				document.getElementById('chequediv').style.display='none';

			}

		}

		

		}

		

	/*	function showcheque()

		{

		if (document.getElementById('chequetype').checked) {

		

			document.getElementById('chequediv').style.display='block';

			document.getElementById('onlinetype').disabled =true;

		}

		else

		{

			document.getElementById('chequediv').style.display='none';

			document.getElementById('onlinetype').disabled =false;

		}

			//document.getElementById('cashdiv').style.display='none';

			document.getElementById('onlinediv').style.display='none';

		}

		function showonline()

		{

			document.getElementById('onlinediv').style.display='block';

			document.getElementById('cashdiv').style.display='none';

			document.getElementById('chequediv').style.display='none';

		}

		*/

		</script>



<script>	



function getdevicetype(f,str)

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



f.nextElementSibling.innerHTML=xmlhttp.responseText;



}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getdevicetype.php?c="+str,true);



xmlhttp.send();



}



function getmodel(f,str)

{


       var element = $(f).find('option:selected'); 
        var catid = element.attr("id"); 
		
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

f.nextElementSibling.innerHTML=xmlhttp.responseText;



}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodel.php?c="+str+"&catid="+catid,true);



xmlhttp.send();

}



function getdevicecost(f,str)

{


       var element = $(f).find('option:selected'); 
        var catid = element.attr("id"); 
	
		
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

f.nextElementSibling.nextElementSibling.nextElementSibling.value=xmlhttp.responseText;



}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getdevicecost.php?c="+str+"&catid="+catid,true);



xmlhttp.send();

}


function getinstcost(f,str)

{


     
		
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

f.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.nextElementSibling.value=xmlhttp.responseText;



}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getinstcost.php?catid="+str,true);



xmlhttp.send();

}


function choosesubscription(f,str)

	{

   var element = $(f).find('option:selected'); 
        var catid = element.attr("id"); 

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


f.nextElementSibling.value=xmlhttp.responseText;




}

}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/choosesubscription.php?c="+catid+"&d="+str,true);



xmlhttp.send();



}



</script>


<script>

function getexistdata()

{



euid=document.getElementById('euid').value;

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



if(xmlhttp.responseText=='exist')

{

abc="welcome";

uid=euid;

window.top.location.href="<?php echo base_url();?>customer_registration/add/?msg="+abc+"&uid="+uid;

}

else

{

abc=xmlhttp.responseText;

window.top.location.href="<?php echo base_url();?>customer_registration/index/?msg="+abc;

}

}}

xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getexistdata.php?c="+euid,true);



xmlhttp.send();





}

</script>

	

<script>

function getburows(str)

{





var xmlhttp;    

if (str=="")

{

document.getElementById("txtHint").innerHTML="";

return;

}

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



document.getElementById("burows").innerHTML=xmlhttp.responseText;

}



}



xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getburows.php?c="+str,true);

xmlhttp.send();

}
</script>



</body></html>
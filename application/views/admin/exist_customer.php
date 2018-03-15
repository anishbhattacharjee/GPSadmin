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
							<?php	$qs=mysqli_query($con,"select * from customers where customer_emailid='$uid'");
			while($res=mysqli_fetch_array($qs))
			{
				$cid=$res['customer_id'];
				$cuid=$res['customer_uid'];
				$name=$res['customer_first_name'];
				$mname=$res['customer_middle_name'];
				$lname=$res['customer_last_name'];
				$sex=$res['sex'];
				$dob=$res['dob'];
				$phone_no=$res['customer_phone_no'];
				$telno=$res['tel_phone_no'];
				$emailid=$res['customer_emailid'];
				$address=$res['address'];
				$tmp_address=$res['temp_address'];
				$type=$res['type'];
				//$proof=$res['cust_proof'];
				//$proof_descptn=$res['proof_descptn'];
				$comp_name=$res['comp_name'];
				$comp_addr=$res['comp_addr'];
				$comp_teleph=$res['comp_teleph'];
				$comp_email=$res['comp_email'];
				$website=$res['website'];
				$comp_contname1=$res['comp_contname1'];
				$comp_contph1=$res['comp_contph1'];
				$comp_contemail1=$res['comp_contemail1'];
				$comp_contdesgn1=$res['comp_contdesgn1'];
				$comp_contname2=$res['comp_contname2'];
				$comp_contph2=$res['comp_contph2'];
				$comp_contemail2=$res['comp_contemail2'];
				$comp_contdesgn2=$res['comp_contdesgn2'];
				$state=$res['state'];
				$city=$res['city'];
				$pin_code=$res['pin_code'];
				$fromm=$res['fromm'];
				$school=$res['is_school'];
				$school_login=$res['is_sublogin'];
				$dealers_customer=$res['dealers_customer'];
				
			}?>
							<div class='alert alert-block alert-success'>
							<button type="button" class="close" data-dismiss="alert">
									<i class="icon-remove"></i>
								</button>

								<i class="icon-ok green"></i>
							<?php
								echo $msg1." ".$name;?>
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
					<?php
					$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$ltype=$user['user_type'];
	$first=$user['name']; ?>

										<div class="widget-body">
											<div class="widget-main">
									
												<div class="row-fluid">
								
										
													<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/enter_order_details/<?php echo urlencode($emailid); ?>/<?php echo $cid; ?>" method="POST" >
															
													
														<div class="step-pane active" id="step1">
															<h3 class="lighter block green"></h3>
																					
						<div class="control-group">
									<label class="control-label" for="form-input-readonly">Type</label>

									<div class="controls">
									<div class="span12">
				
										<input type="radio" <?php if($type=='individual') echo "checked";?> id="ctype" name="type" value="individual" onclick="showpersonal();" disabled>
										<label class="lbl" for="id-disable-check"> Individual</label>
										&nbsp; &nbsp;
										<input type="radio"  <?php if($type=='company') echo "checked";?> id="ctypes" name="type" value="company" onclick="showcompany();" disabled>
										<label class="lbl" for="id-disable-check" >Organisation</label>
										
										&nbsp; &nbsp;
										<input type="radio"  <?php if($type=='dealer') echo "checked";?> id="ctypes" name="type" value="dealer"  disabled>
										<label class="lbl" for="id-disable-check" >Dealer</label>
									<!--	&nbsp; &nbsp;
										<input type="radio"  <?php if($type=='marketting') echo "checked";?> id="ctypes" name="type" value="marketting"  disabled>
										<label class="lbl" for="id-disable-check" >Marketting</label>-->
									
									</div>
									</div>
								</div>
								
					<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>"/>
					<input type="hidden" name="email" id="email" value="<?php echo $uid;?>"/>
					<input type="hidden" name="uid" id="uid" value="<?php echo $cuid;?>"/>
					
					<?php
					if($type=='individual')
					{
						?>
								<div id="perdiv" >
								<div class="control-group">

									<label class="control-label" for="form-field-1">From</label>

									<div class="controls">
									<select name="dealer_id" id="dealer_id">
								<option>Choose Dealer</option>
								<?php $dq=mysqli_query($con,"select * from dealers");
								while($rdq=mysqli_fetch_array($dq))
								{
									?>
								<option  value="<?php echo $rdq['dealer_id']; ?>"  <?php echo $fromm==$rdq['dealer_id']?'selected=$con,"selected"':'' ?>><?php echo $rdq['dealer_name']; ?></option>									
									<?php
								} ?>						
									</select>
								

</div>
</div>	
								
					<div class="control-group">
									<label class="control-label" for="form-field-1">First Name</label>
									<div class="controls">
					
								
								<input type="text" name="firstname" id="firstname" value="<?php echo $name;?>"/>
									</div>
									</div>	
					<div class="control-group">
									<label class="control-label" for="form-field-1">Middle Name</label>
									<div class="controls">
								<input type="text" name="middlename" id="middlename" value="<?php echo $mname;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Last Name</label>
									<div class="controls">
								<input type="text" name="lastname" id="lastname" value="<?php echo $lname;?>"/>
									</div>
									</div>
								<div class="control-group">
									<label class="control-label" for="form-input-readonly">Gender</label>

									<div class="controls">
										<input type="radio" id="gender" name="sex" value="male" <?php if($sex=='male') echo "checked";?>>
										<label class="lbl" for="id-disable-check"> Male</label>
										&nbsp; &nbsp;
										<input type="radio" id="genders" name="sex" value="female" <?php if($sex=='female') echo "checked";?>>
										<label class="lbl" for="id-disable-check" >Female</label>
									</div>
								</div>

								<div class="control-group">
									<label class="control-label" for="form-field-1">D O B</label>

									<div class="controls">
								<div class="row-fluid input-append">
															<input class="span3 offset date-picker" id="dob" type="text" data-date-format="dd-mm-yyyy" name="dob" value="<?php echo date('d-m-Y',strtotime($dob));?>"/>
															<span class="add-on">
																<i class="icon-calendar"></i>
															</span>
														</div>
														</div>
														</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Permanent Address</label>
									<div class="controls">
								<textarea name="paddr" id="paddr"><?php echo $address;?></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Temporary Address</label>
									<div class="controls">
								<textarea name="tmpaddr" id="tmpaddr"><?php echo $tmp_address;?></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="email" id="email" value="<?php echo $emailid;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Mobile Number</label>
									<div class="controls">
								<input type="text" name="phno" id="phno" maxlength="10" onkeypress="return numbersonly(event)" value="<?php echo $phone_no;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="tphno" id="tphno" onkeypress="return numbersonly(event)" value="<?php echo $telno;?>"/>
									</div>
									</div>
									
	<div class="control-group">

									<label class="control-label" for="form-field-1">State</label>

									<div class="controls">
									<select name="state" id="state" onchange="getcity(this.value);" style="pointer-events: none; cursor: default;" readonly>

									<option>Select State</option>

									<option value="Karnataka">Karnataka</option>
									<option value="Karnataka" <?php echo $state=='Karnataka'?'selected=$con,"selected"':'' ?>><?php echo "Karnataka";?></option>
									<option value="Andhra Pradesh" <?php echo $state=='Andhra Pradesh'?'selected=$con,"selected"':'' ?>><?php echo "Andhra Pradesh";?></option>
									<option value="Maharashtra" <?php echo $state=='Maharashtra'?'selected=$con,"selected"':'' ?>><?php echo "Maharashtra";?></option>
									<option value="Delhi" <?php echo $state=='Delhi'?'selected=$con,"selected"':'' ?>><?php echo "Delhi";?></option>
									<option value="Kerala" <?php echo $state=='Kerala'?'selected=$con,"selected"':'' ?>><?php echo "Kerala";?></option>
									</select>
									</div>
									</div>
									
									<div class="control-group">

									<label class="control-label" for="form-field-1">City</label>

									<div class="controls">

								<input type="text" class="span4" name="city" id="city" readonly value="<?php echo $city;?>"/>

									</div>

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">Pincode</label>

									<div class="controls">

								<input type="text" class="span4" name="pincode" id="pincode"  value="<?php echo $pin_code;?>" readonly/>

									</div>

									</div>
									

</div>
<input type="hidden" name="compname" id="compname" />
	<textarea name="cmpaddr" id="cmpaddr" style="display:none"></textarea>
	<input type="hidden" name="ctphno" id="ctphno" onkeypress="return numbersonly(event)"/>
		<input type="hidden" name="cemail" id="cemail" />
								<input type="hidden" name="website" id="website" />
	<input type="hidden" name="conname1" id="conname1" />
		<input type="hidden" name="conphno1" id="conphno1" />
		<input type="hidden" name="conem1" id="conem1" />
			<input type="hidden" name="condesg1" id="condesg1" />
			<input type="hidden" name="conname2" id="conname2" />
				<input type="hidden" name="conphno2" id="conphno2" />
				<input type="hidden" name="conem2" id="conem2" />
				<input type="hidden" name="condesg2" id="condesg2" />
<?php }
else
{
 ?>
<div id="compdiv" >
<input type="hidden" name="firstname" id="firstname" />
	<input type="hidden" name="middlename" id="middlename" />
	<input type="hidden" name="lastname" id="lastname" />
	<input type="radio" id="gender" name="sex" value="male" style="display:none">
	<input type="radio" id="genders" name="sex" value="female" style="display:none">
	<input  id="dob" type="hidden"  name="dob" />
	<textarea name="paddr" id="paddr" style="display:none"></textarea>
		<textarea name="tmpaddr" id="tmpaddr" style="display:none"></textarea>
		<input type="hidden" name="email" id="email" />
		<input type="hidden" name="phno" id="phno"  />
		<input type="hidden" name="tphno" id="tphno" />
		<div class="control-group">

									<label class="control-label" for="form-field-1">From</label>

									<div class="controls">
									<select name="dealer_id" id="dealer_idd">
								<option>Choose Dealer</option>
								<?php $dq=mysqli_query($con,"select * from dealers");
								while($rdq=mysqli_fetch_array($dq))
								{
									?>
								<option  value="<?php echo $rdq['dealer_id']; ?>"  <?php echo $fromm==$rdq['dealer_id']?'selected=$con,"selected"':'' ?>><?php echo $rdq['dealer_name']; ?></option>									
									<?php
								} ?>						
									</select>
								

</div>
</div>	
		
		
		
<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="compname" id="compname" value="<?php echo $comp_name;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Address</label>
									<div class="controls">
								<textarea name="cmpaddr" id="cmpaddr"><?php echo $comp_addr;?></textarea>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Telephone</label>
									<div class="controls">
					<input type="text" name="ctphno" id="ctphno" onkeypress="return numbersonly(event)" value="<?php echo $comp_teleph;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="cemail" id="cemail" value="<?php echo $comp_email;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Website</label>
									<div class="controls">
								<input type="text" name="website" id="website" value="<?php echo $website;?>"/>
									</div>
									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">State</label>

									<div class="controls">
									<select name="state" id="state" onchange="getcity(this.value);" style="pointer-events: none; cursor: default;" readonly>

									<option>Select State</option>

									<option value="Karnataka">Karnataka</option>
									<option value="Karnataka" <?php echo $state=='Karnataka'?'selected=$con,"selected"':'' ?>><?php echo "Karnataka";?></option>
									<option value="Andhra Pradesh" <?php echo $state=='Andhra Pradesh'?'selected=$con,"selected"':'' ?>><?php echo "Andhra Pradesh";?></option>
									<option value="Maharashtra" <?php echo $state=='Maharashtra'?'selected=$con,"selected"':'' ?>><?php echo "Maharashtra";?></option>
									<option value="Delhi" <?php echo $state=='Delhi'?'selected=$con,"selected"':'' ?>><?php echo "Delhi";?></option>
									<option value="Kerala" <?php echo $state=='Kerala'?'selected=$con,"selected"':'' ?>><?php echo "Kerala";?></option>
									</select>
									</div>
									</div>
									
									<div class="control-group">

									<label class="control-label" for="form-field-1">City</label>

									<div class="controls">

								<input type="text" class="span4" name="city" id="city" readonly value="<?php echo $city;?>"/>

									</div>

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">Pincode</label>

									<div class="controls">

								<input type="text" class="span4" name="pincode" id="pincode"  value="<?php echo $pin_code;?>" readonly/>

									</div>

									</div>
									<h3 class="blue lighter">Contact 1</h3>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="conname1" id="conname1" value="<?php echo $comp_contname1;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="conphno1" id="conphno1" value="<?php echo $comp_contph1;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="conem1" id="conem1" value="<?php echo $comp_contemail1;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Designation</label>
									<div class="controls">
								<input type="text" name="condesg1" id="condesg1" value="<?php echo $comp_contdesgn1;?>"/>
									</div>
									</div>
									<h3 class="blue lighter">Contact 2</h3>
									<div class="hr hr-18 hr-double dotted"></div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Name</label>
									<div class="controls">
								<input type="text" name="conname2" id="conname2" value="<?php echo $comp_contname2;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Phone Number</label>
									<div class="controls">
								<input type="text" name="conphno2" id="conphno2" value="<?php echo $comp_contph2;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Email</label>
									<div class="controls">
								<input type="email" name="conem2" id="conem2" value="<?php echo $comp_contemail2;?>"/>
									</div>
									</div>
									<div class="control-group">
									<label class="control-label" for="form-field-1">Designation</label>
									<div class="controls">
								<input type="text" name="condesg2" id="condesg2" value="<?php echo $comp_contdesgn1;?>"/>
									</div>
									</div>
									
									
									
</div>

<?php } ?>


<div class="control-group">

									<label class="control-label" for="form-input-readonly">ETA</label>



									<div class="controls">

										<input type="checkbox" id="school" name="school" value="1" <?php if($school=='1') echo "checked";?>>

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>
								<div class="control-group">

									<label class="control-label" for="form-input-readonly">School/Institute</label>



									<div class="controls">

										<input type="checkbox" id="school_login" name="school_login" value="1" <?php if($school_login=='1') echo "checked";?>>

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>
								
										<div class="control-group">

									<label class="control-label" for="form-input-readonly">Dealer's Customer</label>



									<div class="controls">

										<input type="checkbox" id="dealers_customer" name="dealers_customer" value="1" <?php if($dealers_customer=='1') echo "checked";?>>

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>
								
														</div>
<div class="control-group">
									<label class="control-label" for="form-field-1"></label>
									<div class="controls">
									<input type="submit" class="btn btn-success" value="NEXT"/>		
									</div>		
									</div>		
												
</form>		
													</div>

													
													
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
	mdl=Array();
	noofdevice=Array();
	monthone=Array();
	monththree=Array();
	monthsix=Array();
	monthtwelve=Array();
	yeartwo=Array();
	costmonth=Array();
	  $('fieldset p').each(function () {
        if ($(this).find('.add').length > 0) return;
		proof.push($(this).find('.col1').val());
		descp.push($(this).find('.col2').val());
		file.push($(this).find('.col3').val());
		
    });
	 $('fieldsett p').each(function () {
        if ($(this).find('.add').length > 0) return;
		cat.push($(this).find('.cat').val());
		dev.push($(this).find('.dev').val());
		mdl.push($(this).find('.mdl').val());
		noofdevice.push($(this).find('.noofdevice').val());

		monthone.push($(this).find('.monthone:checked').val());
		monththree.push($(this).find('.monththree:checked').val());
		monthsix.push($(this).find('.monthsix:checked').val());
		monthtwelve.push($(this).find('.monthtwelve:checked').val());
		yeartwo.push($(this).find('.yeartwo:checked').val());
		costmonth.push($(this).find('.costmonth').val());

		});
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
abc="Customer Registration Done Successfully";
window.top.location.href="<?php echo base_url();?>customer_registration/index/?msg="+abc;
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/customerdata.php?ctype="+ctype+"&firstname="+firstname+"&middlename="+middlename+"&lastname="+lastname+"&gender="+gender+"&dob="+dob+"&paddr="+paddr+"&tmpaddr="+tmpaddr+"&email="+email+"&phno="+phno+"&tphno="+tphno+"&compname="+compname+"&cmpaddr="+cmpaddr+"&ctphno="+ctphno+"&cemail="+cemail+"&website="+website+"&conname1="+conname1+"&conphno1="+conphno1+"&conem1="+conem1+"&condesg1="+condesg1+"&conname2="+conname2+"&conphno2="+conphno2+"&conem2="+conem2+"&condesg2="+condesg2+"&proof="+proof+"&descp="+descp+"&file="+file+"&category_id="+cat+"&device_type="+dev+"&mdl="+mdl+"&monthone="+monthone+"&monththree="+monththree+"&monthsix="+monthsix+"&monthtwelve="+monthtwelve+"&yeartwo="+yeartwo+"&each_cost="+costmonth+"&finalcost="+finalcost+"&adv="+adv+"&ful="+ful+"&cashtype="+cashtype+"&chequetype="+chequetype+"&onlinetype="+onlinetype+"&amount="+amount+"&chequeno="+chequeno+"&bankname="+bankname+"&noofdevice="+noofdevice+"&created_by="+created_by+"&created_dt="+created_dt+"&uid="+uid,true);

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
		
	function getdevcnt(str)
{
nd=parseInt(str.value);

cst=parseInt($(str).nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input:first').val());
tot=parseInt(nd*cst);
parseInt($(str).nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input').nextAll('input:first').val(tot));
/*tot=parseInt(nd*cst);

abc=parseInt(document.getElementById('finalcost').value);
alert(abc)
document.getElementById('finalcost').value=abc+tot;*/

}

function getcostcnt(str)
{
	cst=parseInt(str.value);

nd=parseInt($(str).prevAll('input').prevAll('input').prevAll('input').prevAll('input').prevAll('input').prevAll('input:first').val());
tot=parseInt(nd*cst);
parseInt($(str).nextAll('input:first').val(tot));
/*tot=parseInt(nd*cst);
alert(tot);
abc=parseInt(document.getElementById('finalcost').value);
document.getElementById('finalcost').value=abc+tot;*/
}

function caltotal()
{

var selectVal='';

qty=Array();

	$('fieldsett p').each(function () {

        if ($(this).find('.add').length > 0) return;

       		

		qty.push($(this).find('.divcost').val());

		     } 	);

	 un=Array();

	un=qty;

	var answerValue = 0; 

    for(i=0; i < un.length; i++) 

    { 

    answerValue += Number(un[i]);

    } 

	document.getElementById('finalcost').value=answerValue;



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
f.nextElementSibling.innerHTML=xmlhttp.responseText;

}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodel.php?c="+str,true);

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
window.top.location.href="<?php echo base_url();?>customer_registration/add/?msg="+abc;
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

</body></html>
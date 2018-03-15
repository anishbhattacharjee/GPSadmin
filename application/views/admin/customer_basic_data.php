<?php include 'dbcon.php'; ?>                                	
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

     global $con; 

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

							<div class='alert alert-block alert-danger'>

							<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



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
	<?php

							if(isset($msg2))

							{?>

							<div class='alert alert-block alert-success'>

							<button type="button" class="close" data-dismiss="alert">

									<i class="icon-remove"></i>

								</button>



								<i class="icon-ok green"></i>

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
	$adid=$user['id'];
	$first=$user['name'];
 
/*function has_permission($type, $req){
		
$s_per=$con,"select
id
FROM
user_permissions
WHERE user_type='".$type."' and permission='$req'";
						$r_per=mysqli_query($s_per);
						$permission=mysqli_fetch_assoc($r_per);	
						if($permission['id'] && $permission['id'] > 0)
						{
							$result= true;
						}
						else{
							$result= false;
						}
						return $result;
						
}
*/
?>


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

	<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/customer_save_data" method="POST" enctype="multipart/form-data">

				


						<div class="control-group">

									<label class="control-label" for="form-input-readonly">Type</label>



									<div class="controls">

									<div class="span12">
                                    
                           

										<input type="radio" id="ctype" name="type" value="individual" onclick="showpersonal();" >

										<label class="lbl" for="id-disable-check"> Individual</label>
									
                                    
										&nbsp; &nbsp;

										<input type="radio" id="ctypes" name="type" value="company" onclick="showcompany();">

										<label class="lbl" for="id-disable-check" >Organisation</label>
											&nbsp; &nbsp;
										
										<input type="radio" id="ctypess" name="type" value="dealer" onclick="showcompany();"   >

										<label class="lbl" for="id-disable-check" >Dealer</label>
								
									</div>

									</div>

								</div>

								<?php 

		$id=random_string('alnum',5);

		$uid='1'.$id;

		$abcq=mysqli_query($con,"select last_insert_id(customer_id) as id FROM `customers` order by customer_id desc limit 1");
		$rsabcq=mysqli_fetch_array($abcq);
$ids=$rsabcq['id']+1;
					?>

					<input type="hidden" name="uid" id="uid" value="<?php echo 'CID_'.$ids;?>"/>
					

								<div id="perdiv" style="display:none;">

						<div class="control-group">

									<label class="control-label" for="form-field-1">From</label>

									<div class="controls">
									<select name="dealer_idd" id="dealer_id">
								<option>Choose Dealer</option>
								<?php $dq=mysqli_query($con,"select * from dealers");
								while($rdq=mysqli_fetch_array($dq))
								{
									?>
								<option  value="<?php echo $rdq['dealer_id']; ?>"><?php echo $rdq['dealer_name']; ?></option>									
									<?php
								} ?>						
									</select>
								

</div>
</div>		

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

									<label class="control-label" for="form-input-readonly">Gender</label>



									<div class="controls">

										<input type="radio" id="gender" name="sex" value="male">

										<label class="lbl" for="id-disable-check"> Male</label>

										&nbsp; &nbsp;

										<input type="radio" id="genders" name="sex" value="female">

										<label class="lbl" for="id-disable-check" >Female</label>

									</div>

								</div>



								<!--<div class="control-group">

									<label class="control-label" for="form-field-1">D O B</label>



									<div class="controls">

								<div class="row-fluid input-append">-->

															<!--<input class="span3 offset date-picker" id="dob" type="text" data-date-format="dd-mm-yyyy" name="dob" placeholder="dd-mm-yyyy"/>-->
															<input id="dob" type="hidden"  name="dob" />

															<!--<span class="add-on">

																<i class="icon-calendar"></i>

															</span>

														</div>

														</div>

														</div>-->

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
	<input type="text" name="errordiv" id="errordiv" style="display:none;"/>

								<input type="email" name="email" id="email"  onchange="valemail();"/> <p id="erdiv" style="margin-left: 231px;margin-top: -40px;width: 200px;"></p>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Mobile Number</label>

									<div class="controls">

								<input type="text" name="phno" id="phno" maxlength="10" onkeypress="return numbersonly(event)"/>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Phone Number</label>

									<div class="controls">

								<input type="text" name="tphno" id="tphno" onkeypress="return numbersonly(event)"/>

									</div>

									</div>
										<div class="control-group">

									<label class="control-label" for="form-field-1">State</label>

									<div class="controls">
									<select name="statee" id="state" onchange="getcity(this.value);">

									<option>Select State</option>

									<option value="Karnataka">Karnataka</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Delhi">Delhi</option>
									<option value="Kerala">Kerala</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Tamilnadu">Tamilnadu</option>
									<option value="Odisha">Odisha</option>

									</select>
									</div>
									</div>
									
									<div class="control-group" id="citydiv">

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">Pincode</label>

									<div class="controls">

								<input type="text" class="span4" name="pincodee" id="pincode"  onchange="postcode_validate(this.value);" onkeypress="return numbersonly(event)" maxlength="6"/>

									</div>

									</div>



</div>

<div id="compdiv" style="display:none;">


<div class="control-group">

									<label class="control-label" for="form-field-1">From</label>

									<div class="controls">
									<select name="dealer_id" id="dealer_idd">
								<option>Choose Dealer</option>
								<?php $dq=mysqli_query($con,"select * from dealers");
								while($rdq=mysqli_fetch_array($dq))
								{
									?>
								<option  value="<?php echo $rdq['dealer_id']; ?>"><?php echo $rdq['dealer_name']; ?></option>									
									<?php
								} ?>						
									</select>
								

</div>
</div>

<div class="control-group">

									<label class="control-label" for="form-field-1">Name</label>

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
	<input type="text" name="cerrordiv" id="cerrordiv" style="display:none;"/>
								<input type="email" name="cemail" id="cemail" onchange="valcompemail();"/> <p id="cerdiv" style="margin-left: 231px;margin-top: -40px;width: 200px;"></p>

									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Website</label>

									<div class="controls">

								<input type="text" name="website" id="website" />

									</div>

									</div>
<div class="control-group">

									<label class="control-label" for="form-field-1">State</label>

									<div class="controls">
									<select name="state" id="statee" onchange="getcityy(this.value);">

									<option>Select State</option>

									<option value="Karnataka">Karnataka</option>
									<option value="Andhra Pradesh">Andhra Pradesh</option>
									<option value="Maharashtra">Maharashtra</option>
									<option value="Delhi">Delhi</option>
									<option value="Kerala">Kerala</option>
									<option value="Punjab">Punjab</option>
									<option value="Rajasthan">Rajasthan</option>
									<option value="Tamilnadu">Tamilnadu</option>
									<option value="Odisha">Odisha</option>

									</select>
									</div>
									</div>
									
									<div class="control-group" id="citydivv">

									</div>
									<div class="control-group">

									<label class="control-label" for="form-field-1">Pincode</label>

									<div class="controls">

								<input type="text" class="span4" name="pincode" id="pincodee"  onchange="postcode_validatee(this.value);" onkeypress="return numbersonly(event)" maxlength="6"/>

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

								

													



															
															
	<!--										<div class="control-group">

									<label class="control-label" for="form-field-1">Enter Number of Documents You Want to Upload</label>

									<div class="controls">
					
															
						<input type="text" name="bnr" id="bnr"  style="width:150px;" onkeyup="getburows(this.value);" onkeypress="return numbersonly(event)" autocomplete="off"/>
						</div>
						</div>
	
<div id="burows">

</div>-->

<div class="control-group">

									<label class="control-label" for="form-field-1">Created By</label>

									<div class="controls">

									<?php
/*
					 $un=$this->session->userdata('username'); 

				

				$q=mysqli_query($con,"select * from admin_data where email_id='$un'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['name'];

							

							} */ ?>

									<input type="text" name="created_by" id="created_by" value="<?php echo $first;?>" readonly="true"/>
	<input type="hidden" name="created_byid" id="created_byid" value="<?php echo $adid;?>" readonly="true"/>
									</div>

									</div>

									<div class="control-group">

									<label class="control-label" for="form-field-1">Registered Date Time</label>

									<div class="controls">

									<input type="text" name="created_dt" id="created_dt" value="<?php echo date('d-m-Y h:i:s',strtotime('+330 minutes'));?>" readonly="true"/>
								

									</div>

									</div>

<div class="control-group">

									<label class="control-label" for="form-input-readonly">ETA</label>



									<div class="controls">

										<input type="checkbox" id="school" name="school" value="1">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>
								<div class="control-group">

									<label class="control-label" for="form-input-readonly">School/Institute</label>



									<div class="controls">

										<input type="checkbox" id="school_login" name="school_login" value="1">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>

<div class="control-group">

									<label class="control-label" for="form-input-readonly">Dealer's Customer</label>



									<div class="controls">

										<input type="checkbox" id="dealers_customer" name="dealers_customer" value="1">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>
									</div>
<div class="control-group">

									<label class="control-label" for="form-input-readonly">Concox Customer</label>



									<div class="controls">

										<input type="checkbox" id="concox_customer" name="concox_customer" value="1">

										<label class="lbl" for="id-disable-check"> Yes</label>

										&nbsp; &nbsp;


									</div>

								</div>
<div class="control-group">
									<label class="control-label" for="form-field-1"></label>
									<div class="controls">
									<input type="submit" class="btn btn-success" value="NEXT" onclick="return valform();" id="opn"/>		
									</div>		
									</div>	
									
									

	</div>
	
</form>

	<?php	
	$ceid=array();
		$isq= mysqli_query($con,"select customer_emailid from customers");

while($resi=mysqli_fetch_array($isq)){

array_push($ceid,$resi['customer_emailid']);

}
?>
<div id="existdiv" style="display:none;float: left;margin-left: 400px;">				

										<div class="control-group">

									<label class="control-label" for="form-field-1">Customer Email Id</label>

									<div class="controls">

								
								<input type="text" name="euid" id="euid"  data-provide="typeahead" data-items="4" data-source='<?php echo json_encode($ceid); ?>'  placeholder="type here"  >

									</div>

									</div>	

									<button class="btn btn-success"  type="button" onclick="getexistdata();">

															Submit

															<i class="icon-arrow-right icon-on-right"></i>

														</button>		

											</div>
											
											</div>
											</div>
											</div>
											
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

window.top.location.href="<?php echo base_url();?>customer_registration/existdata/?msg="+abc+"&uid="+uid;

}

else

{

abc=xmlhttp.responseText;

window.top.location.href="<?php echo base_url();?>customer_registration/basic_data/?msg="+abc;

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


<script>

function valemail()

{





	str=document.getElementById('email').value;



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







document.getElementById("erdiv").innerHTML=xmlhttp.responseText;

document.getElementById("errordiv").value=xmlhttp.responseText;

if(document.getElementById("errordiv").value=='')

{

//	document.getElementById("customerdiv").style.display='block';

	//document.getElementById("btnid").style.display='none';

}

else

{

	//alert('hh')

//	document.getElementById("customerdiv").style.display='none';

}



}







}





xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/valemail.php?c="+str,true);



xmlhttp.send();





}


function valcompemail()

{





	str=document.getElementById('cemail').value;



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







document.getElementById("cerdiv").innerHTML=xmlhttp.responseText;

document.getElementById("cerrordiv").value=xmlhttp.responseText;

if(document.getElementById("cerrordiv").value=='')

{

//	document.getElementById("customerdiv").style.display='block';

	//document.getElementById("btnid").style.display='none';

}

else

{

	//alert('hh')

//	document.getElementById("customerdiv").style.display='none';

}



}







}





xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/valemail.php?c="+str,true);



xmlhttp.send();





}

</script>		
				
				<script>
				function valform()
				{
			//if((document.getElementById('ctype').checked==false) &&((document.getElementById('ctypes').checked==false)&& (document.getElementById('ctypess').checked==false)&& (document.getElementById('ctypesss').checked==false)))
			if((document.getElementById('ctype').checked==false) &&((document.getElementById('ctypes').checked==false)&& (document.getElementById('ctypess').checked==false)))
			//if((document.getElementById('ctype').checked==false) && ((document.getElementById('ctypes').checked==false)))
			{
				alert("Type Required");
				document.getElementById('ctype').focus();
				return false;
			}	
			if(document.getElementById('ctype').checked==true)
			{
			
			
			
			if(document.getElementById('dealer_id').value=='Choose Dealer')
{
	alert("From Required");
	document.getElementById('dealer_id').focus();
	return false;
}
if(document.getElementById('firstname').value=='')
{
	alert("Firstname Required");
	document.getElementById('firstname').focus();
	return false;
}
/*if(document.getElementById('middlename').value=='')
{
	alert("Middlename Required");
	document.getElementById('middlename').focus();
	return false;
}*/
if(document.getElementById('lastname').value=='')
{
	alert("Lastname Required");
	document.getElementById('lastname').focus();
	return false;
}
if((document.getElementById('gender').checked==false) && (document.getElementById('genders').checked==false))
{
alert("Gender Required");
	document.getElementById('gender').focus();
	return false;
}
/*if(document.getElementById('dob').value=='')
{
	alert("DOB Required");
	document.getElementById('dob').focus();
	return false;
}*/
if(document.getElementById('paddr').value=='')
{
	alert("Permanent Address Required");
	document.getElementById('paddr').focus();
	return false;
}
if(document.getElementById('tmpaddr').value=='')
{
	alert("Temporary Address Required");
	document.getElementById('tmpaddr').focus();
	return false;
}
if(document.getElementById('email').value=='')
{
	alert("Email Required");
	document.getElementById('email').focus();
	return false;
}
if(document.getElementById('errordiv').value!='')
{
	alert("Email is Already Registered. Please enter new Email Id");
	document.getElementById('email').focus();
	return false;
}
if(document.getElementById('phno').value=='')
{
	alert("Mobile Number Required");
	document.getElementById('phno').focus();
	return false;
}
/*if(document.getElementById('tphno').value=='')
{
	alert("Phone Number Required");
	document.getElementById('tphno').focus();
	return false;
}*/


if(document.getElementById('state').value=='Select State')
{
	alert("State Required");
	document.getElementById('state').focus();
	return false;
}
if(document.getElementById('city').value=='')
{
	alert("City Required");
	document.getElementById('city').focus();
	return false;
}
if(document.getElementById('pincode').value=='')
{
	alert("Pincode Required");
	document.getElementById('pincode').focus();
	return false;
}
if(document.getElementById('pincode').value!='')
{
	
zipcode=document.getElementById('pincode').value;

if(document.getElementById("city").value=='Bangalore')
{

	var regPostcode = /^([5-5])([6-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Karnataka Pincode is not valid.");
	   document.getElementById("pincode").focus();
	   return false;

    }
}
else if((document.getElementById("city").value=='Hyderabad') || (document.getElementById("city").value=='Secunderabad'))
{
	var regPostcode = /^([5-5])([0-3])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Andhra Pradesh Pincode is not valid.");
	   document.getElementById("pincode").focus();
	    return false;

    }
}
else if((document.getElementById("city").value=='Mumbai'))
{
	var regPostcode = /^([4-4])([0-4])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Maharashtra Pincode is not valid.");
	   document.getElementById("pincode").focus();
	    return false;

    }
}
  else if((document.getElementById("city").value=='Delhi') || (document.getElementById("city").value=='NCR'))
{
	var regPostcode = /^([1-1])([1-1])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Delihi Pincode is not valid.");
	   document.getElementById("pincode").focus();
	    return false;

    }
} 

else if((document.getElementById("city").value=='Kottayam'))
{
		var regPostcode = /^([6-6])([7-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Kerala Pincode is not valid.");
	   document.getElementById("pincode").focus();
 return false;
    }
}

}

/*
if(document.getElementById('bnr').value=='')
{
	alert("Please Enter Number of documents to be Upload");
		document.getElementById('bnr').focus();
	return false;
}
if(document.getElementById('bnr').value!='')
{
	
bnr=document.getElementById('bnr').value;
	for(i=1;i<=bnr;i++)

			{				

			tf=document.getElementById('proof'+i).value;
			descp=document.getElementById('descp'+i).value;
			//devicesnm=document.getElementById('devicesnm'+i).value;
			}

			if(tf=='Select Proof')
			{
		alert('Please Select Proof');
		return false;
	         }
			 if(descp=='')
			{
		alert('Please Write Description');
		return false;
	         }
} */
			 
			 }
		
		else if(document.getElementById('ctypes').checked==true || document.getElementById('ctypess').checked==true)
			{
			
	if(document.getElementById('dealer_idd').value=="Choose Dealer")
{
	alert("From Required");
	document.getElementById('dealer_idd').focus();
	return false;
}
	if(document.getElementById('compname').value=='')
{
	alert("Name Required");
	document.getElementById('compname').focus();
	return false;
}
if(document.getElementById('cmpaddr').value=='')
{
	alert("Address Required");
	document.getElementById('cmpaddr').focus();
	return false;
}
if(document.getElementById('ctphno').value=='')
{
	alert("Phone No Required");
	document.getElementById('ctphno').focus();
	return false;
}
if(document.getElementById('cemail').value=='')
{
	alert("Email Required");
	document.getElementById('cemail').focus();
	return false;
}
if(document.getElementById('cerrordiv').value!='')
{
	alert("Email is Already Registered. Please enter new Email Id");
	document.getElementById('cemail').focus();
	return false;
}
if(document.getElementById('statee').value=='Select State')
{
	alert("State Required");
	document.getElementById('statee').focus();
	return false;
}
if(document.getElementById('city').value=='')
{
	alert("City Required");
	document.getElementById('city').focus();
	return false;
}
if(document.getElementById('pincodee').value=='')
{
	alert("Pincode Required");
	document.getElementById('pincodee').focus();
	return false;
}
if(document.getElementById('pincodee').value!='')
{
	
zipcode=document.getElementById('pincodee').value;

if(document.getElementById("city").value=='Bangalore')
{

	var regPostcode = /^([5-5])([6-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Karnataka Pincode is not valid.");
	   document.getElementById("pincodee").focus();
	   return false;

    }
}
else if((document.getElementById("city").value=='Hyderabad') || (document.getElementById("city").value=='Secunderabad'))
{
	var regPostcode = /^([5-5])([0-3])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Andhra Pradesh Pincode is not valid.");
	   document.getElementById("pincodee").focus();
	    return false;

    }
}
else if((document.getElementById("city").value=='Mumbai'))
{
	var regPostcode = /^([4-4])([0-4])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Maharashtra Pincode is not valid.");
	   document.getElementById("pincodee").focus();
	    return false;

    }
}
  else if((document.getElementById("city").value=='Delhi') || (document.getElementById("city").value=='NCR'))
{
	var regPostcode = /^([1-1])([1-1])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Delihi Pincode is not valid.");
	   document.getElementById("pincodee").focus();
	    return false;

    }
} 
else if((document.getElementById("city").value=='Kottayam'))
{
		var regPostcode = /^([6-6])([7-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Kerala Pincode is not valid.");
	   document.getElementById("pincodee").focus();
 return false;
    }
}

}

			}

else
{
		 $('#opn').fadeOut(1000);
}
			
				}
				
				</script>		
				
				<Script>
function getcity(str)

{
/*
if(str=='Karnataka')
{
	document.getElementById("city").value='Bangalore';
}
else if(str=='Andhra Pradesh')
{
	document.getElementById("city").value='Hyderabad';	
}
else
{
	document.getElementById("city").value='';
	alert("Please Select State");
} */
	
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



document.getElementById("citydiv").innerHTML=xmlhttp.responseText;

}



}



xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getcity1.php?c="+str,true);

xmlhttp.send();

}
function postcode_validate(zipcode)
{
if(document.getElementById("city").value=='Bangalore')
{

	var regPostcode = /^([5-5])([6-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Karnataka Pincode is not valid.");
	   document.getElementById("pincode").focus();

    }
}
else if((document.getElementById("city").value=='Hyderabad') || (document.getElementById("city").value=='Secunderabad'))
{
	var regPostcode = /^([5-5])([0-3])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Andhra Pradesh Pincode is not valid.");
	   document.getElementById("pincode").focus();

    }
}
else if((document.getElementById("city").value=='Mumbai'))
{
		var regPostcode = /^([4-4])([0-4])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Maharashtra Pincode is not valid.");
	   document.getElementById("pincode").focus();

    }
}
  else if((document.getElementById("city").value=='Delhi') || (document.getElementById("city").value=='NCR'))
{
	var regPostcode = /^([1-1])([1-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Delihi Pincode is not valid.");
	   document.getElementById("pincode").focus();

    }
} 
else if((document.getElementById("city").value=='Kottayam'))
{
		var regPostcode = /^([6-6])([7-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Kerala Pincode is not valid.");
	   document.getElementById("pincode").focus();

    }
}

}
</script>			

<script>
function getcityy(str)

{
/*
if(str=='Karnataka')
{
	document.getElementById("city").value='Bangalore';
}
else if(str=='Andhra Pradesh')
{
	document.getElementById("city").value='Hyderabad';	
}
else
{
	document.getElementById("city").value='';
	alert("Please Select State");
} */
	
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



document.getElementById("citydivv").innerHTML=xmlhttp.responseText;

}



}



xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getcity2.php?c="+str,true);

xmlhttp.send();

}


function postcode_validatee(zipcode)
{
if(document.getElementById("city").value=='Bangalore')
{

	var regPostcode = /^([5-5])([6-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Karnataka Pincode is not valid.");
	   document.getElementById("pincodee").focus();

    }
}
else if((document.getElementById("city").value=='Hyderabad') || (document.getElementById("city").value=='Secunderabad'))
{
	var regPostcode = /^([5-5])([0-3])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Andhra Pradesh Pincode is not valid.");
	   document.getElementById("pincodee").focus();

    }
}
else if((document.getElementById("city").value=='Mumbai'))
{
		var regPostcode = /^([4-4])([0-4])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Maharashtra Pincode is not valid.");
	   document.getElementById("pincodee").focus();

    }
}
  else if((document.getElementById("city").value=='Delhi') || (document.getElementById("city").value=='NCR'))
{
	var regPostcode = /^([1-1])([1-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Delihi Pincode is not valid.");
	   document.getElementById("pincodee").focus();

    }
} 
else if((document.getElementById("city").value=='Kottayam'))
{
		var regPostcode = /^([6-6])([7-9])([0-9]){4}$/;

    obj = document.getElementById("status");

    if(regPostcode.test(zipcode) == false)
    {

       // obj.innerHTML = "Postcode is not yet valid.";
	   alert("Kerala Pincode is not valid.");
	   document.getElementById("pincodee").focus();

    }
}

}

</script>				
                            
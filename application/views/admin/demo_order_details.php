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

			<script type="text/javascript">







function numbersonly(e){



/*var intsOnly = /^\d+$/,

    stri = $('#subscp').val();

if(intsOnly.test(stri)) {

  // alert('its valid');   

}

else{

	 alert('its not valid');   

	 $('#subscp').val('');

	  $('#subscp').focus();

}



*/

var unicode=e.charCode? e.charCode : e.keyCode







if (unicode!=8){ //if the key isn't the backspace key (which we should allow)







if (unicode<48||unicode>57)















return false //if not a number







//disable key press







}







}







</script>

	<script type="text/javascript">

			$(function() {

			$('.date-picker').datepicker().next().on(ace.click_event, function(){

					$(this).prev().focus();

				});

				$('.date-pickerr').datepicker().next().on(ace.click_event, function(){

					$(this).prev().focus();

				});

				$('#apptime').timepicker({

					minuteStep: 1,

					showSeconds: true,

					showMeridian: false

				});

			

			});

			</script>

<style>

		.control-group input[type="text"]{

			width:107px;

		}

		label{

			display: inline;

		}

		.error, #star{

			color:red;

			font-size:9px;

		}

		.control-group{

			*margin-left:-60px;

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

							Demo Request Form

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



													<form class="form-horizontal" action="<?php echo base_url();?>customer_registration/addd" method="POST" >

													

													<?php

													$cq=mysqli_query($con,"select * from customers where customer_id='$cid'");

													while($rcq=mysqli_fetch_array($cq))

													{

														$type=$rcq['type'];

													} ?>

													

													

													<?php

												$pmq=	mysqli_query($con,"select * FROM `promo_codes` where status='valid' order by  rand() limit 1");

												$rpmq=mysqli_fetch_array($pmq);

												

													?>

												<!--	<h2>Please Use the Following Promocode <?php echo $rpmq['code']; ?></h2>-->

													

<input type="hidden" name="cid" id="cid" value="<?php echo $cid;?>"/>



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



													

															

																

															



									<table>

								<tr><th style="margin-left: 5px;float: left;">Category Type</th><th style="margin-left: 78px;float: left;">Device Model</th><th style="margin-left: 50px;float: left;">Qty</th><th style="margin-left: 47px;float: left;">Choose Network</th><th style="margin-left: 47px;float: left;">Start Date</th><th style="margin-left: 47px;float: left;">End Date</th></tr>

									</table>							



										<fieldsett>



      <div id="IPOX">



            <p style="border-bottom: 1px solid #000;line-height: 4em;">					



																



								<select name="category_id" id="category_id" onchange="getdevicetype(this,this.value);" class="cat" style="width:150px;text-transform: capitalize;">



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



				<select name="device_type" id="device_type" onchange="getmodel(this,this.value);" class="dev" style="width:150px;">



									



									



									</select>



									



									



			<input type="text" name="noofdevice" id="noofdevice"  style="width:50px;" class="noofdevice" value="0" />

			<?php

			$ts=mysqli_query($con,"select * from settings");



										while($rts=mysqli_fetch_array($ts))



										{



											$vat=$rts['vat_percentage'];



											$tax=$rts['service_tax_percentage'];



										}?>

							

	

							

								

								<input type="hidden" name="ab" id="ab"  class="devname"/>	





	<select name="s" id="s"  class="network" style="width:150px;text-transform: capitalize;">



									<option>Choose Sim</option>



									<?php



									$sq=mysqli_query($con,"select * from network");



									while($sqs=mysqli_fetch_array($sq))



									{



										?>



									<option value="<?php echo $sqs['id'];?>" id="<?php echo $sqs['charge'];?>"><?php echo $sqs['network_name'];?></option>	



										<?php



									}



									?>



									



									</select>

	<input type="text" name="std" id="std"  style="width:100px;" class="date-picker" data-date-format="dd-mm-yyyy"/>

	<input type="text" name="end" id="end"  style="width:100px;" class="date-pickerr" data-date-format="dd-mm-yyyy"/>

	

						  </p>



        </div>



        <p><span class="add">Add another row</span>







        </p>



    </fieldsett>	

	

	

	

	<div class="control-group">



									<label class="control-label" for="form-input-readonly">Need Engineer</label>







									<div class="controls">



									<div class="span12">



									<div style="">



										<input type="radio" id="simyes" name="sim" value="Yes">



										<label class="lbl" for="id-disable-check"> Yes</label>



										&nbsp; &nbsp;



										<input type="radio" id="simno" name="sim" value="No">



										<label class="lbl" for="id-disable-check" >No</label>



									</div>



									</div>



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

	$aid=$re['id'];

								$types=$re['user_type'];



							} ?>



									<input type="hidden" name="created_by" id="created_by" value="<?php echo $aid;?>" readonly="true"/>

									<input type="text" name="createe" id="createe" value="<?php echo $types;?>" readonly="true"/>



									</div>



									</div>



									<div class="control-group">



									<label class="control-label" for="form-field-1">Created Date Time</label>



									<div class="controls">



									<input type="text" name="created_dt" id="created_dt" value="<?php echo date('d-m-Y h:i:s',strtotime('+330 minutes'));?>" readonly="true"/>



									</div>



									</div>

										

			<div class="control-group">

									<label class="control-label" for="form-field-1"></label>



									<div class="controls">

									<button class="btn btn-small btn-primary" type="button" onclick="storedata();" id="opn">

										<i class="icon-ok"></i>

										Submit

									</button>

									</div>

									</div>



							<!--PAGE CONTENT ENDS-->



						</div><!--/.span-->



					</div><!--/.row-fluid-->



				</div><!--/.page-content-->







			



			</div><!--/.main-container-->

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











<script>

function storedata()

{

	

	



	cat=Array();



	dev=Array();

	noofdevice=Array();



	devname=Array();



	network=Array();

	datepicker=Array();

	datepickerr=Array();





	

	 $('fieldsett p').each(function () {



        if ($(this).find('.add').length > 0) return;



		cat.push($(this).find('.cat').val());



		dev.push($(this).find('.dev').val());

	

		noofdevice.push($(this).find('.noofdevice').val());

	

		devname.push($(this).find('.devname').val());

			

		network.push($(this).find('.network').val());

		datepicker.push($(this).find('.date-picker').val());

		datepickerr.push($(this).find('.date-pickerr').val());

		

	});

	if(noofdevice.indexOf("0")==0)
	{
		alert("Quantity Required")
		return false;
	}
	if(noofdevice.indexOf("")==0)
	{
		alert("Quantity Required")
		return false;
	}
	if(document.getElementById('simyes').checked!=true && document.getElementById('simno').checked!=true)
	{
		alert("Need Engineer is Mandatory");
		document.getElementById('simyes').focus();
		return false;
	}

	if(document.getElementById('simyes').checked)

	{

		

		needsim=document.getElementById('simyes').value;

	}

	if(document.getElementById('simno').checked)

	{

		

		needsim=document.getElementById('simno').value;

	}

	

	created_by=document.getElementById('created_by').value;



	created_dt=document.getElementById('created_dt').value;



	cid=document.getElementById('cid').value;
	$('#opn').fadeOut(1000);
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



window.top.location.href="<?php echo base_url();?>demo_request/basic_data/?msg1="+abc;









}



}





xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/demo_order_data.php?category_id="+cat+"&device_type="+dev+"&noofdevice="+noofdevice+"&created_by="+created_by+"&created_dt="+created_dt+"&cid="+cid+"&devname="+devname+"&network="+network+"&date-picker="+datepicker+"&date-pickerr="+datepickerr+"&needsim="+needsim,true);







xmlhttp.send();

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





       var element = $(f).find('option:selected'); 

        var catid = element.attr("id"); 

        var devname= element.attr("name"); 

	//	alert(devname);

		

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



f.nextElementSibling.nextElementSibling.value=devname;



}



}



xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/getmodel.php?c="+str+"&catid="+catid,true);







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









</div>





</body></html>
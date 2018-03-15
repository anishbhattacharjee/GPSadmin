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
							Add Stock Details
							<small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
					</div>
				    <div class="row-fluid">
				    <div class="span12">
				
                    
	<form name="stock_form" id="stock_form" class="form-horizontal" action="<?php echo base_url();?>stock/stock_entry" method="POST" >
<h4>Stock Category</h4>
<hr>
<div class="control-group" id="cat_sel">
											<label class="control-label">Select Categories</label>

											<div class="controls">
											<?php $sql1=$con,"select * from gps_categories order by sort_order";$rs1=mysqli_query($sql1);while($r1=mysqli_fetch_assoc($rs1)){ ?>

												<label>
													<input name="category[]" class="ace-checkbox-2" data-val="<?php echo $r1['category_type']; ?>" value="<?php echo $r1['category_id']; ?>" type="checkbox">
													<span class="lbl"> <?php echo $r1['category_type']; ?></span>
												</label>
<?php } ?>
												
											</div>
										</div>
                                        
<div id="details" style="display:none;">
<h4>Add Stock</h4>
<hr>
	<div class="control-group" > 
					<label class="control-label">Payee&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
						<div class="controls">
						<select name="vendor" id="vendor" >

			 								<option value="">--Select Vendor--</option>
                                            <?php $sql2=$con,"select * from vendors";$rs2=mysqli_query($sql2);while($r2=mysqli_fetch_assoc($rs2)){ ?>
											<option value="<?php echo $r2['vendor_id']; ?>"><?php echo $r2['vendor_name']; ?></option>
                                            
                                            <?php } ?>

						</select>

						</div>

						</div>
                        <hr />
                        <!-------//vendor------>
                        <div class="span12">
					<div class="span3" >
<div class="control-group">
	<label class="control-label">Stock Entry Date &nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
		<input type="text" name="stendt" id="stendt" value="<?php echo date('d-m-Y');?>" readonly="true" />
		</div>
</div>
</div>

<div class="span3">
<div class="control-group">
	<label class="control-label">PO NO :</label>
		<div class="controls">
		<input type="text" name="pono" id="pono" />
	</div>
</div>
</div>

</div><!--//rw1-->

 <div class="span12">
<div class="span3" >
<div class="control-group" >
	<label class="control-label">Invoice Date&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
		<input type="text" name="dcd" id="dcd" data-date-format="dd-mm-yyyy" />
	</div>
</div>
</div>

<div class="span3" >
	<?php	
	$inv=array();
		$isq= mysqli_query($con,"select * from stock");

while($resi=mysqli_fetch_array($isq)){

array_push($inv,$resi['inv_no']);

}
?>
<div class="control-group">
	<label class="control-label">Invoice No&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
	
		<input type="text" name="invno" id="invno"  data-provide="typeahead" data-items="4" data-source='<?php echo json_encode($inv); ?>'  placeholder="type here" >
	</div>
</div>
</div>

<div class="span3" >
<div class="control-group">
	<label class="control-label">Invoice Amount&nbsp;</label>
		<div class="controls">
		<input type="text" name="inamnt" id="inamnt" onkeypress="return numbersonly(event);"  />
	</div>
</div>
</div>

</div><!--//rw2-->


<div class="span12">

<div class="span3">
<div class="control-group" >
	<label class="control-label">DC Date&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
		<input type="text" name="dcidt" id="dcidt"  data-date-format="dd-mm-yyyy" />
	</div>
</div>
</div>

<div class="span3">
	<?php	
	$aa=array();
		$sq= mysqli_query($con,"select * from stock");

while($res=mysqli_fetch_array($sq)){

array_push($aa,$res['dc_no']);

}
?>

<div class="control-group">
	<label class="control-label">DC No&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
	
		<input type="text" name="dcino" id="dcino"  data-provide="typeahead" data-items="4" data-source='<?php echo json_encode($aa); ?>'  placeholder="type here" >
	</div>
</div>
</div>

<div class="span3">
<div class="control-group">
	<label class="control-label">No of Items&nbsp;<span id="star">*</span>&nbsp;<b>:</b></label>
		<div class="controls">
		<input type="text" name="nitem" id="nitem" onkeypress="return numbersonly(event);" />
	</div>
</div>
</div>


</div>
<!--//rw3-->
<hr>
<h4>Add Material</h4>
<hr>

<table style="margin-left: 50px;">

 <th>

From :</th><td><input type="text" name="vnd" id="vnd" value="" readonly="true" style="width:100px;"/ ></td>

<th>

Stock Entry Date :</th><td><input type="text" name="cdt" id="cdt" value="<?php echo date('d-m-Y');?>" readonly="true" style="width:100px;"/ ></td>

<th>Invoice Date :</th><td><input type="text"   name="dt" id="dt"  readonly="true" / ></td>

<th>Invoice No :</th><td><input type="text" name="invnumber" id="invnumber"  readonly="true"/ ></td>

</table>

<div id="cat_det" style="margin-top:50px;">
<?php $sql1=$con,"select * from gps_categories";$rs1=mysqli_query($sql1);while($r1=mysqli_fetch_assoc($rs1)){ $cid=$r1['category_id'];?>
<div id="catdiv<?php echo $cid; ?>" style="display:none; margin-top:20px;background-color: #F4F4F4;
padding: 20px;">
    <table>
         <th>Cateogry :</th>
         <td> <input type="text" name="cat<?php echo $cid; ?>" id="cat<?php echo $cid; ?>" style="width:150px;" readonly="true"/></td>
         <th>Enter Number of Rows &nbsp;<span id="star">*</span>&nbsp;<b>:</b></th>
         <td><input type="text" name="catnr<?php echo $cid; ?>" id="catnr<?php echo $cid; ?>" data-id="<?php echo $cid; ?>"  style="width:150px;" autocomplete="off"  onkeypress="return numbersonly(event);" /></td>
<!--         <th>Generic Quantity &nbsp;<span id="star">*</span>&nbsp;<b>:</b></th>
         <td><input type="text" name="gnr<?php echo $cid; ?>" id="gnr<?php echo $cid; ?>"  style="width:150px;"  /></td>
-->    </table>
    <div id="catrwdiv<?php echo $cid; ?>">
    
		 
        
     </div>
</div>
<?php } ?>
</div>
<hr />
<div class="control-group">

			<label class="control-label"></label>

			<div class="controlss">

			

			<input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary" />

	

		</div>

		</div>
        
 </div><!--//details--->       

	</form>					
					
								
							

					</div>
					</div>
					</div><!--/.page-content-->

			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
        <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
        	<script type="text/javascript">
			$(function() {
					  
					   
					  $("#stock_form").validate({
							errorElement: 'span',
							// Specify the validation rules
							rules: {
								dcd: "required", 
								invno:"required", 
								vendor:"required",
							//	inamnt:"required", 
								dcidt:"required", 
								dcino:"required", 
								nitem:"required", 
							},
							
							// Specify the validation error messages
							messages: {
								dcd: "required",
								invno:"required", 
								vendor:"required", 
							//	inamnt:"required", 
								dcidt:"required", 
								dcino:"required", 
								nitem:"required", 
								
							},
							
							submitHandler: function(form) {
								form.submit();
							}
						}); 
					  
			$("[name^='catnr']").each(function() {
				$(this).rules('add', {
					required: true,
					// other rules
					messages: {  
					required: "required",
					}
				});
			});
			
/*			$("[name^='gnr']").each(function() {
				$(this).rules('add', {
					required: true,
					// other rules
					messages: {  
					required: "required",
					}
				});
			});
*/
			$("#dt").focus(function(){
					var val=$("#dcd").val();
					$(this).val(val);
			});
			$('#dcd').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			$('#dcidt').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
			
/**/			
		/*	$("#invno").blur(function(e){
					var val=$(this).val();				   
					var request = $.ajax({
					  url: "<?php echo base_url();?>stockfiles/getinv.php",
					  type: "POST",
					  data: { val : val },
					  dataType: "html"
					});
					 
					request.done(function( msg ) {
					 	if(msg=='success'){
							$("#invnumber").val(val);	
						}else{
							$("#invno").val('');alert("Invoice Number Stock Already Added");
							//$("#invno").addClass('error');
							//$("#invno").append('<span for="invno" class="error">Invoice Number Stock Already Addes</span>');
						}
					});				   
								  
			});
			$("#dcino").blur(function(e){
					var val=$(this).val();				   
					var request = $.ajax({
					  url: "<?php echo base_url();?>stockfiles/getdc.php",
					  type: "POST",
					  data: { val : val },
					  dataType: "html"
					});
					 
					request.done(function( msg ) {
					 	if(msg!='success'){
							$("#dcino").val('');alert("DC Number Stock Already Added");	
						}
					});				   
								  
			}); */
			$("#dcd").blur(function(e){
				var val=$(this).val();//alert(val);
				$("#dt").val(val);					  
			});
			$('#cat_det').delegate('[id^="qty"]','keyup',function(e){
					//alert("fjjk");
					id=$(this).attr("data-id");
					qty=$(this).val();
					rate=$("#rate"+id).val();//alert(rate);
					amt=parseInt(qty)*parseInt(rate);
					//alert(amt);
					$("#amt"+id).val(amt);
					 var sum=0;
					 var did=$(this).attr("data-val");
					$("[id^='qty"+did+"']").each(function() {
							sum+=parseInt($(this).val());
					});//alert(sum);
					$("#totq"+did).val(sum);
					
			});
			$('#cat_det').delegate('[id^="rate"]','keyup',function(e){
					//alert("fjjk");
					id=$(this).attr("data-id");
					qty=$("#qty"+id).val();
					rate=$(this).val();//alert(rate);
					amt=parseInt(qty)*parseInt(rate);
					//alert(amt);
					$("#amt"+id).val(amt);
					
			});

			$("#vendor").change(function(e) {
						var v=$("#vendor option:selected").text();
						$("#vnd").val(v);				 
			});
			
			$('[name^="category"]').change(function(e) {
				var lngth=$("input[type='checkbox'][name^='category']:checked").length;//alert(lngth);
				if (lngth > 0)
				{
					$("#details").show();
				}
				else{$("#details").hide();
				}
				var id=$(this).attr("value");
				var val=$(this).attr("data-val");								
        		if ($(this).is(":checked")) {					
					$("#catdiv"+id).show();
					$("#cat"+id).val(val);
					
				}else{
					$("#catdiv"+id).hide();
				}
			});
			
			$('#cat_det').delegate('[id^="catnr"]','keyup',function(e){
																
					var ct=$(this).val();
					var id=$(this).attr("data-id");					
					var cat=$("#cat"+id).val();
					
					var request = $.ajax({
					  url: "<?php echo base_url();?>stockfiles/getrows.php",
					  type: "POST",
					  data: { id : id, ct : ct, cat : cat },
					  dataType: "html"
					});
					 
					request.done(function( msg ) {
					  $("#catrwdiv"+id).html( msg );
					  
						  $("[class^='req"+id+"']").each(function() {
								$(this).rules('add', {
									required: true,
									
									messages: {  
									required: "required",
									}
								});
							});
					});
					 
/*					request.fail(function( jqXHR, textStatus ) {
					  alert( "Request failed: " + textStatus );
					});
					
*/					
					
			});
			
			
			
			$('#cat_det').delegate('[id^="imei"]','blur',function(e){

					var imei=$(this).val();
					var imei=$.trim(imei);
					var id=$(this).attr("data-id");					
					var val=$("#fbcode"+id).val();
					if(imei && imei!=''){	
							   
							var request = $.ajax({
							  url: "<?php echo base_url();?>stockfiles/getimei.php",
							  type: "POST",
							  data: { val : val , imei : imei},
							  dataType: "html",
							  async:false,
							});
							 
							request.done(function( msg ) {
								if(msg=='exists'){
										$("#imei"+id).val('');alert("IMEI Already Added !!!");
								}else{
									
									 $("[id^='imei']").each(function() {
										 var idn=$(this).attr("data-id");
										 if(idn != id){									 
																
											 var itm=$("#fbcode"+idn).val();
											// console.log(imei);
											 //console.log($(this).val());
											 
											 
											 //alert($(this).val());
											// alert(val);alert(itm);alert($(this).val());alert(imei);
											// if(itm==val && imei==$(this).val()){
											var imei_nn=$(this).val();
											var imei_nn=$.trim(imei_nn);
											 if(imei==imei_nn){
												 $("#imei"+id).val('');alert("IMEI Already Added !!!");
											 }
										 }
									 });
									
									
								}
								
							});	
					}
								  
			});
			
/*			$('#cat_det').delegate('[id^="fbcode"]','change',function(e){

					var val=$(this).val();
					var id=$(this).attr("data-id");					
					var imei=$("#imei"+id).val();
					var imei=$.trim(imei);
					if(imei && imei!=''){			   
							var request = $.ajax({
							  url: "<?php echo base_url();?>stockfiles/getimei.php",
							  type: "POST",
							  data: { val : val , imei : imei},
							  dataType: "html"
							});
							 
							request.done(function( msg ) {
								if(msg=='exists'){
										$("#imei"+id).val('');alert("IMEI Already Added !!!");
								}else{
									
								   $("[id^='imei']").each(function() {
										 var idn=$(this).attr("data-id");
										 if(idn != id){									 
																
											 var itm=$("#fbcode"+idn).val();
											 //alert($(this).val());
											 //alert(val);alert(itm);alert($(this).val());alert(imei);
											 if(imei==$(this).val()){
												 $("#imei"+id).val('');alert("IMEI Already Added !!!");
											 }
										 }
									 });	
									
								}
							});	
					}
								  
			});
*/			
			
			
			
			$('form').submit(function(e) {
				 var self = this;
				 e.preventDefault();
				/// alert("test");
				 var inamnt=$("#inamnt").val();
				 var tot=0;
				 //if(inamnt && inamnt!=''){
					 
					 $("[id^='amt']").each(function() {
						 tot+=parseInt($(this).val());
					 });
					 //alert(inamnt);alert(tot);
					 if(inamnt!=tot){
						  alert("Invoice Amount is not matching !!");
						  $("#inamnt").val('');
						  return false; 
					 }
				 //}
						
				 
			});
			
			})//fn
			
			</script>

</body></html>
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
							Device Types
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
<a href="#modal-form" role="button" class="white" data-toggle="modal" style="color:white;">Add Extra Device</a>	
										
											<i class="icon-arrow-right  icon-on-right"></i>
										</button>
					<div id="demo" style="background-color: #eff3f8;">
<table cellpadding="0" cellspacing="3" border="0" class="table table-striped table-bordered" id="example">
									<thead>
										<tr>
											<th class="center">
												<label>
													
													<span class="lbl">Sl No</span>
												</label>
											</th>
										
										
											<th class="hidden-480">Device Type</th>
											<th class="hidden-480">Name</th>
											<th class="hidden-480">Cost</th>
										
																					<th>Action</th>
																					<th>Action</th>
										</tr>
									</thead>

									<tbody>
									<?php 
									$slno=1;
									$q=mysqli_query($con,"select * from extra_device");
									while($res=mysqli_fetch_array($q))
									{
									$devid=$res['device_id']
									?>
									<tr>
										<td><?php echo $slno;?></td>
											
										<?php $ss=mysqli_query($con,"select * from gps_devices where device_id='$devid'");
										while($rsq=mysqli_fetch_array($ss))
										{
										
										$devtype=$rsq['device_type'];
										?>
										
								<?php } ?>
										<td><?php echo $devtype;?></td>
										<td><?php echo $res['name'];?></td>
										<td><?php echo $res['cost'];?></td>
									
									<td><div class="hidden-phone visible-desktop action-buttons">
													<a href="#editcollege<?php echo  $res['device_id']; ?>" role="button" class="blue" data-toggle="modal"><span class="label label-warning arrowed-in-right arrowed">Edit</span>
														
													</a></div></td>
													<td><div class="hidden-phone visible-desktop action-buttons">													<a class="red" href="#deletecollege<?php echo  $res['device_id']; ?>" role="button" class="blue" data-toggle="modal">
														<span class="label label-important arrowed-in">Delete</span>
													</a></div></td>
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
									<h4 class="white bigger">Please Add Extra Devices</h4>
								</div>
	<form class="form-horizontal" action="#" >
							
								<div class="modal-body overflow-visible">
									<div class="row-fluid">
										
										<div class="control-group">
									<label class="control-label" for="form-field-1">Devies</label>
									<div class="controls">
									<select name="device_id" id="device_id">
									<option>Select Device</option>
									<?php
									$sq=mysqli_query($con,"select * from gps_devices");
									while($sqs=mysqli_fetch_array($sq))
									{
										?>
									<option value="<?php echo $sqs['device_id'];?>" ><?php echo $sqs['device_type'];?></option>	
										<?php
									}
									?>
									
									</select>
									</div>
									</div>
									
	<style>
	span{
		cursor:pointer;
	}
	</style>
									 <fieldset>
									 				<table><tr><th style="float: left;">Category Type</th><th style="margin-left: 62px;float: left;">Code</th><th style="margin-left: 122px;float: left;">Cost</th></tr></table>
      <div id="IPOX">
            <p  >			
			<input type="text" name="mnth" id="mnth" placeholder="Category Type"  class="col1" style="width: 125px;"/>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
			<input type="text" name="mnth" id="mnth" placeholder="Code"  class="col3" style="width: 125px;"/>	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	

							<input type="text" name="1monthcost" id="1monthcost" placeholder="Cost" onkeypress="return numbersonly(event)" class="col2" style="width:125px;"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
							
								  </p>
        </div>
        <p ><span class="add">Add another row</span>

        </p>
    </fieldset>	
									
								
											
									</div>
								</div>

								<div class="modal-footer">
									<button class="btn btn-small" data-dismiss="modal">
										<i class="icon-remove"></i>
										Cancel
									</button>

									<button class="btn btn-small btn-primary" type="button" onclick="printdata();">
										<i class="icon-ok"></i>
										Submit
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
function printdata()
{
	device_id=document.getElementById('device_id').value;
	mnth=Array();
	cost=Array();
	code=Array();
	discount=Array();
	  $('fieldset p').each(function () {
        if ($(this).find('.add').length > 0) return;
		mnth.push($(this).find('.col1').val());
		cost.push($(this).find('.col2').val());
		code.push($(this).find('.col3').val());
	
	});
	window.location.href="<?php echo base_url();?>extradevice_charge/add?device_id="+device_id+"&mnth="+mnth+"&cost="+cost+"&code="+code;
}
</script>



</body></html>
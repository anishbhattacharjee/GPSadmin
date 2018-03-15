<?php include 'include/adminassets.php';?>

<?php include 'include/adminheader.php';?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		

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

$(function() {

				 var mapCenter=new google.maps.LatLng(12.97338,77.60339);		

				 var myOptions = {

					zoom: 15,		

					center: mapCenter,

					mapTypeId: google.maps.MapTypeId.ROADMAP,		

					mapTypeControl: true,		

					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},		

					navigationControl: true,		

				  }

				   map = new google.maps.Map(document.getElementById('main-map'), myOptions);	

	

	

		$("#check").click(function(e) {

			$(this).addClass("disabled");

			var imei=$("#imei").val();			
			var table=$("#table").val();			

            if(imei==''){

				alert("Please enter IMEI!!!")				

			}else{

				

				$.ajax({

       				type: "GET",

       				url: "<?php echo base_url(); ?>ajaxfiles/test_signal_data.php?imei="+imei+"&table="+table,

     				dataType: 'html',

       				success: function(data) {

						if(data=='no data'){			

							alert("No signals received for this IMEI !!!");			

						}else{

							$("#main-map").show();

							google.maps.event.trigger(map, "resize");

							points=data.split(",");

							point=new google.maps.LatLng(parseFloat(points[0]),parseFloat(points[1]));

							

							

							var image = new google.maps.MarkerImage(

								'<?php echo base_url(); ?>assets/images/marker-images/image.png',

								new google.maps.Size(20,21),

								new google.maps.Point(0,0),

								new google.maps.Point(10,21)

							);

							

							var marker = new google.maps.Marker({

								flat: true,

								icon: image, 

								map: map,

								optimized: false,

								position: point,

								title: 'I might be here',

								visible: true

				

							});

							

							map.panTo(point);

							

							var infoWindow = new google.maps.InfoWindow();

							google.maps.event.addListener(marker, 'mouseout', function() {

								infoWindow.close();

				

							});

				

							if(points[3]){
								var html='<strong>'+imei+'<br />Latitude: '+points[0]+'<br />'+'Longitude: '+points[1]+'<br />'+'Last Signal: '+points[2]+'<br />'+'Oil: '+points[3]+'</strong>';
							}else{
								var html='<strong>'+imei+'<br />Latitude: '+points[0]+'<br />'+'Longitude: '+points[1]+'<br />'+'Last Signal: '+points[2]+'</strong>';
							}

							

							google.maps.event.addListener(marker, 'mouseover', function() {

								infoWindow.setContent(html);

								infoWindow.open(map, marker);

				

							});

							

							google.maps.event.trigger(marker, 'mouseover');

							$("#check").removeClass("disabled");

						}

					}

				});

							

				

				

				

			}

        });



});

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

							Device Signal Test

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >

                    

                    <div class="form-horizontal">

                   				 <div class="control-group">							



									<div class="controls">
									
										<select name="table" id="table">
											<option value="gps_master">gps_master</option>
											<option value="newmetrack">newmetrack</option>
											<option value="tzone">tzone</option>
											<option value="narayana">narayana</option>
											<option value="podar">podar</option>
											<option value="orange_master">orange_master</option>
											<option value="concox_master">concox_master</option>
										</select>

										<input type="text" id="imei" placeholder="IMEI"> 

                                        <button class="btn btn-info btn small" type="button" id="check">

										<i class="icon-ok bigger-110"></i>

										Check Signal

									</button>

									</div>

								</div> 

                    </div>

                    

                    <div id="main-map" class="google-maps" style="width:100%;height:380px; display:none;"></div>

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


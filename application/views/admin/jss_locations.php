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
 var geocoder;
$(function() {

				 var mapCenter=new google.maps.LatLng(12.97338,77.60339);	
				  geocoder = new google.maps.Geocoder();	

				 var myOptions = {

					zoom: 15,		

					center: mapCenter,

					mapTypeId: google.maps.MapTypeId.ROADMAP,		

					mapTypeControl: true,		

					mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},		

					navigationControl: true,		

				  }

				   map = new google.maps.Map(document.getElementById('main-map'), myOptions);	

	
				google.maps.event.addListener(map, 'click', function(event) {

				   // marker = new google.maps.Marker({position: event.latLng, map: map});
				   
				   var latlng=event.latLng;
				   $("#latlng").val(latlng);
				   
				   getAddress(latlng);

				});
	
				
				$("#add_loc").click(function(){
					var latlngs= $("#latlng").val();
					var addr= $("#address_insert").val();
					var request = $.ajax({
					  url: "<?php echo base_url(); ?>jss_locations/add_loc",
					  method: "POST",
					  data: { latlngs : latlngs,  addr:addr},
					  dataType: "html"
					});
					 
					request.done(function( msg ) {
					  $( "#msg" ).html( msg );
					  $( "#msg" ).show();
					  $('html, body').animate({
					        scrollTop: $("#msg").offset().top
					    }, 2000);
					});
					
				});
		



});
function codeAddress() {

			



  var address = document.getElementById('address').value;

  geocoder.geocode( { 'address': address}, function(results, status) {

    if (status == google.maps.GeocoderStatus.OK) {

      map.setCenter(results[0].geometry.location);

      var marker = new google.maps.Marker({

          map: map,

          position: results[0].geometry.location

      });

    } else {

      console.log('Geocode was not successful for the following reason: ' + status);

    }

  });

}
function getAddress(latLng) {
        geocoder.geocode( {'latLng': latLng},
          function(results, status) {
            if(status == google.maps.GeocoderStatus.OK) {
              if(results[0]) {
              	var addrs_received=results[0].formatted_address;
              /*	var add_formated=addrs_received.split(",");
              	add_formated.pop();
              	add_formated.pop();
              	add_formated.pop();
              	//var add_formated=add_formated.splice(-1,1);
              	console.log(add_formated);
              	var add_formated=add_formated.join();*/
              	
                //document.getElementById("address_insert").value = add_formated;
                document.getElementById("address_insert").value = addrs_received;
               // console.log( results[0]);
              }
              else {
                document.getElementById("address_insert").value = "No results";
              }
            }
            else {
              document.getElementById("address_insert").value = status;
            }
          });
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

							JSS Locations

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >  
					<div id="msg" class="alert alert-info" style="display:none;"></div>
					 
               
					<input  type="text" name="loc" id="address"/>
					<button class="btn btn-small" id="search_loc" onclick="codeAddress()" style="margin-top: -10px;">Search</button>
                    

                    <div id="main-map" class="google-maps" style="width:100%;height:380px;"></div>

<input  type="text" name="latlng" id="latlng" placeholder="Lattitude-Longitude"  style="margin-top: 10px; width: 100%;"/><br/>
<input  type="text" name="address_insert" id="address_insert" placeholder="Address" style="width: 100%;"/><br/>
<button class="btn btn-small btn-info" id="add_loc" style="margin-top: 10px;">Add to Locations</button>
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


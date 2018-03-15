<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>

	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>geofence/style.css"/>
	
	
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<!--<script type="text/javascript" src="<?php echo base_url();?>geofence/jquery-1.4.2.min.js"></script>-->
	<script type="text/javascript" src="<?php echo base_url();?>geofence/polygon.min.js"></script>
	
	<script type="text/javascript">
	$(function(){
		  //create map
		 var singapoerCenter=new google.maps.LatLng(1.37584, 103.829);
		 var myOptions = {
		  	zoom: 10,
		  	center: singapoerCenter,
		  	mapTypeId: google.maps.MapTypeId.ROADMAP
		  }
		 map = new google.maps.Map(document.getElementById('main-map'), myOptions);
		 
		 var creator = new PolygonCreator(map);
		 
		 //reset
		 $('#reset').click(function(){ 
		 $('#device').empty();
		 		creator.destroy();
		 		creator=null;
		 		
		 		creator=new PolygonCreator(map);
		 });		 
		 
		 
		 //show paths
		 $('#savee').click(function(){ 
		 	$('#dataPanel').hide();
		 			$('#dataPanel').append(creator.showData());
					
path=document.getElementById("dataPanel").innerHTML;
if(path=='Please first create a polygon')
{
	alert('Please complete the fence');
	return false;
}

else
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
document.getElementById("device").innerHTML=xmlhttp.responseText;
	$('#dataPanel').empty();
}
}
xmlhttp.open("GET","<?php echo base_url();?>ajaxfiles/savedata.php?c="+path,true);

xmlhttp.send();
}

		 		
		 });
		  $('#showData').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showData()){
		 			$('#dataPanel').append('Please first create a polygon');
		 		}else{
		 			$('#dataPanel').append(creator.showData());
		 		}
		 });
		 
		 //show color
		 $('#showColor').click(function(){ 
		 		$('#dataPanel').empty();
		 		if(null==creator.showData()){
		 			$('#dataPanel').append('Please first create a polygon');
		 		}else{
		 				$('#dataPanel').append(creator.showColor());
		 		}
		 });
	});	
	</script>
<style>
.tooltip{
   			display: inline;
    		position: relative;
		}
		
		.tooltip:hover:after{
    		background: #333;
    		background: rgba(0,0,0,.8);
    		border-radius: 5px;
    		bottom: 26px;
    		color: #fff;
    		content: attr(title);
    		left: 20%;
    		padding: 5px 15px;
    		position: absolute;
    		z-index: 98;
    		width: 220px;
		}
		
		.tooltip:hover:before{
    		border: solid;
    		border-color: #333 transparent;
    		border-width: 6px 6px 0 6px;
    		bottom: 20px;
    		content: "";
    		left: 50%;
    		position: absolute;
    		z-index: 99;
		}
</style>

	
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/adminsidebar.php';?>

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
						<form class="form-search">
							<span class="input-icon">
								<input type="text" placeholder="Search ..." class="input-small nav-search-input" id="nav-search-input" autocomplete="off">
								<i class="icon-search nav-search-icon"></i>
							</span>
						</form>
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
				    <div class="row-fluid">
				    <div class="span12">

  
  	
	  <div id="main-map" style="width:100%;height:380px;"></div>
 
    
  	
	  <div id="myown"style="width:100%;height:250px;">
	  	<div class="span12">
		<div id="device" style="position: absolute;top: 500px;width: 325px;">
	</div>
									<button class="btn btn-small btn-primary" type="button" style="margin-top: 13px;" onclick="savedata();" id="savee">
										<i class="icon-ok"></i>
										Save
									</button>
	<button class="btn btn-small btn-danger"  id="reset" value="Reset" type="button" style="margin-top: 13px;">
		
		<i class="icon-remove"></i>
										Reset
									</button>
										<button class="btn btn-small btn-success"  id="showData"  value="Show Paths (class function) " type="button" style="margin-top: 13px;">
		
		<i class="icon-ok"></i>
										Show Path
									</button>
									
									<div   id="dataPanel" style="border:none;">
									
		</div>
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

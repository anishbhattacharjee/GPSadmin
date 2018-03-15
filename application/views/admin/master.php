<?php include 'include/adminassets.php';?>

<?php include 'include/adminheader.php';?>

<?php /*
function getDevStat($devid,$last_signal,$dbcat,$engine,$speed,$cat,$req){	
	$cat=strtolower($cat);
	if($devid==24){//ogct-006
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
			$label="important";
		}else{
			$stat="moving";
			$img='assets/images/marker-images/'.$cat.'/green.png';
			$label="success";
		}
	}else if($dbcat==5 || $dbcat==19 || $dbcat==10){//personal or gpsid or asset
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
			$label="important";
		}else{
			$stat="active";
			$img='assets/images/marker-images/'.$cat.'/green.png';
			$label="success";
		}
		
	}else{
	
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
			$label="important";
		}else if($engine=='acc on' && $speed>0){//active green
			$stat="moving";
			$img='assets/images/marker-images/'.$cat.'/green.png';
			$label="success";
		}else if($engine=='acc on' && $speed==0){//idle yellow			
			$stat="idle";
			$img='assets/images/marker-images/'.$cat.'/orange.png';
			$label="warning";
		}else if($engine=='acc off'){//engine off  grey
			$stat="parked";
			$img='assets/images/marker-images/'.$cat.'/yellow.png';
			$label="info";
		}else if($engine==''){//engine off  grey
			if($speed==0){
				$stat="parked";
				$img='assets/images/marker-images/'.$cat.'/yellow.png';
				$label="info";
			}else{
				$stat="moving";
				$img='assets/images/marker-images/'.$cat.'/green.png';
				$label="success";
			}
		}else{
			$stat="inactive";
			$img='assets/images/marker-images/'.$cat.'/red.png';
			$label="important";
		}
	}
	
	if($req=="stat"){
		return array($stat,$label);
	}else{
		return $img;
	}
	
	
}*/function getDevStat($last_signal){	
	
		if($last_signal > 24){//inactive red 24 hrs			
			$stat="inactive";			
			$label="important";
		}else{
			$stat="active";			
			$label="success";
		}
		return array($stat,$label);
	
	
}
?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

<link rel="stylesheet" href="<?php echo base_url();?>assets/css/chosen.css" />
		

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
		select{
			  width: auto;
  max-width: 145px;
  margin: 0px !important;
  padding: 0px;
		}
		.chzn-container-single .chzn-single {
  background: none !important;
  border-radius: 0px !important;
  box-shadow: none;
}
#clr_fltr{
	cursor: pointer;
	  border: 1px solid #aaaaaa;
  padding: 2px;
   color: #FFF;
  background: #E8C440;
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

							Device Status
							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>


				    <div class="row-fluid">

				    <div class="span12">

                    

					
							<div class="row-fluid">

								



								<table id="master_table" class="table table-striped table-bordered table-hover">

									<thead>

										<tr>
											<th>SlNo</th>
											<th>Vehicle</th>
											<th>IMEI</th>
											<th>Latitude</th>
											<th>Longitude</th>
											<th>Speed (km/hr)</th>
											<th>Device Time</th>
											<th>Device Status</th>
											<th>Customer</th>
											<th>Phone</th>
											<th>Alerts</th>
											
											
										</tr>

									</thead><tfoot>

										<tr>
											<th><span id="clr_fltr">Clear</span></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											<th></th>
											
											
										</tr>

									</tfoot>

										

									



								<tbody>
<?php

//$sql=$con,"select i.customer_id,i.imie_no,i.device_name,i.device_id,i.category_id,c.category_type,l.lat,l.lng,l.speed,l.engine_status,l.device_time,ifnull(TIMESTAMPDIFF(HOUR,l.time_stamp,now()),0) as diff,u.customer_first_name,u.customer_phone_no FROM installation i left join latest_records l on i.imie_no=l.imei left join gps_categories c on i.category_id=c.category_id left join customers u on i.customer_id=u.customer_id where i.installation_status='completed'"; 
$sql=$con,"select i.imie_no,i.device_name,l.lat,l.lng,l.speed,l.engine_status,l.device_time,ifnull(TIMESTAMPDIFF(HOUR,l.time_stamp,now()),0) as diff,u.customer_first_name,u.customer_phone_no FROM installation i left join latest_records l on i.imie_no=l.imei left join customers u on i.customer_id=u.customer_id where i.installation_status='completed'"; 

$rs=mysqli_query($sql);
while($devs=mysqli_fetch_assoc($rs)){

//list($dev_stat,$label)=getDevStat($devs['diff'],$devs['engine_status'],$devs['speed']);
//list($dev_stat,$label)=getDevStat($devs['device_id'],$devs['diff'],$devs['category_id'],$devs['engine_status'],$devs['speed'],$devs['category_type'],"stat");
if(is_null($devs['device_time']) || $devs['device_time']=='0000-00-00 00:00:00'){
	$dev_stat="inactive";$label="important";
}else{
	list($dev_stat,$label)=getDevStat($devs['diff']);
}

//echo $dev_stat;
?>								
								<tr>
									<td></td>
									<td><?php echo $devs['device_name']; ?></td>
									<td><?php echo $devs['imie_no']; ?></td>
									<td><?php echo round($devs['lat'],3); ?></td>
									<td><?php echo round($devs['lng'],3); ?></td>
									<td><?php echo $devs['speed']; ?></td>
									<td><?php if($devs['device_time']=='0000-00-00 00:00:00'||$devs['device_time']==NULL){echo $devs['device_time']; }else{echo date("d-m-Y H:i:s",strtotime($devs['device_time']));} ?></td>									
									<td><span class="label label-large label-<?php echo $label; ?>"><?php echo $dev_stat; ?></span></td>
									<td><?php echo $devs['customer_first_name']; ?></td>
									<td><?php echo $devs['customer_phone_no']; ?></td>
									<td><a href="<?php echo base_url(); ?>alert?imei=<?php echo $devs['imie_no']; ?>" style="text-decoration:none;"><i class="icon-arrow-right"></i></a></td>
									
								</tr>
								
<?php } ?>								
								</tbody>

								</table>

							</div>	

								



					</div>

					</div>

					</div><!--/.page-content-->



			

			</div><!--/.main-content-->

		</div><!--/.main-container-->



		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">

			<i class="icon-double-angle-up icon-only bigger-110"></i>

		</a>


<script src="http://code.jquery.com/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="http://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/jquery.dataTables.bootstrap.js"></script>
<!--<script type="text/javascript" src="//cdn.datatables.net/plug-ins/1.10.6/api/fnFilterClear.js"></script>-->
<script src="assets/js/chosen.jquery.min.js"></script>

<script>
/*
function fnCreateSelect( aData )
{
    var r='<select><option value=""></option>', i, iLen=aData.length;
    for ( i=0 ; i<iLen ; i++ )
    {
        r += '<option value="'+aData[i]+'">'+aData[i]+'</option>';
    }
    return r+'</select>';
}*/
$(function(){
/*
$('#master_table tfoot th').each( function () {
        var title = $('#example thead th').eq( $(this).index() ).text();
		if(title=="Device Status"){
			$(this).html( '<input type="text" placeholder="Search '+title+'" />' );
		}
        
    } );*/
	
 
    /* Add a select menu for each TH element in the table footer */
 
    
    

	var block=[1,4,5,6,7,11];
	
var t = $('#master_table').DataTable( {
				/*	"aaSorting": [],
					"columnDefs": [ {
			            "searchable": false,
			            "orderable": false,
			            "targets": 0
			        } ],
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"aButtons": [
							"copy",
							"csv",
							"xls",
							{

								"sExtends": "pdf",
								"sPdfOrientation": "landscape",
								"sPdfMessage": "Master Data.",												

							},

							"print"
						]

					}*/
					 initComplete: function () {
					 var indx=0;
            this.api().columns().every( function () {indx++;
			if(block.indexOf(indx)==-1){
			
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
					d=d.replace(/(<([^>]+)>)/ig,"");
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
			}
            } );
        }

				} );/*.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            that
                .search( this.value )
                .draw();
        } );
    } );*/
				
				t.on( 'order.dt search.dt', function () {
			        t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
			            cell.innerHTML = i+1;
			        } );
			    } ).draw();
				/*
				$("#master_table thead tr").clone().prependTo($("#master_table thead")).find("th").each(function(i) {
					this.innerHTML = fnCreateSelect(t.fnGetColumnData(i));
       			 	$('select', this).change(function() {t.fnFilter($(this).val(), i);  }); 
				} );*/
				
	//$("thead td").each( function ( i ) {
       // this.innerHTML = fnCreateSelect( t.fnGetColumnData(i) );
   /*     $("#filterTb").change( function () {
            t.fnFilter( $(this).val() );
        } );*/
   // } );
	
	$($con,"select").chosen(); 
	$('#clr_fltr').click(function(){
	    $('option').prop('selected', false);
    	$('select').trigger('liszt:updated');
		//t.fnFilterClear();
		//t.ajax.reload();
		//$('#master_table').DataTable().fnDestroy();
		//$('#master_table').DataTable();
	//t.fnFilter('');	
	/*
		var oSettings = t.fnSettings();
    for(iCol = 0; iCol < oSettings.aoPreSearchCols.length; iCol++) {
        oSettings.aoPreSearchCols[ iCol ].sSearch = '';
    }
    oSettings.oPreviousSearch.sSearch = '';*/
	//console.log(t);
	t.column().every( function () {
	this.search( '', true, false )
	.draw();
	});
  
	});

});
</script>

</body></html>


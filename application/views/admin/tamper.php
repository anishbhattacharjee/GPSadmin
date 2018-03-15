<?php include 'include/adminassets.php';?>

<?php include 'include/adminheader.php';?>



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

							Tamper Alerts
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
											<th>Alert Time</th>											
											<th>Customer</th>
											<th>Phone</th>
											<th>Mail To Customer</th>
											
											
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
											
											
											
										</tr>

									</tfoot>

										

									



								<tbody>
<?php

//$sql=$con,"select i.customer_id,i.imie_no,i.device_name,i.device_id,i.category_id,c.category_type,l.lat,l.lng,l.speed,l.engine_status,l.device_time,ifnull(TIMESTAMPDIFF(HOUR,l.time_stamp,now()),0) as diff,u.customer_first_name,u.customer_phone_no FROM installation i left join latest_records l on i.imie_no=l.imei left join gps_categories c on i.category_id=c.category_id left join customers u on i.customer_id=u.customer_id where i.installation_status='completed'"; 
$sql=$con,"select l.*,c.customer_first_name,c.customer_phone_no,i.device_name from tamper_log l join installation i on l.imei=i.imie_no join customers c on i.customer_id=c.customer_id order by l.ts desc"; 

$rs=mysqli_query($sql);
while($devs=mysqli_fetch_assoc($rs)){


?>								
								<tr>
									<td></td>
									<td><?php echo $devs['device_name']; ?></td>
									<td><?php echo $devs['imei']; ?></td>
									<td><?php echo round($devs['lat'],3); ?></td>
									<td><?php echo round($devs['lng'],3); ?></td>									
									<td><?php echo date("d-m-Y H:i:s",strtotime($devs['ts'])); ?></td>
									<td><?php echo $devs['customer_first_name']; ?></td>
									<td><?php echo $devs['customer_phone_no']; ?></td>
									<td><button class="btn btn-small btn-yellow"><a href="<?php echo base_url(); ?>tamper/message?imei=<?php echo $devs['id']; ?>" style="text-decoration:none;" onclick="if(confirm('Send Mail to Customer?')){return true;}else{return false;}">Mail <i class="icon-arrow-right"></i></a></button></td>
									
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
 
    
    

	var block=[1,4,5,9];
	
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


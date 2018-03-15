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



		}select{
			  width: auto;
 * max-width: 145px;
 * min-width: 100px;
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

<script type="text/javascript">

$(function() {			

	/*

		$("#check").click(function(e) {

			$(this).addClass("disabled");

			var cid=$("#cid").val();			
			var table=$("#table").val();			

            if(cid==''){

				alert("Please choose customer!!!")				

			}else{

				

				$.ajax({

       				type: "GET",

       				url: "<?php echo base_url(); ?>ajaxfiles/to_metrack.php?cid="+imei+"&table="+table,

     				dataType: 'html',

       				success: function(data) {

						alert("");
					}

				});

							

				

				

				

			}

        });


*/
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

							Customize Dashboard 

							<small>

								<i class="icon-double-angle-right"></i>

								

							</small>

						</h1>

					</div>

				    <div class="row-fluid">

				    <div class="span12">

                    

					<div id="demo" >
					
<button class="btn btn-small btn-yellow" id="add_newcp_btn">Add New</button>					
<div class="add_newcp" style="visibility: hidden;height: 0px;">
	<form class="form-horizontal" action="<?php echo base_url(); ?>to_metrack/addnew" method="post">
								
								<div class="control-group">
									<label class="control-label" for="form-field-1">Customer</label>

									<div class="controls">
										<select class="chzn-select" name="customer" data-placeholder="Choose a Customer..." >
								<?php $sq=$con,"select customer_id,customer_first_name from customers"; 
								$rss=mysqli_query($sq);
								while($rws=mysqli_fetch_assoc($rss)){?>
									<option value="<?php echo $rws['customer_id']; ?>"><?php echo $rws['customer_first_name']; ?></option>
								
								<?php }
								?>
															</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="form-field-1">DB TAble</label>

									<div class="controls">
										<select name="table">
											<option value="gps_master">gps_master</option>
											<option value="newmetrack">newmetrack</option>
																				
										</select>
									</div>
								</div>
								

								
								<div class="form-actions">
									<button class="btn btn-info" type="submit">
										<i class="icon-ok bigger-110"></i>
										Submit
									</button>

									&nbsp; &nbsp; &nbsp;
									<button class="btn" type="reset" id="reset_newcp">
										<i class="icon-remove bigger-110"></i>
										Close
									</button>
								</div>

</form>
	
</div>
<div class="hr hr-18 dotted hr-double"></div>
                    <table id="master_table" class="table table-striped table-bordered table-hover">

									<thead>
										<tr>
											<th>SlNo</th>
											<th>Customer</th>
											<th>DB Table</th>																										<th>Change To</th>	
										</tr>

									</thead><tfoot>
										<tr>
											<th><span id="clr_fltr">Clear</span></th>
											<th></th>
											<th></th>
											<th></th>											
										</tr>
									</tfoot>
									<tbody>

									<?php

//$sql=$con,"select i.customer_id,i.imie_no,i.device_name,i.device_id,i.category_id,c.category_type,l.lat,l.lng,l.speed,l.engine_status,l.device_time,ifnull(TIMESTAMPDIFF(HOUR,l.time_stamp,now()),0) as diff,u.customer_first_name,u.customer_phone_no FROM installation i left join latest_records l on i.imie_no=l.imei left join gps_categories c on i.category_id=c.category_id left join customers u on i.customer_id=u.customer_id where i.installation_status='completed'"; 
$sql=$con,"select distinct p.customer_id,p.folder,c.customer_first_name FROM `customer_pages` p join customers c on p.customer_id=c.customer_id and folder='metrack'"; 

$rs=mysqli_query($sql);
while($devs=mysqli_fetch_assoc($rs)){


?>								
								<tr>
									<td></td>
									<td><?php echo $devs['customer_first_name']; ?></td>
									<td><?php echo $devs['folder']; ?></td>									
									<td>
									<form action="<?php echo base_url(); ?>to_metrack/change" method="post" style="margin: 0px;">
										<select name="table" id="table">
											<option value="gps_master">gps_master</option>
											<option value="newmetrack">newmetrack</option>																	
										</select>
										<input type="hidden" name="cid" value="<?php echo $devs['customer_id']; ?>" />
										<button class="btn btn-small btn-yellow" type="submit" onclick="if(confirm('Are you sure to change the dashboard?')){return true;}else{return false;}">Change<!--<a href="<?php echo base_url(); ?>to_metrack/change?customer_id=<?php echo $devs['customer_id']; ?>" style="text-decoration:none;" onclick="if(confirm('Change Dashboard?')){return true;}else{return false;}">Change <i class="icon-arrow-right"></i></a>--></button>
										</form>
										</td>
									
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
 
    
    

	var block=[1,4];
	
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
	$("#add_newcp_btn").click(function(){
		$("#add_newcp_btn").hide();		
		$($con,"select").chosen();
		$(".add_newcp").css("visibility","visible");
		$(".add_newcp").css("height","auto");
	});
	$("#reset_newcp").click(function(){
		$(".add_newcp").css("visibility","hidden");
		$(".add_newcp").css("height","0px");
		$("#add_newcp_btn").show();
	});

});
</script>


</body></html>


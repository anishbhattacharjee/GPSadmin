	<?php include 'include/engassets.php';?>
<?php include 'include/engheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/engsidebar.php';?>
	<?php   
	$tid=$_GET['tkt'];
	$cid=$_GET['cid'];
	//var_dump($cid);
	?>
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
							Tickets 
                            <small>
								<i class="icon-double-angle-right"></i>
								
							</small>
						</h1>
                        
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
						
						<div class="page-content">
					<div class="page-header position-relative">
						<h1>
							TICKET<?php echo str_pad($tid, 4, '0', STR_PAD_LEFT); ?>							
						</h1>
                        <p>
					<?php	
						$q=mysqli_query($con,"select * FROM `tickets` t join ticket_details td on td.ticket_id=t.id WHERE t.id='$tid' and td.customer_id='$cid'");

while($rqs=mysqli_fetch_array($q)){
                
				$tktstatus=$rqs['ticket_status'];
				}     ?>                                           <span class="label label-<?php if($tktstatus=='open'){echo "success";}else if($tktstatus=='processing'){ echo "warning"; }else{ echo "important"; } ?> arrowed">
                                                                 <?php echo $tktstatus; ?>
                                                                 </span>
                                                                </p>
					</div><!--/.page-header-->


							<div class="row-fluid">

								<div class="span12">
									<div class="widget-box ">
										<div class="widget-header">
											<h4 class="lighter smaller">
												<i class="icon-comment blue"></i>
												Conversation
											</h4>
										</div>

										<div class="widget-body">
											<div class="widget-main no-padding">
												<div class="dialogs">
												     <?php
			 
			 function time_elapsed_B($secs){
    $bit = array(
     //   ' year'        => $secs / 31556926 % 12,
    //    ' week'        => $secs / 604800 % 52,
        ' day'        => $secs / 86400 % 7,
        ' hour'        => $secs / 3600 % 24,
     //   ' minute'    => $secs / 60 % 60,
    //    ' second'    => $secs % 60
        );
        
    foreach($bit as $k => $v){
        if($v > 1)$ret[] = $v . $k . 's';
        if($v == 1)$ret[] = $v . $k;
        }
    array_splice($ret, count($ret)-1, 0, 'and');
    $ret[] = 'ago.';
    
    return join(' ', $ret);
    }
			 ?>   
												
                                                <?php

$sq_tkt=$con,"select * FROM `tickets` t join ticket_details td on td.ticket_id=t.id WHERE t.id=$tid order by t.ts";
$rs=mysqli_query($sq_tkt);
while($ticket=mysqli_fetch_assoc($rs)){
$customer_id=$ticket['customer_id'];
$tkt_id=$ticket['id'];
$sup_id=$ticket['support_id'];

 $un=$this->session->userdata('engusername'); 
 if($sup_id!=0)
 {

$q=mysqli_query($con,"select * from engineers where engineer_id='$sup_id'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['engineers_fname'];
							$engid=$re['engineer_id'];
							$photo=$re['photo'];
						
$engimg=base_url()."uploads/".$photo;
							

							}
							}
							else
							{
								$q=mysqli_query($con,"select * from engineers where engineers_email='$un'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['engineers_fname'];
							$engid=$re['engineer_id'];
							$photo=$re['photo'];
						
$engimg=base_url()."uploads/".$photo;
							

							}
							}
						$custimg=base_url()."uploads/noimage1.jpg";
						
?>

													<div class="itemdiv dialogdiv">
														<div class="user">
                                                         <?php if($ticket['customer_id']>0){ ?>
															<img alt="Alexa's Avatar" src="<?php echo $custimg;?>" />
                                                         <?php } else{?>
															<img alt="Alexa's Avatar" src="<?php echo $engimg;?>" />
														 <?php }?>
														</div>

														<div class="body">
															<div class="time">
																<i class="icon-time"></i>
																<span class="green">
                                                                <?php
																	$tstamp = strtotime($ticket['ts']); 
																	$hours = time_elapsed_B($tstamp);
																	echo $hours;
																	?>
                                                                </span>
															</div>

															<div class="name">
																
                                                                <?php if(($ticket['customer_id']==0) && ($sup_id!=0)){ ?>
                                                                <a href="#">	<?php

			$custiioriginal=0;
					

				echo $first; ?> </a>
                                                                <span class="label label-info arrowed arrowed-in-right">Support</span>
                                                                <?php } else if(($ticket['customer_id']>0) &&($sup_id==0) ){ 
																$customer_id=$ticket['customer_id'];
																$custiioriginal=0;
			
						$cq=mysqli_query($con,"select * from customers where customer_id='$customer_id'");
						while($rcq=mysqli_fetch_array($cq))
						{
						$custname=$rcq['customer_first_name'];
						}
						?>
                                                                <a href="#"><?php echo $custname;?></a>
                                                                <?php } ?>
															</div>
															<div class="text"><?php echo $ticket['comment'];?></div>

														</div>
													</div>
<?php } ?>


												</div>

												<form name="ticket_reply" method="post" action="<?php echo base_url();?>tickets/replied" />
												
													<div class="control-group">
									<label class="control-label" for="form-input-readonly">Ticket Closed</label>

									<div class="controls">
										<input type="radio"  name="status" value="closed">
										<label class="lbl" > Yes</label>
										&nbsp; &nbsp;
										<input type="radio"  name="status" value="processing" checked="">
										<label class="lbl" >No</label>
									</div>
								</div>
													<div class="form-actions input-append">
													
									
									<input placeholder="Type your message here ..." type="text" class="width-75" name="message" />
										<input type="hidden" name="customer_id" value="<?php echo $custiioriginal;?>"/>
										<input type="hidden" name="ticket_id" value="<?php echo $tid;?>"/>
										<input type="hidden" name="eng_id" value="<?php echo $engid;?>"/>
														<button class="btn btn-small btn-info no-radius" onclick="document.ticket_reply.submit();">
															<i class="icon-share-alt"></i>
															<span class="hidden-phone">Send</span>
														</button>
									
													</div>
												</form>
											</div><!--/widget-main-->
										</div><!--/widget-body-->
									</div><!--/widget-box-->
								</div><!--/span-->
							</div><!--/row-->

				</div><!--/.page-content-->

			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.slimscroll.min.js"></script>
		<script src="assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/flot/jquery.flot.min.js"></script>
		<script src="assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="assets/js/flot/jquery.flot.resize.min.js"></script>

		<!--ace scripts-->

		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase()) ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html', {tagValuesAttribute:'data-values', type: 'bar', barColor: barColor , chartRangeMin:$(this).data('min') || 0} );
				});
			
			
			
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaings",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			
			  var $tooltip = $("<div class='tooltip top in hide'><div class='tooltip-inner'></div></div>").appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
			
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').slimScroll({
					height: '300px'
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if("ontouchstart" in document && /applewebkit/.test(agent) && /android/.test(agent))
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				});
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
				
			
			})
		</script>
	</body>
</html>
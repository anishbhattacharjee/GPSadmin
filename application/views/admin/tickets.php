					<?php include 'include/engassets.php';?>
<?php include 'include/engheader.php';?>
<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

		<?php include 'include/engsidebar.php';?>
	
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
								<!--Customer CID<?php
								$id=1;
								 echo $id; ?>-->
							</small>
						</h1>
                        
					</div><!--/.page-header-->

					<div class="row-fluid">
						<div class="span12">
					
											<!--<div id="home3" class="tab-pane in active">
                                                <div id="nots"></div>
                                                <form class="form-horizontal" id="ticket_add" />
                    
                                                    <div class="control-group">
                                                        <label class="control-label" for="form-field-2">Subject</label>
                    
                                                        <div class="controls">
                                                        <span class="input-icon">
                                                          <input type="text" id="form-field-2" name="sub" placeholder="Subject" />
                                                          <i class="icon-comment-alt"></i>
                                                        </span>	
                                                        </div>
                                                    </div>
                    
                    
                                                    <div class="control-group">
                                                        <label class="control-label" for="form-field-5">Message</label>
                    
                                                        <div class="controls">
                                                                <textarea class="span12" id="form-field-8" name="message" placeholder="Your message"></textarea>
                                                            <div class="help-block" id="input-span-slider"></div>
                                                        </div>
                                                    </div>
                    
                                                    <input type="hidden" value="<?php echo $id; ?>" name="id"/>
                                                    <div class="form-actions">
                                                        <button class="btn btn-info" type="button" id="mail_id">
                                                            <i class="icon-ok bigger-110"></i>
                                                            Send
                                                        </button>
                    
                                                        &nbsp; &nbsp; &nbsp;
                                                        <button class="btn" type="reset" id="reset">
                                                            <i class="icon-undo bigger-110"></i>
                                                            Reset
                                                        </button>
                                                    </div>
                    
                                                    <div class="hr"></div>
                    
                                                </form>

												
											</div>-->

											<div id="profile3" class="tab-pane">
                                            
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


<div class="widget-box transparent">
											<div class="widget-header widget-header-small">
												<h4 class="blue smaller">
													<i class="icon-rss orange"></i>
													Tickets
												</h4>

												<div class="widget-toolbar action-buttons">
													<a href="#" data-action="reload">
														<i class="icon-refresh blue"></i>
													</a>

													&nbsp;
													
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-8">
													<div id="profile-feed-1" class="profile-feed">
                                                    
                                                    <?php
													$i=0;
													
										$sq3=$con,"select *,t.id as mainid FROM `tickets` t join ticket_details td on td.ticket_id=t.id group by td.ticket_id";
										$rs3=mysqli_query($sq3);
										while($tickets=mysqli_fetch_assoc($rs3)){
													
													?>
														<div class="profile-activity clearfix">
															<div>
																<a href="<?php echo base_url();?>tickets/reply?cid=<?php echo $tickets['customer_id']; ?>&tkt=<?php echo $tickets['mainid']; ?>" >
                                                                   <i class="pull-left thumbicon  btn-pink no-hover"><?php echo ++$i; ?></i>
                                                                    TICKET<?php echo str_pad($tickets['mainid'], 4,'0',STR_PAD_LEFT); ?>	 -	<?php echo $tickets['issue']; ?>														
																</a>
                                                                <p>
                                                                <span class="label label-<?php if($tickets['ticket_status']=='open'){echo "success";}else if($tickets['ticket_status']=='processing'){ echo "warning"; }else{ echo "important"; } ?> arrowed">
                                                                 <?php echo $tickets['ticket_status']; ?>
                                                                 </span>
                                                                </p>
                                                               
																<div class="time">
																	<i class="icon-time bigger-110"></i>
                                                                    
                                                                    <?php
																	$sq4=$con,"select * FROM `tickets` t join ticket_details td on td.ticket_id=t.id group by td.ticket_id";
																	$rs4=mysqli_query($sq4);
																	$rw4=mysqli_fetch_assoc($rs4);
																	$tstamp = strtotime($rw4['ts']); 
																	$hours = time_elapsed_B($tstamp);
																	echo $hours;
																	?>																	
																</div>
															</div>

<!--															<div class="tools action-buttons">
																<a href="#" class="blue">
																	<i class="icon-pencil bigger-125"></i>
																</a>

																<a href="#" class="red">
																	<i class="icon-remove bigger-125"></i>
																</a>
															</div>
-->														</div>
<?php } ?>
														

													</div>
												</div>
											</div>
										</div>


											</div>

											
										</div>
									</div>
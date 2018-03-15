<?php include 'include/adminassets.php';?>
<?php include 'include/adminheader.php';?>
<?php
$sql=$con,"select * from stock LEFT JOIN vendors  ON payeeid = vendor_id where stockid=$id";
$rs=mysqli_query($sql);
$rw=mysqli_fetch_assoc($rs);
?>
<!--table scripts-->

	<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/ZeroClipboard.js"></script>
		<script type="text/javascript" charset="utf-8" src="<?php echo base_url();?>media/js/TableTools.js"></script>
		
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/datepicker.css" />
<!--table scripts-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/jquery.dataTables.min.js"></script>

			<script src="<?php echo base_url();?>assets/js/date-time/bootstrap-datepicker.min.js"></script>

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
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<div class="space-6"></div>

							<div class="row-fluid">
								<div class="span10 offset1">
									<div class="widget-box transparent invoice-box">
										<div class="widget-header widget-header-large">
											<h3 class="grey lighter pull-left position-relative">
												<i class="icon-leaf green"></i>
												Stock Entry - <?php echo $rw['stockid']; ?>
											</h3>

											<div class="widget-toolbar no-border invoice-info">
												<span class="invoice-info-label">ID:</span>
												<span class="red">#<?php echo $rw['stockid']; ?></span>

												<br />
												<span class="invoice-info-label">Date:</span>
												<span class="blue"><?php echo date("d-m-Y",strtotime($rw['entry_date'])); ?></span>
											</div>
                                            <div class="widget-toolbar hidden-480">
												<a href="<?php echo base_url();?>stock/stock_print/<?php echo $id; ?>"  target="_blank">
													<i class="icon-print"></i>
												</a>
											</div>

										</div>

										<div class="widget-body">
											<div class="widget-main padding-24">
												<div class="row-fluid">
												  <div class="row-fluid">
													<div class="span6">
															<div class="row-fluid">
														  <div class="span6 label label-large ">
																	<b>Stock Entry Details</b>
																</div>
															</div>

															<div class="row-fluid">
																<ul class="unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Payee	:	
                                                                         <b class="red"><?php echo $rw['vendor_name']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		PO NO	:	
                                                                        <b class="red"><?php echo $rw['po_no']; ?></b>
																	</li>
																	<li class="divider"></li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Invoice No :	
                                                                         <b class="red"><?php echo $rw['inv_no']; ?></b>
																	</li>
                                                                    <li>
																		<i class="icon-caret-right blue"></i>
																		Invoice Date	:	
                                                                         <b class="red"><?php echo date("d-m-Y",strtotime($rw['inv_date'])); ?></b>
																	</li>

                                                                    <li>
																		<i class="icon-caret-right blue"></i>
																		Invoice Amount	:	
                                                                         <b class="red">Rs.<?php echo $rw['inv_amt']; ?></b>
																	</li>
																	<li class="divider"></li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		DC NO	:	
																		<b class="red"><?php echo $rw['dc_no']; ?></b>
																	</li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		DC Date	:	
																		<b class="red"><?php echo date("d-m-Y",strtotime($rw['dc_date'])); ?></b>
																	</li>
																	<li>
																		<i class="icon-caret-right blue"></i>
																		No Of Items :	
																		<b class="red"><?php echo $rw['nitem']; ?></b>
																	</li>

																	
																</ul>
															</div>
													  </div><!--/span-->
													</div><!--row-->

													<div class="space"></div>

													<div class="row-fluid">
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">#</th>
																	<th>Category</th>
																	<th>Item Code</th>
																	<th>IMEI</th>
																	<th>S/N</th>
                                                                    <th>UOM</th>
                                                                    <th>QTY</th>
                                                                    <th>Rate/Unit</th>
                                                                    <th>Amount</th>
                                                                    <th>Remarks</th>
                                                                    
                                                                    
                                                                    
                                                                    
																</tr>
															</thead>

															<tbody>
                                                            <?php $i=$tot_qty=$tot_amt=0;$s=$con,"select
s.item,
s.imei,
s.sn,
s.`desc`,
s.uom,
s.qty,
s.rate,
s.amt,
c.category_type,
d.device_type
FROM
stock_details AS s
left JOIN gps_categories AS c ON s.category_id = c.category_id
left JOIN gps_devices d ON d.device_id = s.item
WHERE s.stock_id=$id";
															$r=mysqli_query($s);
															while($det=mysqli_fetch_assoc($r)){
																$tot_qty+=$det['qty'];
																$tot_amt+=$det['amt'];
															?>
																<tr>
																	<td class="center"><?php echo ++$i;?></td>
																	<td><?php echo $det['category_type']; ?></td>
																	<td><?php echo $det['device_type']; ?></td>
																	<td> <?php echo $det['imei']; ?> </td>
																	<td><?php echo $det['sn']; ?></td>
                                                                    <td><?php echo $det['uom']; ?></td>
                                                                    <td><?php echo $det['qty']; ?></td>
                                                                    <td><?php echo $det['rate']; ?></td>
                                                                    <td><?php echo $det['amt']; ?></td>
                                                                    <td><?php echo $det['desc']; ?></td>
																</tr>

																<?php } ?>
                                                                  <?php
																$sql_acc=$con,"select
s.item,
s.`desc`,
s.uom,
s.qty,
s.rate,
s.amt,
c.category_type,
d.code
FROM
stock_accessories as s
LEFT JOIN gps_categories as c ON s.category_id = c.category_id
LEFT JOIN extra_device as d ON d.id = s.item
WHERE stock_id=$id";
$ra=mysqli_query($sql_acc);

															while($acc=mysqli_fetch_assoc($ra)){
																$tot_qty+=$acc['qty'];
																$tot_amt+=$acc['amt'];
																?>
                                                                <tr>
																	<td class="center"><?php echo ++$i;?></td>
																	<td><?php echo $acc['category_type']; ?></td>
																	<td><?php echo $acc['code']; ?></td>
																	<td>  </td>
																	<td></td>
                                                                    <td><?php echo $acc['uom']; ?></td>
                                                                    <td><?php echo $acc['qty']; ?></td>
                                                                    <td><?php echo $acc['rate']; ?></td>
                                                                    <td><?php echo $acc['amt']; ?></td>
                                                                    <td><?php echo $acc['desc']; ?></td>
																</tr>
                                                                <?php }	?>
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row-fluid">
														<div class="span5 pull-right">
															<h4 class="pull-right">
																Total Items :
																<span class="red"><?php echo $tot_qty; ?></span>
                                                                <br/>
                                                                Total Amount :
																<span class="red"><?php echo $tot_amt; ?></span>
															</h4>
														</div>
														
													</div>

													<div class="space-6"></div>

													
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--PAGE CONTENT ENDS-->
						</div><!--/.span-->
					</div><!--/.row-fluid-->
				</div>
			
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>
   

</body></html>
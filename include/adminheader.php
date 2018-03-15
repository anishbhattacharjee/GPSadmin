	<body>
<?php include "dbcon.php";?>
<style>
small img{
width: 60%;
margin-top: -12px;
padding: 0px;
margin-bottom: -12px;
}
</style>
		<div class="navbar">

			<div class="navbar-inner" style="background: #FFFFFF;">

				<div class="container-fluid">

					<a href="<?php echo base_url();?>adminlogin" class="brand">

						<small>

<img src="<?php echo base_url();?>logo.png" />

						</small>

					</a><!--/.brand-->



					<ul class="nav ace-nav pull-right">
<?php

$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$type=$user['user_type'];
if($type=='operations' || $type=='support')
{
	$qo=mysqli_query($con,"select count(r_id) as cnt from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.renew_status='renew' and i.renew_approve_status!='pending' and MONTH(DATE_ADD(installed_date, INTERVAL submonth MONTH))=MONTH(NOW()) and YEAR(DATE_ADD(installed_date, INTERVAL submonth MONTH))=YEAR(NOW())");
	$rqo=mysqli_fetch_array($qo);
?>
					
<li class="purple" id="block">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								Subscription Renewal Notifications<span class="badge badge-important"><?php echo $rqo['cnt'];?></span>
							</a>

			<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer" style="width: 268px;">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									<?php echo $rqo['cnt'];?> Notifications
								</li>
<?php


$mnth=date('M');

	$qo=mysqli_query($con,"select *,DATE_ADD(installed_date, INTERVAL submonth MONTH) as expiry_date from r_installation i join customers c on c.customer_id=i.customer_id where i.installation_status='completed' and i.renew_status='renew' and i.renew_approve_status!='pending' and MONTH(DATE_ADD(installed_date, INTERVAL submonth MONTH))=MONTH(NOW()) and YEAR(DATE_ADD(installed_date, INTERVAL submonth MONTH))=YEAR(NOW())");
	while($srs=mysqli_fetch_array($qo))

						{

							$instatllation_id=$srs['installation_id'];

							$customer_id=$srs['customer_id'];
							$expiry_date=$srs['expiry_date'];
$s=mysqli_query($con,"select * from customers where customer_id='$customer_id'");

									while($r=mysqli_fetch_array($s))

									{

											$uidd=$r['customer_uid'];

										$cfrist=$r['customer_first_name'];

										$compname=$r['comp_name'];

									}
	?>
								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
											<?php	if($cfrist!='')

										{ ?><?php echo $cfrist;?><?php }

										else

										{

											?><?php echo $compname."(Company Name)";?><?php

										}?>
											</span>
											<span class="pull-right badge badge-info"><?php echo date("d-m-Y",strtotime($expiry_date));?></span>
										</div>
									</a>
								</li>

<?php } ?>


							

								<li>
									<a href="<?php echo base_url();?>subscription_renewal" target="_blank">
										See all Subscription Renewal Notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>


<?php } ?>



						<li class="light-blue">

							<a data-toggle="dropdown" href="#" class="dropdown-toggle">

							<!--	<img class="nav-user-photo" src="<?php echo base_url();?>assets/avatars/user.jpg" alt="Jason's Photo" />-->

								<span class="user-info">

									<small>Welcome,</small>

									<?php

					 $un=$this->session->userdata('username'); 

				

				$q=mysqli_query($con,"select * from admin_data where email_id='$un'");



						while($re=mysqli_fetch_array($q))



						{



							$first=$re['name'];

							

							} 

						

							if(!isset($first)) $first='';

							echo  $first; ?>

								</span>



								<i class="icon-caret-down"></i>

							</a>



							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">

							

								


								<li class="divider"></li>



								<li>

									<a href="<?php echo base_url();?>adminlogin/logout">

										<i class="icon-off"></i>

										Logout

									</a>

								</li>

							</ul>

						</li>

					</ul><!--/.ace-nav-->

				</div><!--/.container-fluid-->

			</div><!--/.navbar-inner-->

		</div>
		
		
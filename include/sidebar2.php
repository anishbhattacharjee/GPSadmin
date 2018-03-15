<?php include 'dbcon.php'; ?>
<style>
span
{
	font-size: 10px;
}
li>a
{
	font-size: 10px;
}
.nav-list>li>a {
	font-size: 10px;
}
</style>

<?php



$un=$this->session->userdata('username'); //echo $un;
$q=mysqli_query($con,"select * from admin_data where email_id='$un'");
$user=mysqli_fetch_array($q);
$type=$user['user_type'];
 
function has_permission($type, $req){
    global $con;
//		$con = mysqli_connect('localhost', 'root', '');
//
//mysqli_select_db($con,'trackingway2gps_db');
//$s_per=$con,"select
    $s_per="select
id
FROM
user_permissions
WHERE user_type='".$type."' and permission='$req'";
						$r_per=mysqli_query($con,$s_per);
						$permission=mysqli_fetch_assoc($r_per);	
						if($permission['id'] && $permission['id'] > 0)
						{
							$result= true;
						}
						else{
							$result= false;
						}
						return $result;
						
}


?>

<div class="sidebar" id="sidebar">
<?php if($type=='admin' ||  has_permission($type, 'settings')){ ?>
<div class="sidebar-shortcuts" id="sidebar-shortcuts">
<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	<button class="btn btn-small btn-success" title="Geo Lence">
		<i class="icon-hand-down"></i>
	</button>

	<button class="btn btn-small btn-info" title="Route Playback">
		<i class="icon-facetime-video"></i>
	</button>

	<button class="btn btn-small btn-warning" title="Reports">
		<i class="icon-bar-chart"></i>
	</button>

<!--						<button class="btn btn-small btn-danger" title="Engine Control">
		<i class="icon-cogs"></i>
	</button>
-->                        <div class="btn-group">
						<button data-toggle="dropdown" class="btn btn-small btn-danger dropdown-toggle" title="Engine Control" >
							<i class="icon-cogs"></i>
							<span class="caret"></span>
						</button>

						<ul class="dropdown-menu dropdown-warning" style="text-align:left;">
							<li>
                                    <a href="<?php echo base_url();?>category_list" >                                                        
                                        <span class="menu-text">   Device Categories  </span>                                                          
                                    </a>
                        
                            </li>

                                                    
                            <li>
                                    <a href="<?php echo base_url();?>device_details" >                                                        
                                       <span class="menu-text">    Device Codes </span>
                                        
                                    </a>
                        
                            </li>

							<li>
                                    <a href="<?php echo base_url();?>extradevice_charge" >
                                      
                                        <span class="menu-text"> Extra Devices </span>
                                        
                                    </a>
                        
                            </li>
                            <li>
                                    <a href="<?php echo base_url();?>generic_category" >
                                       
                                        <span class="menu-text"> Generic Categories </span>
                                        
                                    </a>
                        
                            </li>

							<li class="divider"></li>
        
                            <li>
                                <a href="<?php echo base_url();?>company">
                                    
                                    <span class="menu-text"> Company </span>
                                    
                                </a>
                            
                             </li>
                            
                            <li>
                                <a href="<?php echo base_url();?>engineer_details">
                                    
                                    <span class="menu-text"> Engineer Details </span>
                                    
                                </a>
                            
                            </li>
                            
                                
                            <li>
                                <a href="<?php echo base_url();?>device_details/subscription" >
                                   
                                    <span class="menu-text"> Subscription </span>
                                    
                                </a>
                            
                           </li>
						    <li>
                                <a href="<?php echo base_url();?>school" >
                                   
                                    <span class="menu-text"> Add Schools </span>
                                    
                                </a>
                            
                           </li>
                           <li>
                                <a href="<?php echo base_url();?>users">
                                <span class="menu-text"> 
                                
                                User Managenent
                                </span>
                                </a>
                                
                            </li>
                             <li>
                                <a href="<?php echo base_url();?>promo_code">
                                <span class="menu-text"> 
                                
                                Promo Codes
                                </span>
                                </a>
                                
                            </li>
<li>
<a href="<?php echo base_url();?>sim_details/network" >

<span class="menu-text"> Network </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>sim_details" >

<span class="menu-text"> Sim Data </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>dealers" >

<span class="menu-text"> Dealers </span>
</a>
</li> 

	
						</ul>
                     
	</div><!--/btn-group-->
</div>

<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
	<span class="btn btn-success"></span>

	<span class="btn btn-info"></span>

	<span class="btn btn-warning"></span>

	<span class="btn btn-danger"></span>
</div>
</div><!--#sidebar-shortcuts-->
   <?php } 
   if($type=='inventory')
   {
   	?>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	<button class="btn btn-small btn-success" title="Geo Lence">
		<i class="icon-hand-down"></i>
	</button>

	<button class="btn btn-small btn-info" title="Route Playback">
		<i class="icon-facetime-video"></i>
	</button>

	<button class="btn btn-small btn-warning" title="Reports">
		<i class="icon-bar-chart"></i>
	</button>

<!--						<button class="btn btn-small btn-danger" title="Engine Control">
		<i class="icon-cogs"></i>
	</button>
-->                        <div class="btn-group">
						<button data-toggle="dropdown" class="btn btn-small btn-danger dropdown-toggle" title="Engine Control" >
							<i class="icon-cogs"></i>
							<span class="caret"></span>
						</button>

						<ul class="dropdown-menu dropdown-warning" style="text-align:left;">
							<li>
                                    <a href="<?php echo base_url();?>category_list" >                                                        
                                        <span class="menu-text">   Device Categories   </span>                                                         
                                    </a>
                        
                            </li>

                                                    
                            <li>
                                    <a href="<?php echo base_url();?>device_details" >                                                        
                                       <span class="menu-text">    Device Codes </span>
                                        
                                    </a>
                        
                            </li>

							<li>
                                    <a href="<?php echo base_url();?>extradevice_charge" >
                                      
                                        <span class="menu-text"> Extra Devices </span>
                                        
                                    </a>
                        
                            </li>
                            <li>
                                    <a href="<?php echo base_url();?>generic_category" >
                                       
                                        <span class="menu-text"> Generic Categories </span>
                                        
                                    </a>
                        
                            </li>

							<li class="divider"></li>
        
                         
                    
						    <li>
                                <a href="<?php echo base_url();?>school" >
                                   
                                    <span class="menu-text"> Add Schools </span>
                                    
                                </a>
                            
                           </li>
                    
  <li>
<a href="<?php echo base_url();?>dealers" >

<span class="menu-text"> Dealers </span>
</a>
</li>                       
<li>
<a href="<?php echo base_url();?>sim_details/network" >

<span class="menu-text"> Network </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>sim_details" >

<span class="menu-text"> Sim Data </span>
</a>
</li> 
    <li>
                                <a href="<?php echo base_url();?>status" >
                                   
                                    <span class="menu-text"> Device Signal Test </span>
                                    
                                </a>
                            
                           </li>
    <li>
                                <a href="<?php echo base_url();?>assign_metrack" >
                                   
                                    <span class="menu-text"> Assign Metrack </span>
                                    
                                </a>
                            
                           </li>
						       <li>
                                <a href="<?php echo base_url();?>assign_normal" >
                                   
                                    <span class="menu-text"> Assign Nomral </span>
                                    
                                </a>
                            
                           </li>


	
						</ul>
                     
	</div><!--/btn-group-->
</div>

<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
	<span class="btn btn-success"></span>

	<span class="btn btn-info"></span>

	<span class="btn btn-warning"></span>

	<span class="btn btn-danger"></span>
</div>
</div><!--#sidebar-shortcuts-->
	<?php
   }
   if($type=='operations') {
   	?>
	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
	<button class="btn btn-small btn-success" title="Geo Lence">
		<i class="icon-hand-down"></i>
	</button>

	<button class="btn btn-small btn-info" title="Route Playback">
		<i class="icon-facetime-video"></i>
	</button>

	<button class="btn btn-small btn-warning" title="Reports">
		<i class="icon-bar-chart"></i>
	</button>

                      <div class="btn-group">
						<button data-toggle="dropdown" class="btn btn-small btn-danger dropdown-toggle" title="Engine Control" >
							<i class="icon-cogs"></i>
							<span class="caret"></span>
						</button>

						<ul class="dropdown-menu dropdown-warning" style="text-align:left;">
						   <li>
                                <a href="<?php echo base_url();?>company">
                                    
                                    <span class="menu-text"> Company </span>
                                    
                                </a>
                            
                             </li>
                            
                            <li>
                                <a href="<?php echo base_url();?>engineer_details">
                                    
                                    <span class="menu-text"> Engineer Details </span>
                                    
                                </a>
                            
                            </li>
	<!--		     <li>
                                <a href="<?php echo base_url();?>promo_code">
                                <span class="menu-text"> 
                                
                                Promo Codes
                                </span>
                                </a>
                                
                            </li>	-->

<li>
<a href="<?php echo base_url();?>dealers" >

<span class="menu-text"> Dealers </span>
</a>
</li> 

	
						</ul>
                     
	</div><!--/btn-group-->
</div>

<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
	<span class="btn btn-success"></span>

	<span class="btn btn-info"></span>

	<span class="btn btn-warning"></span>

	<span class="btn btn-danger"></span>
</div>
</div><!--#sidebar-shortcuts-->
	<?php
   }
   ?>

<ul class="nav nav-list">

<?php if($type=='dealer_mark') {?>
<li>
			<a href="<?php echo base_url();?>concox">
				<i class="icon-arrow-right"></i>

				Concox - Assign Device
			
			</a>
			
</li>
<li>
	<a href="<?php echo base_url();?>stock_upload" class="dropdown-toggle">
		<i class="icon-upload"></i>
		<span class="menu-text"> Stock Upload</span>
		
	</a>

</li>	
<?php }else{?>
<li>
<a href="<?php echo base_url();?>customer_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer List </span>
</a>
</li> 
<?php 
if($un=='swathi@ossgpstracking.com')
{
	?>
<li>
	<a href="<?php echo base_url();?>testing" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Testing</span>
		
	</a>

    </li>
	<?php
}
?>
<?php if($type=='admin' ||  has_permission($type, 'dashboard') ){ ?>

<li class="active">
	<a href="<?php echo base_url();?>adminlogin/dashboard">
		<i class="icon-dashboard"></i>
		<span class="menu-text"> Dashboard </span>
	</a>
</li>


<?php } ?>
<?php if($type=='admin' ||  has_permission($type, 'inventory') ){ ?>

	<li>
	<a href="<?php echo base_url();?>stock_upload" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Stock Upload</span>
		
	</a>

    </li>	
	<li>
	<a href="<?php echo base_url();?>stock" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Stock Entry</span>
		
	</a>

    </li>
			<li>
	<a href="<?php echo base_url();?>testing" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Testing</span>
		
	</a>

    </li>

	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Inventory</span>
		
	
<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >
	
 <li>

			<a href="<?php echo base_url();?>stock/new_stock">

				<i class="icon-double-angle-right"></i>

				Newly Entered Stock 

			</a>

		</li>
<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>

				Quality Check
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo base_url();?>qualitycheck">
						<i class="icon-leaf"></i>
						Pending
					</a>
				</li>

				<li>
					<a href="<?php echo base_url();?>qualitycheck/completed" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Completed
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>qualitycheck/rejected" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Rejected
						
					</a>

				</li>
			</ul>
		</li>

        <li>

			<a href="<?php echo base_url();?>stock_available">

				<i class="icon-double-angle-right"></i>

				Total Stock 

			</a>

		</li>
          <li>

			<a href="<?php echo base_url();?>stock_concox">

				<i class="icon-double-angle-right"></i>

				Concox Stock 

			</a>

		</li>
        
    </ul>
    </li>


	<li>
			<a href="<?php echo base_url();?>device_make">
				<i class="icon-double-angle-right"></i>

				Device Make
			
			</a>
			
		</li>

<?php } 
?>
<?php if($type=='admin' ||  has_permission($type, 'orders') || $type=='subadmin' || $type=='support' || $type=='inventory'){ ?>

		
			<li>
					<a href="<?php echo base_url();?>customer_registration/basic_data">
						<i class="icon-leaf"></i>
						Create Order
					</a>
				</li>
				<!--<li>
					<a href="#">
						<i class="icon-leaf"></i>
						Edit/Delete
					</a>
				</li>-->
			
		

<?php } 
?>
<?php 

if($type=='approver'||  has_permission($type, 'approver'))
{
	?><li>
					<a href="<?php echo base_url();?>order_details/approve" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Order Approvals
						
					</a>

				</li>
	<?php
}
?>
<?php if($type=='admin' ||  has_permission($type, 'order_processing')|| $type=='inventory'){ ?>
<li>
					<a href="<?php echo base_url();?>order_details/approve" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Order Approvals
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>order_details/pending" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Order Pending
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>order_details/rejected_orders" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Rejected Order
						
					</a>

				</li>
					<li>
			<a href="<?php echo base_url();?>order_details/approve_payment_orders">
				<i class="icon-double-angle-right"></i>

				Confirm Payment
			
			</a>
			
		</li>


<?php } 
?>

<?php
if($type=='support'||$type=='inventory')
{
	?>
					 <li>
<a href="<?php echo base_url();?>demo_request" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request </span>
</a>
</li> 
	<?php
}
?>
<?php 
if($type=='inventory')
{
	?>
<li>
<a href="<?php echo base_url();?>demo_request/approve" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> DemoRequestApprovals </span>
</a>
</li> 
<?php
}
?>
<?php
if($type=='Product Manager')
{
	?>
	
		<li>
	<a href="<?php echo base_url();?>testing" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Testing</span>
		
	</a>

    </li>
	
	<li>
					<a href="<?php echo base_url();?>customer_registration/basic_data">
						<i class="icon-leaf"></i>
						Create Order
					</a>
				</li>
	
		<li>
	<a href="<?php echo base_url();?>installation/assigned_devicelist" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assigned Device List</span>
		
	</a>

    </li>
	<li>
			<a href="<?php echo base_url();?>installation/assigned_engineerlist">
				<i class="icon-double-angle-right"></i>

				Assigned Engineer
			
			</a>
			
		</li>
		<li>
					<a href="<?php echo base_url();?>order_pending" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Orders Pending
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>order_confirmed" class="dropdown-toggle">
						<i class="icon-check"></i>

						Orders List
						
					</a>

				</li>
				
				 <li>
<a href="<?php echo base_url();?>demo_request" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request </span>
</a>
</li> 
 <li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo RequestList </span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo InstallationPending </span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd </span>
</a>
</li>
				
				 <li>

			<a href="<?php echo base_url();?>stock_available">

				<i class="icon-double-angle-right"></i>

				Total Stock 

			</a>

		</li>
				<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report/qc">
				<i class="icon-double-angle-right"></i>

				QC Report
			
			</a>
			
		</li>
				<li>
<a href="<?php echo base_url();?>invoices" class="dropdown-toggle">
<i class="icon-pencil"></i>

Invoices

</a>

</li>
	<?php 
		 
	}
?>

<?php
if($type=='inventory')
{
	?>
	<li>
	<a href="<?php echo base_url();?>order_details/confirmed" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assign DevicePending</span>
		
	</a>

    </li>
	<li>
	<a href="<?php echo base_url();?>installation/assigned_devicelist" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assigned Device List</span>
		
	</a>

    </li>
	<li>
			<a href="<?php echo base_url();?>addimei">
				<i class="icon-double-angle-right"></i>

				Add IMEI
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>editimei">
				<i class="icon-double-angle-right"></i>

				Edit IMEI
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>colaimei">
				<i class="icon-double-angle-right"></i>

				Add IMEI For Cola
			
			</a>
			
		</li>
	
	
	<?php
}
if($type=='inventory')
{
	?>
	<li>
<a href="<?php echo base_url();?>demo_request/confirmed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoDevice</span>
</a>
</li> 
	<li>
			<a href="<?php echo base_url();?>return_stock">
				<i class="icon-double-angle-right"></i>

				Return Stock
			
			</a>
			
		</li>
		 <li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">Demo Request List</span>
</a>
</li>
		
		<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report/qc">
				<i class="icon-double-angle-right"></i>

				QC Report
			
			</a>
			
		</li>
	<?php
}

?>


<?php if($type=='dealer' || $type=='marketing' || $type=='subadmin' ){ ?>
<li>
					<a href="<?php echo base_url();?>order_pending" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Orders Pending
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>order_confirmed" class="dropdown-toggle">
						<i class="icon-check"></i>

						Orders List
						
					</a>

				</li>
				
				

<?php }
// ||  has_permission($type, 'margin') 
 ?>  
<?php if($type=='admin' || $type=='dealer'|| $type=='accounts'){ ?>

 <li>
					<a href="<?php echo base_url();?>dealer_margin" class="dropdown-toggle">
						<i class="icon-star"></i>

						Dealer Margin
						
					</a>

				</li>    
                <?php } 
				
				if($type=='dealer')
				{
					?>
						<li>
	<a href="<?php echo base_url();?>order_details/confirmed" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assign DevicePending</span>
		
	</a>

    </li>
	<li>
			<a href="<?php echo base_url();?>installation/assigned_devicelist">
				<i class="icon-double-angle-right"></i>

				Assign Engineer
			
			</a>
			
		</li>
		<li>

	<a href="#" class="dropdown-toggle">

		<i class="icon-bolt"></i>

		<span class="menu-text">Installation Status </span>



		<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>installation/status_pending">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		


				<li>
					<a href="<?php echo base_url();?>installation/status_completed" >
						<i class="icon-pencil"></i>

				Completed
						
					</a>

				</li>
			
	</ul>

</li>
					<?php
				}
			
				
if($type=='admin')
{
	?>
	<li>
	<a href="<?php echo base_url();?>order_details/confirmed" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assign DevicePending</span>
		
	</a>

    </li>
	<?php 
} ?>
<?php if($type=='operations')
{
	?>
	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Inventory</span>
		
	
<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >
	
 <li>

			<a href="<?php echo base_url();?>stock/new_stock">

				<i class="icon-double-angle-right"></i>

				Newly Entered Stock 

			</a>

		</li>
<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>

				Quality Check
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo base_url();?>qualitycheck">
						<i class="icon-leaf"></i>
						Pending
					</a>
				</li>

				<li>
					<a href="<?php echo base_url();?>qualitycheck/completed" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Completed
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>qualitycheck/rejected" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Rejected
						
					</a>

				</li>
			</ul>
		</li>

        <li>

			<a href="<?php echo base_url();?>stock_available">

				<i class="icon-double-angle-right"></i>

				Total Stock 

			</a>

		</li>
        
    </ul>
    </li>



	<li>
					<a href="<?php echo base_url();?>order_confirmed/confirmed_order_view" class="dropdown-toggle">
						<i class="icon-check"></i>

							Confirmed Orders
					</a>

				</li>
	<?php
} ?>
<?php if($type=='support' || has_permission($type, 'support') || $type=='admin')
{
	?>
	<li>
					<a href="<?php echo base_url();?>order_confirmed/confirmed_order_view" class="dropdown-toggle">
						<i class="icon-check"></i>

							Confirmed Orders
					</a>

				</li>
		<li>
			<a href="<?php echo base_url();?>installation/assigned_devicelist">
				<i class="icon-double-angle-right"></i>

				Assign Engineer
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>installation/assigned_engineerlist">
				<i class="icon-double-angle-right"></i>

				Assigned Engineer
			
			</a>
			
		</li>
	
	<?php
} ?>
<?php if($type=='admin' ||$type=='marketing'||   has_permission($type, 'installation') || $type=='operations' ||$type=='support'|| $type=='subadmin'){ ?>
<li>

	<a href="#" class="dropdown-toggle">

		<i class="icon-bolt"></i>

		<span class="menu-text">Installation Status </span>



		<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>installation/status_pending">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		


				<li>
					<a href="<?php echo base_url();?>installation/status_completed" >
						<i class="icon-pencil"></i>

				Completed
						
					</a>

				</li>
			
	</ul>

</li>
<?php }


if($type=='support')
{
	?>
	<li>
			<a href="<?php echo base_url();?>payment">
				<i class="icon-double-angle-right"></i>

				Pending Payments
			
			</a>
			
		</li>
		<li>
<a href="<?php echo base_url();?>demo_request/assigned_devicelist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoEngineer</span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstallationPending</span>
</a>
</li> 
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd</span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">Demo Request List</span>
</a>
</li>
	<?php
	if($un=="swathi@ossgpstracking.com")
	{
		?>
<li>
			<a href="<?php echo base_url();?>editimei">
				<i class="icon-double-angle-right"></i>

				Edit IMEI
			
			</a>
			
		</li>		
		<?php
	}
}
if($type=='accounts')
{
	?>
	<li>
			<a href="<?php echo base_url();?>order_details/approve_payment_orders">
				<i class="icon-double-angle-right"></i>

				Confirm Payment
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>order_details/confirmed_payment_orders">
				<i class="icon-double-angle-right"></i>

				Confirmed Orders
			
			</a>
			
		</li>
	<?php
}
 ?>


<?php if($type=='admin' ||  has_permission($type, 'payments') || $type=='marketing' || $type=='accounts' || $type=='operations'|| $type=='subadmin'){ ?>

<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Payments </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>payment">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/received">
				<i class="icon-double-angle-right"></i>

				Received
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/foc">
				<i class="icon-double-angle-right"></i>

				FOC
			
			</a>
			
		</li>
<?php if($type=='admin' ||  has_permission($type, 'payments')|| $type=='accounts'){ ?>
				<li>
			<a href="<?php echo base_url();?>payment/cash">
				<i class="icon-double-angle-right"></i>

				Cash Account
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>payment/cheque">
				<i class="icon-double-angle-right"></i>

				Cheque Account
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/online_transfer">
				<i class="icon-double-angle-right"></i>

				Online Transfer
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>payment/online">
				<i class="icon-double-angle-right"></i>

				Online Account
			
			</a>
			
		</li>
		<?php } ?>
		</ul>
    </li> 
<?php }
?>
	<?php

if($type=='marketing' || $type=='subadmin')
{
	
 ?>
 <li>
<a href="<?php echo base_url();?>demo_request" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request </span>
</a>
</li> 
 <li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo RequestList </span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo InstallationPending </span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd </span>
</a>
</li>
<?php 
}

 ?>
<?php if($type=='admin' ||  has_permission($type, 'invoices') || $type=='accounts'|| $type=='operations'|| $type=='subadmin'){ ?>
<li>
<a href="<?php echo base_url();?>invoices" class="dropdown-toggle">
<i class="icon-pencil"></i>

Invoices

</a>

</li>
<?php } ?>
<?php if($type=='admin' ||  has_permission($type, 'receipts') || $type=='accounts' || $type=='operations'){ ?>
<li>
<a href="<?php echo base_url();?>receipts" class="dropdown-toggle">
<i class="icon-pencil"></i>

Receipts

</a>

</li>
<?php } ?>
<?php if($type=='accounts')
{
	?>
	<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li> 
	<?php
} 
if($type=='operations')
{
	
?>

	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Reports </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >

<li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>customer_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer List </span>
</a>
</li> 
<!--<li>
<a href="<?php echo base_url();?>order_details/pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Pending List </span>
</a>
</li> -->
<li>
<a href="<?php echo base_url();?>order_details/confirmed_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Confirmed List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>stock_available" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Available Stock </span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>qualitycheck/pending_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Quality Check Pending </span>
</a>
</li> 

</ul>

</li>

<li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstallationPending</span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd </span>
</a>
</li> 

<?php } ?>
<?php if($type=='admin' ||  has_permission($type, 'reports')){ 
$controller=$this->uri->segment(1);
?>
	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Reports </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" <?php if($controller=='customer_sim_details' || $controller=='customer_device_status' || $controller=='subscription_summary'){ ?> style="display: block;" <?php } ?> >

<li>
<a href="<?php echo base_url();?>demo_request_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>customer_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer List </span>
</a>
</li> 
<!--<li>
<a href="<?php echo base_url();?>order_details/pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Pending List </span>
</a>
</li> -->
<li>
<a href="<?php echo base_url();?>order_details/confirmed_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Confirmed List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>stock_available" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Available Stock </span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>qualitycheck/pending_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Quality Check Pending </span>
</a>
</li> 

<li class="<?php echo ((isset($controller)&& $controller=='customer_sim_details')?'active':'');?>"  >
<a href="<?php echo base_url();?>customer_sim_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer SIM Details </span>
</a>
</li> 
<li class="<?php echo ((isset($controller)&& $controller=='customer_device_status')?'active':'');?>">
<a href="<?php echo base_url();?>customer_device_status" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer Device Status </span>
</a>
</li> 
<li class="<?php echo ((isset($controller)&& $controller=='subscription_summary')?'active':'');?>">
<a href="<?php echo base_url();?>subscription_summary" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Subscription Summary </span>
</a>
</li> 

</ul>

</li>


<li>
<a href="<?php echo base_url();?>demo_request" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>demo_request/approve" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> DemoRequestApprovals </span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/confirmed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoDevice</span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/assigned_devicelist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoEngineer</span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstallationPending</span>
</a>
</li>
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd </span>
</a>
</li> 

 <li>
<a href="<?php echo base_url();?>demo_request/demo_requestlist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">Demo Request List</span>
</a>
</li> 
	<li>
			<a href="<?php echo base_url();?>return_stock">
				<i class="icon-double-angle-right"></i>

				Return Stock
			
			</a>
			
		</li>
	<li>
			<a href="<?php echo base_url();?>device_make">
				<i class="icon-double-angle-right"></i>

				Device Make
			
			</a>
			
		</li>
<?php } ?>

<?php
if($type=='operations')
{
	?>
<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report/qc">
				<i class="icon-double-angle-right"></i>

				QC Report
			
			</a>
			
		</li>	
	<?php
} ?>

<?php if($type=='COO' || $type=='CFO'){ ?>
		
	<!--<li>
	<a href="<?php echo base_url();?>stock" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Stock </span>
		
	</a>

    </li>-->

	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Inventory</span>
		
	
<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >
	
 <li>

			<a href="<?php echo base_url();?>stock/new_stock">

				<i class="icon-double-angle-right"></i>

				Newly Entered Stock 

			</a>

		</li>
<li>
			<a href="#" class="dropdown-toggle">
				<i class="icon-double-angle-right"></i>

				Quality Check
				<b class="arrow icon-angle-down"></b>
			</a>

			<ul class="submenu">
				<li>
					<a href="<?php echo base_url();?>qualitycheck">
						<i class="icon-leaf"></i>
						Pending
					</a>
				</li>

				<li>
					<a href="<?php echo base_url();?>qualitycheck/completed" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Completed
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>qualitycheck/rejected" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Rejected
						
					</a>

				</li>
			</ul>
		</li>

        <li>

			<a href="<?php echo base_url();?>stock_available">

				<i class="icon-double-angle-right"></i>

				Total Stock 

			</a>

		</li>
        
    </ul>
    </li>

<li>
					<a href="<?php echo base_url();?>order_details/approve" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Order Approvals
						
					</a>

				</li>
				<li>
					<a href="<?php echo base_url();?>order_details/pending" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Order Pending
						
					</a>

				</li>
					<li>
					<a href="<?php echo base_url();?>order_details/rejected_orders" class="dropdown-toggle">
						<i class="icon-pencil"></i>

						Rejected Order
						
					</a>

				</li>
	<li>
					<a href="<?php echo base_url();?>order_confirmed/confirmed_order_view" class="dropdown-toggle">
						<i class="icon-check"></i>

							Confirmed Orders
					</a>

				</li>
				
					<li>
			<a href="<?php echo base_url();?>order_details/approve_payment_orders">
				<i class="icon-double-angle-right"></i>

				Confirm Payment
			
			</a>
			
		</li>
				<li>
	<a href="<?php echo base_url();?>installation/assigned_devicelist" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Assigned Device List</span>
		
	</a>

    </li>
	<li>
			<a href="<?php echo base_url();?>installation/assigned_engineerlist">
				<i class="icon-double-angle-right"></i>

				Assigned Engineer
			
			</a>
			
		</li>

<li>

	<a href="#" class="dropdown-toggle">

		<i class="icon-bolt"></i>

		<span class="menu-text">Installation Status </span>



		<b class="arrow icon-angle-down"></b>

	</a>

	<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>installation/status_pending">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		


				<li>
					<a href="<?php echo base_url();?>installation/status_completed" >
						<i class="icon-pencil"></i>

				Completed
						
					</a>

				</li>
			
	</ul>

</li>
 <li>
					<a href="<?php echo base_url();?>dealer_margin" class="dropdown-toggle">
						<i class="icon-star"></i>

						Dealer Margin
						
					</a>

				</li> 
<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Payments </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>payment">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/received">
				<i class="icon-double-angle-right"></i>

				Received
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/foc">
				<i class="icon-double-angle-right"></i>

				FOC
			
			</a>
			
		</li>

				<li>
			<a href="<?php echo base_url();?>payment/cash">
				<i class="icon-double-angle-right"></i>

				Cash Account
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>payment/cheque">
				<i class="icon-double-angle-right"></i>

				Cheque Account
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>payment/online_transfer">
				<i class="icon-double-angle-right"></i>

				Online Transfer
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>payment/online">
				<i class="icon-double-angle-right"></i>

				Online Account
			
			</a>
			
		</li>
		
		</ul>
    </li> 



<li>
<a href="<?php echo base_url();?>invoices" class="dropdown-toggle">
<i class="icon-pencil"></i>

Invoices

</a>

</li>
<li>
<a href="<?php echo base_url();?>receipts" class="dropdown-toggle">
<i class="icon-pencil"></i>

Receipts

</a>

</li>

	<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text"> Reports </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >

<li>
<a href="<?php echo base_url();?>demo_request_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>customer_details" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Customer List </span>
</a>
</li> 
<!--<li>
<a href="<?php echo base_url();?>order_details/pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Pending List </span>
</a>
</li> -->
<li>
<a href="<?php echo base_url();?>order_details/confirmed_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Order Confirmed List </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>stock_available" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Available Stock </span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>qualitycheck/pending_report" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Quality Check Pending </span>
</a>
</li> 

</ul>

</li>

<li>
<a href="<?php echo base_url();?>demo_request" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Demo Request </span>
</a>
</li> 

<li>
<a href="<?php echo base_url();?>demo_request/approve" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> DemoRequestApprovals </span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/confirmed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoDevice</span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/assigned_devicelist" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text"> Assign DemoEngineer</span>
</a>
</li> 
<li>
<a href="<?php echo base_url();?>demo_request/status_pending" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstallationPending</span>
</a>
</li> 
 <li>
<a href="<?php echo base_url();?>demo_request/demo_installation_completed" class="dropdown-toggle">
<i class="icon-bolt"></i>
<span class="menu-text">DemoInstalationCompletd</span>
</a>
</li>
	<li>
			<a href="<?php echo base_url();?>return_stock">
				<i class="icon-double-angle-right"></i>

				Return Stock
			
			</a>
			
		</li>
	<li>
			<a href="<?php echo base_url();?>device_make">
				<i class="icon-double-angle-right"></i>

				Device Make
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report/qc">
				<i class="icon-double-angle-right"></i>

				QC Report
			
			</a>
			
		</li>

<?php } ?>
<?php if($type=='marketing'|| $type=='inventory'){ ?>
<li>
			<a href="<?php echo base_url();?>convert_customer">
				<i class="icon-double-angle-right"></i>

				Convert Customer
			
			</a>
			
		</li>
		
		<?php } ?>
<?php if($type=='admin' ||   $type=='subadmin' ){ ?>
<li>
			<a href="<?php echo base_url();?>convert_customer">
				<i class="icon-double-angle-right"></i>

				Convert Customer
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>stock_report">
				<i class="icon-double-angle-right"></i>

				Stock Report
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>stock_report/qc">
				<i class="icon-double-angle-right"></i>

				QC Report
			
			</a>
			
		</li>
		<?php if($type=='admin'){
			?>
			<li>
			<a href="<?php echo base_url();?>change_order_creation">
				<i class="icon-double-angle-right"></i>

				Change Order Creation
			
			</a>
			
		</li>
		<?php } ?>
				<li>
			<a href="<?php echo base_url();?>extend_demorequest">
				<i class="icon-double-angle-right"></i>

				Extend Demo Request
			
			</a>
			
		</li>
		
		
				<li>
			<a href="<?php echo base_url();?>dc">
				<i class="icon-double-angle-right"></i>

				DC
			
			</a>
			
		</li>
		
				<li>
			<a href="<?php echo base_url();?>subscription_renewal">
				<i class="icon-double-angle-right"></i>

				Subscription Renewal
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>subscription_renewal/approve_renewal_list">
				<i class="icon-double-angle-right"></i>

				Approve Renewals
			
			</a>
			
		</li>
<li>
			<a href="<?php echo base_url();?>subscription_renewal/invoice">
				<i class="icon-double-angle-right"></i>

				Renewal Invoices
			
			</a>
			
		</li>
		<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text">Renewal Payments </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>renew_payment">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/received">
				<i class="icon-double-angle-right"></i>

				Received
			
			</a>
			
		</li>

				<li>
			<a href="<?php echo base_url();?>renew_payment/cash">
				<i class="icon-double-angle-right"></i>

				Cash Account
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>renew_payment/cheque">
				<i class="icon-double-angle-right"></i>

				Cheque Account
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>renew_payment/online_transfer">
				<i class="icon-double-angle-right"></i>

				Online Transfer
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/online">
				<i class="icon-double-angle-right"></i>

				Online Account
			
			</a>
			
		</li>

		</ul>
    </li> 
	
		
		<?php } ?>
		
		<?php if($type=="inventory"){ ?>
			<li>
			<a href="<?php echo base_url();?>subscription_renewal">
				<i class="icon-double-angle-right"></i>

				Subscription Renewal
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>subscription_renewal/approve_renewal_list">
				<i class="icon-double-angle-right"></i>

				Approve Renewals
			
			</a>
			
		</li>
<li>
			<a href="<?php echo base_url();?>subscription_renewal/invoice">
				<i class="icon-double-angle-right"></i>

				Renewal Invoices
			
			</a>
			
		</li>
		<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text">Renewal Payments </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>renew_payment">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/received">
				<i class="icon-double-angle-right"></i>

				Received
			
			</a>
			
		</li>

				<li>
			<a href="<?php echo base_url();?>renew_payment/cash">
				<i class="icon-double-angle-right"></i>

				Cash Account
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>renew_payment/cheque">
				<i class="icon-double-angle-right"></i>

				Cheque Account
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>renew_payment/online_transfer">
				<i class="icon-double-angle-right"></i>

				Online Transfer
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/online">
				<i class="icon-double-angle-right"></i>

				Online Account
			
			</a>
			
		</li>

		</ul>
    </li> 
		<?php } ?>

<li>
			<a href="<?php echo base_url();?>change_password">
				<i class="icon-double-angle-right"></i>

				Change Password
			
			</a>
			
		</li>
		
		
	<?php if(($type=='support' || $type=='operations')){
			?>
			<li>
			<a href="<?php echo base_url();?>dc">
				<i class="icon-double-angle-right"></i>

				DC
			
			</a>
			
		</li>
		
		<?php }
		if(($type=='support' || $type=='inventory')&&$un!='swathi@ossgpstracking.com'){
		?>
		<li>
<a href="<?php echo base_url();?>invoices" class="dropdown-toggle">
<i class="icon-pencil"></i>

Invoices

</a>

</li>
		<?php } 
		if($type=='operations'){
		?>
<li>
			<a href="<?php echo base_url();?>subscription_renewal">
				<i class="icon-double-angle-right"></i>

				Subscription Renewal
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>subscription_renewal/approve_renewal_list">
				<i class="icon-double-angle-right"></i>

				Approve Renewals
			
			</a>
			
		</li>
<li>
			<a href="<?php echo base_url();?>subscription_renewal/invoice">
				<i class="icon-double-angle-right"></i>

				Renewal Invoices
			
			</a>
			
		</li>
		<li>
	<a href="#" class="dropdown-toggle">
		<i class="icon-bolt"></i>
		<span class="menu-text">Renewal Payments </span>
			<b class="arrow icon-angle-down"></b>
	</a>
<ul class="submenu" >


		<li>
			<a href="<?php echo base_url();?>renew_payment">
				<i class="icon-double-angle-right"></i>

				Pending
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/received">
				<i class="icon-double-angle-right"></i>

				Received
			
			</a>
			
		</li>

				<li>
			<a href="<?php echo base_url();?>renew_payment/cash">
				<i class="icon-double-angle-right"></i>

				Cash Account
			
			</a>
			
		</li>
		
		<li>
			<a href="<?php echo base_url();?>renew_payment/cheque">
				<i class="icon-double-angle-right"></i>

				Cheque Account
			
			</a>
			
		</li>
			<li>
			<a href="<?php echo base_url();?>renew_payment/online_transfer">
				<i class="icon-double-angle-right"></i>

				Online Transfer
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>renew_payment/online">
				<i class="icon-double-angle-right"></i>

				Online Account
			
			</a>
			
		</li>

		</ul>
    </li> 		
		<?php
		} ?>
		
		<li>
			<a href="<?php echo base_url();?>master">
				<i class="icon-rss"></i>

				Device Status
			
			</a>
			
		</li>
		<?php if($type=='admin' || $type=='support' || $type=='inventory'){ ?>
		<li>
			<a href="<?php echo base_url();?>tamper">
				<i class="icon-bell"></i>

				Tamper Alerts
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>to_metrack">
				<i class="icon-list-alt"></i>

				Customize Dashboard
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>sublogins">
				<i class="icon-group"></i>

				Sublogins
			
			</a>
			
		</li>
		<li>
			<a href="<?php echo base_url();?>sublogins/assign_device">
				<i class="icon-arrow-right"></i>

				Sublogins - Assign Device
			
			</a>
			
		</li>	
		<li>
			<a href="<?php echo base_url();?>concox">
				<i class="icon-arrow-right"></i>

				Concox - Assign Device
			
			</a>
			
		</li>	
		<?php } ?>
		<?php
		if($type=='support'){
		?>
		<li>
<a href="<?php echo base_url();?>others" class="dropdown-toggle">
<i class="icon-pencil"></i>

Others

</a>

</li>
		<?php } ?>
		<?php
		if($type=='admin'||$type=='inventory'){
		?>
		<li>
<a href="<?php echo base_url();?>change_data" class="dropdown-toggle">
<i class="icon-beaker"></i>
Change Fuel
</a>
</li>
<li>
<a href="<?php echo base_url();?>delete_customer" class="dropdown-toggle">
<i class="icon-trash"></i>
Delete Customer
</a>
</li>
<li>
<a href="<?php echo base_url();?>jss_locations">
<i class="icon-plus"></i>
Add JSS Locations
</a>
</li>
<li>
<a href="<?php echo base_url();?>fuellog_edit">
<i class="icon-edit"></i>
Edit Fuel Log Table
</a>
</li>
<?php } ?>
		
<?php } ?>
</ul><!--/.nav-list-->

<div class="sidebar-collapse" id="sidebar-collapse">
<i class="icon-double-angle-left"></i>
</div>
</div>
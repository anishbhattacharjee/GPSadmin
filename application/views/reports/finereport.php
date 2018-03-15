<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<script src="<?php echo base_url();?>jquery.table2excel.js"></script>

<div class="container" style="margin-top:150px;">
    <h1>jQuery table2excel Demo</h1>
		<table class="table" id="table2excel">
      <thead>
       
        <tr>
          <th>#</th>
          <th>Customer</th>
          <th>No of Device</th>
          <th>IMEI</th>
        </tr>
      </thead>
      <tbody>
      
      <?php
      $slno=1;
      $q=mysqli_query($con,"select * from customers c  where c.used_for='sale'");
      while($rq=mysqli_fetch_array($q))
      {
      	$cname=$rq['customer_first_name'];
      	$customer_id=$rq['customer_id'];
      	$iq=mysqli_query($con,"select * from installation where customer_id=$customer_id");
      	while($riq=mysqli_fetch_array($iq))
      	{
			$imie=$riq['imie_no'];
		}
	  	?>
	  	<tr class="active">
          <td><?php echo $slno;?></td>
          <td><?php echo $cname;?></td>
          <td><?php echo $imie;?></td>
	  	</tr>
	  	<?php
	  $slno++;
	  }
	  
      ?>
        
        
     
      </tbody>
    </table>
        <button class="btn btn-success">Export</button></div>
<script>
	$("button").click(function(){

  $("#table2excel").table2excel({

    // exclude CSS class

   // exclude: ".noExl",

    name: "Excel Document Name"

  });

});

</script>
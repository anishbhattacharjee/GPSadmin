<?php

include '../dbcon.php';

$ct = $_POST['ct'];
$id = $_POST['id'];
$cat=$_POST['cat'];

$sql=$con,"select type,table_id from gps_categories where category_id=$id";
$rs=mysqli_query($sql);
$rw=mysqli_fetch_assoc($rs);
if($rw['type']=='main'){$main=true; }else{$main=false; }
?>
<table id="cat_mat<?php echo $id; ?>" style="width:100%; margin-top:20px;"><thead style="background-color: #F0EBEB;"><tr><th>&nbsp;&nbsp;SL No</th><th >Category</th><th >Item Code</th><th >IMEI</th><th >S/N</th><th >UOM</th><th >Qty</th><th >Rate/unit</th><th >Amount</th><th >Remark</th></tr></thead><tbody id="cat_mat_tb<?php echo $id; ?>">
<?php
if($ct<=90) { 

for($i=1;$i<=$ct;$i++)

{
if($rw['type']=='main' || $rw['type']=='generic'){
	$sql1=$con,"select device_id as id,device_type as dev_type from gps_devices where category_id=$id";
	$rs1=mysqli_query($sql1);	
}else if($rw['type']=='extra'){	
	$sql1=$con,"select id,code as dev_type from extra_device where id=".$rw['table_id'];
	$rs1=mysqli_query($sql1);
}/*else if($rw['type']=='generic'){
	$sql1=$con,"select id,code as dev_type from generic_categories where id=".$rw['table_id'];
	$rs1=mysqli_query($sql1);
	
}*/

?>	

			  

<tr>

<td><input type="text" name="fbsl" id="fbsl" value="<?php echo $i;?>" style="width:25px;" readonly="true"/>

</td><td><input type="text" name="<?php echo "fbtype".$id."_".$i; ?>" id="<?php echo "fbtype".$i; ?>" style="width:100px;"  readonly="true" value="<?php echo $cat; ?>"/>

		</td><td><select name="<?php echo "item".$id."_".$i; ?>" id="<?php echo "fbcode".$id."_".$i; ?>" data-id="<?php echo $id."_".$i; ?>" style="width:105px;" >
        <?php
		while($code=mysqli_fetch_assoc($rs1)){
			?>
			<option value="<?php echo $code['id'];?>"><?php echo $code['dev_type'];?></option>
			<?php
			}
		?>
        </select>
		</td><td><textarea name="<?php echo "imei".$id."_".$i; ?>" id="<?php echo "imei".$id."_".$i; ?>"  <?php if($main){echo "class=\"req".$id."_".$i."\"";}?> data-id="<?php echo $id."_".$i; ?>"  placeholder="N/A" style="width:100px;" ></textarea>
		</td><td><textarea  name="<?php echo "sn".$id."_".$i; ?>" id="<?php echo "sn".$i; ?>" placeholder="N/A" style="width:100px;" ></textarea>

		</td><td><input type="text" name="<?php echo "uom".$id."_".$i; ?>" id="<?php echo "fbdescp".$i; ?>" style="width:100px;"  value="pieces" readonly="true"/>

		</td><td><input type="text" name="<?php echo "qty".$id."_".$i; ?>" id="<?php echo "qty".$id."_".$i; ?>" data-id="<?php echo $id."_".$i; ?>" data-val="<?php echo $id; ?>" style="width:100px;"  <?php if($main){echo 'value="1" readonly="readonly"';}
		else{ echo 'value="0"';} ?> />
		</td><td><input type="text" name="<?php echo "rate".$id."_".$i; ?>" id="<?php echo "rate".$id."_".$i; ?>" data-id="<?php echo $id."_".$i; ?>" style="width:100px;" value="0"/>
</td><td><input type="text" name="<?php echo "amt".$id."_".$i; ?>" id="<?php echo "amt".$id."_".$i; ?>" style="width:100px;" class="col5"  readonly="readonly"/>
		</td><td><input type="text" name="<?php echo "desc".$id."_".$i; ?>" id="<?php echo "fbrole".$i; ?>" style="width:100px;" />
</td>
		


</tr>
		

<?php }//for ?>

<!--<tr>
<td colspan="6" ><div style="float:right;">Total Generic:<input type="text" name="<?php echo "totq".$id; ?>" id="<?php echo "totq".$id; ?>"  readonly="true"/></div>
</td>
<td colspan="2"></td>

</tr>
-->  
<?php }else
{
	echo "<tr><td colspan=\"9\"<h5 style='color:red;margin-left: 190px;'>only 90 Rows Data u Can Upload </td></tr>";
	
}?>

</tbody></table> 
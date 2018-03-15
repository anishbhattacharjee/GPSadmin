<?php
include '../dbcon.php';
$ctype=(isset($_GET['ctype']))?$_GET['ctype']:'';
		$firstname=(isset($_GET['firstname']))?$_GET['firstname']:'';
		$middlename=(isset($_GET['middlename']))?$_GET['middlename']:'';
		$lastname=(isset($_GET['lastname']))?$_GET['lastname']:'';
		$gender=(isset($_GET['gender']))?$_GET['gender']:'';
		$dob=(isset($_GET['dob']))?$_GET['dob']:'';
		$paddr=(isset($_GET['paddr']))?$_GET['paddr']:'';
		$tmpaddr=(isset($_GET['tmpaddr']))?$_GET['tmpaddr']:'';
		$email=(isset($_GET['email']))?$_GET['email']:'';
		$phno=(isset($_GET['phno']))?$_GET['phno']:'';
		$tphno=(isset($_GET['tphno']))?$_GET['tphno']:'';
		$compname=(isset($_GET['compname']))?$_GET['compname']:'';
		$cmpaddr=(isset($_GET['cmpaddr']))?$_GET['cmpaddr']:'';
		$ctphno=(isset($_GET['ctphno']))?$_GET['ctphno']:'';
		$cemail=(isset($_GET['cemail']))?$_GET['cemail']:'';
		$website=(isset($_GET['website']))?$_GET['website']:'';
		$conname1=(isset($_GET['conname1']))?$_GET['conname1']:'';
		$conphno1=(isset($_GET['conphno1']))?$_GET['conphno1']:'';
		$conem1=(isset($_GET['conem1']))?$_GET['conem1']:'';
		$condesg1=(isset($_GET['condesg1']))?$_GET['condesg2']:'';
		$conname2=(isset($_GET['conname2']))?$_GET['conname2']:'';
		$conphno2=(isset($_GET['conphno2']))?$_GET['conphno2']:'';
		$conem2=(isset($_GET['conem2']))?$_GET['conem2']:'';
		$condesg2=(isset($_GET['condesg2']))?$_GET['condesg2']:'';
		
		
		$proof=(isset($_GET['proof']))?$_GET['proof']:'';
		$descp=(isset($_GET['descp']))?$_GET['descp']:'';
		$file=(isset($_GET['file']))?$_GET['file']:'';
		$prooff = explode(',', $proof);
		$descpp = explode(',', $descp);
		$filee = explode(',', $file);

		
		$category_id=(isset($_GET['category_id']))?$_GET['category_id']:'';
		$noofdevice=(isset($_GET['noofdevice']))?$_GET['noofdevice']:'';
		$device_type=(isset($_GET['device_type']))?$_GET['device_type']:'';
		$mdl=(isset($_GET['mdl']))?$_GET['mdl']:'';
		$monthone=(isset($_GET['monthone']))?$_GET['monthone']:'';
		$monththree=(isset($_GET['monththree']))?$_GET['monththree']:'';
		$monthsix=(isset($_GET['monthsix']))?$_GET['monthsix']:'';
		$monthtwelve=(isset($_GET['monthtwelve']))?$_GET['monthtwelve']:'';
		$yeartwo=(isset($_GET['yeartwo']))?$_GET['yeartwo']:'';
		$each_cost=(isset($_GET['each_cost']))?$_GET['each_cost']:'';

		$category_idd = explode(',', $category_id);
		$noofdevicee = explode(',', $noofdevice);
		$device_typee = explode(',', $device_type);
		$mdll = explode(',', $mdl);
		$monthonee = explode(',', $monthone);
		$monththreee = explode(',', $monththree);
		$monthsixx = explode(',', $monthsix);
		$monthtwelvee = explode(',', $monthtwelve);
		$yeartwoo = explode(',', $yeartwo);
		$each_costt = explode(',', $each_cost);
		
		
		$finalcost=(isset($_GET['finalcost']))?$_GET['finalcost']:'';
		
		
		$adv=(isset($_GET['adv']))?$_GET['adv']:'';
		$ful=(isset($_GET['ful']))?$_GET['ful']:'';
		
		$cashtype=(isset($_GET['cashtype']))?$_GET['cashtype']:'';
		$chequetype=(isset($_GET['chequetype']))?$_GET['chequetype']:'';
		$onlinetype=(isset($_GET['onlinetype']))?$_GET['onlinetype']:'';
		
		$amount=(isset($_GET['amount']))?$_GET['amount']:'';
		$chequeno=(isset($_GET['chequeno']))?$_GET['chequeno']:'';
		$bankname=(isset($_GET['bankname']))?$_GET['bankname']:'';
		
$created_by=(isset($_GET['created_by']))?$_GET['created_by']:'';
		$created_dt=(isset($_GET['created_dt']))?$_GET['created_dt']:'';
		$uid=(isset($_GET['uid']))?$_GET['uid']:'';
		
		$szf=sizeof($prooff);
		$cntcatid=sizeof($category_idd);
if($cntcatid>=$szf)
{
for($i=0; $i<$cntcatid; $i++){
		$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,cust_proof,proof_descptn,proof_files,category_id,noofdevice, device_id, model_id,monthone, monththree, monthsix, monthtwelve, yeartwo,eachcost,final_cost, advance_type, ful_type, cashtype, chequetype, onlinetype,amount, cheque_no, bank_name,created_date_time,created_by) VALUES ('$uid','$ctype','$firstname', '$middlename', '$lastname', '$gender','$dob','$phno', '$tphno', '$email', '$paddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$prooff[$i]','$descpp[$i]','$filee[$i]','$category_idd[$i]','$noofdevicee[$i]','$device_typee[$i]','$mdll[$i]','$monthonee[$i]','$monththreee[$i]','$monthsixx[$i]','$monthtwelvee[$i]','$yeartwoo[$i]','$each_costt[$i]','$finalcost','$adv','$ful','$cashtype','$chequetype','$onlinetype','$amount','$chequeno','$bankname','$created_dt','$created_by')");
		if($q!=FALSE)
		{
			echo "Customer Registration Done Successfully";
		}
		else
		{
			echo "Customer Registration Not Done Successfully";
		}
}

}
else
{
	for($i=0; $i<$szf; $i++){
		$q=mysqli_query($con,"INSERT INTO customers (customer_uid,type,customer_first_name, customer_middle_name, customer_last_name, sex,dob, customer_phone_no, tel_phone_no, customer_emailid, address, temp_address,comp_name, comp_addr, comp_teleph, comp_email, website, comp_contname1, comp_contph1, comp_contemail1, comp_contdesgn1, comp_contname2, comp_contph2, comp_contemail2, comp_contdesgn2,cust_proof,proof_descptn,proof_files,category_id,noofdevice, device_id, model_id,monthone, monththree, monthsix, monthtwelve, yeartwo,eachcost,final_cost, advance_type, ful_type, cashtype, chequetype, onlinetype,amount, cheque_no, bank_name,created_date_time,created_by) VALUES ('$uid','$ctype','$firstname', '$middlename', '$lastname', '$gender','$dob','$phno', '$tphno', '$email', '$paddr', '$tmpaddr','$compname', '$cmpaddr', '$ctphno', '$cemail', '$website', '$conname1', '$conphno1', '$conem1', '$condesg1', '$conname2', '$conphno2', '$conem2', '$condesg2','$prooff[$i]','$descpp[$i]','$filee[$i]','$category_idd[$i]','$noofdevicee[$i]','$device_typee[$i]','$mdll[$i]','$monthonee[$i]','$monththreee[$i]','$monthsixx[$i]','$monthtwelvee[$i]','$yeartwoo[$i]','$each_costt[$i]','$finalcost','$adv','$ful','$cashtype','$chequetype','$onlinetype','$amount','$chequeno','$bankname','$created_dt','$created_by')");
		if($q!=FALSE)
		{
			echo "Customer Registration Done Successfully";
		}
		else
		{
			echo "Customer Registration Not Done Successfully";
		}
}
}
?>
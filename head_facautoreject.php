<?php
	$set = 0;

    if($row['type'] == 'On Duty'){

		$ODleave = $ODleave - $row['dy'];
		$ODp =(($ODleaveref-$ODleave)/$ODleaveref)*100;
		if($ODp > 100 ){
			$set = 1;
		}
	}
	if($row['type'] == 'Sick Leave'){
		$sickleave = $sickleave - $row['dy'];
		$sickp = (($sickleaveref-$sickleave)/$sickleaveref)*100;
		if($sickp > 100 ){
		
			$set = 1;
		}
	}
	if($row['type'] == 'Casual Leave'){
		$casualleave = $casualleave - $row['dy'];
		$casualp= (($casualleaveref-$casualleave)/$casualleaveref)*100;
		if($casualp > 100 ){
			$set = 1;
		}
	}
	if($row['type'] == 'Paid Leave'){
		$paidleave = $paidleave - $row['dy'];
		$paidp = (($paidleaveref-$paidleave)/$paidleaveref)*100;
		if($paidp > 100){
			$set = 1;
		}
	}

									
									
									
?>
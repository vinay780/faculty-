<?php
	$start = new DateTime('2020-06-04');
	$end = new DateTime('now');
							// otherwise the  end date is excluded
	$end->modify('+1 day');
	$interval = $end->diff($start);
							// total days
	$days = $interval->days;
							// create an iterateable period of date (P1D equates to 1 day)
	$period = new DatePeriod($start, new DateInterval('P1D'), $end);
							// best stored as array, so you can add more than one
	$holidays = array('2012-09-07');
	foreach($period as $dt) {
	$curr = $dt->format('D');
	// substract if Saturday or Sunday
	if ($curr == 'Sat' || $curr == 'Sun') {
		$days--;
	}
	// (optional) for the updated question
	elseif (in_array($dt->format('Y-m-d'), $holidays)) {
		$days--;
	}
	}
	if($query_run1){	
		$presentdays = $days;
		$ODleave =$ODleaveref = 20;
		$sickleave =$sickleaveref = 15;
		$casualleave =$casualleaveref = 20;
		$paidleave =$paidleaveref = 10;
		foreach($query_run1 as $row2){
			$presentdays = $presentdays - $row2['dy'];
			if($row2['type'] == 'On Duty'){
				$ODleave = $ODleave - $row2['dy'];
			}
			if($row2['type'] == 'Sick Leave'){
				$sickleave = $sickleave - $row2['dy'];
			}
			if($row2['type'] == 'Casual Leave'){
				$casualleave = $casualleave - $row2['dy'];
			}
			if($row2['type'] == 'Paid Leave'){
				$paidleave = $paidleave - $row2['dy'];
			}
		}
	}
	$ODp =(($ODleaveref-$ODleave)/$ODleaveref)*100;
	$sickp = (($sickleaveref-$sickleave)/$sickleaveref)*100;
	$casualp= (($casualleaveref-$casualleave)/$casualleaveref)*100;
	$paidp = (($paidleaveref-$paidleave)/$paidleaveref)*100;
?>
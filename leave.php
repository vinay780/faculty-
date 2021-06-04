<?php
  session_start();
  if(!isset($_SESSION['userid']))
  {
    header('location:login.php');
  }
  $username=$_SESSION['userid'];
  include('db.php');

?>
<!DOCTYPE html>
<html>
<head>
	<title>Leave Form</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" type="text/css" href="leave.css">
	
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
  
</head>
<body>
	<!-- navbar -->
	<div class="page-content">
        <!-- Apply Leave Form -->
        <div class=" container card pmd-card single-col-form">
            <form id="apply-leave" method="post" action="leave_insert.php">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group  ">
                                <label for="leave-type" for="type">Leave Type</label>
                                <select name="leave-type" id="leave-type" class="form-control" title="Please select a Leave Type" required>
                                    <option></option>
                                    <option>Sick Leave</option>
                                    <option>On Duty</option>
                                    <option>Maternity Leave</option>
                                    <option>Paid leave</option>
									<option>Casual leave</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group ">
                                <label class="control-label" for="start_date">Start Date</label>
                                <input type="text" class="form-control" id="start" name="start_date" autocomplete="Off" >  <!----Start--->
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="end_date">End Date</label>
                                <input type="text" class="form-control" id="end" name = "end_date" autocomplete="Off">  <!----End--->
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                                <label for="Reason" >Reason</label>
                                <textarea class="form-control" id="reason" name="reason"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit"  class="btn btn-primary pmd-ripple-effect pmd-btn-raised" name="applyleave" value="Apply Leave">Apply Leave</button> 
                    <input type='button' value='CANCEL' onclick="window.location.href = 'index.php'" class="btn btn-outline-secondary ">
                </div>
            </form>
            
        </div>
    </div>
</div>


<script type="text/javascript" src="date_validate.js"></script>

  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>

 $(function(){
        $("#end").datepicker({ dateFormat: 'yy-mm-dd' });
        $("#start").datepicker({ dateFormat: 'yy-mm-dd' }).bind("change",function(){
            var minValue = $(this).val();
            minValue = $.datepicker.parseDate("yy-mm-dd", minValue);
            minValue.setDate(minValue.getDate()+1);
            $("#end").datepicker( "option", "minDate", minValue );
        })
    });</script>

</body>

</html>
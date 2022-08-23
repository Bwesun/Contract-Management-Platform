<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['admin_user']))
{
	header("location:login.php");
}

?>
<head>
	<title>Add Staff</title>
<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
	<style type="text/css">
		body{
background: rgba(210,231,239,1);
background: -moz-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(210,231,239,1)), color-stop(50%, rgba(78,185,212,1)), color-stop(100%, rgba(218,235,241,1)));
background: -webkit-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -o-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: -ms-linear-gradient(left, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
background: linear-gradient(to right, rgba(210,231,239,1) 0%, rgba(78,185,212,1) 50%, rgba(218,235,241,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d2e7ef', endColorstr='#daebf1', GradientType=1 );

		}
		.col-md-9{
			-webkit-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
-moz-box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
box-shadow: 0px 0px 52px 0px rgba(0,0,0,0.55);
border-radius: 10px;
padding-bottom: 20px;
		}
	</style>
</head>

<body>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<?php
		include('head.php');
		?>
		<div>
			<fieldset>
				<legend><i class="fas fa-user-plus"></i> Add Staff</legend>
				<form class="form-group" method="post">
					<div>
					<input type="text" name="name" class="form-control" placeholder="Full Name" ><br>
					<input type="text" name="staff_id" class="form-control" placeholder="Staff ID" ><br>
					<input type="emil" name="email" class="form-control" placeholder="Email" ><br>
					<input type="text" name="phone" class="form-control" placeholder="Phone Number" ><br>
					Date of Birth<br>
					<input type="text" name="day" placeholder="Day">
					<select name="month">
						<option value="">---- Select Month ----</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select>
					<input type="text" name="year" placeholder="Year"><br>


					Select Leave Month
					<select class="form-control" name="leave_month">
						<option value="">---- Select Month ----</option>
						<option value="January">January</option>
						<option value="February">February</option>
						<option value="March">March</option>
						<option value="April">April</option>
						<option value="May">May</option>
						<option value="June">June</option>
						<option value="July">July</option>
						<option value="August">August</option>
						<option value="September">September</option>
						<option value="October">October</option>
						<option value="November">November</option>
						<option value="December">December</option>
					</select><br>
					<textarea name="address" class="form-control" placeholder="Address"></textarea>
					</div><br>
					<div align="center">
						<input type="submit" class="btn btn-default" name="sub_reg" value="Add Staff">
					</div>
				</form>
			</fieldset>
		</div>
	</div>
</div>

<?php
include('connect.php');

if(isset($_POST['sub_reg'])){
	$name=$_POST['name'];
	$staff_id=$_POST['staff_id'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$day=$_POST['day'];
	$month=$_POST['month'];
	$year=$_POST['year'];
	$address=$_POST['address'];
	$leave_month=$_POST['leave_month'];

	$dob=$day."/".$month."/".$year;

	$retirement_year=2019-$year;
	$retirement_year=65-$retirement_year;
	$retirement_year=2019+$retirement_year;

	$retirement_month=date(F);


	$sql="INSERT INTO users(name, staff_id, email, phone, address, leave_month, dob, retirement_year, retirement_month, ddate, dmonth, dyear)VALUES('$name', '$staff_id', '$email', '$phone', '$address', '$leave_month', '$dob', '$retirement_year', '$retirement_month', '$day', '$month', '$year') ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('Staff Added Successfully!');</script>";
		echo "<script>window.open('add_staff.php','_self');</script>";
	}else{
		echo "<script>alert('ERROR: Staff not Added!');</script>";
	}

}

?>

</body>
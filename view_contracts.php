<?php
//index.php
include('connect.php');

session_start();

if(!isset($_SESSION['user_id']))
{
	header("location:login.php");
}



?>
<head>
	<title>Staff Profiles</title>
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
		.tab{
			background-color: white;
		}
		#tr td, #tr th{
			border-left: 1px solid gray;
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
				<legend><i class="fas fa-cogs"></i> Available Contracts</legend>

				<table class="tab table table-condensed table-striped navbar-justify">
					<tr id="tr">
						<th>S/N</th>
						<th>Contract Name</th>
						<th>Contract Location</th>
						<th>Contract Description</th>
						<th></th>
					</tr>
<?php
$sql="SELECT * FROM jobvacancy ORDER BY job_id DESC ";
$result=mysql_query($sql);

$i=1;
while($rows=mysql_fetch_assoc($result)){

?>
					<tr id="tr">
						<td><?php echo $i++; ?></td>
						<td><?php echo $rows['jn'];  ?></td>
						<td><?php echo $rows['cl'];  ?></td>
						<td><?php echo $rows['jd'];  ?></td>
						<td>
							<form method="post">
								<input type="hidden" name="job_id" value="<?php echo $rows['job_id'];  ?>">
								<input type="hidden" name="jn" value="<?php echo $rows['jn'];  ?>">
								<input type="hidden" name="cl" value="<?php echo $rows['cl'];  ?>">
								<input type="submit" name="sub_app" value="Apply" class="btn btn-success">
							</form>
						</td>
					</tr>
<?php
}

if(isset($_POST['sub_app'])){
	$job_id=$_POST['job_id'];
	$user_id=$_SESSION['user_id'];
	$jn=$_POST['jn'];
	$cl=$_POST['cl'];
	$name=$_SESSION['name'];

	$sql3="SELECT * FROM jobapp WHERE job_id='$job_id' AND user_id='$user_id' ";
	$result3=mysql_query($sql3);
	if($result3){
		$count=mysql_num_rows($result3);

		if($count>=1){
			echo "<script>alert('You have already applied for this Contract!')</script>";
		}else{
			$sql2 = "INSERT INTO jobapp(job_id, user_id, jn, cl, name)VALUES('$job_id', '$user_id', '$jn', '$cl', '$name')";
			$result2 = mysql_query($sql2);

			if($result2){
				echo "<script>alert('Application Successful!')</script>";
			}else{
				echo "<script>alert('ERROR: Application not Successful!')</script>";
				echo mysql_error();
			}
		}
	}
}

?>
				</table>
			</fieldset>

		</div>
	</div>
</div>


</body>
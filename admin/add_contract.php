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
	<title>Add Contracts</title>
<link rel="stylesheet" type="text/css" href="../bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/all.css">
<script type="text/javascript" language="javascript" src="../jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="../bootstrap.min.js"></script>
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
			<div align="right" style="font-family: serif; font-style: italic; font-size: 18px; font-weight: bold;">Welcome: <i class="fas fa-user-circle"></i> <b><?php echo $_SESSION['username'];   ?></b></div>
			<fieldset>
				<legend><i class="fas fa-plus"></i>  Add Contract</legend>
				<div>
				
					<form method="post">
						<input type="text" name="jn" placeholder="Enter Contract Name" class="form-control"><br>
						<input type="text" name="cl" placeholder="Enter Contract Location" class="form-control"><br>
						<textarea name="jd" class="form-control" placeholder="Enter Contratc Description"></textarea>
				</div>
				<div align="center">
					<input type="submit" name="sub" class="btn btn-primary" value="Add Contract">
				</div>
				</form>
<?php
if(isset($_POST['sub'])){
	$jn=$_POST['jn'];
	$cl=$_POST['cl'];
	$jd=$_POST['jd'];

	$sql="INSERT INTO jobvacancy(jn, cl, jd)VALUES('$jn', '$cl', '$jd') ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('Contract Added Successful!')</script>";
		echo "<script>window.open('add_contract.php', '_self')</script>";
	}else{
		echo "<script>alert('ERROR: Contract Not Added!')</script>";
		echo "<script>window.open('add_contract.php', '_self')</script>";
	}
}

?>

			</fieldset>

		</div>
	</div>
</div>


</body>
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
	<title>Delete Contracts</title>
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
				<legend><i class="fas fa-eraser"></i>  Delete Contracts</legend>
				<div  style="background-color: white;">
				<table class="table table-striped table-condensed">
					<tr>
						<th>S/N</th>
						<th>Contract Name</th>
						<th>Contract Location</th>
						<th>Contract Description</th>
					</tr>
<?php
$sql="SELECT * FROM jobvacancy";
$result=mysql_query($sql);
$count=mysql_num_rows($result);
$i=1;
while($rows=mysql_fetch_assoc($result)){

?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $rows['jn']; ?></td>
						<td><?php echo $rows['cl']; ?></td>
						<td><?php echo $rows['jd']; ?></td>
						<td>
							<form method="post">
								<input type="hidden" name="cid" value="<?php echo $rows['job_id']; ?>">
								<input type="submit" name="sub_del" value="Remove" class="btn btn-danger">
							</form>
						</td>
					</tr>
<?php
}
?>
<?php
if(isset($_POST['sub_del'])){
	$job_id=$_POST['cid'];

	$sql="DELETE FROM jobvacancy WHERE job_id='$job_id' ";
	$result=mysql_query($sql);

	if($result){
		echo "<script>alert('Contract Deleted Successful!')</script>";
		echo "<script>window.open('delete_contract.php', '_self')</script>";
	}else{
		echo "<script>alert('ERROR: Contract Not Deleted!')</script>";
		echo "<script>window.open('delete_contract.php', '_self')</script>";
	}
}

?>
<tr>
	<td colspan="4"><strong>Total No. of Contracts: <?php echo $count; ?></strong></td>
</tr>
				</table>

</div>
			</fieldset>

		</div>
	</div>
</div>


</body>
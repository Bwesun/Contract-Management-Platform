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
	<title>Notifications</title>
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
<?php

$retirement_year=date(Y);
$retirement_month=date(F);

//For Retirement Year
$sql="SELECT * FROM users WHERE status='working' AND retirement_year='$retirement_year' ";
$result=mysql_query($sql);
$count=mysql_num_rows($result);

//For Retirement MOnth
$sql2="SELECT * FROM users WHERE status='working' AND retirement_month='$retirement_month' AND retirement_year='$retirement_year' ";
$result2=mysql_query($sql2);
$count2=mysql_num_rows($result2);

//For Leave Month
$sql3="SELECT * FROM users WHERE status='working' AND leave_month='$retirement_month' ";
$result3=mysql_query($sql3);
$count3=mysql_num_rows($result3);

$all_count=$count+$count2+$count3;

?>
				<legend><i class="fas fa-bell"></i>  Notifications <font color="red">(<?php echo $all_count; ?>)</font></legend>
				<table class="table table-striped" style="background-color: white; border-radius: 5px;">
					<?php
					while($rows=mysql_fetch_assoc($result)){
					?>
					<tr>
						<td><font color="red"><i class="fas fa-exclamation-triangle"></i></font> <?php echo $rows['name']; ?> has reached his/her <b>Retirement Year</b> (<?php echo $retirement_year; ?>). <a href="view_profile.php?id=<?php echo $rows['id'];  ?>">View Profile</a></td>
					</tr>
					<?php
					}
					?>

					<?php
					while($rows2=mysql_fetch_assoc($result2)){
					?>
					<tr>
						<td><font color="red"><i class="fas fa-exclamation-triangle"></i></font> <?php echo $rows2['name']; ?> has reached his/her <b>Retirement Month</b> (<?php echo $retirement_month; ?>). <a href="view_profile.php?id=<?php echo $rows2['id'];  ?>">View Profile</a></td>
					</tr>
					<?php
					}
					?>

					<?php
					while($rows3=mysql_fetch_assoc($result3)){
					?>
					<tr>
						<td><font color="red"><i class="fas fa-exclamation-triangle"></i></font> <?php echo $rows3['name']; ?> has reached his/her <b>Leave Month</b> (<?php echo $retirement_month; ?>). <a href="view_profile.php?id=<?php echo $rows['id'];  ?>">View Profile</a></td>
					</tr>
					<?php
					}
					?>
					<tr>
						<td></td>
					</tr>
				</table>
			</fieldset>
		</div>
</div>
<?php 
/*<a href="view_profile.php?id=<?php echo $rows['id'];  ?>" class="btn btn-warning">View Profile</a>
*/
?>

</body>
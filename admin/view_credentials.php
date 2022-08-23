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
	<title>My Files</title>
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



/* The Image Box */
div.img {
    border: 1px solid #ccc;
}

div.img:hover {
    border: 1px solid #777;
}

/* The Image */
div.img img {
    width: 100%;
    height: auto;
    cursor: pointer;
}

/* Description of Image */
div.desc {
    padding: 15px;
    text-align: center;
}

* {
    box-sizing: border-box;
}

/* Add Responsiveness */
.responsive {
    padding: 0 6px;
    float: left;
    width: 24.99999%;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0.1)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* Responsive Columns */
@media only screen and (max-width: 700px){
    .responsive {
        width: 49.99999%;
        margin: 6px 0;
    }
    .modal-content {
        width: 100%;
    }
}

@media only screen and (max-width: 500px){
    .responsive {
        width: 100%;
    }
}

/* Clear Floats */
.clearfix:after {
    content: "";
    display: table;
    clear: both;
}
</style>

</head>

<body>

<div class="container">
	<div class="col-md-1"></div>
	<div class="col-md-9">
		<?php
		include('head.php');

        $user_id=$_GET['id'];


$sql3="SELECT * FROM users where id='$user_id' ";
$result3=mysql_query($sql3);
$row=mysql_fetch_assoc($result3);
$name=$row['name'];



		?>
		<div>
			<fieldset>
				<legend><i class="fas fa-file"></i><?php echo $name."'s"; ?> Credentials</legend>
<?php
$user_id=$_GET['id'];
$sql2="SELECT * FROM credential WHERE user_id='$user_id' ";
$result2=mysql_query($sql2);
$rows=mysql_fetch_assoc($result2);
$count=mysql_num_rows($result2);

if($count==0){
	echo '<h2><font color=""><i class="fas fa-exclamation-circle"></i> There are no file(s) yet for this account!</font></h2>';
}else{
	while($rows=mysql_fetch_assoc($result2)){

?>


<div class="responsive">
  <div class="img">
    <a target="_blank" href="images/<?php echo $rows['cred']; ?>">
      <img src="images/<?php echo $rows['cred']; ?>" alt="<?php echo $rows['cred_name']; ?>" width="300" height="200">
    </a>
    <div class="desc"><?php echo $rows['cred_name']; ?></div>
  </div>
</div>
<?php
}
}
?>

			</fieldset>
		</div>
	</div>
</div>




</body>
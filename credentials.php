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
		?>
		<div>
			<fieldset>
				<legend><i class="fas fa-file"></i> Documents</legend>
				<h4>Add Documents</h4>
				<form method="post" class="form-group" enctype="multipart/form-data">
					<input type="text" name="cred_name" class="form-control" placeholder="Credential Name"><br>
					<input type="file" name="pic" class="form-control"><br>
					<div align="center"><input type="submit"  name="sub_cred" value="Upload" class="btn btn-primary"></div>
				</form>
<?php

if(isset($_POST['sub_cred'])){

include('connect.php');

$id=$_SESSION['user_id'];
$cred_name=$_POST['cred_name'];
$pic=$_POST['pic'];

$filename=$_FILES['pic']['name'];
	move_uploaded_file($_FILES['pic']['tmp_name'], "images/".$_FILES['pic']['name']);
	
$sql = "INSERT INTO credential(user_id,cred_name,cred)VALUES('$id', '$cred_name', '$filename')";
$result = mysql_query($sql);

if($result){
	echo "<script>alert('Credential Upload Successful!')</script>";
}
else{
	echo "<script>alert('ERROR: Upload unsuccessful!')</script>";
	echo mysql_error();
}


}
$id=$_SESSION['user_id'];
$sql2="SELECT * FROM credential WHERE user_id='$id' ";
$result2=mysql_query($sql2);

$count=mysql_num_rows($result2);

if($count==0){
	echo '<h2><font color=""><i class="fas fa-exclamation-circle"></i> You have not upload any file yet!</font></h2>';
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



<!--
<div class="responsive">
  <div class="img">
      <img src="images/<?php echo $rows['cred']; ?>" alt="<?php echo $rows['cred_name']; ?>" width="100">
    <div class="desc"><?php echo $rows['cred_name']; ?></div>
  </div>
</div>
<div class="clearfix"></div>

-- The Modal --
<div id="myModal" class="modal">
  <span class="close" style="color: white;">X</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}

// Get all images and insert the clicked image inside the modal
// Get the content of the image description and insert it inside the modal image caption
var images = document.getElementsByTagName('img');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
var i;
for (i = 0; i < images.length; i++) {
   images[i].onclick = function(){
       modal.style.display = "block";
       modalImg.src = this.src;
       modalImg.alt = this.alt;
       captionText.innerHTML = this.nextElementSibling.innerHTML;
   }
}
</script>
-->

			</fieldset>
		</div>
	</div>
</div>




</body>
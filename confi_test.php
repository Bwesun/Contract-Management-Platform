<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
    <script type="text/javascript" language="javascript" src="jquery.min.js"></script>
<script type="text/javascript" language="javascript" src="bootstrap.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style> 
input[type=text] {
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 8px;
    width: 40%;
    font-size: 16px;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 0px 7px 0px 7;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
    padding: 1% 1% 1% 1% ;
}

input[type=text]:focus {
    width: 400px;
    border-radius: 20px;
}

</style>
</head>
<body>


<div class="row">
        <div class="col-md-2"></div>
    <div class="col-md-8">
      
    </div>
</div>


<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 col-md-4">
     <div align="center" class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
                <input type="text" class="form-control" placeholder="Enter Username" name="username">
            </div>
        </div>
</div>
</div>



</body>
</html>

<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pharmacy");	
if($conn->connect_error)die("Database connection failed" . $conn->connect_error);

if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
 
}

$signal="";
if(isset($_SESSION["admin"])){


?>
<?php 
    $conn = new mysqli("localhost", "root", "", "pharmacy");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    
    foreach($conn->query('SELECT * from location') as $row){    
             if($row['pharmacy_id'] == $id) 
             $pharmacy_name = $row['name'];
      }
?>

<!DOCTYPE html> 
<html>
<head>

<!-- <script>
	var name,id=false;
    
	function check_name(e){
		if(e.value.length > 0){
			name=true;
			name_msg.innerHTML="<h3>OK</h3>";
		}
		else{
			name=false;
			name_msg.innerHTML="<h3> Insert Info </h3>";
		}
	}

  function check_id(e)
  {  
      var numbers = /^[0-9]+$/;  
      if(e.value.match(numbers)){  
        id = true;
        id_msg.innerHTML="<h3OK</h3>";  
      }  
      else{  
        id=false;
        id_msg.innerHTML="<h3>Please input numeric characters only</h3>";    
      }  
  }     
  
  function check_submit(elm){

	if(nm==true && id==true ){
			if(elm.getAttribute("type")=="button"){
				document.myfm.submit();
			}
			else{
				alert("Error occurs!");
			}
			}	
	else{
			alert ("INPUT CORRECTLY OR ANY INPUT FIELD IS BLANK");
	}
			
			
	}
</script> -->

<style>
body {font-family: "Lato",sans-serif;}

.topnav {
  overflow: hidden;
  background-color: #858778;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 11px;
  text-decoration: none;
  font-size: 16px;
  width : 165px;
}

.topnav a:hover {
  background-color: #a7b7a8;
  color: black;
}

.topnav .icon {
  display: none;
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child) {display: none;}
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
}


/*  ///////////////////////      box column   ///////////////////////////////// */ 

* {
    box-sizing: border-box;
}

.col-container {
    display: table;
    width: 100%;
	font-weight: bold;
	padding:auto;
}
.col {
    display: table-cell;
    padding: 15px;
	font-weight: bold;
	width: 60%;
}
@media only screen and (max-width: 600px) {
    .col { 
        display: block;
         width: 100%;
    }
}
.img{
  height: 300px;
  weight : 300px;
}

/* /////////////////////////////  contact form //////////////////////////// */

input[type=text], select{
    width: 40%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}
input[type=file]{
    width: 30%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}

input[type=submit] {
    background-color: #5b78a5;
    color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #a7b7a8;
}

.container {
.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>
</head>

<body>

<h1 align="center" style="color:#131413"> <b> ADMIN </b> </h1>

<div class="topnav" id="myTopnav">
  
 <!--  <a href="admin.php?id=<?php echo $id ?>"><span><b> ADMIN </b></span></a> -->
  <!-- <a href="order_list.php?id=<?php echo $id ?>"><span><b> ORDER LIST </b></span></a> -->
   <a href="user_logout.php"><span><b>LOG OUT</b></span></a> 
</div>

<div style="background-color:#c6d8f4; color:black;padding:20px; text-align:left; margin: 12px; width: auto;">
  <h2 align="center">  Location Store </h2> 
  <div class="container">
  <form action="admin_page_fetch_data.php" method="post" enctype="multipart/form-data" >
<h2> Pharmacy Name : </h2> 
<input type="text" name="name" placeholder = "name..."> 
<h2> Pharmacy Id : </h2> 
<input type="text" name="pharmacy_id" placeholder = "id..."> 
<h2> Pharmacy Address : </h2> 
<input type="text" name="address" placeholder = "address...">
<h2> Latitude : </h2> 
<input type="text" name="lat" placeholder = "latitude..." >
<h2> Longitude : </h2> 
<input type="text" name="lon" placeholder = "longitude..." >
<br><br>
<input type="submit"  value=" ADD LOCATION ">

</form>
</div>

<p id="m"></p>
</div>





<div align="center">
            <footer> Copyright © 2017 Online Medicine Order. All rights reserved.</footer>
        </div>
</body>
</html>
<?php
}
else{
	header("Location:index.php");
}	
?>

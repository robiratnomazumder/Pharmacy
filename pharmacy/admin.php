<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pharmacy");	
if($conn->connect_error)die("Database connection failed" . $conn->connect_error);

/*if (isset($_GET['id'])) {
  $id = $_GET['id']; 
  //echo $id;
 }*/
if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
 
}


$signal="";
if(isset($_SESSION["flag"])){


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

<script>
	var nm,price,quantity=false;
    
	function check_name(e){
		if(e.value.length > 0){
			nm=true;
			name_msg.innerHTML="<h3>Name is OK</h3>";
		}
		else{
			nm=false;
			name_msg.innerHTML="<h3>Name must be filled out</h3>";
		}
	}
  function check_price(e)
  {  
      var numbers = /^[0-9]*(\.\w{1,5})+$/;  
	  
      if(e.value.match(numbers)){  
        price = true;
        price_msg.innerHTML="<h3>Input type is OK!</h3>";  
      }  
      else{  
        price=false;
        price_msg.innerHTML="<h3>Please input numeric characters only</h3>";    
      }  
  }  

  function check_quantity(e)
  {  
      var numbers = /^[0-9]+$/;  
      if(e.value.match(numbers)){  
        quantity = true;
        quantity_msg.innerHTML="<h3>Input type is OK!</h3>";  
      }  
      else{  
        quantity=false;
        quantity_msg.innerHTML="<h3>Please input numeric characters only</h3>";    
      }  
  }     
  
  function check_submit(elm){

	if(nm==true && price==true && quantity==true ){
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
</script>

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

input[type=button] {
    background-color: #5b78a5;
    color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=button]:hover {
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





<h1 align="center" style="color:#131413"> <b> <?php echo $pharmacy_name; ?></b> </h1>
<div class="topnav" id="myTopnav">
  
  <a href="admin.php?id=<?php echo $id ?>"><span><b> PHARMACY </b></span></a>
  <a href="medicine_list.php?id=<?php echo $id ?>"><span><b>MEDICINE LIST</b></span></a>
  <a href="order_list.php?id=<?php echo $id ?>"><span><b> ORDER LIST </b></span></a>
  <a href="delivery_list.php?id=<?php echo $id ?>"><span><b> DELIVERY LIST </b></span></a>
   <a href="user_logout.php"><span><b>LOG OUT</b></span></a> 
</div>

<h2 align="center" style="font-size:30px;color:black"> <b> Insert Medicine </b> </h2>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
    } else {
        x.className = "topnav";
    }
}
</script>
<br>



<div style="background-color:#c6d8f4; color:black;padding:20px; text-align:left; margin: 17px; width: 93%;">
  <h2> <b></b> MEDICINE INPUT & STORE </h2> 
  <div class="container">
  <form action="medicine_input_mysql.php" method="post" enctype="multipart/form-data" name="myfm" ><pre>
<h2> MEDICINE NAME : </h2> 
<input type="text" name="name" placeholder = "medicine name..." onkeyup="check_name(this)"> <a id="name_msg"></a>

<h2> MEDICINE CATEGORY : </h2> 
<select name="ct" id="ct" >
  <option value="Category" > Category </option>
   <option value="fever" > fever </option>
  <option value="gastric" > gastric </option>
   <option value="eye_drop"  > eye_drop </option>
  <option value="vitamin"  > vitamin</option>
   <option value="cold"  > cold</option>
  <option value="diarrhoea" > diarrhoea</option>
  <option value="cough"  > cough </option>
  <option value="calcium"  > calcium</option>
</select>
<input type="hidden" name="p" value="<?php echo $id ?>">
<h2> MEDICINE PRICE: </h2> 
<input type="text" name="price" placeholder = "medicine price..." onkeyup="check_price(this)"> <a id="price_msg"></a>
<h2> MEDICINE QUANTITY : </h2> 
<input type="text" name="quantity" placeholder = "medicine quantity..." onkeyup="check_quantity(this)"> <a id="quantity_msg"></a>
<h2> Select image to upload : </h2>
<input type="file" name="imageUpload" id="imageUpload"> 
 
<input type="button"  value=" ADD MEDICINE " onclick="check_submit(this)">
</pre>
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

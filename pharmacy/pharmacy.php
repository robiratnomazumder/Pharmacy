<!DOCTYPE html>
<html lang="en">
    <head>
        <title>
            Pharmacy
        </title>
            <link href="assets/css/bootstrap.css" media="all" rel="stylesheet" type="text/css">
                <link href="assets/css/style.css" media="all" rel="stylesheet" type="text/css">
                    <link href="assets/css/component.css" rel="stylesheet" type="text/css"/>
                    <link href="assets/css/font-awesome.css" rel="stylesheet">
                        </link>
                        </link>
                    </link>
                </link>
    </head>
    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<?php

session_start();
$con    = mysqli_connect("localhost", "root", "", "pharmacy");
$result = mysqli_query($con, 'select * from medicine');
require 'item.php';

if(isset($_SESSION["flag"]))
        header("Location:admin.php");

if(isset($_SESSION["admin"]))
        header("Location:admin_page.php");

if (isset($_GET['pharmacy'])) {
  $medicine = $_GET['pharmacy']; 
 // echo $medicine;
 }
?>
<style type="text/css">



input[type=text], select{
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

    color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  width:100px;
  text-align:center;
  font-weight:bold;
  font-size:15px;
}

input[type=submit]:hover {
     padding: 12px 20px;
     border-radius: 4px;
     cursor: pointer;
     background-color: #1f6812;
}
    /* /////////////////// login ///////////*/
input[type=text], input[type=password] {
   width: 30%;
    padding: 5px 15px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    margin-left: 5px;
}

/* Set a style for all buttons */


/* Extra styles for the cancel button */
.cancelbtn {
   
    padding: 10px 18px;
    background-color: #ad0d23;
}
.cancelbtn:hover {
   
    padding: 10px 18px;
    background-color: red;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 20%;
    border-radius: 0%;
}
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
}

* {
    box-sizing: border-box;
}

.col-container {
    display: table;
    width: 100%;
  font-weight: bold;
  margin-left: 15px;
}
.col {
    display: table-cell;
    padding: 15px;
  font-weight: bold;
}


/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}

.topnav {
  overflow: hidden;
  background-color: #d2dbd3;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 8px 8px;
  text-decoration: none;
  font-size: 17px;
  width : 160px;
}

.topnav a:hover {
  background-color: #959996;
  color: white;
}

.topnav .icon {
  display: none;
}

h1 { 
   position: absolute; 
   top: 25px; 
   margin-left: 30px;
}

</style>
 <body>

<input style="height: 350px;width:900px;padding-bottom: 8px;" type="image" src="assets/images/medi12.JPG" >
  <h1 style="color:#c61523;font-size: 47px;">
  <b> Med . . . . <br> </b>
  <b> At The Door</b> </h1>


<br>
<div class="topnav" id="myTopnav">

 <a href="index.php"><span><b> HOME </b></span></a>
  <a href="register.php"><span><b> Signup </b></span></a>

  <?php    
if(!isset($_SESSION['name'])){ ?>
  <a onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;"><span><b> Login </b></span></a>
   <?php }?>
   </div>

 <?php 
    $conn = new mysqli("localhost", "root", "", "pharmacy");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    
    foreach($conn->query('SELECT * from location') as $row){    
             if($row['pharmacy_id'] == $medicine){
             $pharmacy_name = $row['name'];
             $pharmacy_address = $row['address'];
           }
      }
?>
 <h2 style="text-align: center;color: #708ab5;padding:5px; "> <?php echo $pharmacy_name; ?> </h2>

<div style="color:black;
font-size: 15px; padding:10px;width: 99%;height:auto;">
  <?php require "fetch_data.php";?>
</div>

<?php
if (isset($_SESSION['name'])) {?>
  <a href="user_logout.php" 
  style="margin-left: 1000px;font-size:20px; color: #7e97bf;font-weight:bold;"> LOG OUT </a>
   <form action="order.php" method="post">
   <input  type="submit"
  style="width:170px;
  font-weight:bold;font-size:18px;margin-left: 20px; background-color: #8af2a3;cursor: not-allowed;
    border-radius:25px;"
   name="search" value="LOGGED IN">
   </form>
   
<?php
} else {
    ?>

<div id="id01" class="modal">
      <form class="modal-content animate" action="user_login_from_order_page.php" 
        method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="login_pic.png" alt="image" class="avatar">
      </div>

      <div class="container" style="color:black;padding: 20px;">
      <h3 style="margin-left: 270px;"> LOGIN </h3>
        <label><b>Email &nbsp;&nbsp;&nbsp;&nbsp; </b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
         <input type="hidden" name="p" value="<?php echo $medicine ?>">

        <input type="submit" style="background-color:#27af0f;" name="login" value="login"><br>
        <input type="checkbox" checked="checked"> Remember me
      </div>
        <button type="button" style="margin-left: 15px;width: 110px;" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <div align="right" style="padding: 20px; "> <a href="register.php" align="right"> create account </a> </div>
     </form>
</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
   <script>
   function check_submit(elm) {
        if(document.myfm.start.value == '' ){
            alert("Enter Medicine Name....");
      window.location.href = 'order_medicine.php';
        }
    else{
                if (elm.getAttribute("type") == "submit") {

                  if (<?php if (isset($_GET['pharmacy'])) {
        ;
    }
    ?>) {
                    <?php $medicine = $_GET['pharmacy'];?>

                    document.myfm.submit(); }
                } else {
                    alert("Error occurs!");
                }
            }
    }
    </script>

  <input  type="submit"onclick="document.getElementById('id01').style.display='block'"
  style="width:170px;
  font-weight:bold;font-size:18px;background-color:#e02a2a;color:white;
    left:410px;border-radius:25px;margin-left: 20px;"
  name="search" value="LOG IN FIRST">

  <?php }?>

  <h4 style="color: #708ab5;padding:5px;margin-left:180px; "> <?php echo "Address: ".$pharmacy_address; ?> </h4>
  <br>
  
<div style="margin-left: 30px;">
SEARCH MEDICINE :
   <input type="text" name="search_text" id="search_text" 
   placeholder="Search Medicine" class="form-control" />

    <input style="height: 80px; margin-left: 400px;" type="image" 
    onclick="window.location.href='order.php?pharmacy=<?php echo $medicine ?>'" src="cart.PNG" >
</div>
<div class="col-container">

<div style="text-align: center;height: auto;">
  

  <h2 style="text-align: center;">  Medicine list</h2>
  
 <br>


<div id="result" style="height: auto;"></div>

</div>

<script>
  var value = "<?php echo $medicine ?>";

load_data_all(value);

 //load_data();
   $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data_all(value);
  }
  });



 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",
   method:"GET",
   data:{query:query,user:value},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }



function load_data_all(medicine)
 {
  $.ajax({
   url:"fetch.php",
   method:"GET",
   data:{user:medicine},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
}
</script>
</div>


 <div class="footerw3-agile">
    <div class="container">
      <div class="footer-row">
        <div class="col-md-4 footer-grids">
          <h3>Navigation</h3>         
          <ul>
            <li><a href="about.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> About us</a></li>
            <li><a href="contact.php"><i class="fa fa-arrow-right" aria-hidden="true"></i> Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-4 footer-grids">
            <h3>
                            Medicine Order
                        </h3>
                        <ul>
                            <li>
                                24 Hours Open (All Registered Pharmacy)
                            </li>
                            <li>
                                In The Google Map, <br>
                                Only Registered Pharmacy have been included.
                                
                            </li>
                            
                        </ul>
        </div>
        <div class="col-md-4 footer-grids">
          <h2 style="color: white;font-size: 35px;">
                                Medi At The Door
                        </h2>
                        <p>
                            Online Medicine Order <br>
                            Find Nearest Pharmacy <br>
                            Choose Medicine From The Pharmacy <br>
                            Order And Get Medicine Quickly
                        </p>
        </div>
        <div class="clearfix"> </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="footer-left">
        <!-- <p>© 2017 Medi Plus . All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p> -->
        Copyright © 2017 Online Medicine Order. All rights reserved.    
      </div>
      <div class="footer-right">
        <ul class="w3-agileitsicons">
          <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          <li><a class="twt" href="#"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
          <li><a class="drbl" href="#"><i class="fa fa-linkedin" aria-hidden="true"></i> </a></li>
          <li><a class="be" href="#"><i class="fa fa-dribbble" aria-hidden="true"></i> </a></li>
        </ul>
      </div>
      <script>$(function () {
        $('[data-toggle="tooltip"]').tooltip()
      })</script>
    </div>
  </div>

</body>
</html>









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

if (isset($_GET['pharmacy'])) {
  $medicine = $_GET['pharmacy']; 
 // echo $medicine;
 }
?>
<style type="text/css">


button{
  color: black;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  width:100px;
  text-align:center;
  font-weight:bold;
  font-size:15px;
  background-color: red;
}
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


h1 { 
   position: absolute; 
   top: 25px; 
   margin-left: 30px;
}

</style>
 <body>

<input style="height: 350px;width:900px;padding-bottom: 8px;" type="image" src="assets/images/medi12.JPG" >
  <h1 style="color:#c61523;font-size: 47px;">
  <b> Medi . . . . <br> </b>
  <b> At The Door</b> </h1>


      <form  action="check_login.php" method="post" style="margin-left: 40px;">

      <h2 style="margin-left: 270px;"> LOGIN </h2>
        <label><b>Email &nbsp;&nbsp;&nbsp;&nbsp; </b></label>
        <input type="text" placeholder="Enter Email" name="email" required>&nbsp;
        <input type="text" style="width:230px;" placeholder="For Admin/Pharmacy Use Only" name="pharmacy_id">
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>

        <br>
         <input type="hidden" name="p" value="<?php echo $medicine ?>">
         <br>
        <input type="submit" style="background-color:#27af0f;" name="login" value="login"> &nbsp;
        <button type="button"  onClick="window.location='index.php';" >Cancel
        </button>
      </form> 
     <div align="left" style="padding-left: 420px; "> 
      <a href="register.php" align="right"> create account </a>
     </div>

<br><br>
 <div class="footerw3-agile">
    <div class="container">
      <div class="footer-row">
        <div class="col-md-4 footer-grids">
          <h3>Navigation</h3>         
          <ul>
            <li><a href="about.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> About us</a></li>
            <li><a href="products.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> Products</a></li>
            <li><a href="icons.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> Web Icons</a></li>
            <li><a href="codes.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> Short Codes</a></li>
            <li><a href="contact.html"><i class="fa fa-arrow-right" aria-hidden="true"></i> Contact Us</a></li>
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









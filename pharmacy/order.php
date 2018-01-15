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


<?php
     session_start();
    if(isset($_SESSION["flag"]))
   header("Location:admin.php");

if(isset($_SESSION["admin"]))
        header("Location:admin_page.php");
      
$con = mysqli_connect("localhost", "root", "","pharmacy");
require 'item.php';
$medicine ='';
if (isset($_GET['pharmacy'])) {
  $medicine = $_GET['pharmacy']; 
 }

?>

<style>

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



.button {
  border-radius: 24px;
  background-color: #858778;
  border: none;
  color: #f2f2f2;
  text-align: center;
  font-size: 20px;
  padding: 13px;
  width: 250px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 10px;
  text-align:bold;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
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
}



			
input[type=text],input[type=password], select{
    width: 40%;
    padding: 6px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-bottom: 2px;
    resize: vertical;

}

input[type=submit] {
    background-color: #858778;
    color: #f2f2f2;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #a7b7a8;
}	


/* ///////////////////// slide bar /////////////////// */
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: absolute;
    z-index: 1;
    top: 0;
    right: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 90px;
	padding-left: 0px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: white;
    display: block;
    transition: 0.3s;
	
}

.sidenav a:hover, .offcanvas a:focus{
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    left: 35px;
    font-size: 36px;
    margin-left: 270px;
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
h1 { 
   position: absolute; 
   top: 25px; 
   margin-left: 30px;
}

</style> 
  <body >
  <input style="height: 350px;width:900px;padding-bottom: 8px;" type="image" src="assets/images/medi12.JPG" >
  <h1 style="color:#c61523;font-size: 47px;">
  <b> Med. . . . <br> </b>
  <b> At The Door</b> </h1>

<br>
<div class="topnav" id="myTopnav">

 <a href="index.php"><span><b> HOME </b></span></a>
  <a href="register.php"><span><b> Signup </b></span></a>

  <?php    
if(!isset($_SESSION['name'])){ ?>
  <a onclick="document.getElementById('id01').style.display='block'" style="cursor: pointer;"><span><b> Login </b></span></a>
   <?php }?>
   <a href="pharmacy.php?pharmacy=<?php echo $medicine ?>"><span><b> Pharmacy </b></span></a>
   </div>
   <br>
  

<?php    
if(isset($_SESSION['name'])){
 ?> <div style="text-align:right;padding-right:15px; font-size:18px; ">Logged In  &nbsp;<?php
?> <a href="user_logout.php" style="color: #7e97bf;padding-right:15px;
font-weight:bold;font-size: 20px;"> Log out </a> <br><br> </div><?php
} 
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
         <!-- <input type="hidden" name="p" value='<?=$_REQUEST["$medicine"]?>'> -->

         <input type="hidden" name="p" value="<?php echo $medicine ?>">
        <input type="submit" style="background-color:#27af0f;" name="login" value="login"><br>
        <input type="checkbox" checked="checked"> Remember me
      </div>
        <button type="button" style="margin-left: 15px;width: 110px;" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
        <div align="right" style="padding: 20px; "> <a href="register.php" align="right"> create account </a> </div>
     </form>
</div>

  <script>
function openNav() {
    document.getElementById("mySidenav").style.width = "400px";
	document.getElementById("mySidenav").style.color = "white";
    //document.getElementById("main").style.marginLeft = "0px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>

  <div id="mySidenav" class="sidenav" >
  <a href="javascript:void(0)" style="position:right;" class="closebtn" onclick="closeNav()">&times;</a>
  
          <form action="check_login.php" method="post">
                        <h1 style="padding:20px;"> ADMIN LOGIN</h1>
                        <b style="padding:20px;"> USER ID </b>
                        <input type="text"  name="username" placeholder="User Id ...">
                        <br> <br>
                        <b style="padding:20px;"> PASSWORD </b>
                        <input type="password"  name="password" placeholder="Password...">
                        <br>
                        
                        <input type="submit" class="btn_login_btn default" style="background-color:green;color:black;" value="LOGIN">

                        <a href="javascript:void(0)" class="closebtnn" onclick="closeNav()">
                            <input type="button" class="btn_login_close default" style="background-color: red" value="CANCEL">
                        </a>

                    </form>
					
					
  </div>


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

<div class="col-container">
        <div class="col" style="background-color:#d1f1ff; color:black; text-align:left;
    width:30%;"> 
    <?php if(isset($_SESSION['name'])){ ?>
      
      <h3>
        <?php

          echo "Information <br><br>"; 
          echo "FIRST NAME: ".$_SESSION['info1']."</br>";
          echo "LAST NAME: ".$_SESSION['info2']."</br>";
          echo "ADRESS: ".$_SESSION['info_address']."</br>";
          echo "GENDER: ".$_SESSION['info3']."</br>";
          echo "PHONE: 0".$_SESSION['info4']."</br>";

        ?>
      </h3>
      </h1>
      <?php } 
      else{
         echo "<h3 align='center' style='color:black'><b> For Order, Login Please </b></h3>";
         echo "<h3 align='center' style='color:black'><b> If not registered yet, Please 
         <a href='register.php'>SignUp </a> </b> </h3>";
      }
      ?>

    </div>
<br>

        <div class="col" style="background-color:#d1f1ff; color:black; text-align:left;
		width:65%;height:auto;">
            <h2 align="center" style="color:black;font-weight: italic"><b> Order Cart </b></h2>
			
        

<?php
if(isset($_GET['id']) && !isset($_POST['update'])){
  $result = mysqli_query($con,'select * from medicine where id='.$_GET ['id']);
  $product = mysqli_fetch_object($result);

  $item = new Item();

   $item->id = $product->id;
   $item->name = $product->name; 
   $item->price = $product->price;
   $item->quantity = 1;

   $index = -1;

   if(isset($_SESSION['cart'])){
    $cart = unserialize(serialize($_SESSION['cart']));
    for($i=0;$i<count($cart);$i++)
      if($cart[$i]->id == $_GET['id']){
        $index = $i;
        break;
      } 
    }

    if($index == -1){
      $_SESSION['cart'][] = $item;
    }
    else{
      $cart [$index]->quantity ++;
        $_SESSION['cart'] = $cart;
    }
 }
   if(isset($_GET['index']) && !isset($_POST['update']) ){
     $cart = unserialize(serialize( $_SESSION['cart']));
     unset($cart[$_GET['index']]);
     $cart = array_values($cart);
     $_SESSION['cart'] = $cart;
   } 
 
 if(isset($_POST['update']) ){
  $arrQuantity = $_POST['quantity'];

  $valid = 1;
  for($i=0;$i<count($arrQuantity);$i++)
        if(!is_numeric($arrQuantity[$i]) || $arrQuantity[$i] <1){
           $valid = 0;
           break;
        }
  if($valid == 1){
     $cart = unserialize(serialize( $_SESSION['cart']));
     for($i=0;$i<count($cart);$i++){
      $cart[$i]->quantity = $arrQuantity[$i];
     }
      $_SESSION['cart'] = $cart;
     }
     else{
      $error = 'Quantity is invalid';
     }
   } 

   ?>

   <?php  echo isset($error) ? $error : ''; ?>

<?php 
  /* if(!isset($_GET['id']) ){    echo "NO MEDICINE IS ORDERED <br><br><br>";
    echo "<a href='order_medicine.php'> Continue shopping </a> &nbsp;";
   }
   else{ */

 if(!isset($_SESSION['cart'])){
      echo "<br><br><br><h3> No Medicine Is Ordered </h3>";
     }
     else{ ?>

   <form method="post">
 <table cellpadding="0" cellspacing="1" border="2" align="center" 
 style="background-color:#edefed;">
 
        <tr>
            <th style="padding-left: 25px;"> Option </th>
            <th style="padding-left: 25px;"> Id </th>
            <th style="padding-left: 25px;"> Name </th>
            <th style="padding-left: 25px;" style="padding-left: 25px;"> Price </th>
            <th style="padding-left: 25px;"> Quantity </th>
            <th style="padding-left: 25px;"> &nbsp; Total &nbsp;</th>
        </tr>
 <?php 
    
     $cart = unserialize(serialize( $_SESSION['cart']));
     $s=0;
     $index = 0;
     for($i=0;$i<count($cart);$i++){
          $s += $cart [$i]->price * $cart[$i]->quantity;
          ?>
          <tr style="text-align: center;"> 
            <td style="background-color: white;">
                <a href="order.php?index=<?php echo $index; ?>" 
                  class="delete" onclick="return confirm('Will you remove it from the cart?')"> 
                  <img style="height: 35px;width: 40px;" src="delete2.PNG" /> </a>
            </td>

                <td style="padding-left: 25px;"> <?php echo $cart[$i]-> id;?></td>
                <td style="padding-left: 25px;"><?php echo $cart[$i]-> name;?></td>
                <td style="padding-left: 25px;"><?php echo $cart[$i]-> price;?></td>
                <td style="padding-left: 25px;"><input type="text" value="<?php echo $cart[$i]-> quantity;?>" style="width: 50px;" id="quantity" name="quantity[]">

                  <input type="hidden" id="medicine_id" value="<?= $cart[$i]-> id ?>">
                  <input type="hidden" id="pharmacy_id" value="<?= $_GET['pharmacy'] ?>">

           </td>

            <td><?php echo $cart[$i]-> price*$cart[$i]->quantity;?></td>
          </tr>
          <?php $index ++;

        }  
      

?>

<!-- <script>

$(function(){



  $('#quantity').keyup(function(){
  alert(1);    var quantity = $(this).val();

    $.ajax({
     url:"VerifyQuantity.php",
     method:"GET",
     data:{medicine_id:$('#medicine_id').val(),pharmacy_id:$('#pharmacy_id').val(),quantity:quantity},
     success:function(data)
     {
        if(data != "")  alert(data);
     }
    });

  });

});

  

</script> -->

<?php

  if(!isset($_GET['pharmacy'])){  
  //echo "<script> alert('medicine ordered')</script>";
  echo "<script> window.history.go(-1); </script>"; 
    }
 ?>
 <tr style="text-align: center;">
  <td colspan="5" align="right">Save &nbsp;
  <input style="height: 25px;" type="image" src="save.PNG" > <input type="hidden" name="update">
  &nbsp;&nbsp;Sum &nbsp;</td>
  <td style="font-size: 20px; color:blue;"><?php echo $s;?></td>

 </tr>

 </table>
 </form>

<?php } ?>
 <br>
 
    <a style="font-size: 20px;" href="pharmacy.php?pharmacy=<?php echo $medicine ?>"> 
      Continue Shopping </a> <br>     


<?php if(isset($_SESSION['name'])){ 
 ?>

      <a style="font-size: 20px;" href="checkout.php?pharmacy=<?php echo $medicine?>" 
        > Check Out
      </a>
      <!-- onclick="return confirm('Product Ordered successfully')"  -->
      
<?php }
else{
  ?>
    <a style="font-size: 20px;" href="order.php" onclick="return confirm('Please, Do Login First')"> Check Out</a>
  <?php 
  }
//}
 ?>

</div> 
</div>

<br>
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

 <div class="hmw3layouts">
    <div class="container">

<?php
   // session_start();
    if(isset($_SESSION["flag"]))
   header("Location:admin.php");

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
  background-color: #858778;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 8px 8px;
  text-decoration: none;
  font-size: 17px;
  width : 180px;
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


.picture
{
  display: block;
    margin: 8px;
  border: 3px solid #858778;
    border-radius: 4px;
    padding: 2px;
    width: 230px;
  height: 230px;
  cursor: pointer;
  float: left;
  display: table;
}

divv{
        width: 244.8px; 
        background-color: none; 
        float: left; 
        height: 300px; 
        text-align: center; 
        margin-right: 5px; 
        margin-bottom: 5px;
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


#main {
    transition: margin-left .5s;
    padding: 36px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

/* ////////////////////// login button for admin/////////////////////////////////// */
.btn_login_btn {
    border: none;
    color: white;
    padding: 14px 28px;
    font-size: 15px;
    cursor: pointer;
  font-weight: bold;
  margin: 20px;
}
.btn_login_close {
    border: none;
    color: white;
    padding: 13px 13px;
    font-size: 15px;
    cursor: pointer;
  font-weight: bold;
  margin: 0px;
}
.default {background-color: #e7e7e7; color: black; }
.default:hover {background: #ddd;}    
/* /////////////// new /////////////////// */

.delete {
  width: -1000000000px;
  height: -1010000000px;
}

</style>

<?php    
if(isset($_SESSION['name'])){
 ?> <div style="text-align:right;padding-right:7px; font-size:18px; ">Logged In  &nbsp;<?php
?> <a href="user_logout.php" style="color: red"> Log out </a> <br><br> </div><?php
} 
?>
 

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
</div>
<div class="col-container">
        <div class="col" style="background-color:#aad4ff;color:black;padding:15px; text-align:left;
    margin:25px;width:30%;height:425px;">
    <?php if(isset($_SESSION['name'])){ ?>
      <h1 align="center" style="color:black"><b> Information </b>
      </br>
      <h3>
        <?php
          echo "FIRST NAME: ".$_SESSION['info1']."</br>";
          echo "LAST NAME: ".$_SESSION['info2']."</br>";
          echo "GENDER: ".$_SESSION['info3']."</br>";
          echo "PHONE: ".$_SESSION['info4']."</br>";
        ?>
      </h3>
      </h1>
      <?php } 
      else{
         echo "<br> <br>";
         echo "<h3 align='center' style='color:black'><b> For Order, Please Login  </b></h3><br>";
         echo "<h3 align='center' style='color:black'><b> Not Registered Yet? <br>  
         <a href='register.php'>SignUp </a> Please </b> </h3>";
      }
      ?>

</div>

<br>

        <div class="col" style="color:black;padding:15px; text-align:left;
    margin:25px;width:68%;height:425px;">
            <h1 align="center" style="color:black"><b> Order Cart </b></h1>
      
        

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
?>

   <form method="post">
 <table cellpadding="0" cellspacing="1" border="2" align="center" 
 style="background-color:#c2d1c4;">
 
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
                  class="delete" onclick="return confirm('Are you sure?')"> 
                  <img style="bottom: -200px;" src="delete.PNG" /> </a>
            </td>

                <td style="padding-left: 25px;"> <?php echo $cart[$i]-> id;?></td>
                <td style="padding-left: 25px;"><?php echo $cart[$i]-> name;?></td>
                <td style="padding-left: 25px;"><?php echo $cart[$i]-> price;?></td>
                <td style="padding-left: 25px;"><input type="text" value="<?php echo $cart[$i]-> quantity;?>" style="width: 50px;" name="quantity[]">
           </td>

            <td><?php echo $cart[$i]-> price*$cart[$i]->quantity;?></td>
          </tr>
          <?php $index ++;

 }  
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
 <br>
 
    <a href="pharmacy.php?pharmacy=<?php echo $medicine ?>" > 
      Continue shopping </a> <br>     


<?php if(isset($_SESSION['name'])){  ?>

      <a href="checkout.php?pharmacy=<?php echo $medicine ?>" onclick="return confirm('Product Ordered successfully')"> Check Out</a>
<?php }
else{
  ?>
    <a href="order.php" onclick="return confirm('Please, Do Login First')"> Check Out</a>
  <?php 
  }
//}
 ?>
</div>


</div>

  </div>
</div>


<div class="hmw3layouts">
    <div class="container">
        
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>


<?php

//session_start();
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
</style>

<!-- <?php
if (isset($_SESSION['name'])) {
    echo "FIRST NAME</br>";
}
?>  -->


<div style="color:black;
font-size: 15px; padding:10px;width: 99%;height:100%;">
  <?php require "fetch_data.php";?>

<?php
if (isset($_GET['value'])) {?>
  <a href="user_logout.php" 
  style="margin-left: 1000px;font-size:20px; color: #7e97bf;font-weight:bold;"> LOG OUT </a>
   <form action="order.php" method="post">
   <input  type="submit"
  style="width:170px;
  font-weight:bold;font-size:18px;background-color: #8af2a3;cursor: not-allowed;
    border-radius:25px;"
   name="search" value="LOGGED IN">
   </form>
   
<?php
} else {
    ?>


<div id="id01" class="modal">
      <form class="modal-content animate" action="user_login_from_order_page.php?p=<?php echo $medicine?>" 
        method="post">
      <div class="imgcontainer">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="login_pic.png" alt="image" class="avatar">
      </div>

      <div class="container" style="color:black;padding: 20px;">
      <h3 style="margin-left: 270px;"> LOGIN </h3>
        <label><b>Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </b></label>
        <input type="text" placeholder="Enter Username" name="email" required>
        <br>
        <label><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <br>
       <!--  <input type="hidden" name="p" value='<?=$_REQUEST["$medicine"]?>'> -->
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
    left:410px;border-radius:25px;"
  name="search" value="LOG IN FIRST">

  <?php }?>
  <br>
  

SEARCH MEDICINE :
   <input type="text" name="search_text" id="search_text" 
   placeholder="Search Medicine" class="form-control" />

    <input style="height: 80px; margin-left: 400px;" type="image" 
    onclick="window.location.href='order.php?pharmacy=<?php echo $medicine ?>'" src="cart.PNG" >
    
<div style="text-align: center;">
  <br>
  <h1 style="text-align: center;">  Medicine list</h1>
  
 <br>
<div id="result"></div>

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
   method:"POST",
   data:{query:query,user:'user'},
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
  
    </div>
</div> 






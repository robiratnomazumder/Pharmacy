<?php
session_start();
$u=$_POST['email'];
$p=$_POST['password'];
$id = $_POST['pharmacy_id'];

$a=$_POST['p'];

       if($_POST['pharmacy_id'] != '1000'){
      require("mysql-to-json.php");
      $jsonData= getJSONFromDB("select * from admin");
      $flag=0;
      $jsn=json_decode($jsonData);
      for($i=0;$i<sizeof($jsn);$i++){
        if($_POST['email'] == trim($jsn[$i]->email) && $_POST['password'] == trim($jsn[$i]->password)
        && $_POST['pharmacy_id'] == trim($jsn[$i]->pharmacy_id)){
          $_SESSION["flag"]=$id;
          //$_SESSION["id"]= $u;
          $flag1=1;
        }
    }
      if($flag1==1){
        $_SESSION['id'] = $id;
        
        header("Location:admin.php");
      //  header("Location:admin.php?id=$id");
      }

      else{
          ?> <script>alert('wrong username or password');</script>"; <?php
        header("Location:login_page.php");
        
      } 
    }

     if($_POST['pharmacy_id'] == '1000'){
      require("mysql-to-json.php");
      $jsonData= getJSONFromDB("select * from admin");
      $flag=0;
      $jsn=json_decode($jsonData);
      for($i=0;$i<sizeof($jsn);$i++){
        if($_POST['email'] == trim($jsn[$i]->email) && $_POST['password'] == trim($jsn[$i]->password)
        && $_POST['pharmacy_id'] == trim($jsn[$i]->pharmacy_id)){
          $_SESSION["admin"]=$id;
          //$_SESSION["id"]= $u;
          $flag1=1;
        }
    }
      if($flag1==1){
        $_SESSION['id'] = $id;
        header("Location:admin_page.php");
      //  header("Location:admin.php?id=$id");
      }

      else{
          ?> <script>alert('wrong username or password');</script>"; <?php
        header("Location:login_page.php");
        
      } 
    }


  
  require("mysql-to-json.php");
  $jsonData= getJSONFromDB("select * from signup");
  $flag=0;
  $jsn=json_decode($jsonData);

  $arr = json_decode($jsonData);
$len = sizeof($arr);
for($i = 0; $i < $len; $i++){
   if($u == trim($arr[$i]->email) && $p == trim($arr[$i]->password)){

    $firstname = $arr[$i]->fname;
    $lastname = $arr[$i]->lname;
    $address = $arr[$i]->address;
    $gender = $arr[$i]->gender;
    $phone = $arr[$i]->phone;
   // $username[$uname] = $id;
    //echo $fn.$ln.$gn.$phn;
   // echo $uname;
    
  }

} 
//echo $fn.$ln.$gn.$phn;

$_SESSION['info1'] = $firstname;
$_SESSION['info2'] = $lastname;
$_SESSION['info_address'] = $address;
$_SESSION['info3'] = $gender;
$_SESSION['info4'] = $phone;

  for($i=0;$i<sizeof($jsn);$i++){
		if($_POST['email'] == trim($jsn[$i]->email) && $_POST['password'] == trim($jsn[$i]->password)){
		//	$_SESSION["flag"]="ok";
			$flag=1;
		}
}

if($flag==1){
	$_SESSION['name'] = "login"; 
	 ?>
	 <script type="text/javascript"> 
     alert("Logged In");
     window.location.href = "index.php"; 
     </script> <?php
	//header("Location:index.php");
	  /* $_SESSION['name'] = "login"; 
         $p = $_POST['p'];
        echo '<script type="text/javascript">'; 
        echo 'alert("Logged In");';
        echo ' var a = "<?php echo $p; ?>";';
        //echo 'window.location.href = "order_medicine.php?p='.$p.'";';
        echo 'window.location.href="pharmacy.php?pharmacy=".$p.""';
        echo '</script>';
}
*/
}
else{
    ?> 
    <script type="text/javascript"> 
     alert("Incorrect Email or Password, Please Try Again !");
     window.location.href = "index.php"; 
     </script>

<?php 	
} 

?>
<?php
session_start();
$u=$_POST['email'];
$p=$_POST['password'];
$a=$_POST['p'];

  require("mysql-to-json.php");
  $jsonData= getJSONFromDB("select * from signup;");
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

//echo $_SESSION['info'];

 // $_SESSION['info'] = $jsonData;
 // echo $_SESSION['info'];

  for($i=0;$i<sizeof($jsn);$i++){
		if($_POST['email'] == trim($jsn[$i]->email) && $_POST['password'] == trim($jsn[$i]->password)){
			//$_SESSION["flag"]="ok";
			$flag=1;

      
		}
}
if($flag==1){
      
       $_SESSION['name'] = "login"; 
          
       echo '<script type="text/javascript">'; 
       echo 'alert("Logged In");';
       echo 'window.location.href = "pharmacy.php?pharmacy='.$a.'"';
       echo '</script>';

        //   header("Location:pharmacy.php?pharmacy=$a");
}
else{

     /*echo '<script type="text/javascript">'; 
     echo 'alert("Incorrect Email or Password, Please Try Again !");'; 
     echo 'window.location.href = "index.php"';
     echo '</script>';*/
      header("Location:index.php");

	//header("Location:home_page.php");	
}  


//$jsonData= getJSONFromDB("select * from signup where email = '$u' and password = '$p';");
 //$_SESSION['info'] = $jsonData;
// echo $_SESSION['info'];
?>
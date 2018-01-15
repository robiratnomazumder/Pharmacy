<pre>
<?php
 if(strlen($_REQUEST['firstName'])>0 && strlen($_REQUEST['lastName'])>0 && strlen($_REQUEST['address'])>0 && strlen($_REQUEST['phone'])>0 
 && strlen($_REQUEST['email'])>0 && strlen($_REQUEST['password'])>0 && strlen($_REQUEST['confirmPassword'])>0){

	if(strlen($_REQUEST['phone'])==11){
		
		if($_REQUEST['password'] == $_REQUEST['confirmPassword']){

			if (!filter_var($_REQUEST['email'], FILTER_VALIDATE_EMAIL) === false) {
				  require("mysql-to-json.php");
				  if(insert("INSERT INTO signup(fname,lname,address,phone,gender,email,password,conf_password) VALUES('".$_REQUEST['firstName']."','".$_REQUEST['lastName']."',
				 '".$_REQUEST['address']."','".$_REQUEST['phone']."','".$_REQUEST['gender']."','".$_REQUEST['email']."'
				  ,'".$_REQUEST['password']."','".$_REQUEST['confirmPassword']."')")>0){
						  
						  ?> 
						  <script>  //alert("successful"); </script> 
						  <?php 
					   }
					   
			
		}
		else{
			
				echo "<br/>Sorry invalid email!";
			}
			
		}
		else{
			echo "<br/>Sorry password mismatched!";
			
		}
	}
	else{
			echo "<br/>phone number invalid!";
			
		}
		
		 header("Location:register.php");
}
	
	
else{
	echo "error";
}
?>

</pre>

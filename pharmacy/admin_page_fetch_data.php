<pre>
<?php
 if(strlen($_REQUEST['name'])>0){
	require("mysql-to-json.php");
    if(insert("INSERT INTO location (lat,lon,name,address,pharmacy_id) VALUES('".$_REQUEST['lat']."','".$_REQUEST['lon']."','".$_REQUEST['name']."','".$_REQUEST['address']."','".$_REQUEST['pharmacy_id']."')") >0 ){
       // $_SESSION["admin"]='11';
        // echo '<script type="text/javascript">'; 
         //echo 'alert("Post Done.");'; 
         //echo 'window.location.href = "student_page.php";';
         //echo '</script>';        
			  header("Location:admin_page.php");

		 }
        else{
        	 header("Location:admin_page.php");
        }

	}

    else if(strlen($_REQUEST['quantity_add'])>0){
     require("mysql-to-json.php");
        if(insert("update medicine set quantity='".$_REQUEST['quantity_add']."' where id=
        '".$_REQUEST['id']."' ") >0 ){      
                echo "<script>";
    
                echo "alert('Medicine quantity was updated');";
                echo 'window.location.href = "medicine_list.php"';
                
                echo "</script>"; 
              //header("Location:medicine_list.php");
         }
        else{
            echo "<script>";
    
                echo "alert('Wrong input');";
                echo 'window.location.href = "medicine_list.php"';
                
                echo "</script>"; 
           //  header("Location:medicine_list.php");
        }
    }

  else{
			
            header("Location:admin_page.php");	
		} 

?>

</pre>
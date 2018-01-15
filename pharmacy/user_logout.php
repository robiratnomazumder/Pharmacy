<?php
session_start();
$_SESSION['name']="";
session_destroy();
//header("Location:home_page.php");
        echo '<script type="text/javascript">'; 
        echo 'alert("Logged Out");'; 
        echo 'window.location.href = "index.php";';
        echo '</script>';
?>
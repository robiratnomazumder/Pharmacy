<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pharmacy";

if (isset($_GET['delivery'])) {
  $del = $_GET['delivery'];
 }
 if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
}


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// sql to delete a record
//$sql = "DELETE a1,a2 FROM ordersdetail a1, orders a2 WHERE a1.ordersid='{$del}' and a2.id='{$del}'";
$sql = "update orders set delivery='done' where id='$del' ";

/*$sql2 = "DELETE FROM order WHERE ordersid='{$del2}'";

DELETE m, um FROM messages m, usersmessages um

WHERE m.messageid = 1 

AND m.messageid = um.messageid */

if (mysqli_query($conn, $sql)) {
    //echo "Product delivered successfully";
    echo "<script>";
    
    echo "alert('Product delivered successfully');";
    echo 'window.location.href = "order_list.php"';
    
    echo "</script>";

    //header("Location:order_list.php");
    
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
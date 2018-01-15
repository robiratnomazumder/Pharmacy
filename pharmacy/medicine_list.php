<?php
session_start();

$conn = new mysqli("localhost", "root", "", "pharmacy");	
if($conn->connect_error)die("Database connection failed" . $conn->connect_error);

/*if (isset($_GET['id'])) {
  $id = $_GET['id']; 
  //echo $id;
 }*/
 if (isset($_SESSION['id'])) {
     $id = $_SESSION['id'];
}

$signal="";
if(isset($_SESSION["flag"])){
?>

<!DOCTYPE html>
<html>
<head>

<style>
body {font-family: "Lato",sans-serif;}

.topnav {
  overflow: hidden;
  background-color: #858778;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 12px 11px;
  text-decoration: none;
  font-size: 16px;
  width : 165px;
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
  width : 300px;
}

/* /////////////////////////////  table  //////////////////////////// */

table {
    width:100%;
}
table, th, td {

    border: 1px solid black;
    border-collapse: collapse;
}
th{
    padding: 6px;
    text-align: center;
}
td{
    padding: 8px;
    text-align: left;
}
table#t01 tr:nth-child(even) {
    background-color: #a7b7a8;
}
table#t01 tr:nth-child(odd){
   background-color: #fff;
}
table#t01 th {
    background-color: #858778;
    color: white;
}

input[type=text], select, textarea {
    width: 10%;
    padding: 11px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 8px;
    resize: vertical;
}

input[type=submit] {
    background-color: #858778;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #a7b7a8;
}
</style>
</head>
<body>

  <?php 
    $conn = new mysqli("localhost", "root", "", "pharmacy");
    if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
    
    foreach($conn->query('SELECT * from location') as $row){    
             if($row['pharmacy_id'] == $id) 
             $pharmacy_name = $row['name'];
      }
?>

<h1 align="center" style="color:#131413"> <b> <?php echo $pharmacy_name; ?> </b> </h1>
<div class="topnav" id="myTopnav">

 <a href="admin.php?id=<?php echo $id ?>"><span><b> PHARMACY </b></span></a>
  <a href="medicine_list.php?id=<?php echo $id ?>"><span><b>MEDICINE LIST</b></span></a>
  <a href="order_list.php?id=<?php echo $id ?>"><span><b> ORDER LIST </b></span></a>
  <a href="delivery_list.php?id=<?php echo $id ?>"><span><b> DELIVERY LIST </b></span></a>
   <a href="user_logout.php"><span><b>LOG OUT</b></span></a> 
  
</div>

        <h1 style="text-align: center;"> Medicine List </h1>
<br>
         <h2 align="center" style="color:#131413"> <b> UPDATE MEDICINE QUANTITY </b> </h2>
 <div style="background-color:#c6d8f4;color:black;padding:20px; text-align:left; margin: 12px; width: auto;">
 <form action="admin_page_fetch_data.php" method="post" enctype="multipart/form-data">
   
      <h2> ID : </h2> 
      <input type="text" name="id" placeholder = "id..."> 
      <h2> QUANTITY ADD : </h2> 
      <input type="text" name="quantity_add" placeholder = "quantity add..."> <br><br>
      <input type="submit"  value=" Quantity Add ">
 </form>
 </div>

<?php

    function fetchNotice5(){
        $conn = new mysqli("localhost", "root", "", "pharmacy");
        if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
        $result= $conn->query("select * from medicine");
        $arr=array();
        while($row = $result->fetch_assoc()){
            $arr[] = $row;
        }
        return json_encode($arr);
    }
    $jsn = json_decode(fetchNotice5());

    $c = 1;
    $x='';

    if (isset($_POST['del_id'])) {
        if($_POST['input_ID'] != '' ){
            for($i=(sizeof($jsn)-1);$i>=0;$i--){
                if ($_POST['input_ID'] == $jsn[$i]->id) {
                    $c = 2;    
                    $x =  $jsn[$i]->path;
                }
            }
            if ($c == 2) {
                $conn->query("delete from  medicine where id = ".$_POST['input_ID']);
                unlink($x);
                echo "<script>alert('Medicine has been deleted.');</script>";
            }else{
                echo "<script>alert('Invalid number.');</script>";
            }
        }
        else{
            echo "<script>alert('Please input an id');</script>";
        }
    }
?>

     <div style="margin: 25px; width: 94.5%;">
        <form action="medicine_list.php?id=<?php echo $id ?>" method="post" style="text-align:right">
             <b>
		    DELETE MEDICINE </b><br>
            <b>INPUT ID : </b>
            <input type="text" name="input_ID" value="" size="11" maxlength="30" />
            <input type="submit" value="DELETE MEDICINE" name="del_id" />
        </form>
        <br>

        <table id="t01">
            <tr>
                <th> ID </th>
                <th> Name </th>
                <th> Quantity </th>
				        <th> Category </th>
            </tr>
            <?php 
	$jsn = json_decode(fetchNotice());
	for($i=(sizeof($jsn)-1);$i>=0;$i--){
		echo "<tr>";
       if($jsn[$i]->pharmacy_id == $id){
			echo "<td  style='text-align:center'>".$jsn[$i]->id."</td>";
			echo "<td  style='text-align:center'>".$jsn[$i]->name."</td>";
      echo "<td  style='text-align:center'>".$jsn[$i]->quantity."</td>";
			echo "<td  style='text-align:center'>".$jsn[$i]->category."</td>";
			echo "</tr>";
    }
	}
	?>
        </table>
		</div>
        <br>
        <br>
        <div align="center">
            <footer>Copyright © 2017 Online Medicine Order. All rights reserved.</footer>
        </div>
		
</body>

</html>




<?php				
}
else{
	header("Location:index.php");
}	
	function fetchNotice(){
		$conn = new mysqli("localhost", "root", "", "pharmacy");
		if($conn->connect_error)die("Database connection failed" . $conn->connect_error);
		$result= $conn->query("select * from medicine");
		$arr=array();
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
		return json_encode($arr);
	}
	
?>


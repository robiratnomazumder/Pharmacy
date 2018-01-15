<script src="jquery-1.10.2.min.js"></script>
<style type="text/css">
  .picture
{
  display: block;
   
    border: 2px solid #55baf4;
    border-radius: 12px;
    width: 190px;
   height: 190px;
   cursor: pointer;
   float: left;
   display: table;

  
}

p1{
        width: 215px;
        background-color: none;
        float: left;
        height: auto;
        font-size: 15px;
        font-weight: italic;
        padding: 12px;
      }

</style>
<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "pharmacy");

$medicine ='';
if (isset($_GET['user'])) {
    $medicine = $_GET['user']; 
    }
//fetch.php

$output = '';

if(isset($_GET["query"]))
{

 $search = mysqli_real_escape_string($connect, $_GET["query"]);
 // $query = " select * from medicine where pharmacy_id = '{$_GET["pharmacy"]}' and name like
 //          '%{$search}%';";

 $query = " select * from medicine where pharmacy_id ='".$medicine."' and name like
           '%{$search}%' and quantity>0;";
 
}
else
{
 $query = " select * from medicine where pharmacy_id = '{$medicine}' and quantity>0 order by name;";
}

$result = mysqli_query($connect, $query);

if(mysqli_num_rows($result) > 0)
{

 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>  <p1>
    <div style="color:#1d7491;font-size:19px;"> <td>'.$row["name"].'</td></div> <br>
    
    <td> 
     
    <a href="order.php?p='.$row["id"].'" onclick="post" value="var1" > 
    <img class="picture" src= "'.$row["path"].'" > </a>
    </td> <br>
     <td>
      <td> price: '.$row["price"].'/-</td>
    <td> available: '.$row["quantity"].'&nbsp; </td>
     <a id="order" onclick="return check()" 
     href="order.php?id='.$row["id"].'&action=add"> ADD TO CART</a> 
    <input type="hidden" id="ID" value="'.$row["id"].'" /> 
     </td>
   </p1> </tr>
  ';
 }
 echo $output;
}
else
{  echo '<h3>Data Not Found </h3><br> <br>'; } 
?>

<script type="text/javascript">
   function check(){

      $.ajax({
     
        url: 'order.php',
        type: "GET",
        //data:{id:$('#ID').val(), action:'add'},
        contentType: 'application/json; charset=utf-8',
        async: true,
        success: function (response){
        alert('Product Added To Cart');
        }
      });
     // return false;
   }
 </script>
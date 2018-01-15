<?php 
	session_start();
	$con = mysqli_connect("localhost", "root", "","pharmacy");
	require 'item.php';

	if (isset($_GET['pharmacy'])) {
		$medicine = $_GET['pharmacy']; 
	}

    $firstname = $_SESSION['info1'];
    $lastname = $_SESSION['info2'];
    $address = $_SESSION['info_address'] ;
    $gender = $_SESSION['info3'];
    $phone = $_SESSION['info4'];

    echo "<script>alert('".$firstname."');</script>";

    $cart = unserialize(serialize($_SESSION['cart']));
    

    for($i=0;$i<count($cart);$i++){

		$queryGetCurrentMedicineQuantity = "select quantity from medicine where pharmacy_id='$medicine' and id='".$cart[$i]->id."'";

		$result = mysqli_query($con, $queryGetCurrentMedicineQuantity);

		$result =  $result->fetch_assoc();

		$CurrentQuantity = $result['quantity'];

		if($CurrentQuantity > $cart[$i]->quantity)
		{
			$CurrentQuantity -= $cart[$i]->quantity;

			$UpdateQuantityQuery = "update medicine set quantity='$CurrentQuantity' where pharmacy_id='$medicine' and id='".$cart[$i]->id."'";
			mysqli_query($con, $UpdateQuantityQuery);
		}
		else
		{
		

         /*   echo '<script type="text/javascript">'; 
			echo 'alert("any medicine you ordered, is not available");';
			echo' window.location.href = "order.php?pharmacy=$pharmacy";';
			echo '</script>';*/

			
		}
	}

    
    
    $result = mysqli_query($con,$query);

    $query = "insert into orders values
    (null,'new order',current_timestamp,'$medicine','acc2','$firstname','$lastname','$phone','$address','not sent')";
	mysqli_query($con,$query);

	$ordersid = mysqli_insert_id($con);

	for($i=0;$i<count($cart);$i++){
		mysqli_query($con,'insert into ordersdetail(productid,ordersid,price,quantity) values('.$cart[$i]->id.','.$ordersid.','.$cart[$i]->price.','.$cart[$i]->quantity.')');
	}

	unset($_SESSION['cart']);
	header("Location:index.php");
?>

<!-- Thanks for buying product. Click <a href="index.php"> here </a> to continue buy product. -->
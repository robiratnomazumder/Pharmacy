<?php

	
	session_start();
	$con = mysqli_connect("localhost", "root", "","pharmacy");
	$msg = "";

	$medicine_id = $_GET['medicine_id'];
	$pharmacy_id = $_GET['pharmacy_id'];
	$quantity = $_GET['quantity'];

	$queryGetCurrentMedicineQuantity = "select quantity from medicine where pharmacy_id='$pharmacy_id' and id='$medicine_id'";

	$result = mysqli_query($con, $queryGetCurrentMedicineQuantity);

	$result =  $result->fetch_assoc();

	$CurrentQuantity = $result['quantity'];

	if( $CurrentQuantity > $quantity)
	{
		$msg = "";
	}
	else
	{
		$msg = "Quabtity Not Available";
	}

	echo $msg;

?>
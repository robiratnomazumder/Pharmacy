<?php
function getJSONFromDB($sql){
	$conn = mysqli_connect("localhost", "root", "","pharmacy");
	
	$result = mysqli_query($conn, $sql)or die(mysqli_error());
	$arr=array();
	while($row = mysqli_fetch_assoc($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
?>
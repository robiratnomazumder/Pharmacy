<?php
$conn = mysqli_connect("localhost", "root", "","pharmacy");

$a=$_POST['p'];

$uploadOk = 1;
$target_dir = "picture/";
$target_file = $target_dir .$_FILES['imageUpload']['name'];;
echo $target_file."<br>";
echo $_FILES["imageUpload"]["tmp_name"]."<br>";
//$uploadOk = 1;
// Check if image file is a actual image or fake image

    if (file_exists($target_file)) {
    echo "Sorry, file already exists."."<br>";
       $uploadOk = 0;
    }
	/* else if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
       && $imageFileType != "gif" ) {
       echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed."."<br>";
       $uploadOk = 0;
	   } */
	else{
    if(move_uploaded_file($_FILES["imageUpload"]["tmp_name"], $target_file)) {
		$sql="insert into medicine (path,name,category,price,quantity,pharmacy_id) values('".$target_file."','".$_REQUEST['name']."','".$_REQUEST['ct']."'
		,'".$_REQUEST['price']."','".$_REQUEST['quantity']."','".$a."')";
		$result = mysqli_query($conn, $sql)or die(mysqli_error());
		echo $sql."<br>";
        echo "The file ".  $_FILES["imageUpload"]["name"]. " has been uploaded<br>";
    }else {
        echo "Sorry, there was an error uploading your file<br>";
    }
	}
?>



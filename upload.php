<?php
// include the database configuration file
require_once 'dbconfig.php';


// if file upload form is submitted
$status = $statusMsg = '';
if(isset($_POST["submit"])){
	$status = 'error';
	if(!empty($_FILES["image"]["name"])) {
		//get file info
		$fileName = basename($_FILES["image"]["name"]);
		$fileType = pathinfo($fileName, PATHINFO_EXTENSION);

		//allow certain formats
		$allowTypes = array('jpg','png','jpeg','gif');
		if (in_array($fileType, $allowTypes)) {
			$image = $_FILES['image']['tmp_name'];
			$imgContent = addslashes(file_get_contents($image));

			// insert image content into database
			$insert = $db->query("INSERT into blog (image, uploaded) VALUES('$imgContent', NOW())");
			if ($insert){
				$status = 'success';
				$statusMsg = "file uploaded successfully.";
			}else{
				$statusMsg = "file upload failed, please try again";
			}
		}else{
			$statusMsg = "sorry, only JPG, JPEG, PNG & GIF files are allowed to upload";
		} 
	}else{
		$statusMsg = "please select an image file to upload";
	}
}

?>
<?php 
 // include the database configuration file
require_once 'dbconfig.php';

// get image data from database
$result = $db->query("SELECT image FROM blog ORDER BY uploaded DESC");


?>


<!DOCTYPE html>
<html>
<head>
	<title>view image</title>
</head>

<style type="text/css">
	.gallery{
		    display: flex;
    width: 100%;
    height: auto;
    box-sizing: border-box;
    justify-content: flex-start;
    flex-wrap: wrap;
    overflow: hidden;
    padding-left: 20px;
    padding-right: 20px;
	}
	.item{
		width: 248px;
		height: 248px;
		display: block;
		object-fit: cover;
		margin: 20px;
		border: 2px solid #000000;
	}
</style>
<body>


	<h2>retrive images from database php</h2>
   <?php if($result->num_rows > 0) { ?>
  <div class="gallery">
  	 <?php while($row = $result->fetch_assoc()){ ?>
  	 	<img class="item" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" />
  	 <?php } ?>
  </div>
   <?php }else{ ?>
 <p>image not found......</p>
   <?php } ?>

</body>
</html>
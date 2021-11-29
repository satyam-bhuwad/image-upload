
<?php
 // include the database configuration file
require_once 'dbconfig.php';

//include form submission script
include 'upload.php';

// get image data from database
$result = $db->query("SELECT image FROM blog ORDER BY uploaded DESC");
?>

<!DOCTYPE html>
<html>
  
<head>
    <title>Image Upload</title>
</head>
  
<body>
    <div>
        <?php if(!empty($statusMsg)){ ?>
           <p><?php echo $statusMsg; ?></p>
         <?php } ?>


        <form action="" method="post" enctype="multipart/form-data">
              <label>select image file : </label>
            <input type="file" name="image">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>
    
</body>
  
</html>
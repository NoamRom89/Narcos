


<?php
include "MainFunctions.php";

$allowedExts = array("html", "HTML", "Html");
$extension = end(explode(".", $_FILES["file"]["name"]));
if (($_FILES["file"]["size"] < 200000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    if (file_exists("DB/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "upload/" . $_FILES["file"]["name"]);
	  
	  updateDocInDB($db, $_FILES["file"]["name"]);
	  rename("upload/".$_FILES["file"]["name"], "DB/".$_FILES["file"]["name"]);
	  echo '<br/><a>The file has been uploaded</a>';
      }
    }
  }
else
  {
  echo "Invalid file";
  }
header( 'Location: http://localhost/TheBigBangTheory/AdminPanel.php?dir=DB' ) ;
?>




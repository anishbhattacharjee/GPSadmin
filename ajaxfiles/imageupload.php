<?php 
echo "hhhhhhhhhhiiiii";

var_dump($_FILES["file"]["name"]);
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
	var_dump($_FILES["file"]["error"]);
    }
  else
    {
     if (file_exists("./imgup/" . $_FILES["file"]["name"]))
      {
	  $d=time();
	
	   $ab=$d.$_FILES["file"]["name"];
	   $_FILES["file"]["name"] . " already exists. ";
	  move_uploaded_file($_FILES["file"]["tmp_name"],
      "./imgup/" . $ab);
       "Stored in: " . "./imgup/" . $ab;
	   $img=$ab;
      }
    else
      {
	  $img=$_FILES["file"]["name"];
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "./imgup/" . $_FILES["file"]["name"]);
       "Stored in: " . "./imgup/" . $_FILES["file"]["name"];
      }
    }

?>
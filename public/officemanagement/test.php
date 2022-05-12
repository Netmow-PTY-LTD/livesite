<?php

/* First Way */
$foldername = dirname(__DIR__).'/officemanagement/image/full/';
if(!(file_exists($foldername)))
{
  mkdir($foldername);
  chmod($foldername, 0777);
}

if (file_exists($foldername. $_FILES["file"]["name"]))
{
  echo $_FILES["file"]["name"] . " already exists. ";
}
else
{
    $didUpload = move_uploaded_file($_FILES["file"]["tmp_name"], $foldername. $_FILES["file"]["name"]);
    
    if ($didUpload)
    {
        echo "Success";
    }
    else
    {
        echo "Error";
    }
  
}

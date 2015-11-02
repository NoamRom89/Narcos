<?php

error_reporting(0);
include "MainFunctions.php";


$db = initDB();

$file = $_GET['remove_file'];
$filename = 'DB/'.$file;

if(is_writable($filename)) {
	removeDocFromDB($db, $file);
	deleteDocFromDB($db, $file);	
	unlink($filename);
} 

header( 'Location: http://localhost/TheBigBangTheory/AdminPanel.php?dir=DB' ) ;//go back to admin page
?>




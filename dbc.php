<?php
$host = "localhost";
$user = "root";
$pwd = "";
try{
	
$conn = new PDO( "mysql:host=$host;dbname=alma1", $user, $pwd);
$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

}
catch(Exception $e)
{
echo ("Internal Login Error, Please Contact Web Site Support");
$error = "Error message: ".$e->getMessage() ." Error at line: ".$e->getLine().
" in a file named : ".$e->getFile();
error_log($error);
return;
}
?>
<?php
if(isset($_GET['un'])){
$un =$_GET['un'];
$stmt = $conn-> query("DELETE FROM owner WHERE un='{$un}'");
$stmt -> execute();
header("Location:manage.php"); }
?>

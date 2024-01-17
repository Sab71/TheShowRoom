<?php
include 'dbc.php';
if(isset($_GET['id'])){
$cid =$_GET['id'];
$stmt = $conn-> query("DELETE FROM cars WHERE cid='{$cid}'");
$stmt -> execute();
header("Location:select.php"); }
?>

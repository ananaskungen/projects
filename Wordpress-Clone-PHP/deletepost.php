<?php 
require_once "../php/properties/methods.php";
require_once "../php/properties/connection.php";

$pdo = connectToDB();
$stmt = $pdo->prepare('DELETE FROM blogpost WHERE id = :id'); 
$stmt->bindParam(':id', $_GET['id']);
$id = $_GET['id']; 
$stmt->execute();



<?php 
ini_set("display_errors", 1);
error_reporting(E_ALL);

function connectToDB()
{
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=individuelladatabas', 'root', 'root');
    } catch (PDOException $error) {
        var_dump($error->getMessage());
    }
    return $pdo;
}

connectToDB();
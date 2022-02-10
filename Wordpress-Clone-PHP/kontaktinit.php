<?php
  if (isset($_POST['submitkontakt'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
  
    $servername = "localhost";
    $database = "individuelladatabas"; 
    $username = "root";
    $password = "root";
    $sql = "mysql:host=$servername;dbname=$database;";
    
    try { 
      $my_Db_Connection = new PDO($sql, $username, $password);
      echo "Connected successfully";
    } catch (PDOException $error) {
      echo 'Connection error: ' . $error->getMessage();
    }
    
    $db_kontakt = $my_Db_Connection->prepare("INSERT INTO kontakt (email, name, subject, message) VALUES (:email, :name, :subject, :message)");
    $db_kontakt->bindParam(':name', $firstName);
    $db_kontakt->bindParam(':email', $email);
    $db_kontakt->bindParam(':subject', $subject);
    $db_kontakt->bindParam(':message', $message);
    
    if ($db_kontakt->execute()) {
      echo "Successful";
    } else {
      echo "Error";
    }
    redirectTo("./admin/");
  }
 
  



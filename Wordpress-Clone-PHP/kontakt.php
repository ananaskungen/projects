<?php 
require_once "./properties/connection.php";
require_once "./properties/methods.php";
require_once "./properties/header.php";
require_once "./kontaktinit.php";
isUserLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css" />
  <title>Kontakt</title>
</head>
<body>
<form id="form-kontakt" action="../php/kontaktinit.php" method="POST">
    <label for="firstname">Firstname
      <input id="inputfield" type="text" name="firstName" />
    </label>
    <label for="lastname">Lastname
      <input id="inputfield" type="text" name="lastName" />
    </label>
    <label for="email">Email
      <input id="inputfield" type="text" name="email" />
    </label>
    <label for="subject">Subject
      <input id="inputfield" type="text" name="subject" />
    </label>
    <label for="message">Message
      <input id="message" type="text" name="message" />
    </label>
    <button id="submit-kontakt" type="submit" name="submitkontakt">Submit</button>
  </form>
 <!--  < ?php include_once "./properties/footer.php"; ?> -->
</body>

<style>
  /* HEADER */
  #header {
    display: flex;
    width: 100%;
    background-color: burlywood;
    height: 3rem;
  }

  #a-tagg {
    text-decoration: none;
    color: black;
  }

  #ul-main {
    display: flex;
    gap: 1.2rem;
    
  }

  #main-li {
    list-style: none;
  }

  #inputfield {
    height: 2rem;
  }
  /* ********************************** */
  /* Body */
  #form-kontakt {
    display: flex;
    width: 100%;
    height: 35rem;
    flex-direction: column;
    align-items: center;
    gap: 1.5rem;
    margin-top: 1rem;
  }

  #message {
    height: 6rem;
  }

  #submit-kontakt {
      color: black;
      height: 2.5rem;
      width: 4.5rem;
      background-color: blanchedalmond;
  }
</style>
</html>
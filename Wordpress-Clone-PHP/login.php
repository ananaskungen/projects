<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Login</title>
</head>
<body>
<div class="register-container">
 <h1 class="h1-register">Login</h1>
  <form class="form-register" action="./admin/login_user.php" method="POST">
    <div class="div-register">
         <label><span>Epost</span>
             <input class="input-user" id="email" type="email" name="email" required />
         </label>

    </div>
    <div class="div-register">
         <label><span>Lösenord</span>
             <input class="input-user" type="password" name="password" required />
         </label>
    </div>
     <button class="register-btn" type="submit" name="loginform">Logga in</button>
  </form>  
  <div class="div-tagg">
		You don't have a account? <a href="register.php"><p class="text-info">Register here</p></a>		
	</div>
</div>

<img src="https://user-images.githubusercontent.com/25480443/109664826-911df280-7b93-11eb-98c6-2fd125ef488c.gif" width="1800" height="800" class="giphy-embed" allowFullScreen></img>

</body>
</html>
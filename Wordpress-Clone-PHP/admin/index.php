<?php 
require_once "../properties/methods.php";
require_once "../admin/headeradmin.php";
isUserLoggedIn();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

?>


<!-- Admin page pointless? -->

<?php if($_SESSION['user']['user_type']): ?>
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styles.css">
      <title>Admin Page</title>
    </head>
    <body>
      <h1 class="latest-blogg">Latest Blogposts</h1>
      <div class="container">
        <div class="wrapper">
          <div>
            <?php listAllBlogpost(); ?>  
          </div>
          <form>
            <input type="hidden" value="<?php echo $_SESSION['user']['id']; ?>" name="user_id" />
          </form>
        </div>
      </div>
      <?php endif; ?>
      
    </body>
    </html>
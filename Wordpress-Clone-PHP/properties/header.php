<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stlyesheet" href="styles.css" >
  <title>Header</title>

</head>
<body>
  <header>
    <nav class="nav-bar">
      <ul class="ul-header">
      <li class="li-class">
        <a class="a-class"  href="../php/index.php">Home</a>
      </li>
      <li class="li-class">
        <a class="a-class" href="../php/kontakt.php">Kontakt</a>
      </li>
      <li class="li-class">
        <a class="a-class"  href="../php/gallery.php">Gallery</a>
      </li>
      <a class="a-class"  href="../php/admin/logout.php">Logout</a>

      <?php if($_SESSION['user']['user_type']): ?>
        <a class="a-class" href="../php/admin/blogpost.php">Create</a> 
      <?php endif; ?>
      </ul>
    </nav>    
  </header>
</body>
</html>
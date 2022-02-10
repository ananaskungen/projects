<?php require_once "./properties/methods.php";
  isUserLoggedIn();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="This ultimate guide cover all the important aspects of blogging. Find out how to improve yourself at programming!"
    />
    <title>Galleri</title>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
      href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <script src="script.js"></script>

    <script
      type="module"
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule=""
      src="https://unpkg.com/ionicons@5.4.0/dist/ionicons/ionicons.js"
    ></script>

    <script
      defer
      src="// https://unpkg.com/smoothscroll-polyfill@0.4.4/dist/smoothscroll.min.js
    "
    ></script>

    <script src="app.js" defer></script>
  </head>
  <body>
    <header class="header">
      <?php require_once "./properties/header.php"; ?>
    </header>

<div id="popup">
    <button id="btn">X</button>
    <img src="" id="image-popup" />
    <p id="pTaggInner"></p>
  </div>
  <div id="container">


  </div>
      <footer class="footer">
        <div class="container grid grid--footer">
          <div class="logo-col"><a href="#" class="footer-logo"> 
            <img class="logo" alt="Armins logo" src="logo.png" />
          </a>
    
          <ul class="social-links">
            <li><a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-instagram"></ion-icon></a></li>
            <li><a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-facebook"></ion-icon></a></li>
            <li><a class="footer-link" href="#"><ion-icon class="social-icon" name="logo-twitter"></ion-icon></a></li>
          </ul>
    
          <p class="copyright">Copyright &copy; 2027 by Armin, Inc. All rights reserved. </p>
          
          </div>
          <div class="address-col">
            <p class="footer-heading">Contact us</p>
            <address class="contacts" >
              <p class="address">
                Address: 48 Tribecca St., 2nd Floor, New York, NY 13337
              </p>
              <p>
                <a class="footer-link" href="tel:415-137-1337">415-137-1337</a><br/>
                <a class="footer-link" href="mailto:"test@armin.com">test@armin.com</a>
              </p>
              
            </address>
          </div>
          <nav class="nav-col">
            <p class="footer-heading">Account</p>
            <ul class="footer-nav">
              <li><a class="footer-link" href="#">Create account</a></li>
              <li><a class="footer-link" href="#">Sign in</a></li>
              <li><a class="footer-link" href="#">iOS app</a></li>
              <li><a class="footer-link" href="#">Android app</a></li>
            </ul>   
          </nav>
    
          <nav class="nav-col">
            <p class="footer-heading">Company</p>
            <ul class="footer-nav">
              <li><a class="footer-link" href="#">About Armin Inc</a></li>
              <li><a class="footer-link" href="#">For Business</a></li>
              <li><a class="footer-link" href="#">Careers</a></li>
            </ul>   
          </nav>
    
          <nav class="nav-col">
            <p class="footer-heading">Resources</p>
            <ul class="footer-nav">
              <li><a class="footer-link" href="#">Help center</a></li>
              <li><a class="footer-link" href="#">Privacy & terms</a></li>
            </ul>   
          </nav>
        </div>

<!-- DETTA ÄR DET NYA SCRIPTET MED forEach Loopen -->
<script> 
let imageWrap = document.querySelector("#container");

fetch("images.json")
  .then((response) => response.json())
  .then((data) => {
    data.forEach((image) => {
      let test = document.createElement("img");
      let pTagg = document.createElement("p");
      let pTaggAlt = document.createElement("p");

      test.src = image.url;
      test.alt = image.alt;
      test.description = image.description;
      test.dataset.description = image.description;
      pTagg.innerHTML = image.title;
      pTaggAlt.innerHTML = image.alt;
      test.classList = "targetImage";

      imageWrap.appendChild(test);
      imageWrap.appendChild(pTagg);
      imageWrap.appendChild(pTaggAlt);
    });
  });
document.addEventListener("click", function (e) {
  if (e.target.classList.contains("targetImage")) {
    let source = e.target.getAttribute("src");
    let popup = document.querySelector("#popup");
    popup.style.display = "block";
    console.log(source);
    document.querySelector("#image-popup").src = source;
    let select = document.getElementById("pTaggInner");
    let hämtaData = e.target.dataset.description;
    select.innerText = hämtaData;
  }
});

btn.onclick = function () {
  popup.style.display = "none";
};

</script>
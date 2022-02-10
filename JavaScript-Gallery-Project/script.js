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
      pTagg.innerHTML = image.description;
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

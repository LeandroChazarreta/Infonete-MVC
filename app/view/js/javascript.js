function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topheader") {
    x.className += " responsive";
  } else {
    x.className = "topheader";
  }
}

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
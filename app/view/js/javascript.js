function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topheader") {
    x.className += " responsive";
  } else {
    x.className = "topheader";
  }
}
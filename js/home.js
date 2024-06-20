
var btnSubir = document.getElementById("btnSubir");


window.onscroll = function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    btnSubir.style.display = "block";
  } else {
    btnSubir.style.display = "none";
  }
};


btnSubir.onclick = function() {
  document.body.scrollTop = 0; 
  document.documentElement.scrollTop = 0; 
};

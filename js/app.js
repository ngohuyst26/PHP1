// NAV chuyển đổi
window.addEventListener("scroll", function () {
  var header = document.querySelector("nav");
  header.classList.toggle("sticky", window.scrollY > 30);
});
// Hiện menu left
bars = document.querySelector(".icon-menu");
bars.onclick = function () {
  menubar = document.querySelector(".menu-bars");
  const className = menubar.className;
  menubar.classList.toggle("menu-active");
};
//Close menu left
close = document.querySelector(".close");
close.onclick = function () {
  menuclose = document.querySelector(".menu-bars");
  menuclose.className = menubar.className.replace("menu-active", "")
};
// Ẩn hiện menu con trong menu left
menucon1 = document.querySelector(".menu-con-1");
menucon1.onclick = function () {
  menuconul = document.querySelector(".ul-before");
  menuconul.classList.toggle("ul-active");
  iactive = document.querySelector(".menu-con-1");
  iactive.classList.toggle("x-active");
};

// Hiệu ứng animation khi scroll
var Ptanimate = document.querySelectorAll('.ckeck-height');
function addClassStart(pt){
    var rect = pt.getClientRects()[0];
    var heightScreen = window.innerHeight;
    if(!(rect.bottom < 0 || rect.top > heightScreen)){
        pt.classList.add('start')
    }
}
function checkanimate(){
    Ptanimate.forEach(element => {
        addClassStart(element)
    });
}
checkanimate();
window.onscroll = checkanimate;

//Geolocattion
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else { 
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}
function showPosition(position) {
    console.log(position.coords.latitude);
    console.log(position.coords.longitude);
}
// Drag Drop
function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  ev.target.appendChild(document.getElementById(data));
}



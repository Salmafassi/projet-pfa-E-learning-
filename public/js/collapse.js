let togg1 = document.getElementById("togg1");

let d1 = document.getElementById("d1");
let d2 = document.getElementById("d2");


function togg(){
  if(getComputedStyle(d1).display != "none"){
    d1.style.display = "none";
    d2.style.display = "block";
  } else {
    d1.style.display = "block";
    d2.style.display = "none";
  }
  alert("hi");
};
 function togg2(){
    alert("hi");
 }
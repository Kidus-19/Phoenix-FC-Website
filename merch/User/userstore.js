/* let filter = document.querySelector("button.filter");
let fmenu = document.querySelector(".fmenu"); */
let purchasebtn = document.querySelectorAll("button.purchase")
let purchase = document.querySelector("div.purchase")
let search = document.getElementsByClassName("searchimg")
let match = document.getElementsByClassName("d1")
let merch = document.querySelectorAll(".merches")
let searchtxt = document.getElementsByClassName("search")
purchasebtn.forEach(element => {
    element.addEventListener("click",()=>{
        purchase.style.display="flex";

    });
});
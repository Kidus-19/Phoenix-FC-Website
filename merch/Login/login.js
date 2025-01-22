let admin_btn = document.querySelector("button.admin")
let user_btn = document.querySelector("button.user")
admin_btn.addEventListener("click",()=>{
    admin_btn.style.backgroundColor = "#bfbfbf49";
    user_btn.style.backgroundColor = "white";
});
user_btn.addEventListener("click",()=>{
    user_btn.style.backgroundColor = "#bfbfbf49";
    admin_btn.style.backgroundColor = "white";
});

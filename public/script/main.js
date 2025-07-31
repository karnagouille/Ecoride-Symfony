
const btn = document.getElementById("friend");
const liste = document.getElementById("friends");


btn.addEventListener("click",event=>{
    event.preventDefault();
    liste.classList.toggle("cacher")
})
const themeBtn = document.getElementById("theme");
const rootElement = document.documentElement;

themeBtn.addEventListener("click",function(){
    const icon=themeBtn.firstElementChild;
    if(icon.className=="fa-regular fa-sun"){
        icon.className="fa-regular fa-moon";
        rootElement.classList.add('active');
        window.localStorage.setItem("theme","moon");
    }else{
        icon.className="fa-regular fa-sun";
        rootElement.classList.remove('active');
        window.localStorage.setItem("theme","sun");
    }
});
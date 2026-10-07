const rootElement = document.documentElement;
document.addEventListener("DOMContentLoaded",()=>{
    let theme = localStorage.getItem("theme");
    if(theme){
        if(theme == "sun"){
            rootElement.classList.remove('active');
        }else{
            rootElement.classList.add('active');
        }
    }
});
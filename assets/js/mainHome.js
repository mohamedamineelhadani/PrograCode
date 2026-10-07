const cards =document.getElementById("cards");
const searchFather =document.getElementById("searchFather");
const titles =cards.querySelectorAll('h1');
const searchBtn =document.getElementById("searchBtn");
function searchStop(elemnts){
    elemnts.forEach(elemnt => {
        let parent =elemnt.parentElement;
        elemnt.innerHTML =elemnt.textContent;
        parent.style.display="";
    });
};
searchBtn.addEventListener("click",function(){
    let value =searchFather.querySelector('input').value;
    if(value==""){
        showMessage("please enter something !","red");
        searchStop(titles);
    }else{
        titles.forEach(title => {
            let parent =title.parentElement;
            let letter =new RegExp(`${value}`,"gi");
            if(title.textContent.toLowerCase().includes(value.toLowerCase().trim())){
                showMessage(title.textContent,"green");
                title.innerHTML =title.textContent.replace(letter, match => `<mark>${match}</mark>`);
                parent.style.display="";
            }else{
                title.innerHTML =title.textContent;
                parent.style.display="none";
            };
        });
    }
});
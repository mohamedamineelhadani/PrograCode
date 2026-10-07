function show(event,btn){
    event.preventDefault();
    let parent =btn.parentElement;
    let input = parent.querySelector('input');
    if(input.type=="password"){
        input.type="text";
        btn.firstElementChild.className="fa-regular fa-eye-slash";
    }else{
        input.type="password";
        btn.firstElementChild.className="fa-regular fa-eye";
    }
}



let inputPass =document.querySelectorAll('input[type="password"]');
let inputText =document.querySelectorAll('input[type="text"]');

//==========auto fill=========================
document.addEventListener("DOMContentLoaded",function(){
    inputPass.forEach(input =>{
        if(input.value!=""){
            focusE(input)
        }
    })
    inputText.forEach(input =>{
        if(input.value!=""){
            focusE(input)
        }
    })
})
//==========fin auto fill=====================

//============focus================

function focusE(input){
    let parent=input.parentElement;
    let label =parent.querySelector('label');
    label.classList.add("active");
}

function blurE(input){
    let parent=input.parentElement;
    let label =parent.querySelector('label');
    label.classList.remove("active");
}

inputPass.forEach( inputP=> {
   inputP.addEventListener("focus",function(){
    focusE(inputP);
   }) 
});
inputText.forEach( inputT=> {
   inputT.addEventListener("focus",function(){
    focusE(inputT);
   }) 
});

inputPass.forEach( inputP=> {
   inputP.addEventListener("blur",function(){
    if(inputP.value==""){
        blurE(inputP);
    }
   }) 
});
inputText.forEach( inputT=> {
   inputT.addEventListener("blur",function(){
    if(inputT.value==""){
        blurE(inputT);
    }
   }) 
});
//==========fin=focus===============


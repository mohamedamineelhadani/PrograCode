let point = 0;
const start_btn = document.getElementById('start-btn');
start_btn.addEventListener("click",function() {
    this.parentElement.style.display="none";
    const quiz1 =document.querySelectorAll("#quiz")[0];
    quiz1.style.display="block";
    start(quiz1)
    
});

function start(quiz){
    Timer(quiz);
    answer(quiz);
}



function result(p){
    const res =document.getElementById("res");
    const feedback =document.getElementById("feedback");
    res.textContent =p;
    if(p >= 0 && p < 2){
        feedback.textContent="Don't be discouraged. Everyone starts somewhere !";
    }else if(p >=2 && p <= 4 ){
        feedback.textContent="Needs improvement. You're getting some of the ideas";
    }else if(p == 5){
        feedback.textContent="Excellent work! You're mastering the topic.";
    }
}

let timerInterval;
function Timer(quiz){
    const timer =quiz.querySelector('#timer');
    if(timer){
        let n = 15;
        timer.textContent=`Time: ${n}s`;
        timerInterval= setInterval(() => {
            if(n > 0){
                n--;
                timer.textContent=`Time: ${n}s`;   
            }else{
                clearInterval(timerInterval);
                timer.textContent="Time out";
                Disable(quiz)
            }       
        }, 1000)
    }else{
        console.log("finish");
    }
};
function Disable(quiz){
    result(point);
    const answer_btn= quiz.querySelectorAll('.answer-btn');
    answer_btn.forEach(btn => {
        btn.disabled =true;
        btn.style.backgroundColor=(btn.getAttribute("data-correct")==1)?"green":"red";
    });
    const next_btn=quiz.querySelector(".next-btn");
    if(next_btn){
        next_btn.style.display="block";
        next_btn.addEventListener("click",function(){
            const result_div =document.getElementById("result-div");
            const parent =next_btn.parentElement;
            const next_quiz=parent.nextElementSibling;
            if(next_quiz && next_quiz.id == "quiz"){
                quiz.style.display="none";
                next_quiz.style.display="block";
                start(next_quiz);
            }else{
                quiz.style.display="none";
                result_div.style.display="block";
            }
        })
    }
};

function answer(quiz){
    const answer_btn =quiz.querySelectorAll(".answer-btn");
    if(answer_btn){
        answer_btn.forEach(btn=>{
            btn.addEventListener("click",()=>{
                clearInterval(timerInterval);
                Disable(quiz);
                if(btn.getAttribute("data-correct")==1){
                    point++;
                    result(point);
                }else{
                    result(point);
                }
            })
        })
    }
};
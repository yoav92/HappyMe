function populate(){
    if(quiz.isEnded()){
        showScores();
    }
    else{
        //show question
        var element=document.getElementById("question");
        element.innerHTML=quiz.getQuestionIndex().text; //rajouter au niveau du html(innerHTML)

        //show choices
        var choices=quiz.getQuestionIndex().choices;
        for(var i=0;i<choices.length;i++){
            var element=document.getElementById("choice"+ i); 
            element.innerHTML=choices[i];
            guess("btn" + i,choices[i]);
        }
        showProgress();
    }
};

function guess(id,guess){
    var button=document.getElementById(id);
    button.onclick=function(){
        load(guess);
        quiz.guess(guess);
        populate();
    }
}

function showProgress(){ //notation d'avancement des question(Question 1 of 5)
    var currentQuestionNumber=quiz.questionIndex + 1;
    var element=document.getElementById("progress");
    element.innerHTML="Question " + currentQuestionNumber + " sur " +quiz.questions.length;
}

function showScores(){
    var gameOverHtml="<h1>Merci d'avoir repondu a nos questions</h1>"
    /*gameOverHtml +="<h2 id='score'>Your scores:" + quiz.score +"</h2>";
     gameOverHtml+="<button class='modal-btn finish'>Creer ma page anniversaire <i class='fas fa-play-circle'></i></button>"; 
     gameOverHtml+="<div class='modal-bg'><div class='modal'><h2>Avez vous un compte sur Happy Me?</h2><a class='mod' href='./connect.php'>connexion</a><a class='mod' href='./form1.php'>inscription</a><span class='modal-close'>X</span></div>";*/
     
     var element=document.getElementById("quiz");
     var element2=document.getElementById("submit");
     element2.style.display="block";

    element.innerHTML=gameOverHtml;

   /* var modalBtn=document.querySelector('.modal-btn');
    var modalBg=document.querySelector('.modal-bg');
    var modalClose =document.querySelector('.modal-close');

    modalBtn.addEventListener('click',function(){
    modalBg.classList.add('bg-active');
});

    modalClose.addEventListener('click',function(){
        modalBg.classList.remove('bg-active');
    });*/

}

function load(guess){
    if(guess.startsWith("<img src='image/t") || guess.startsWith("<img src='image/p") || guess.startsWith("<img src='image/i") || guess.startsWith("<img src='image/d")){
        if(guess.startsWith("<img src='image/t")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=78;i<=112;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/p")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=82;i<=109;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/i")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=82;i<=113;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/d")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=76;i<=111;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }
        
        document.getElementById("genre").value = arr.toString().replace(/,/g,'');
    }else if(guess.startsWith("<img src='image/mon") || guess.startsWith("<img src='image/mou") || guess.startsWith("<img src='image/r") || guess.startsWith("<img src='image/s")){
        if(guess.startsWith("<img src='image/mon")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=78;i<=112;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/mou")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=82;i<=109;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/r")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=82;i<=113;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }else if(guess.startsWith("<img src='image/s")){
            var arr=[];
            var x=0;
            const tabGuess = Array.from(guess);
            for(i=76;i<=111;i++)
            {
                arr[x]=tabGuess[i];
                x++;
            }
        }
        
        document.getElementById("desire").value = arr.toString().replace(/,/g,'');
    }
}

var questions=[ //un tableau de 5 cases avec 5 objets Questions
    new Question("Moi en soiree ,je suis plutot...",[
    "<img src='image/timide.jpg' height='150px' width='240px' class='but'/><br/><p>Pas tres a l'aise avec mon prochain</p>",
    "<img src='image/pas_timide.jpg' height='150px' width='240px' class='but'/><br/><p>J'aime beaucoup mon prochain</p>",
    "<img src='image/introverti.jpg' height='150px' width='240px' class='but'/><br/><p>Quesque la vie ?Pourquoi la mort ?</p>",
    "<img src='image/dodo.png' height='150px' width='240px' class='but'/><br/><p>J'annule pour mon cher et tendre lit</p>"],"oui"),
    new Question("Ce qui me donne envie",[
    "<img src='image/mont.jpg' height='150px' width='240px' class='but'/><br/><p>Le calme</p>",
    "<img src='image/mouvement.png' height='150px' width='240px' class='but'/><br/><p>Le mouvement</p>",
    "<img src='image/roman.jpg' height='150px' width='240px' class='but'/><br/><p>Le romantisme</p>",
    "<img src='image/sensas.jpg' height='150px' width='240px' class='but'/><br/><p>Le sensationnel</p>"],"non"),
    new Question("tu aimes l'oeuf ?",["oui","non","fefefe","nul"],"nul"),
    new Question("tu aimes le bowling ?",["oui","fwfefew","peut etre","nul"],"oui"),
    new Question("tu aimes le chocolat ?",["oui","non","peut etre","nul"],"nul")
];

var quiz=new Quiz(questions);//dans questions,il y a plusieurs objets Question

populate();
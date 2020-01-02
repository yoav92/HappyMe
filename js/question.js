function Question(text,choices,answer){ //constructeur,choice est un tableau
    this.text=text;
    this.choices=choices;
    this.answer=answer;
}

Question.prototype.correctAnswer = function(choice){ //permet de rajouter methode correctAnswer a notre objet Question
    return choice === this.answer;
}
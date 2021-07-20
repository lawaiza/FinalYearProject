const startButton = document.getElementById('startBtn')
const nextButton = document.getElementById('nextBtn')

const questionsContainerElement =document.getElementById('questions-container')
let mixedQuestions, currentQuestionIndex
const questionsElement= document.getElementById('question')
const answerButtonElements= document.getElementById('answerBtn')
const resultForm = document.getElementById('form-result')
//let scores = document.getElementById('score');

let scoreCount=0;
let countRightAnswers = 0; //1. let's count the right answers
let currentQuestion = 1;
startButton.addEventListener('click', startQuiz)
nextButton.addEventListener('click', () =>{
  document.getElementById('answerBtn').classList.remove('no-click')
  currentQuestionIndex++
  setNextMathQuestion()
  currentQuestion++
  document.getElementById('current-question').innerHTML = currentQuestion
})

function startQuiz(){
  startTimer(tenMinutes, display);
   document.getElementById('answerBtn').classList.remove('no-click');
  startButton.classList.add('hide')
  resultForm.classList.add('hide')
  mixedQuestions = mathsQuestions.sort(()=>Math.random()-.5)
  currentQuestionIndex=0
  questionsContainerElement.classList.remove('hide')
   setNextMathQuestion()
   currentQuestion = 1;
  document.getElementById('current-question').innerHTML = currentQuestion
  document.getElementById('all-questions2').innerHTML = mathsQuestions.length
 document.getElementById('all-questions').innerHTML = mathsQuestions.length

  //3.  reset the counter after the test started
  scoreCount= 0;
  document.getElementById('score').innerHTML = 0;
  countRightAnswers = 0;
  document.getElementById('right-answers').innerHTML = 0;

}
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);

        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        display.textContent = minutes + ":" + seconds;

        if (--timer < 0) {
            timer = duration;
        }
    }, 1000);
}


var tenMinutes = 60 * 10,
display = document.getElementById('time');



function setNextMathQuestion(){
  resetState()
  showMathsQuestion(mixedQuestions[currentQuestionIndex])
}

function showMathsQuestion(mathQuestion){
  questionsElement.innerText = mathQuestion.question
  mathQuestion.answers.forEach(answer => {
    const button = document.createElement('button')
    button.innerText=answer.text
    button.classList.add('btns')
    if(answer.correct){
      button.dataset.correct=answer.correct
    }
    button.addEventListener('click', selectAnswer)
    answerButtonElements.appendChild(button)
  })

}

function resetState(){
  clearStatus(document.body)
  nextButton.classList.add('hide')
  while(answerButtonElements.firstChild){
      answerButtonElements.removeChild(answerButtonElements.firstChild)
  }
}


function selectAnswer(e){
  const chosenButton= e.target
  const correct =chosenButton.dataset.correct
  setStatus(document.body, correct)
  Array.from(answerButtonElements.children).forEach(button =>{
      setStatus(button, button.dataset.correct)
  })
  if(mixedQuestions.length > currentQuestionIndex + 1){
    nextButton.classList.remove('hide')
  }else{
    resultForm.classList.remove('hide');
    questionsContainerElement.classList.add('hide');

    startButton.innerText = 'Restart'
    startButton.classList.remove('hide')
  }
  if (correct) {
    countRightAnswers++; //+1
    scoreCount= countRightAnswers*100;

  }

  //5. to show the score inside <span>
  document.getElementById('score').innerHTML = scoreCount;
  document.getElementById('right-answers').innerHTML = countRightAnswers;
  document.getElementById('answers-percent').innerHTML = ((100 * countRightAnswers)/mathsQuestions.length).toFixed(0);
  //prevent multiclicking
  document.getElementById('answerBtn').classList.add('no-click');


}



function setStatus(element, correct){
  clearStatus(element)
  if(correct){
    element.classList.add('correct')
  }else{
    element.classList.add('incorrect')
  }
}

function clearStatus(element){
  element.classList.remove('correct')
  element.classList.remove('incorrect')
}
const mathsQuestions=[
{
  question: 'Which number has the digit 5 in the tens column?',
  answers:[
    { text: '257', correct: true},
    { text: '725', correct: false},
    { text: '572', correct: false},
    { text: '505', correct: false}


  ]
},
{
  question: 'What is 100 less than 656?',
  answers:[
    { text: '666', correct: false},
    { text: '646', correct: false},
    { text: '556', correct: true},
    { text: '756', correct: false}


  ]
},
{
  question: 'What is 10 more than 397?',
  answers:[
    { text: '387', correct: false},
    { text: '407', correct: true},
    { text: '497', correct: false},
    { text: '297', correct: false}


  ]
}



]

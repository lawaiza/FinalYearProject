//retrieves start,next and submit button from the corresponding html file
const startButton = document.getElementById('startBtn')
const nextButton = document.getElementById('nextBtn')
const submittedButton = document.getElementById('submittedBtn')
//retrieves elements from question container
const questionsContainerElement =document.getElementById('questions-container')
//undefined variables to mix up question order and keep track of what question number it is on
let mixedQuestions, currentQuestionIndex
//retrieves question text position,answer buttons and result container form from the corresponding html file
const questionsElement= document.getElementById('question')
const answerButtonElements= document.getElementById('answerBtn')
const resultForm = document.getElementById('resultForm')
//variables to set initial score, current question and right answers
let scoreCount = 0;
let countRightAnswers = 0;
let currentQuestion = 1;

//when the start button is clicked, the function startQuiz executes
startButton.addEventListener('click', startQuiz)
//when next button is clicked, then current index is increased by 1
//and the next maths question is set
nextButton.addEventListener('click', () =>{
  //user is able to click on an answer button
  document.getElementById('answerBtn').classList.remove('no-click')
  currentQuestionIndex++
  setNextMathQuestion()
  currentQuestion++
  document.getElementById('current-question').innerHTML = currentQuestion
})

//when submit button is clicked, results are shown and questions hidden
//& submit button, change start button to Restart button and display it
submittedButton.addEventListener('click', () =>{
  resultForm.classList.remove('hide');
  questionsContainerElement.classList.add('hide');
  startButton.innerText = 'Restart'
  startButton.classList.remove('hide')
  submittedButton.classList.add('hide')
})

//function to start the maths quiz
function startQuiz(){
  //10 min timer function executes
  startTimer(tenMinutes, display);
  //user is able to click on an answer button
  document.getElementById('answerBtn').classList.remove('no-click');
  //start/submit button and results form is hidden from user interface
  startButton.classList.add('hide')
  submittedButton.classList.add('hide')
  resultForm.classList.add('hide')
  //randomizes the order of the maths questions each time the quiz starts
  mixedQuestions = mathsQuestions.sort(()=>Math.random()-.5)
  //set to 0 as it represents the first question
  currentQuestionIndex=0
  //question container is displayed
  questionsContainerElement.classList.remove('hide')
  //sets the first question and current question is set to 1
   setNextMathQuestion()
   currentQuestion = 1;
   //retrieve all elements and store current question and number of total questions
  document.getElementById('current-question').innerHTML = currentQuestion
  document.getElementById('allQuestions2').innerHTML = mathsQuestions.length
  document.getElementById('allQuestions').innerHTML = mathsQuestions.length
  //reset the score and the right answers counter after the test started
  scoreCount= 0;
  document.getElementById('score').innerHTML = 0;
  countRightAnswers = 0;
  document.getElementById('rightAnswers').innerHTML = 0;
}

//variables for timer function
var resetTimer;
var quizSubmitted;
//timer function with two parameters
function startTimer(duration, display) {
    var timer = duration, minutes, seconds;
    //clear old timer to prevent overlapping using clearInterval function
    if (resetTimer){
      clearInterval(resetTimer)
    }
    //resetTimer variable defined to set timer in clock format
    //and update it every second
    resetTimer = setInterval(function () {
        minutes = parseInt(timer / 60, 10);
        seconds = parseInt(timer % 60, 10);
        //layout of timer
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;
        //display timer
        display.textContent = minutes + ":" + seconds;
        //if timer reaches 0 once submitted then reset it
        if (--timer < 0) {
          clearInterval(resetTimer);
          //if timer is 0 and quiz hasn't been submitted,
          //then automatically ends the quiz
          if(!quizSubmitted){
            document.getElementById('submittedBtn').click();
          }
        }
    }, 1000);
}

//set timer for 10 minutes and display
var tenMinutes = 60 * 10,
display = document.getElementById('time');

function setNextMathQuestion(){
  //resets all forms and question elements to default state
  resetState()
  //displays a question from the mixed up questions
  showMathsQuestion(mixedQuestions[currentQuestionIndex])
}

//displays a maths question from the array
function showMathsQuestion(mathQuestion){
  //displays question
  questionsElement.innerText = mathQuestion.question
  //foreach loop to get answers displayed for the question
  //button is created for each answer and answer text is added
  mathQuestion.answers.forEach(answer => {
    const button = document.createElement('button')
    button.innerText=answer.text
    button.classList.add('btns')
    //if answer is correct, then a correct data attribute is added
    //to identify it is correct
    if(answer.correct){
      button.dataset.correct=answer.correct
    }
    //if answer button is clicked, selectAnswer function executes
    button.addEventListener('click', selectAnswer)
    //adds answer buttons to screen
    answerButtonElements.appendChild(button)
  })
}

//resets all question and answer elements for the next question
function resetState(){
  clearStatus(document.body)
  //hide next button
  nextButton.classList.add('hide')
  //while loop to remove any child button from the answer button elements
  while(answerButtonElements.firstChild){
      answerButtonElements.removeChild(answerButtonElements.firstChild)
  }
}

//checks the selected answer to see if it's right or wrong
function selectAnswer(e){
  //the answer button that the user clicked on
  const chosenButton= e.target
  //check if selected answer was correct
  const correct =chosenButton.dataset.correct
  setStatus(document.body, correct)
  //converted array that checks if each button was correct or incorrect
  Array.from(answerButtonElements.children).forEach(button =>{
      setStatus(button, button.dataset.correct)
  })

  //checks for any more questions
  //if not on last question, then show next button
  if(mixedQuestions.length > currentQuestionIndex + 1){
    nextButton.classList.remove('hide')
  //else if on last question, then show submit button
  }else if(mixedQuestions.length > currentQuestionIndex -1 ){
    submittedButton.classList.remove('hide')
    //if on the last question while submit button has been clicked,
    //show results and hide questions & submit button, change start
    //button to Restart button and display it
  }if(mixedQuestions.length < currentQuestionIndex + 1){
    resultForm.classList.remove('hide');
    questionsContainerElement.classList.add('hide');
    startButton.innerText = 'Restart'
    startButton.classList.remove('hide')
      submittedButton.classList.add('hide')
  }
  //if selected answer is correct, right answers counter incremented by 1
  //and score increased by 100 x right answers counter
  if (correct) {
    countRightAnswers++; //+1
    scoreCount= countRightAnswers*100;
  }
  //retrieve elements to store the score, right answers and percentage on screen
  document.getElementById('score').innerHTML = scoreCount;
  document.getElementById('rightAnswers').innerHTML = countRightAnswers;
  document.getElementById('answersPercentage').innerHTML = ((100 * countRightAnswers)/mathsQuestions.length).toFixed(0);
  //prevent multiclicking by not allowing answer button to be clicked
  document.getElementById('answerBtn').classList.add('no-click');
}

//sets status of element to see if they are correct or incorrect
function setStatus(element, correct){
  //clears any previous status
  clearStatus(element)
  //if element is correct, add it to the correct class
  if(correct){
    element.classList.add('correct')
  }else{
    //if element is incorrect, add it to the incorrect class
    element.classList.add('incorrect')
  }
}

//removes element from appropriate class
function clearStatus(element){
  element.classList.remove('correct')
  element.classList.remove('incorrect')
}

//array of maths questions and their answers
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
},
{
  question: 'What is the next missing number of this sequence: 203, 303,..?',
  answers:[
    { text: '313', correct: false},
    { text: '413', correct: false},
    { text: '403', correct: true},
    { text: '103', correct: false}
  ]
},
{
  question: 'Which number has the digit 2 in the units column?',
  answers:[
    { text: '624', correct: false},
    { text: '642', correct: true},
    { text: '246', correct: false},
    { text: '426', correct: false}
  ]
},
{
  question: 'Which number has the digit 7 in the hundreds column?',
  answers:[
    { text: '397', correct: false},
    { text: '379', correct: false},
    { text: '937', correct: false},
    { text: '739', correct: true}
  ]
},{
  question: 'Match the number to the written form: eight hundred and twelve',
  answers:[
    { text: '812', correct: true},
    { text: '821', correct: false},
    { text: '128', correct: false},
    { text: '182', correct: false}
  ]
},{
  question: 'What is 10 less than 309?',
  answers:[
    { text: '409', correct: false},
    { text: '319', correct: false},
    { text: '209', correct: false},
    { text: '299', correct: true}
  ]
},{
  question: 'How many tens are there in 600?',
  answers:[
    { text: '6 tens', correct: false},
    { text: '60 tens', correct: true},
    { text: '16 tens', correct: false},
    { text: '600 tens', correct: false}
  ]
},{
  question: 'What is 1 more than 545?',
  answers:[
    { text: '555', correct: false},
    { text: '544', correct: false},
    { text: '645', correct: false},
    { text: '546', correct: true}
  ]
}
]

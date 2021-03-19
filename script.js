const startButton = document.getElementById('startBtn')
const nextButton = document.getElementById('nextBtn')

const questionsContainerElement =document.getElementById('questions-container')
let mixedQuestions, currentQuestionIndex
const questionsElement= document.getElementById('question')
const answerButtonElements= document.getElementById('answerBtn')

startButton.addEventListener('click', startQuiz)
nextButton.addEventListener('click', () =>{
  currentQuestionIndex++
  setNextMathQuestion()
})

function startQuiz(){
  startButton.classList.add('hide')
  mixedQuestions = mathsQuestions.sort(()=>Math.random()-.5)
  currentQuestionIndex=0
  questionsContainerElement.classList.remove('hide')
   setNextMathQuestion()
}

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
    startButton.innerText = 'Restart'
    startButton.classList.remove('hide')
  }

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

// const quizData = [
//     {
//         question: "Which player has won the most IPL trophies?",
//         a: "M S Dhoni",
//         b: "Rohit Sharma",
//         c: "K L Rahul",
//         d: "Jasprit Bumrah",
//         correct: "b",
//     },
//     {
//         question: "Which player has hit the most fours in IPL?",
//         a: "Suresh Raina",
//         b: "Shikhar Dhawan",
//         c: "Virat Kohli",
//         d: "Rohit Sharma",
//         correct: "b",
//     },
//     {
//         question: "Where was the final of the inaugural IPL season held?",
//         a: "D Y Patil Stadium",
//         b: "Eden Gardens",
//         c: "Wankhede Stadium",
//         d: "Brabourne CCI",
//         correct: "a",
//     },
//     {
//         question: "Which player bagged the 'Emerging Player of the Tournament' award in IPL 2008?",
//         a: "Rohit Sharma",
//         b: "Shreevats Goswami",
//         c: "Suresh Raina",
//         d: "Virat Kohli",
//         correct: "b",
//     },
// ];

// const quiz = document.getElementById("quiz");
// const answerEls = document.querySelectorAll(".answer");
// const questionEl = document.getElementById("question");
// const a_text = document.getElementById("a_text");
// const b_text = document.getElementById("b_text");
// const c_text = document.getElementById("c_text");
// const d_text = document.getElementById("d_text");
// const submitBtn = document.getElementById("submit");

// let currentQuiz = 0;
// let score = 0;

// loadQuiz();

// function loadQuiz() {
//     deselectAnswers();

//     const currentQuizData = quizData[currentQuiz];

//     questionEl.innerText = currentQuizData.question;
//     a_text.innerText = currentQuizData.a;
//     b_text.innerText = currentQuizData.b;
//     c_text.innerText = currentQuizData.c;
//     d_text.innerText = currentQuizData.d;
// }

// function getSelected() {
//     let answer = undefined;

//     answerEls.forEach((answerEl) => {
//         if (answerEl.checked) {
//             answer = answerEl.id;
//         }
//     });

//     return answer;
// }

// function deselectAnswers() {
//     answerEls.forEach((answerEl) => {
//         answerEl.checked = false;
//     });
// }

// submitBtn.addEventListener("click", () => {
//     // check to see the answer
//     const answer = getSelected();

//     if (answer) {
//         if (answer === quizData[currentQuiz].correct) {
//             score++;
//         }

//         currentQuiz++;
//         if (currentQuiz < quizData.length) {
//             loadQuiz();
//         } else {
//             quiz.innerHTML = `
//                 <h2>You answered correctly at ${score}/${quizData.length} questions.</h2>

//                 <button onclick="location.reload()">Reload</button>
//             `;
//         }
//     }
// });

// quiz
// let questions = document.querySelectorAll(".question");
// let submit = document.getElementById("quizSubmit");
// let allQuestions = document.getElementById("allQuestions");
// let rightQuestions = document.getElementById("rightQuestions");
// let wrongQuestions = document.getElementById("wrongQuestions");
// let percentQuestions = document.getElementById("percentQuestions");
// let quizProgress = document.getElementById("quizProgress");
// let result = document.querySelector(".result");

// function checkQuiz() {
//     let rightAnswer = 0;
//     questions.forEach(ques => {
//         ques.querySelectorAll("input[type=radio").forEach(elem => {
//             elem.classList.remove("true", "false", "empty");
//             if (elem.checked && elem.hasAttribute("answer")) {
//                 // right answer
//                 rightAnswer++;
//                 ques.classList.remove("true", "false");
//                 ques.classList.add("true");
//             }
//             if (elem.hasAttribute("answer")) {
//                 // true
//                 elem.classList.add("true");
//             } else if (elem.checked && !elem.hasAttribute("answer")) {
//                 // false
//                 elem.classList.add("false");
//                 ques.classList.remove("true", "false");
//                 ques.classList.add("false");
//             } else {
//                 // empty
//                 elem.classList.add("empty");
//             }
//         });
//     });
//     // result
//     let quizPercent = Math.floor(rightAnswer / questions.length * 100);
//     result.classList.add("is-active");
//     allQuestions.innerHTML = "number of questions : " + questions.length;
//     rightQuestions.innerHTML = "correct : " + rightAnswer;
//     wrongQuestions.innerHTML = "wrong : " + (questions.length - rightAnswer);
//     percentQuestions.innerHTML = "quiz percent : " + quizPercent + "%";
//     quizProgress.classList.remove("success", "fail");
//     if (quizPercent > 75) {
//         // success
//         quizProgress.classList.add("success");
//         alert("success");
//     } else {
//         // fail
//         quizProgress.classList.add("fail");
//         alert("fail");
//     }
//     quizProgress.value = quizPercent;
// }


// // 
// submit.addEventListener("click", cl => {
//     cl.preventDefault();
//     checkQuiz();
//     // scroll to bottom
//     window.scrollTo(0, document.body.scrollHeight);
// });
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Physical Security Quiz</title>
    <link rel="stylesheet" href="res/css/ps_quiz.css">
    <link rel="stylesheet" href="res/css/styles.css">
<script
        src="https://code.jquery.com/jquery-3.3.1.js"
        integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous">
    </script>
    <script> 
    $(function(){
      $("#header").load("header.html"); 
      $("#footer").load("footer.html"); 
    });
    </script> 

</head>

<body>
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // User is not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}
?>


    <div id="header"></div>
    <main>
        <section class="quiz-section">
            <h2>Test Your Knowledge</h2>
            <p>Answer the following questions:</p>
            <ul id="quiz-options">
                <li>
                    <p>What is a recommended practice for physical security?</p>
                    <button onclick="checkAnswer('correct', 'q1', this)">Install surveillance cameras in critical areas</button>
                    <button onclick="checkAnswer('incorrect', 'q1', this)">Use easily accessible locations for sensitive equipment</button>
                    <button onclick="checkAnswer('incorrect', 'q1', this)">Ignore environmental protections in data centers</button>
                    <p class="answer" id="answer-q1"></p>
                </li>
                <li>
                    <p>Which method helps secure access to sensitive locations?</p>
                    <button onclick="checkAnswer('incorrect', 'q2', this)">Use standard key locks</button>
                    <button onclick="checkAnswer('correct', 'q2', this)">Use biometric access control</button>
                    <button onclick="checkAnswer('incorrect', 'q2', this)">Install manual locks only</button>
                    <p class="answer" id="answer-q2"></p>
                </li>
                <li>
                    <p>How often should physical spaces be audited?</p>
                    <button onclick="checkAnswer('incorrect', 'q3', this)">Annually</button>
                    <button onclick="checkAnswer('incorrect', 'q3', this)">Every 5 years</button>
                    <button onclick="checkAnswer('correct', 'q3', this)">Regularly, as part of ongoing security measures</button>
                    <p class="answer" id="answer-q3"></p>
                </li>
                <li>
                    <p>What should be ensured in data centers?</p>
                    <button onclick="checkAnswer('incorrect', 'q4', this)">Increased data storage capacity</button>
                    <button onclick="checkAnswer('incorrect', 'q4', this)">Extended working hours for staff</button>
                    <button onclick="checkAnswer('correct', 'q4', this)">Fire suppression and environmental protections</button>
                    <p class="answer" id="answer-q4"></p>
                </li>
            </ul>
        </section>
    </main>

   

    <script>
        function checkAnswer(response, question, button) {
            const correctAnswers = {
                'q1': 'correct',
                'q2': 'correct',
                'q3': 'correct',
                'q4': 'correct'
            };

            const answers = {
                'q1': 'Install surveillance cameras in critical areas.',
                'q2': 'Use biometric access control.',
                'q3': 'Regularly, as part of ongoing security measures.',
                'q4': 'Fire suppression and environmental protections.'
            };

            const buttons = button.parentElement.querySelectorAll('button');
            buttons.forEach(btn => btn.disabled = true); // Disable all buttons

            if (response === correctAnswers[question]) {
                button.classList.add('correct');
                button.innerHTML += ' &#10004;'; // Add tick symbol
                document.getElementById(`answer-${question}`).innerText = '';
            } else {
                button.classList.add('incorrect');
                button.innerHTML += ' &#10060;'; // Add cross symbol
                document.getElementById(`answer-${question}`).innerText = `Correct answer: ${answers[question]}`;
            }
        }
    </script>

    <div id="footer"></div>





</body>
</html>

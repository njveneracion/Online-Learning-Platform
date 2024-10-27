<?php
// Include database connection
include('../dbConn/config.php');
session_start();

// Initialize variables
$status = '';
$percentage = 0;
$canRetake = false;

if (isset($_GET['quizID']) && isset($_GET['courseID'])) {
    $quizID = mysqli_real_escape_string($connect, $_GET['quizID']);
    $courseID = mysqli_real_escape_string($connect, $_GET['courseID']);
    $studentID = $_SESSION['userID'];

    // Fetch total questions
    $sqlTotalQuestions = "SELECT COUNT(*) AS total FROM quiz_questions WHERE quiz_id = '$quizID'";
    $resultTotalQuestions = mysqli_query($connect, $sqlTotalQuestions);
    if (!$resultTotalQuestions) {
        die("Error fetching total questions: " . mysqli_error($connect));
    }
    $totalQuestionsRow = mysqli_fetch_assoc($resultTotalQuestions);
    $totalQuestions = (int)$totalQuestionsRow['total'];

    // Fetch student's answers and calculate the score
    $sqlStudentAnswers = "SELECT COUNT(*) AS correct_count
                          FROM student_answers
                          WHERE student_id = '$studentID'
                            AND quiz_id = '$quizID'
                            AND student_answer = correct_answer";
    $resultStudentAnswers = mysqli_query($connect, $sqlStudentAnswers);
    if (!$resultStudentAnswers) {
        die("Error fetching student answers: " . mysqli_error($connect));
    }
    $studentAnswersRow = mysqli_fetch_assoc($resultStudentAnswers);
    $correctAnswers = (int)$studentAnswersRow['correct_count'];

    // Calculate percentage
    $percentage = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;
    $status = ($percentage >= 70) ? 'Passed' : 'Failed';  // passing percentage is 70%

    // Determine if the quiz can be retaken
    if ($status == 'Failed') {
        $canRetake = true;
    } else {
        // Mark quiz as completed
        $sqlMarkCompleted = "INSERT INTO student_progress (student_id, course_id, content_id, content_type, is_completed, completed_at)
        VALUES ('$studentID', '$courseID', '$quizID', 'Quiz', TRUE, NOW())
        ON DUPLICATE KEY UPDATE is_completed = TRUE, completed_at = NOW()";
        $resultMarkCompleted = mysqli_query($connect, $sqlMarkCompleted);
        if (!$resultMarkCompleted) {
            die("Error marking quiz as completed: " . mysqli_error($connect));
        }
    }

    // Reset previous quiz answers if retaking
    if ($canRetake) {
        $sqlResetAnswers = "DELETE FROM student_answers WHERE student_id = '$studentID' AND quiz_id = '$quizID'";
        $resultResetAnswers = mysqli_query($connect, $sqlResetAnswers);
        if (!$resultResetAnswers) {
            die("Error resetting previous answers: " . mysqli_error($connect));
        }
    }


    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    </head>
    <body>
        <div class="notification <?= strtolower($status); ?>">
            <h2><?= $status; ?></h2>
            <p>Your score: <?= number_format($percentage, 2); ?>%</p>
            <a href="s_main.php?page=s_course_content&viewContent=<?= urlencode($courseID); ?>" class="btn btn-primary">Return to Course</a>
            <?php if ($canRetake): ?>
                <a href="s_main.php?page=s_quiz_page&quizID=<?= urlencode($quizID); ?>&courseID=<?= urlencode($courseID); ?>" class="btn btn-warning">Retake Quiz</a>
            <?php endif; ?>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<p style='text-align: center;'>Invalid request.</p>";
}
?>

<style>
.notification {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    text-align: center;
}
.notification.pass {
    border-color: #28a745;
    color: #28a745;
}
.notification.fail {
    border-color: #dc3545;
    color: #dc3545;
}
</style>

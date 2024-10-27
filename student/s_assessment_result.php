<?php
// Include database connection
include('../dbConn/config.php');
session_start();

// Initialize variables
$status = '';
$percentage = 0;
$canRetake = false;
$message = '';

if (isset($_GET['assessmentID']) && isset($_GET['courseID']) && isset($_GET['type'])) {
    $assessmentID = mysqli_real_escape_string($connect, $_GET['assessmentID']);
    $courseID = mysqli_real_escape_string($connect, $_GET['courseID']);
    $assessmentType = mysqli_real_escape_string($connect, $_GET['type']);
    $studentID = $_SESSION['userID'];

    // Fetch assessment details
    $sqlAssessment = "SELECT * FROM assessments WHERE assessment_id = '$assessmentID'";
    $resultAssessment = mysqli_query($connect, $sqlAssessment);
    $assessmentDetails = mysqli_fetch_assoc($resultAssessment);

    if ($assessmentType === 'pre-assessment') {
        // For pre-assessment, just show a completion message
        $message = "Thank you for completing the pre-assessment. This helps us understand your initial knowledge level.";
        
        // Mark pre-assessment as completed
        $sqlMarkCompleted = "INSERT INTO student_progress (student_id, course_id, content_id, content_type, is_completed, completed_at)
                             VALUES ('$studentID', '$courseID', '$assessmentID', 'pre-assessment', TRUE, NOW())
                             ON DUPLICATE KEY UPDATE is_completed = TRUE, completed_at = NOW()";
        mysqli_query($connect, $sqlMarkCompleted);
    } elseif ($assessmentType === 'post-assessment') {
        // For post-assessment, calculate the score
        $sqlTotalQuestions = "SELECT COUNT(*) AS total FROM assessment_questions WHERE assessment_id = '$assessmentID'";
        $resultTotalQuestions = mysqli_query($connect, $sqlTotalQuestions);
        $totalQuestionsRow = mysqli_fetch_assoc($resultTotalQuestions);
        $totalQuestions = (int)$totalQuestionsRow['total'];

        $sqlCorrectAnswers = "SELECT COUNT(*) AS correct_count
                              FROM student_assessment_answers
                              WHERE student_id = '$studentID'
                                AND assessment_id = '$assessmentID'
                                AND student_answer = correct_answer";
        $resultCorrectAnswers = mysqli_query($connect, $sqlCorrectAnswers);
        $correctAnswersRow = mysqli_fetch_assoc($resultCorrectAnswers);
        $correctAnswers = (int)$correctAnswersRow['correct_count'];

        // Calculate percentage
        $percentage = ($totalQuestions > 0) ? ($correctAnswers / $totalQuestions) * 100 : 0;
        $status = ($percentage >= 70) ? 'Passed' : 'Failed';

        if ($status == 'Passed') {
            $message = "Congratulations! You have passed the post-assessment.";
            // Mark post-assessment as completed
            $sqlMarkCompleted = "INSERT INTO student_progress (student_id, course_id, content_id, content_type, is_completed, completed_at)
                                 VALUES ('$studentID', '$courseID', '$assessmentID', 'post-assessment', TRUE, NOW())
                                 ON DUPLICATE KEY UPDATE is_completed = TRUE, completed_at = NOW()";
            mysqli_query($connect, $sqlMarkCompleted);
        } else {
            $message = "You did not pass the post-assessment. You may need to review the course material and try again.";
            $canRetake = true;
        }

        // Reset previous assessment answers if retaking
        if ($canRetake) {
            $sqlResetAnswers = "DELETE FROM student_assessment_answers WHERE student_id = '$studentID' AND assessment_id = '$assessmentID'";
            mysqli_query($connect, $sqlResetAnswers);
        }
    } else {
        $message = "Invalid assessment type.";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Assessment Result</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .result-container {
                max-width: 600px;
                margin: 50px auto;
                padding: 20px;
                background-color: #f8f9fa;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                text-align: center;
            }
            .result-title {
                font-size: 24px;
                font-weight: bold;
                margin-bottom: 20px;
                color: #343a40;
            }
            .result-message {
                font-size: 18px;
                margin-bottom: 20px;
                color: #495057;
            }
            .result-score {
                font-size: 36px;
                font-weight: bold;
                margin-bottom: 20px;
                color: #28a745;
            }
            .btn-container {
                display: flex;
                justify-content: center;
                gap: 10px;
            }
        </style>
    </head>
    <body>
        <div class="result-container">
            <h2 class="result-title"><?= $assessmentType === 'pre-assessment' ? 'Pre-Assessment Completed' : 'Post-Assessment Result' ?></h2>
            <p class="result-message"><?= $message ?></p>
            <?php if ($assessmentType === 'post-assessment'): ?>
                <div class="result-score"><?= number_format($percentage, 2) ?>%</div>
                <p>Status: <strong><?= $status ?></strong></p>
            <?php endif; ?>
            <div class="btn-container">
                <a href="s_main.php?page=s_course_content&viewContent=<?= urlencode($courseID) ?>" class="btn btn-primary">Return to Course</a>
                <?php if ($canRetake): ?>
                    <a href="s_main.php?page=s_assessment_page&assessmentID=<?= urlencode($assessmentID) ?>&courseID=<?= urlencode($courseID) ?>&type=<?= urlencode($assessmentType) ?>" class="btn btn-warning">Retake Assessment</a>
                <?php endif; ?>
            </div>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "<p style='text-align: center;'>Invalid request.</p>";
}
?>

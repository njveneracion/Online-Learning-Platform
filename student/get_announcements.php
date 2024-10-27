<?php
include '../dbConn/config.php';
include 's_course_content.php';  // This file contains the displayAnnouncements function

if (isset($_GET['courseID'])) {
    $courseID = mysqli_real_escape_string($connect, $_GET['courseID']);
    echo "<h3>Course Announcements</h3>";
    displayAnnouncements($connect, $courseID);
} else {
    echo "<p>Error: Course ID not provided.</p>";
}

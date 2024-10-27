<?php
include './dbConn/config.php';

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

function sendOTP($email, $otp){
    $mail = new PHPMailer(true); // Create a new PHPMailer instance

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                   // Enable SMTP authentication
        $mail->Username   = 'njvenxxviii@gmail.com'; // SMTP username
        $mail->Password   = 'scgx smdi dqea ljux'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('patscabanatuan@gmail.com', 'PATS LMS');
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Your OTP for Email Verification';
        $mail->Body    = "Your OTP for email verification is: <strong>$otp</strong>. This OTP is valid for 15 minutes.";

        $mail->send();
    } catch (Exception $e) {
        // Handle the error
        $_SESSION['registration_error'] = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        header('Location: register.php');
        exit();
    }
}
function registerUser($connect, $fullname, $username, $email, $password, $role) {
    // Input validation with updated regex
    if (!preg_match('/^[a-zA-Z ]{2,50}$/', $fullname)) {
        $_SESSION['registration_error'] = 'Invalid fullname. Use only letters and spaces, 2-50 characters.';
        return;
    }

    if (!preg_match('/^[a-zA-Z0-9_]{3,20}$/', $username)) {
        $_SESSION['registration_error'] = 'Invalid username. Use 3-20 alphanumeric characters or underscores.';
        return;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['registration_error'] = 'Invalid email address.';
        return;
    }

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $_SESSION['registration_error'] = 'Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.';
        return;
    }

    if (!in_array($role, ['student', 'instructor'])) {
        $_SESSION['registration_error'] = 'Invalid role selected.';
        return;
    }

    $salt = '!Gu355+hEp45sW0rd@^;';
    $hashedPassword = hash('gost', $password . $salt);

    // Use prepared statements to prevent SQL injection
    $sqlCheckEmail = "SELECT * FROM users WHERE email = ?";
    $stmtCheckEmail = mysqli_prepare($connect, $sqlCheckEmail);
    mysqli_stmt_bind_param($stmtCheckEmail, "s", $email);
    mysqli_stmt_execute($stmtCheckEmail);
    $resultCheckEmail = mysqli_stmt_get_result($stmtCheckEmail);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        $_SESSION['registration_error'] = 'Email already registered.';
    } else {
        $otp = rand(100000, 999999);
        $otp_expiration = date('Y-m-d H:i:s', strtotime('+15 minutes'));
        $created_at = date('Y-m-d H:i:s');
        
        $sqlInsert = "INSERT INTO users (fullname, username, email, password, role, otp, otp_expiration, is_verified, created_at) 
                      VALUES (?, ?, ?, ?, ?, ?, ?, 0, ?)";
        $stmtInsert = mysqli_prepare($connect, $sqlInsert);
        mysqli_stmt_bind_param($stmtInsert, "ssssssss", $fullname, $username, $email, $hashedPassword, $role, $otp, $otp_expiration, $created_at);
        $resultInsert = mysqli_stmt_execute($stmtInsert);

        if ($resultInsert) {
            sendOTP($email, $otp);
            $_SESSION['registration_success'] = 'Successfully registered. Please check your email to verify your account.';
            header('Location: verifyOtp.php');
            exit();
        } else {
            $_SESSION['registration_error'] = 'Unable to register. Please try again.';
        }
    }
}


if (isset($_POST['createAccountBtn'])){
    $role = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password']; // Don't sanitize password, as it may contain special characters

    registerUser($connect, $fullname, $username, $email, $password, $role);
}

?>

<!DOCTYPE html>
<html lang="en"></html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.jpg" type="image/jpeg">
    <title>Philippine Academy of Technical Studies LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./styles/main.css?=v10">
    <link rel="stylesheet" href="./styles/color.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/7b2ef867fd.js" crossorigin="anonymous"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto;
            overflow-y: auto;
            padding-bottom: 60px;
        }
        .footer {
            flex-shrink: 0;
        }
        .container {
            max-width: 500px;
        }
        .collapse-icon {
            transition: transform 0.3s ease;
        }
        .rotate {
            transform: rotate(90deg); /* Arrow pointing down when expanded */
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
        .form-text {
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
<div class="content container mt-3">
    <div class="card">
        <div class="d-flex justify-content-center">
            <a href="index.php"><img src="./assets/images/logo.jpg" alt="logo of pats" height="160"></a>
        </div>
        <hr>
        <label class="fs-5 mx-3">New Account</label>
        <?php
        if (isset($_SESSION['registration_success'])) {
            echo '<div id="success-alert" class="alert alert-success" role="alert">' . $_SESSION['registration_success'] . '</div>';
            unset($_SESSION['registration_success']);
        }
        ?>
        <div class="p-3">    
            <div>
                <!-- Role Selection -->
                <label>Register as</label>
                <select id="roleSelect" class="form-select form-select mb-3 p-3">
                    <option value="student" selected>Student</option>
                    <option value="instructor">Instructor</option>
                </select>
            </div>
            <form method="POST" id="registrationForm">
                <div id="formErrors" class="alert alert-danger" style="display: none;"></div>
                <!-- Student Form Section -->
                <input type="hidden" value="student" id="role" name="role"> <!-- Default to student -->
                <div id="studentForm" class="role-form">
                    <!-- Include fields specific to students here -->
                    <div class="mb-3">
                        <label>Unique Learner Identifier (ULI) Number</label>
                        <input type="text" class="form-control p-3"  name="student_id">
                    </div>
                </div>

                <hr>

                <!-- Shared Form Fields -->
                <div class="mt-3">
                    <p data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="true" aria-controls="collapseExample1" class="d-flex align-items-center modified-text-primary" style="cursor: pointer; font-size: 20px;">
                        <i class="fa-solid fa-caret-right collapse-icon rotate me-2 fa-sm" id="arrowIcon1"></i>
                        Choose your username and password  
                    </p>
                    <div class="collapse show" id="collapseExample1">
                        <div class="mb-3">
                            <label>Username</label>
                            <input type="text" class="form-control p-3" name="username" id="username"  required>
                            <small id="usernameHelp" class="form-text" style="display: none;">Use 3-20 alphanumeric characters or underscores.</small>
                        </div>
                        <div>
                            <label>Password</label>
                            <input type="password" class="form-control p-3" name="password" id="password"  required>
                            <small id="passwordHelp" class="form-text" style="display: none;">Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.</small>
                        </div>
                    </div>
                </div>

                <!-- Shared Personal Information Section -->
                <div class="mt-3">
                    <p data-bs-toggle="collapse" data-bs-target="#collapseExample2" aria-expanded="true" aria-controls="collapseExample2" class="d-flex align-items-center modified-text-primary" style="cursor: pointer; font-size: 20px;">
                        <i class="fa-solid fa-caret-right collapse-icon rotate me-2 fa-sm" id="arrowIcon2"></i>
                        Personal Information
                    </p>
                    <div class="collapse show" id="collapseExample2">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label>Fullname</label>
                                <input type="text" class="form-control p-3"  name="fullname" id="fullname" required>
                                <small id="fullnameHelp" class="form-text" style="display: none;">Use only letters and spaces, 2-50 characters.</small>
                            </div>
                        </div>
                        <div>
                            <label>Email Address</label>
                            <input type="email" placeholder="valid@email.com" class="form-control p-3" name="email" id="email" required>
                            <small id="emailHelp" class="form-text" style="display: none;">Enter a valid email address.</small>
                        </div>
                        <?php
                        if (isset($_SESSION['registration_error'])) {
                            echo '<div class="alert alert-danger mt-1 alert-dismissible fade show" role="alert">' . $_SESSION['registration_error'] . '
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                  </div>';
                            unset($_SESSION['registration_error']);
                        }
                        ?>
                    </div>
                </div>

                <!-- Submit Button -->
                <div>
                    <input type="submit" value="Create my new account" class="btn btn-primary button-primary p-3 mt-3 form-control" name="createAccountBtn">
                </div>
            </form>
            <a href="loginUsers.php" type="button" class="button-outline-primary mt-2 form-control p-3 text-decoration-none text-center">Go back to log in</a>
        </div>
    </div>
</div>

    <!-- Footer -->
    <footer class="footer bg-body-secondary text-center text-lg-start text-dark">
        <div class="text-center p-3 modified-bg-primary text-white">
        <p class="text-white"><a href="index.php" class="text-decoration-none text-white btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i> Home</a></p>
            © 2024 Philippine Academy of Technical Studies. All rights reserved.
        </div>
    </footer>

    <script>
        // JavaScript to toggle the icon rotation for each collapsible section
        document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(function(element) {
            var targetId = element.getAttribute('data-bs-target');
            var icon = element.querySelector('.collapse-icon');
            var collapseElement = document.querySelector(targetId);

            // Set initial state based on default collapse visibility
            if (collapseElement.classList.contains('show')) {
                icon.classList.add('rotate');
            } else {
                icon.classList.remove('rotate');
            }

            // Add event listeners to handle rotation on expand/collapse
            collapseElement.addEventListener('show.bs.collapse', function () {
                icon.classList.add('rotate'); // Add rotation when expanding
            });

            collapseElement.addEventListener('hide.bs.collapse', function () {
                icon.classList.remove('rotate'); // Remove rotation when collapsing
            });
        });

        document.getElementById('roleSelect').addEventListener('change', function() {
            const selectedRole = this.value;
            const roleInput = document.getElementById('role');
            const studentForm = document.getElementById('studentForm');
            const instructorForm = document.getElementById('instructorForm');

            // Update the hidden role input field
            roleInput.value = selectedRole;

            // Show or hide forms based on the selected role
            if (selectedRole === 'student') {
                studentForm.style.display = 'block';
                instructorForm.style.display = 'none';
            } else {
                studentForm.style.display = 'none';
                instructorForm.style.display = 'block';
            }
        });

        function validateInput(input, regex, helperId) {
            const helperText = document.getElementById(helperId);
            if (input.value.trim() !== '') {
                helperText.style.display = 'block';
                if (regex.test(input.value)) {
                    helperText.style.color = 'green';
                    helperText.textContent = 'Valid input';
                    return true;
                } else {
                    helperText.style.color = 'red';
                    helperText.textContent = 'Invalid input';
                    return false;
                }
            } else {
                helperText.style.display = 'none';
                return false;
            }
        }

        document.getElementById('username').addEventListener('input', function() {
            const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
            if (this.value.trim() !== '') {
                if (!validateInput(this, usernameRegex, 'usernameHelp')) {
                    document.getElementById('usernameHelp').textContent = 'Username must be 3-20 characters long and can only contain letters, numbers, and underscores.';
                }
            } else {
                document.getElementById('usernameHelp').style.display = 'none';
            }
        });

        document.getElementById('password').addEventListener('input', function() {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (this.value.trim() !== '') {
                if (!validateInput(this, passwordRegex, 'passwordHelp')) {
                    document.getElementById('passwordHelp').textContent = 'Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.';
                }
            } else {
                document.getElementById('passwordHelp').style.display = 'none';
            }
        });

        document.getElementById('fullname').addEventListener('input', function() {
            const fullnameRegex = /^[a-zA-Z ]{2,50}$/;
            if (this.value.trim() !== '') {
                if (!validateInput(this, fullnameRegex, 'fullnameHelp')) {
                    document.getElementById('fullnameHelp').textContent = 'Full name must be 2-50 characters long and can only contain letters and spaces.';
                }
            } else {
                document.getElementById('fullnameHelp').style.display = 'none';
            }
        });

        document.getElementById('email').addEventListener('input', function() {
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (this.value.trim() !== '') {
                if (!validateInput(this, emailRegex, 'emailHelp')) {
                    document.getElementById('emailHelp').textContent = 'Please enter a valid email address.';
                }
            } else {
                document.getElementById('emailHelp').style.display = 'none';
            }
        });

        // Form submission validation
        document.getElementById('registrationForm').addEventListener('submit', function(e) {
            const username = document.getElementById('username');
            const password = document.getElementById('password');
            const fullname = document.getElementById('fullname');
            const email = document.getElementById('email');
            const formErrors = document.getElementById('formErrors');

            const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            const fullnameRegex = /^[a-zA-Z ]{2,50}$/;
            const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            let errors = [];

            if (!usernameRegex.test(username.value)) {
                errors.push('Please enter a valid username.');
            }
            if (!passwordRegex.test(password.value)) {
                errors.push('Please enter a valid password.');
            }
            if (!fullnameRegex.test(fullname.value)) {
                errors.push('Please enter a valid full name.');
            }
            if (!emailRegex.test(email.value)) {
                errors.push('Please enter a valid email address.');
            }

            if (errors.length > 0) {
                e.preventDefault();
                formErrors.innerHTML = errors.map(error => `<div>${error}</div>`).join('');
                formErrors.style.display = 'block';
            } else {
                formErrors.style.display = 'none';
            }
        });

    </script>
</body>
</html>

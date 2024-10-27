<?php
include './dbConn/config.php'; // Database connection
include 'logActivity.php'; // Function to log activity
session_start();

$errorMessage = "";

if (isset($_POST['login'])) {
    $loginInput = $_POST['email'];
    $password = $_POST['password'];

    // Server-side validation
    $emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $usernameRegex = '/^[a-zA-Z0-9_]{3,20}$/';
    $passwordRegex = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

    if (!(preg_match($emailRegex, $loginInput) || preg_match($usernameRegex, $loginInput)) || !preg_match($passwordRegex, $password)) {
        $errorMessage = '<p class="text-danger text-start" id="myAlert">Invalid input format. Please check your email/username and password.</p>';
    } else {
        // Hashing password
        $salt = '!Gu355+hEp45sW0rd@^;';
        $hashedPassword = hash('gost', $password . $salt);

        // Determine if input is email or username
        if (filter_var($loginInput, FILTER_VALIDATE_EMAIL)) {
            // It's an email address
            $sql = "SELECT * FROM users WHERE email = '$loginInput'";
        } else {
            // It's a username
            $sql = "SELECT * FROM users WHERE username = '$loginInput'";
        }

        $result = mysqli_query($connect, $sql);

        // Check if user exists
        if ($row = mysqli_fetch_assoc($result)) {
            
            $dbPassword = $row['password'];
            $userID = $row['user_id'];
            $isVerified = $row['is_verified']; // Assuming there's a column 'is_verified'

            // Verifying hashed password
            if (($hashedPassword === $dbPassword || $password === $dbPassword) && $isVerified) {
                $_SESSION['userID'] = $userID; // Store user ID in session
                $_SESSION['email'] = $row['email'];
                $_SESSION['role'] = $row['role'];
                $_SESSION['fullname'] = $row['fullname'];
                $_SESSION['username'] = $row['username'];

                
                $action = 'Login';
                $description = 'User logged in successfully!';

                // Log the activity
                if (logActivity($userID, $action, $description)) {

                      // Add user to active_sessions table
                      $session_id = session_id();
                      $insertActiveSession = "INSERT INTO active_sessions (session_id, user_id) VALUES (?, ?) 
                                            ON DUPLICATE KEY UPDATE last_activity = CURRENT_TIMESTAMP";
                      $stmtActiveSession = mysqli_prepare($connect, $insertActiveSession);
                      mysqli_stmt_bind_param($stmtActiveSession, "ss", $session_id, $userID);
                      mysqli_stmt_execute($stmtActiveSession);

                    // Redirect based on user role
                    switch ($_SESSION['role']) {
                        case 'instructor':
                            header('Location: ./instructor/i_main.php');
                            break;
                        case 'student':
                            header('Location: ./student/s_main.php');
                            break;
                        case 'admin':
                            header('Location: ./system_admin/sa_main.php');
                            break;
                        default:
                            // Handle unexpected role or set a default redirect
                            header('Location: ./loginUsers.php');
                    }
                    exit();
                } else {
                    $errorMessage = "<p>Error logging activity.</p>";
                }
            } else {
                $errorMessage = '<p class="text-danger text-start" id="myAlert">Invalid email or password.</p>';
            }
        } else {
            $errorMessage = '<p class="text-danger text-start" id="myAlert">Invalid email or password</p>';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.jpg" type="image/jpeg">
    <title>Philippine Academy of Technical Studies LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/main.css?=v4">
    <link rel="stylesheet" href="./styles/color.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7b2ef867fd.js" crossorigin="anonymous"></script>
    <style>
        body, html {
            height: 100%; /* Full height */
            margin: 0;
            display: flex;
            flex-direction: column;
        }
        .content {
            flex: 1 0 auto; /* Makes the content area flexible and growable */
            overflow-y: auto; /* Allows vertical scrolling */
            padding-bottom: 60px; /* Space for the fixed footer */
        }
        .footer {
            flex-shrink: 0; /* Prevents the footer from shrinking */
        }
        .container {
            max-width: 500px;
        }

        .error-message {
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }
    </style>
</head>
<body>
    <!-- Content Area -->
    <div class="content container mt-3">
        <div class="card p-3">
            <div class="mb-5 d-flex justify-content-center">
                <a href="index.php"><img src="./assets/images/logo.jpg" alt="logo of pats" height="160"></a>
            </div>
            <div>
                <form method="POST" id="loginForm">
                    <div id="formErrors" class="alert alert-danger" style="display: none;"></div>
                    <div class="input-group mt-2">
                        <button class="btn p-3 text-secondary" style="border-color: #dee2e6; border-right: none;" type="button">
                          <i class="fa-solid fa-envelope px-2"></i>
                        </button>
                         <input type="text" placeholder="Username or email" class="form-control p-3" name="email" id="loginInput" required>
                    </div>
                    <small id="loginInputHelp" class="form-text" style="display: none;">Enter your valid username or email.</small>

                    <div class="input-group mt-2">
                         <button class="btn p-3 text-secondary" style="border-color: #dee2e6; border-right: none;" type="button">
                          <i class="fa-solid fa-key px-2"></i>
                        </button>
                        <input type="password" placeholder="Password" id="floatingPassword" class="form-control p-3" style="border-right: none;" name="password" required>
                        <button class="btn p-3 text-secondary" style="border-color: #dee2e6; border-left: none;" type="button" id="passwordToggle">
                            <i class="fa-regular fa-eye"></i>
                            <i class="fa-regular fa-eye-slash d-none"></i>
                        </button>
                    </div>
                 
                    <small id="passwordHelp" class="form-text" style="display: none;">Enter your password.</small>
                    <?php if(isset($errorMessage)){echo $errorMessage;}?>
                    <input type="submit" class="button-primary form-control mt-3 p-3" value="Log in" name="login">
                    <a href="forgotPassword.php" class="text-decoration-none modified-text-primary"><p class="text-center mt-1">Forgotten your password?</p></a>
                </form>
            </div>
        </div>
        <div class="card p-3 mt-2">
            <h2>Is this your first time here?</h2>
            <p>Please enter your email address to create an account. You can only enter a course once your teacher gives you a self-enrollment key.</p>
            <p>After registering, please check your email and verify your account.</p>
            <a href="registerUsers.php" class="button-outline-primary form-control p-3 text-decoration-none text-center">Register</a>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer bg-body-secondary text-center text-lg-start text-dark ">
       <div class="text-center p-3 modified-bg-primary text-white">
        <p class="text-white"><a href="index.php" class="text-decoration-none text-white btn btn-outline-primary"><i class="fa-solid fa-arrow-left"></i> Home</a></p>
            © 2024 Philippine Academy of Technical Studies. All rights reserved.
        </div>
    </footer>

    <script src="./javascript/see_password.js"></script>
    <script>
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

    document.getElementById('loginInput').addEventListener('input', function() {
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
        const helperText = document.getElementById('loginInputHelp');
        
        if (this.value.trim() !== '') {
            helperText.style.display = 'block';
            if (emailRegex.test(this.value)) {
                helperText.style.color = 'green';
                helperText.textContent = 'Valid email address';
            } else if (usernameRegex.test(this.value)) {
                helperText.style.color = 'green';
                helperText.textContent = 'Valid username';
            } else {
                helperText.style.color = 'red';
                helperText.textContent = 'Invalid email or username';
            }
        } else {
            helperText.style.display = 'none';
        }
    });

    document.getElementById('floatingPassword').addEventListener('input', function() {
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        if (this.value.trim() !== '') {
            validateInput(this, passwordRegex, 'passwordHelp');
            const helperText = document.getElementById('passwordHelp');
            if (!passwordRegex.test(this.value)) {
                helperText.textContent = 'Password must contain at least 8 characters, including uppercase, lowercase, number, and special character';
            }
        } else {
            document.getElementById('passwordHelp').style.display = 'none';
        }
    });

    document.getElementById('loginForm').addEventListener('submit', function(e) {
        const loginInput = document.getElementById('loginInput');
        const password = document.getElementById('floatingPassword');
        const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        const usernameRegex = /^[a-zA-Z0-9_]{3,20}$/;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
        const formErrors = document.getElementById('formErrors');
        let errors = [];

        if (loginInput.value.trim() === '' || !(emailRegex.test(loginInput.value) || usernameRegex.test(loginInput.value))) {
            errors.push('Please enter a valid email or username.');
        }

        if (password.value.trim() === '' || !passwordRegex.test(password.value)) {
            errors.push('Please enter a valid password.');
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

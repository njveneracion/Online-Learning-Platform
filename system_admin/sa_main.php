<?php
    include '../dbConn/config.php';
    include '../logActivity.php';
    session_start();

    // Check if user is logged in
if (!isset($_SESSION['userID'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: /loginUsers.php");
    exit();
}
    $userID = $_SESSION['userID']; // Ensure you have the user ID in the session

    // Determine the page to include
    $page = isset($_GET['page']) ? $_GET['page'] : 'sa_dashboard';
  
    switch($page){
        case 'sa_dashboard':
            $filename = 'sa_dashboard.php';
            break;
        case 'sa_activity_logs':
            $filename = 'sa_activity_logs.php';
            break;
        case 'sa_manage_users':
            $filename = 'sa_manage_users.php';
            break;
        case 'sa_manage_courses':
            $filename = 'sa_manage_courses.php';
            break;
        case 'sa_profile':
            $filename = 'sa_profile.php';
            break;
       
        case 'logout':
            // Log the logout activity
            $action = 'Logout';
            $description = 'User logged out successfully.';
    
            // Log activity before destroying the session
            logActivity($userID, $action, $description);
    
            // Destroy the session
            session_unset(); // Clear all session variables
            session_destroy(); // Destroy the session
    
            // Redirect to homepage or login page
            header('Location: ../index.php');
            exit;
        default:
            $filename = 'sa_dashboard.php';
            break;
    }

    $sqlProfile = "SELECT profile_picture FROM users WHERE user_id = '$userID'";
    $resultProfile = mysqli_query($connect, $sqlProfile);
    $pic = mysqli_fetch_assoc($resultProfile);
    $profilePic = $pic['profile_picture'] ?? 'default.jpg'; // Set default image if no profile picture exists

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LMS Instructor Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles/sideNav.css?<?php echo time(); ?>">
    <link rel="stylesheet" href="../styles/color.css?<?= time() ?>">
</head>
<style>
     @media (max-width: 767px) and (min-width: 320px) {
            .navbar-brand{
                width: 180px;
                height: 100%;
            }
            .navbar-brand img{
                margin-left: 10px;
                object-fit: contain;
            }
        }
</style>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid ms-4 me-4">
            <button id="sidebarToggle" class="btn btn-outline-primary d-md-none ">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="index.php">
                <img src="../assets/images/pats-logo.png" alt="Pats Logo" style="height: 60px; width: 100%">
            </a>
            <div class="d-flex align-items-center ms-auto">
                <div class="dropdown">
                    <button class="btn btn-link me-3" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/userProfilePicture/<?php echo (!empty($profilePic)) ? $profilePic : 'default.jpg'; ?>" alt="profile photo" style="width: 40px; height: 40px; border-radius: 50%; object-fit: cover;">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><span class="dropdown-item-text"><?= $_SESSION['fullname']; ?></span></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-user-cog"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="?page=logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <nav class="sidebar">
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="?page=sa_dashboard">
                            <i class="fa-solid fa-graduation-cap icon modified-text-primary"></i>
                            <span class="text nav-text modified-text-primary">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="?page=sa_activity_logs">
                            <i class="fa-solid fa-chart-line icon modified-text-primary"></i>
                            <span class="text nav-text modified-text-primary">Activity Logs</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="?page=sa_manage_users">
                        <i class="fa-solid fa-users icon modified-text-primary"></i>
                            <span class="text nav-text modified-text-primary">Manage Users</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="?page=sa_manage_courses">
                        <i class="fa-solid fa-book icon modified-text-primary"></i>
                            <span class="text nav-text modified-text-primary">Manage Courses</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="?page=sa_profile">
                        <i class="fa-solid fa-user-shield icon modified-text-primary"></i>
                            <span class="text nav-text modified-text-primary">Profile</span>
                        </a>
                    </li>

                    

                    <hr>
                    <div class="container mt-4">
                        <div class="welcome-text">
                            <h4 id="greeting"></h4>
                            <p>Welcome to your admin profile. Here you can manage system settings and oversee all aspects of the learning management system.</p>
                        </div>
                    </div>
                </ul>
            </div>
        </div>
    </nav>

    <div class="content flex-grow-1" id="content-area">
    <?php include $filename; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../javascript/index.js"></script>
    <script>

            // JavaScript for adding the 'active' class on click
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', function() {
                document.querySelectorAll('.nav-link').forEach(nav => nav.classList.remove('active'));
                this.classList.add('active');
            });
        });

        // JavaScript for setting the 'active' class based on current URL
        window.addEventListener('DOMContentLoaded', function() {
            const currentPage = window.location.search || '?page=sa_dashboard';
            document.querySelectorAll('.nav-link a').forEach(link => {
                if (link.getAttribute('href') === currentPage) {
                    link.parentElement.classList.add('active');
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebar = document.querySelector('.sidebar');
            const content = document.querySelector('.content');

            sidebarToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                content.style.marginLeft = sidebar.classList.contains('active') ? '250px' : '0';
            });
        });

          //get the current time
          document.addEventListener('DOMContentLoaded', function() {
        function setGreeting() {
            const greetingElement = document.getElementById('greeting');
            if (!greetingElement) return;

            const hour = new Date().getHours();
            let greeting;

            if (hour >= 5 && hour < 12) {
                greeting = "Good morning";
            } else if (hour >= 12 && hour < 18) {
                greeting = "Good afternoon";
            } else {
                greeting = "Good evening";
            }

            greetingElement.textContent = greeting + ", <?php echo $_SESSION['fullname']; ?>!";
        }

        setGreeting();
        // Update greeting every minute
        setInterval(setGreeting, 60000);
        });

    </script>
    <script>
        // Function to check for new notifications
        function checkNewNotifications() {
            // This is a placeholder function. Replace with actual AJAX call to your server.
            fetch('get_notifications.php')
                .then(response => response.json())
                .then(data => {
                    updateNotificationDropdown(data);
                    document.getElementById('notificationDot').style.display = data.length > 0 ? 'block' : 'none';
                })
                .catch(error => console.error('Error:', error));
        }

        // Function to update the notification dropdown
        function updateNotificationDropdown(notifications) {
            const dropdownMenu = document.querySelector('#notificationDropdown + .dropdown-menu');
            if (notifications.length === 0) {
                dropdownMenu.innerHTML = '<li><h6 class="dropdown-header">Notifications</h6></li><li><hr class="dropdown-divider"></li><li><a class="dropdown-item" href="#">No new notifications</a></li>';
            } else {
                let notificationHtml = '<li><h6 class="dropdown-header">Notifications</h6></li><li><hr class="dropdown-divider"></li>';
                notifications.forEach(notification => {
                    notificationHtml += `<li><a class="dropdown-item" href="${notification.link}">${notification.message}</a></li>`;
                });
                dropdownMenu.innerHTML = notificationHtml;
            }
        }

        // Check for new notifications every 30 seconds
        setInterval(checkNewNotifications, 30000);

        // Initial check when the page loads
        checkNewNotifications();
    </script>
</body>
</html>


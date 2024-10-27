<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assets/images/logo.jpg" type="image/jpeg">
    <title>Philippine Academy of Technical Studies LMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/main.css?=v12">
    <link rel="stylesheet" href="./styles/color.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/7b2ef867fd.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Header -->
    <header class="fixed-top">
        <nav class="navbar navbar-expand-lg bg-body-secondary">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <img src="./assets/images/pats-logo.png" alt="Pats Logo" style="height: 60px; width: 100%">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home" data-section="home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#courses" data-section="courses">Courses</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#faqs" data-section="about">About</a>
                        </li>
                        <li class="nav-item ms-3 login-btn-toggle ">
                            <a href="loginUsers.php" class="btn btn-primary button-primary px-4">Login</a>
                        </li>
                    </ul> 
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero-section text-center" id="home">
        <div class="container">
            <h1 class="display-4 fw-bold">Welcome to PATS Online Learning Platform</h1>
            <p class="lead">Your gateway to TESDA-accredited technical education and 21st century skills development</p>
            <a href="loginUsers.php" class="btn btn-primary button-primary btn-lg mt-3">Start Learning</a>
        </div>
    </section>

    <!-- Main Section -->
    <main class="container my-5">
        <!-- 21st Century Skills Section -->
        <section class="py-5 bg-light">
            <div class="container">
                <h2 class="fw-bold text-center mb-5">Developing Essential 21st Century Skills</h2>
                <p class="lead text-center mb-5">At PATS, we focus on crucial skills for the modern workplace:</p>
                <div class="row g-4">
                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-brain feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Critical Thinking</h3>
                                <p class="card-text small">Analyze complex problems and make informed decisions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-comments feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Communication</h3>
                                <p class="card-text small">Express ideas clearly and effectively in various contexts</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-users feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Collaboration</h3>
                                <p class="card-text small">Work effectively in diverse teams and environments</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-lightbulb feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Creativity</h3>
                                <p class="card-text small">Generate innovative ideas and solutions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-laptop-code feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Digital Literacy</h3>
                                <p class="card-text small">Navigate and utilize digital tools effectively</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-chart-bar feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Data Analysis</h3>
                                <p class="card-text small">Interpret and draw insights from complex data sets</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-project-diagram feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Systems Thinking</h3>
                                <p class="card-text small">Understand complex systems and their interconnections</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="card h-100 border-0 shadow-sm hover-card">
                            <div class="card-body text-center">
                                <i class="fas fa-tasks feature-icon modified-text-primary mb-3" style="font-size: 2.5rem;"></i>
                                <h3 class="h5 card-title">Adaptability</h3>
                                <p class="card-text small">Flexibly respond to changing work environments</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section class="features-section py-5 bg-light">
            <div class="container">
                <h2 class="fw-bold text-center mb-5">Why Choose PATS Online Learning?</h2>
                <div class="row justify-content-center">
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up">
                        <div class="feature-card text-center">
                            <div class="feature-icon-circle mb-3 mx-auto d-flex align-items-center justify-content-center">
                                <i class="fas fa-award modified-text-primary"></i>
                            </div>
                            <h3 class="h5 mb-2">TESDA Accredited</h3>
                            <p class="mb-0">Recognized and approved by TESDA, ensuring quality education.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="feature-card text-center">
                            <div class="feature-icon-circle mb-3 mx-auto d-flex align-items-center justify-content-center">
                                <i class="fas fa-laptop modified-text-primary"></i>
                            </div>
                            <h3 class="h5 mb-2">Flexible Learning</h3>
                            <p class="mb-0">Access course materials anytime, anywhere at your own pace.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="feature-card text-center">
                            <div class="feature-icon-circle mb-3 mx-auto d-flex align-items-center justify-content-center">
                                <i class="fas fa-user-graduate modified-text-primary"></i>
                            </div>
                            <h3 class="h5 mb-2">Industry-Ready Skills</h3>
                            <p class="mb-0">Gain practical skills in high demand by employers.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                        <div class="feature-card text-center">
                            <div class="feature-icon-circle mb-3 mx-auto d-flex align-items-center justify-content-center">
                                <i class="fas fa-certificate modified-text-primary"></i>
                            </div>
                            <h3 class="h5 mb-2">Certification</h3>
                            <p class="mb-0">Earn recognized certificates upon course completion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Courses Section -->
        <section class="mb-5" id="courses">
            <h2 class="fw-bold text-center mb-4">Our Online TESDA Courses</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <!-- Course 1 -->
                <div class="col" data-aos="zoom-in">
                    <div class="card h-100">
                        <img src="https://tesdaonlineprogram.com/wp-content/uploads/2023/11/TESDA-ONLINE-PROGRAM-Featured-Image-2023-11-12T063828.586.jpg" class="card-img-top" alt="Tourism Promotion Services">
                        <div class="card-body">
                            <h5 class="card-title">Tourism Promotion Services NC II</h5>
                            <p class="card-text">Online TESDA-certified course for tourism promotion skills.</p>
                        </div>
                    </div>
                </div>
                <!-- Course 2 -->
                <div class="col" data-aos="zoom-in">
                    <div class="card h-100">
                        <img src="https://pats-training.techvochub.com/pluginfile.php/6108/course/summary/Contact%20Center%20Services%20NCII.gif" class="card-img-top" alt="Contact Center Services">
                        <div class="card-body">
                            <h5 class="card-title">Contact Center Services NC II</h5>
                            <p class="card-text">Online TESDA-approved training for contact center professionals.</p>
                        </div>
                    </div>
                </div>
                <!-- Course 3 -->
                <div class="col" data-aos="zoom-in">
                    <div class="card h-100">
                        <img src="https://tesdaonlineprogram.com/wp-content/uploads/2024/05/TESDA-ONLINE-PROGRAM-Featured-Image-2024-05-05T231641.472.jpg" class="card-img-top" alt="Events Management Services">
                        <div class="card-body">
                            <h5 class="card-title">Events Management Services NC III</h5>
                            <p class="card-text">Online TESDA-certified course for events management professionals.</p>
                         
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta-section text-center">
            <h2 class="fw-bold mb-4">Ready to Enhance Your Skills Online?</h2>
            <p class="lead mb-4">Enroll now in our TESDA-certified online courses and develop 21st century skills.</p>
            <a href="registerUsers.php" class="btn btn-primary button-primary btn-lg">Start Your Online Learning Journey</a>
        </section>

        <!-- Testimonials Section -->
        <section class="mb-5">
            <h2 class="fw-bold text-center mb-4">Success Stories from Our Online Learners</h2>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"The online TESDA-certified tourism course at PATS was convenient and comprehensive. It boosted my career in hospitality."</p>
                            <footer class="blockquote-footer">Juan Dela Cruz, Tourism Graduate</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"PATS' online contact center training improved my communication skills and helped me secure a remote job at a top BPO company."</p>
                            <footer class="blockquote-footer">Maria Santos, Contact Center Professional</footer>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">"The flexibility of PATS' online events management course allowed me to balance work and study. Now I have TESDA certification and improved digital skills."</p>
                            <footer class="blockquote-footer">Carlos Reyes, Event Planner</footer>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Section -->
        <section id="faqs">
            <h2 class="fw-bold mb-4">Frequently Asked Questions</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq1">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">
                            How does online learning work at PATS?
                        </button>
                    </h2>
                    <div id="collapse1" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Our online learning platform provides access to TESDA-accredited courses through video lectures, interactive quizzes, and virtual practical exercises. You can learn at your own pace and schedule.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq2">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                            How do I enroll in an online TESDA course?
                        </button>
                    </h2>
                    <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Simply create an account on our learning platform, browse our course catalog, select your desired TESDA-certified course, and complete the online registration process.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="faq3">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            What 21st century skills will I develop?
                        </button>
                    </h2>
                    <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Our courses focus on developing critical 21st century skills including critical thinking, communication, collaboration, creativity, digital literacy, data analysis, systems thinking, and adaptability. These skills are integrated into our TESDA-certified courses to ensure you're prepared for the modern workplace.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-body-secondary text-center text-lg-start text-dark mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4 modified-text-primary">About Us</h5>
                    <p>
                        The Philippine Academy of Technical Studies LMS is dedicated to providing quality education and accessible learning opportunities to all. We offer a variety of technical courses designed to help you succeed.
                    </p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4 modified-text-primary">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-dark text-decoration-none">Home</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Courses</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">About</a></li>
                        <li><a href="#" class="text-dark text-decoration-none">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4 modified-text-primary">Contact Information</h5>
                    <p><i class="fa-solid fa-envelope me-2 modified-text-primary"></i>patscabanatuan@gmail.com</p>
                    <p><i class="fa-solid fa-phone me-2 modified-text-primary"></i>(+63) 935 813 2269</p>
                    <p><i class="fa-solid fa-location-dot me-2 modified-text-primary"></i>Soriano St. Aduas Norte, Cabanatuan City, Philippines</p>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase fw-bold mb-4 modified-text-primary">Follow Us</h5>
                    <a href="https://www.facebook.com/profile.php?id=61559072692153&paipv=0&eav=AfZgotNxY5aWML2f_ZaNmoAOTfbPjw-OWxi76pYAR0WZRoFMGu7n6IKoS7gVBGhw_Cg" class=" me-4 btn btn-primary button-primary"><i class="fab fa-facebook-f modified-text-color "></i></a>
                </div>
            </div>
        </div>
        <div class="text-center p-3 text-white modified-bg-primary">
            © 2024 Philippine Academy of Technical Studies. All rights reserved.
        </div>
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            offset: 120,
            delay: 0,
            duration: 1200,
            easing: "ease",
            once: false,
            mirror: false,
            anchorPlacement: "top-bottom",
        });

        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section[id]');
            const navItems = document.querySelectorAll('.navbar-nav .nav-link');

            function highlightNavigation() {
                let scrollY = window.pageYOffset;
                let pageBottom = scrollY + window.innerHeight;
                let documentHeight = document.documentElement.scrollHeight;

                sections.forEach((current, index) => {
                    const sectionHeight = current.offsetHeight;
                    const sectionTop = current.offsetTop - 100; // Adjust for header height
                    const sectionId = current.getAttribute('id');

                    if (
                        (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) ||
                        (index === sections.length - 1 && pageBottom >= documentHeight - 50) // Check if it's the last section and we're near the bottom
                    ) {
                        navItems.forEach(item => {
                            item.classList.remove('active');
                            if (item.getAttribute('href').substring(1) === sectionId) {
                                item.classList.add('active');
                            }
                        });
                    }
                });
            }

            window.addEventListener('scroll', highlightNavigation);
            highlightNavigation(); // Call once to set initial state

            // Add click event listeners to smooth scroll to sections
            navItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetSection = document.getElementById(targetId);
                    if (targetSection) {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });
        });
    </script>
</body>
</html>

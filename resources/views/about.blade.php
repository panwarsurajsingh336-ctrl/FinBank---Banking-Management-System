
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>About Us - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('nav')     

    <!-- About Section Start -->
    <section class="about-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="about-box">

                        <h1 class="text-center main-heading">
                            About FinBank
                        </h1>

                        <p class="text-center lead mb-5">
                            Trusted Banking Solutions for Your Secure Financial Future.
                        </p>

                        <div class="row">

                            <div class="col-md-6">

                                <h3>Who We Are</h3>

                                <p>
                                    FinBank is a modern banking institution
                                    dedicated to providing secure, fast, and reliable
                                    financial services for individuals and businesses.
                                </p>

                                <p>
                                    We combine advanced technology with customer-focused
                                    banking solutions to make digital banking simple,
                                    secure, and accessible for everyone.
                                </p>

                            </div>

                            <div class="col-md-6">

                                <h3>Our Mission</h3>

                                <p>
                                    Our mission is to deliver trusted banking services
                                    with transparency, innovation, and excellence while
                                    helping customers achieve their financial goals.
                                </p>

                                <p>
                                    We aim to provide a seamless banking experience
                                    through online banking, secure fund transfers,
                                    loan management, and 24/7 customer support.
                                </p>

                            </div>

                        </div>

                        <!-- Services Section -->
                        <div class="services-section">

                            <h2 class="text-center mb-4">
                                Our Services
                            </h2>

                            <div class="row g-4">

                                <div class="col-md-4">

                                    <div class="card service-card h-100">

                                        <div class="card-body text-center">

                                            <h4 class="service-title">
                                                Savings Account
                                            </h4>

                                            <p>
                                                Safe and flexible savings accounts with
                                                secure online banking facilities.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card service-card h-100">

                                        <div class="card-body text-center">

                                            <h4 class="service-title">
                                                Online Banking
                                            </h4>

                                            <p>
                                                Manage your banking services anytime,
                                                anywhere with our digital platform.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="card service-card h-100">

                                        <div class="card-body text-center">

                                            <h4 class="service-title">
                                                Loan Services
                                            </h4>

                                            <p>
                                                Affordable and quick loan solutions
                                                designed for your financial growth.
                                            </p>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <!-- Button -->
                        <div class="text-center mt-5">

                            <a href="#" class="btn custom-btn">
                                Learn More
                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

</body>
</html>

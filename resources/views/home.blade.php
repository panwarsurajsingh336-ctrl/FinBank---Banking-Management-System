
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('nav')

    <!-- Hero Section Start -->
    <section class="hero-section">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-lg-6">

                    <h1 class="hero-title">
                        Secure Banking For Your Bright Future
                    </h1>

                    <p class="hero-text">
                        Welcome to FinBank where security,
                        trust, and innovation come together to provide
                        modern banking solutions for everyone.
                    </p>

                    <a href="#" class="btn hero-btn">
                        Open Account
                    </a>

                </div>

                <div class="col-lg-6 text-center">

                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f"
                         class="img-fluid hero-image"
                         alt="Bank Image">

                </div>

            </div>

        </div>

    </section>
    <!-- Hero Section End -->


    <!-- Services Section Start -->
    <section class="services py-5">

        <div class="container">

            <div class="text-center mb-5">

                <h2 class="section-title">
                    Our Banking Services
                </h2>

                <p>
                    Fast, secure, and reliable banking services.
                </p>

            </div>

            <div class="row g-4">

                <div class="col-md-4">

                    <div class="card service-card h-100">

                        <div class="card-body text-center">

                            <h3 class="service-title">
                                Savings Account
                            </h3>

                            <p>
                                Keep your money safe with secure
                                and flexible savings accounts.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card service-card h-100">

                        <div class="card-body text-center">

                            <h3 class="service-title">
                                Online Banking
                            </h3>

                            <p>
                                Access your account anytime and
                                anywhere with digital banking.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="col-md-4">

                    <div class="card service-card h-100">

                        <div class="card-body text-center">

                            <h3 class="service-title">
                                Loan Services
                            </h3>

                            <p>
                                Easy and affordable loans for
                                personal and business needs.
                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Services Section End -->


    <!-- Footer Start -->
    <footer class="footer">

        <div class="container text-center">

            <p class="mb-0">
                © 2026 FinBank | All Rights Reserved
            </p>

        </div>

    </footer>
   
</body>
</html>

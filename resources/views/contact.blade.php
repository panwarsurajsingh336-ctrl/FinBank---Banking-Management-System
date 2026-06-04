<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact Us - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('nav')

    <!-- Contact Section Start -->
    <section class="contact-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="contact-box">

                        <div class="text-center mb-5">

                            <h1 class="contact-title">
                                Contact Us
                            </h1>

                            <p class="contact-text">
                                We are here to help you with your banking needs.
                            </p>

                        </div>

                        <div class="row">

                            <!-- Contact Information -->
                            <div class="col-md-5">

                                <div class="info-box">

                                    <h3 class="mb-4">
                                        Get In Touch
                                    </h3>

                                    <p>
                                        <strong>Address:</strong><br>
                                        FinBank,<br>
                                        karanpru Dehradun, Uttrakhand, India
                                    </p>

                                    <p>
                                        <strong>Phone:</strong><br>
                                        +91 9876543210
                                    </p>

                                    <p>
                                        <strong>Email:</strong><br>
                                        support@finbank.com
                                    </p>

                                    <p>
                                        <strong>Working Hours:</strong><br>
                                        Monday - Saturday<br>
                                        9:00 AM - 6:00 PM
                                    </p>

                                </div>

                            </div>

                            <!-- Contact Form -->
                            <div class="col-md-7">

                                <form>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Full Name
                                        </label>

                                        <input type="text" class="form-control" placeholder="Enter your name">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Email Address
                                        </label>

                                        <input type="email" class="form-control" placeholder="Enter your email">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Subject
                                        </label>

                                        <input type="text" class="form-control" placeholder="Enter subject">

                                    </div>

                                    <div class="mb-3">

                                        <label class="form-label">
                                            Message
                                        </label>

                                        <textarea class="form-control" rows="5" placeholder="Write your message"></textarea>

                                    </div>

                                    <button type="submit" class="btn contact-btn">
                                        Send Message
                                    </button>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Contact Section End -->


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
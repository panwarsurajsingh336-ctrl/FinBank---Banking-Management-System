<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - FinBank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @include('nav')

    <!-- Login Section Start -->
    <section class="login-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-6">

                    <div class="login-box">

                        <div class="text-center mb-5">

                            <h1 class="login-title">
                                Login
                            </h1>

                            <p class="login-text">
                                Access your FinBank account securely.
                            </p>

                        </div>

                        @if(!empty($message))
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @endif

                        <form method="GET">

                            <div class="mb-4">

                                <label class="form-label">
                                    Account Number
                                </label>

                                <input
                                    type="text"
                                    name="ac"
                                    class="form-control"
                                    placeholder="Enter account number"
                                    required>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    PIN
                                </label>

                                <input
                                    type="password"
                                    name="pin"
                                    class="form-control"
                                    placeholder="Enter PIN"
                                    required>

                            </div>

                            <div class="text-center mt-4">

                                <button
                                    type="submit"
                                    name="submit"
                                    value="submit"
                                    class="btn login-btn">

                                    Login

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!-- Footer Start -->
    <footer class="footer">

        <div class="container text-center">

            <p class="mb-0">
                &copy; 2026 FinBank | All Rights Reserved
            </p>

        </div>

    </footer>
</body>
</html>

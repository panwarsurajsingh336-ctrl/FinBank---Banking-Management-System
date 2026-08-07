<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Withdraw Money - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>

    @include('nav')

    <!-- Withdraw Section Start -->
    <section class="withdraw-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="withdraw-box">

                        <div class="text-center mb-5">

                            <h1 class="withdraw-title">
                                Withdraw Money
                            </h1>

                            <p class="withdraw-text">
                                Securely withdraw money from your account.
                            </p>

                        </div>

                        <!-- Withdraw Form Start -->
                        <form method="GET">

                            @if (!empty($message))
                                <div class="alert alert-info">
                                    {{ $message }}

                                    @if (isset($balance))
                                        <br>
                                        Current Balance: ₹{{ number_format($balance, 2) }}
                                    @endif
                                </div>
                            @endif

                        

                            <div class="mb-4">

                                <label class="form-label">
                                    Withdraw Amount
                                </label>

                                <input
                                    type="number"
                                    class="form-control"
                                    name="amount"
                                    placeholder="Enter Amount"
                                    required>

                            </div>

                            <div class="text-center mt-4">

                                <button
                                    type="submit"
                                    class="btn withdraw-btn"
                                    name="submit"
                                    value="submit">
                                    Withdraw Now
                                </button>

                            </div>

                        </form>
                        <!-- Withdraw Form End -->

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Withdraw Section End -->

    <!-- Footer Start -->
    <footer class="footer">

        <div class="container text-center">

            <p class="mb-0">
                © 2026 FinBank | All Rights Reserved
            </p>

        </div>

    </footer>
    <!-- Footer End -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

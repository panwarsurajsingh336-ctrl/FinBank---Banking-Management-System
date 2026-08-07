<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Fund Transfer - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>

<body>

    @include('nav')

    <!-- Fund Transfer Section Start -->
    <section class="transfer-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="transfer-box">

                        <div class="text-center mb-5">

                            <h1 class="transfer-title">
                                Fund Transfer
                            </h1>

                            <p class="transfer-text">
                                Transfer money securely and instantly.
                            </p>

                        </div>

                        <!-- Message -->
                        @if(!empty($message))
                        <div class="alert alert-success">
                            {{ $message }}

                            @if(isset($balance))
                            <br>
                            Your Current Balance is ₹{{ number_format($balance, 2) }}
                            @endif
                        </div>
                        @endif
                        <!-- Transfer Form Start -->
                        <form method="GET">

                            <div class="mb-4">

                                <label class="form-label">
                                    Receiver Account Number
                                </label>

                                <input
                                    type="text"
                                    name="toac"
                                    class="form-control"
                                    placeholder="Enter receiver account number"
                                    required>

                            </div>

                            <div class="mb-4">

                                <label class="form-label">
                                    Transfer Amount
                                </label>

                                <input
                                    type="number"
                                    name="amount"
                                    class="form-control"
                                    placeholder="Enter amount"
                                    required>

                            </div>

                            <div class="text-center mt-4">

                                <button
                                    type="submit"
                                    class="btn transfer-btn"
                                    name="submit"
                                    value="submit">
                                    Transfer Now
                                </button>

                            </div>

                        </form>
                        <!-- Transfer Form End -->

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Fund Transfer Section End -->

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

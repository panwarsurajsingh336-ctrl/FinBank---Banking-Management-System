<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Deposit Money - FinBank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('nav')

    <!-- Deposit Section Start -->
    <section class="deposit-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-7">

                    <div class="deposit-box">

                        <div class="text-center mb-5">

                            <h1 class="deposit-title">
                                Deposit Money
                            </h1>

                            <p class="deposit-text">
                                Securely deposit money into your account.
                            </p>

                        </div>

                        <!-- Deposit Form Start -->
                        <form>
                            @if (!empty($message))
                                <div class="alert alert-info">
                                    {{ $message }}
                                    @if (isset($balance))
                                        <br>Current Balance: {{ number_format($balance, 2) }}
                                    @endif
                                </div>
                            @endif


                            <div class="mb-4">

                                <label class="form-label">
                                    Deposit Amount
                                </label>

                                <input type="number" class="form-control" name="amount" min="1" step="0.01" placeholder="Enter amount" required>

                            </div>

                            <div class="text-center mt-4">

                                <button type="submit" class="btn deposit-btn" name="submit" value="submit">
                                    Deposit Now
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
                © 2026 FinBank | All Rights Reserved
            </p>

        </div>

    </footer>

</body>

</html>

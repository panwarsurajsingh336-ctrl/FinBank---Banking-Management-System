<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Balance Inquiry - FinBank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('nav')

<section class="balance-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7">

                <div class="balance-box">

                    <div class="text-center mb-5">

                        <h1 class="balance-title">
                            Balance Inquiry
                        </h1>

                        <p class="balance-text">
                            Check your account balance securely and instantly.
                        </p>

                    </div>

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


                        <div class="text-center mt-4">

                            <button
                                type="submit"
                                class="btn balance-btn"
                                name="submit"
                                value="submit">
                                Check Balance
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</section>

<footer class="footer">

    <div class="container text-center">

        <p class="mb-0">
            © 2026 FinBank | All Rights Reserved
        </p>

    </div>

</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
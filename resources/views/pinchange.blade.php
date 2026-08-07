<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>PIN Change - FinBank</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>

@include('nav')

<section class="pin-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6">

                <div class="pin-box">

                    <div class="text-center mb-5">

                        <h1 class="pin-title">
                            Change Your PIN
                        </h1>

                        <p class="pin-text">
                            Update your ATM or account PIN securely.
                        </p>

                    </div>

                    @if(!empty($message))
                        <div class="alert alert-info">
                            {{ $message }}
                        </div>
                    @endif

                    <form method="GET">

                       
                        <div class="mb-4">

                            <label class="form-label">
                                Current PIN
                            </label>

                            <input
                                type="password"
                                name="oldpin"
                                class="form-control"
                                placeholder="Enter current PIN"
                                required>

                        </div>

                        <div class="mb-4">

                            <label class="form-label">
                                New PIN
                            </label>

                            <input
                                type="password"
                                name="newpin"
                                class="form-control"
                                placeholder="Enter new PIN"
                                required>

                        </div>

                        <div class="text-center mt-4">

                            <button
                                type="submit"
                                class="btn pin-btn"
                                name="submit"
                                value="submit">
                                Change PIN
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    @include('nav')

    <!-- Create Account Section Start -->
    <section class="account-section py-5">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-8">

                    <div class="account-box">

                        <div class="text-center mb-5">

                            <h1 class="account-title">
                                Create Your Account
                            </h1>

                            <p class="account-text">
                                Open your bank account in just a few simple steps.
                            </p>

                        </div>

                        <form >
                            @if (!empty($message))
                                <div class="alert alert-info">
                                    {{ $message }}
                                </div>
                            @endif

                            @csrf

                            <!-- Name & Father's Name -->
                            
                               
                                <div class=" mb-4">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name"
                                        placeholder="Enter your name">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">Father's Name</label>
                                    <input type="text" class="form-control" name="fname"
                                        placeholder="Enter father's name">
                                </div>


                            <!-- Email -->
                            <div class="mb-4">
                                <label class="form-label">Email Address</label>
                                <input type="email" class="form-control" name="email"
                                    placeholder="Enter email address">
                            </div>

                            <!-- Phone -->
                            <div class="mb-4">
                                <label class="form-label">Phone Number</label>
                                <input type="text" class="form-control" name="phno"
                                    placeholder="Enter phone number">
                            </div>

                             <div class=" mb-4">
                                    <label class="form-label">Pin</label>
                                    <input type="text" class="form-control" name="pin"
                                        placeholder="Enter your pin">
                                </div>


                            <!-- Gender -->
                            <div class="mb-4">
                                <label class="form-label">Gender</label>

                                <select class="form-select" name="gender">
                                    <option value="">Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>

                            <!-- Country & State -->
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Country</label>
                                    <input type="text" class="form-control" name="country"
                                        placeholder="Enter country">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">State</label>
                                    <input type="text" class="form-control" name="state"
                                        placeholder="Enter state">
                                </div>

                            </div>

                            <!-- City & Amount -->
                            <div class="row">

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">City</label>
                                    <input type="text" class="form-control" name="city"
                                        placeholder="Enter city">
                                </div>

                                <div class="col-md-6 mb-4">
                                    <label class="form-label">Amount</label>
                                    <input type="number" class="form-control" name="amount"
                                        placeholder="Enter amount">
                                </div>

                            </div>

                            <!-- Submit Button -->
                            <div class="text-center mt-4">

                                <button type="submit" class="btn create-btn" name="submit" value="submit">
                                    Create Account
                                </button>

                            </div>

                        </form>
                        <!-- Form End -->

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Create Account Section End -->

    <!-- Footer Start -->
    <footer class="footer py-3">

        <div class="container text-center">

            <p class="mb-0">
                © 2026 FinBank | All Rights Reserved
            </p>

        </div>

    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>

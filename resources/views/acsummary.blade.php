<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Account Summary - FinBank</title>

    <!-- Bootstrap 5.1.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v={{ filemtime(public_path('css/style.css')) }}">
</head>
<body>
    @include('nav')

    <!-- Account Summary Section Start -->
    <section class="summary-section">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-lg-10">

                    <div class="summary-box">

                        <div class="text-center mb-5">

                            <h1 class="summary-title">
                                Account Summary
                            </h1>

                            <p class="summary-text">
                                View your account details.
                            </p>

                        </div>

                        <form method="GET" class="mb-5">

                            @if (!empty($message))
                                <div class="alert alert-info">
                                    {{ $message }}
                                </div>
                            @endif

                           

                            <div class="text-center mt-4">

                                <button
                                    type="submit"
                                    class="btn summary-btn"
                                    name="submit"
                                    value="submit">
                                    View Summary
                                </button>

                            </div>

                        </form>

                        @if (!empty($account))
                            <!-- Account Information -->
                            <div class="row g-4 mb-5">

                                <div class="col-md-4">

                                    <div class="summary-card">

                                        <h5>Account Holder</h5>

                                        <h3>{{ $account->name }}</h3>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="summary-card">

                                        <h5>Account Number</h5>

                                        <h3>{{ $account->acn }}</h3>

                                    </div>

                                </div>

                                <div class="col-md-4">

                                    <div class="summary-card">

                                        <h5>Available Balance</h5>

                                        <h3>Rs. {{ number_format((float) $account->amount, 2) }}</h3>

                                    </div>

                                </div>

                            </div>

                            <!-- Account Details Table -->
                            <div class="table-responsive">

                                <table class="table table-hover align-middle">

                                    <thead class="table-primary">

                                        <tr>

                                            <th>Field</th>
                                            <th>Value</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>
                                            <td>Father's Name</td>
                                            <td>{{ $account->fname }}</td>
                                        </tr>

                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $account->email }}</td>
                                        </tr>

                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $account->phno }}</td>
                                        </tr>

                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ $account->gender }}</td>
                                        </tr>

                                        <tr>
                                            <td>Country</td>
                                            <td>{{ $account->country }}</td>
                                        </tr>

                                        <tr>
                                            <td>State</td>
                                            <td>{{ $account->state }}</td>
                                        </tr>

                                        <tr>
                                            <td>City</td>
                                            <td>{{ $account->city }}</td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                            <!-- Transaction History Table -->
                            <div class="table-responsive mt-5">

                                <table class="table table-hover align-middle">

                                    <thead class="table-primary">

                                        <tr>

                                            <th>Date</th>
                                            <th>Transaction ID</th>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Remarks</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        @forelse ($transactions ?? [] as $t)
                                            <tr>
                                                <td>{{ $t->created_at }}</td>
                                                <td>{{ $t->id }}</td>
                                                <td>{{ $t->transaction_type }}</td>
                                                <td>Rs. {{ number_format((float) $t->amount, 2) }}</td>
                                                <td>{{ $t->remarks }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No transactions found.
                                                </td>
                                            </tr>
                                        @endforelse

                                    </tbody>

                                </table>

                            </div>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    </section>
    <!-- Account Summary Section End -->

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

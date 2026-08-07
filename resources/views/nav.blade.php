<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-xl navbar-dark custom-navbar">
    <div class="container-fluid px-3 px-lg-4">

        <a class="navbar-brand fw-bold" href="/">
            FinBank
        </a>

        <button class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

            <ul class="navbar-nav align-items-xl-center ms-auto mb-2 mb-xl-0">

                <li class="nav-item">
                    <a class="nav-link" href="/">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/about">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/contact">
                        Contact
                    </a>
                </li>

                @if(!session()->has('acn'))

                    <li class="nav-item">
                        <a class="nav-link" href="/createac">
                            Create Account
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/login">
                            Login
                        </a>
                    </li>

                @endif


                @if(session()->has('acn'))

                    <li class="nav-item">
                        <span class="nav-link text-warning fw-bold">
                            Welcome, {{ session('name') }}
                        </span>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/deposit">
                            Deposit
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/withdraw">
                            Withdraw
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/fundtransfer">
                            Fund Transfer
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/balanceinq">
                            Balance Inquiry
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/pinchange">
                            PIN Change
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/acsummary">
                            Account Summary
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link text-danger fw-bold" href="/logout">
                            Logout
                        </a>
                    </li>

                @endif

            </ul>

        </div>

    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
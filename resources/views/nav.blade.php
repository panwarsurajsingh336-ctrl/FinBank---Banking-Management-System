<nav class="navbar navbar-expand-xl navbar-dark custom-navbar" aria-label="Primary navigation">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}" aria-label="FinBank home">
            <img src="{{ asset('images/logo/finbank-logo-light.svg') }}" alt="FinBank" width="158" height="40">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#finbankNav" aria-controls="finbankNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="finbankNav">
            <ul class="navbar-nav ms-auto align-items-xl-center">
                <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/accounts') }}">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/cards') }}">Cards</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/loans') }}">Loans</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/offers') }}">Offers</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li>
                @if(session()->has('acn'))
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle user-menu" href="#" role="button" data-bs-toggle="dropdown">{{ session('name') }}</a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ url('/acsummary') }}">Account summary</a></li>
                            <li><a class="dropdown-item" href="{{ url('/balanceinq') }}">Balance</a></li>
                            <li><a class="dropdown-item" href="{{ url('/deposit') }}">Deposit</a></li>
                            <li><a class="dropdown-item" href="{{ url('/withdraw') }}">Withdraw</a></li>
                            <li><a class="dropdown-item" href="{{ url('/fundtransfer') }}">Transfer funds</a></li>
                            <li><a class="dropdown-item" href="{{ url('/pinchange') }}">Change PIN</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="{{ url('/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item ms-xl-2"><a class="btn btn-outline-light nav-action" href="{{ url('/login') }}">Login</a></li>
                    <li class="nav-item ms-xl-2"><a class="btn btn-accent nav-action" href="{{ url('/createac') }}">Open account</a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

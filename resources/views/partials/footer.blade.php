<footer class="site-footer">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <a class="footer-brand" href="{{ url('/') }}">
                    <img src="{{ asset('images/logo/finbank-logo-light.svg') }}" alt="FinBank" width="166" height="42">
                </a>
                <p class="mt-3">Modern banking experiences designed around clarity, security and everyday financial goals.</p>
            </div>
            <div class="col-6 col-lg-2"><h2>Explore</h2><a href="{{ url('/about') }}">About</a><a href="{{ url('/careers') }}">Careers</a><a href="{{ url('/contact') }}">Contact</a></div>
            <div class="col-6 col-lg-2"><h2>Products</h2><a href="{{ url('/accounts') }}">Accounts</a><a href="{{ url('/cards') }}">Cards</a><a href="{{ url('/loans') }}">Loans</a></div>
            <div class="col-6 col-lg-2"><h2>Support</h2><a href="{{ url('/digital-banking') }}">Digital banking</a><a href="{{ url('/security') }}">Security</a><a href="{{ url('/contact') }}">Help</a></div>
            <div class="col-6 col-lg-2"><h2>Legal</h2><a href="{{ url('/security') }}">Privacy</a><a href="{{ url('/security') }}">Terms</a><a href="{{ url('/offers') }}">Featured offers</a></div>
        </div>
        <div class="footer-bottom"><span>© {{ date('Y') }} FinBank. All rights reserved.</span><span>Modern banking. Thoughtfully designed.</span></div>
    </div>
</footer>

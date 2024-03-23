<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 fixed-top">
    <a class="navbar-brand" href="#" style="font-size: 1.5em; font-weight: bold;">{{ config('app.name', 'LSP Fauzi') }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">Admin</a>
            </li>
        </ul>
    </div>
</nav>
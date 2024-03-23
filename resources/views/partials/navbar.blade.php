<nav class="navbar navbar-expand-lg navbar-light bg-light p-3">
    <a class="navbar-brand" href="#">{{ config('app.name', 'LSP Fauzi') }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}">
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">Admin</a>
            </li>
        </ul>
    </div>
</nav>
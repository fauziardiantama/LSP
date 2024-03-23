<nav class="navbar navbar-expand-lg navbar-dark bg-primary p-3 fixed-top"> <!-- Navbar dengan background biru dan posisi fixed-top -->
    <a class="navbar-brand" href="#" style="font-size: 1.5em; font-weight: bold;">{{ config('app.name', 'LSP Fauzi') }}</a> <!-- Link brand navbar -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <!-- Tombol toggler untuk layar kecil -->
        <span class="navbar-toggler-icon"></span> <!-- Ikon toggler -->
    </button>
    <div class="collapse navbar-collapse" id="navbarNav"> <!-- Kontainer untuk item navbar -->
        <ul class="navbar-nav ml-auto"> <!-- List item navbar -->
            <li class="nav-item {{ Request::is('/') ? 'active' : '' }}"> <!-- Item Home -->
                <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a> <!-- Link ke Home -->
            </li>
            <li class="nav-item {{ Request::is('admin') ? 'active' : '' }}"> <!-- Item Admin -->
                <a class="nav-link {{ Request::is('admin') ? 'active' : '' }}" href="{{ url('/admin') }}">Admin</a> <!-- Link ke Admin -->
            </li>
        </ul>
    </div>
</nav>
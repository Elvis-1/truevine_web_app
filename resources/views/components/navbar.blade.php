<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('/img/Rccg.png') }} " width='40' height='40' alt="logo" class="d-inline-block align-text-center">
        {{-- <img src="img/Rccg.png" width="40" height="40" alt="logo" class="d-inline-block align-text-center"> --}}
        TRUE VINE PARISH
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="/">HOME</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="/login">LOGIN</a>
          </li> --}}
          @auth('admin')
          <li class="nav-item">
            <a class="nav-link" href="/generate_link">Generate Link</a>
          </li>
          @endauth
          <li class="nav-item">
            <a class="nav-link" href="/youth">YOUTH CORNER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/gallery">GALLERY</a>
          </li>
          @auth('admin')
          <li class="nav-item mt-2">
            <a class="link" href="/add_member">NEW MEMBER</a>
          </li>
          @endauth

        </ul>
      </div>
    </div>
  </nav>

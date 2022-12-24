<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="gallery.css"> --}}
    @vite(['resources/css/gallery.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>TRUE VINE</title>
</head>
<body>
  <!-- <nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="index.html">
        <img src="img/Rccg.png" width="40" height="40" alt="logo" class="d-inline-block align-text-center">
        TRUE VINE PARISH
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.html">HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="admin.html">ADMIN</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="youth.html">YOUTH CORNER</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="gallery.html">GALLERY</a>
          </li>
          <li class="nav-item mt-2">
            <a class="link" href="sign.html">NEW MEMBER</a>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->
  <x-navbar/>
  <!-- gallery -->

  <section class="gallery">
    <div class="container-fluid">
        <h3 class="text-center p-4">YOUTH GALLERY</h3>
        <div class="row">
            <div class="coloumn">
                <img src={{ Vite::asset("resources/img/Rectangle18.png") }} width="420" height="400" alt="">
                <img src={{ Vite::asset("resources/img/Rectangle20.png") }}  width="420"  alt="">
                <img src={{ Vite::asset("resources/img/Rectangle21.png") }}  width="420" alt="">
            </div>
            <div class="row">
            <div class="coloumn">
                <img src="img/Rectangle 25 (1).png" width="420" alt="">
                <img src="img/Rectangle 18.png" width="420" alt="">
                <img src="img/Rectangle 26.png"  width="420" alt="">
            </div>
        </div>
            <div class="row">
            <div class="coloumn">
                <img src="img/Rectangle 24.png" width="420" alt="">
                <img src="img/youth card.jpg" width="420" alt="">
                <img src="img/youyh.jpeg"  width="420" alt="">
            </div>
        </div>
        </div>
    </div>
  </section>

  <x-foot/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

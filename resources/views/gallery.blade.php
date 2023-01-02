<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/gallery.css">
    {{-- @vite(['resources/css/gallery.css']) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>TRUE VINE</title>
</head>
<body>
  <x-navbar/>
  <!-- gallery -->

  <section class="gallery">
    <div class="container-fluid">
        <h3 class="text-center p-4">YOUTH GALLERY</h3>
        <div class="row">
            <div class="coloumn">
                <img src={{ asset("/img/gallery1.jpg") }} width="420" alt="">
                <img src={{ asset("/img/gallery2.jpg") }}  width="420"  alt="">
                <img src={{ asset("/img/gallery3.jpg") }}  width="420" alt="">
                <img src={{ asset("/img/youthcard2(8).jpg") }}  width="420" alt="">
                <img src={{ asset("/img/youthcard2(9).jpg") }}  width="420" alt="">
            </div>

            <div class="row">

            </div>
            <div class="row">
            {{-- <div class="coloumn">
                <img src="img/Rectangle 24.png" width="420" alt="">
                <img src="img/youth card.jpg" width="420" alt="">
                <img src="img/youyh.jpeg"  width="420" alt="">
            </div> --}}
        </div>
        </div>
    </div>
  </section>

  <x-foot/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

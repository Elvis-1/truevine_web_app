<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    @vite(['resources/css/style.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <title>TRUE VINE</title>
</head>
<body>
    <x-navbar/>
    {{-- @component('components.layout')
    @endcomponent --}}
  <section class="showcase">
    <div class="mask h-100" style="background-color: rgba(0,0,0,0.6)">
    <div class="show">
    <div class="container">
    <div class="justify-content-center align-items-center">
            <h2 class="text-center">DYNAMIC YOUTH</h2>
            <p class="text-center">WELCOME TO JESUS HOUSE
              CONNECT WITH OUR YOUTH MINISTRY</p>
              <div class="text-center">
                <a href="/youth">KNOW MORE</a>
    </div>
  </div>
      </div>
      </div>
    </div>
  </section>

<x-foot/>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>

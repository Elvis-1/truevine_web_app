<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    @vite(['resources/css/main.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>TRUE VINE</title>
</head>
<body>
    <x-navbar/>

  <section class="sign">
    <div class="mask h-100" style="background-color: rgba(0,0,0,0.6)">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">

            <form action="/login" method="POST">
                @csrf
              <div class="info">
              <h2 class="mb-4">LOGIN</h2>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
               @endif
              <div class="form-group">
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Email address</label>
                  <input type="email" name="email" value="{{old('email')}}" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">Passord</label>
                  <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="******">
                </div>
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember me
              </div>
              <button class="btn btn-dark mb-3 mt-3">LOG IN</button>
            </div>
            </form>
            <br>
          </div>
        </div>
      </div>
</div>
  </section>
  <x-foot/>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>



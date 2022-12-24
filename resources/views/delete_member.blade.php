
{{-- @if (!auth('adim'))

@endif --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="sign.css"> --}}
    @vite('resources/css/sign.css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>TRUE VINE</title>
</head>
<body>
<x-navbar/>
  <section class="oct">
    <div class="mask h-100" style="background-color: rgba(0,0,0,0.6)">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            @if (session('status'))
            <div class="alert alert-danger">
                {{session('status')}}
            </div>
        @endif
            <form action="/delete/{{$user->user_id}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="info">
              <h2 class="mb-4">Delete MEMBER?</h2>
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
               @endif
               @isset($user)


              <div class="form-group">
                <div class="mb-3">
                 <p class="leading">{{$user->first_name}} {{$user->last_name}}</p>
                </div>
                <div class="mb-3">
                    {{$user->email}}
                    <input type="hidden" value="{{$user->user_id}}">
                </div>
              </div>
              @endisset


              <button class="btn btn-dark mb-3 mt-3">Delete</button>
              {{-- <a type="button" class="btn btn-dark mb-3 mt-3" >ADD</a> --}}

              <a href="/youth" class="btn btn-dark mb-3 mt-3">Cancel</a>
            </div>
            </form>

          </div>
        </div>
      </div>
</div>
  </section>
<x-foot/>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


<!-- <section class="banner"></section>
<script type="text/javascript">
  window.addEventListener("scroll",function(){
    var nav = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY & 0)
  })
</script> -->


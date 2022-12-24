
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="sign.css"> --}}
    @vite(['resources/css/sign.css',])
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
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
            <form  enctype="multipart/form-data">
                @csrf
              <div class="info">
              <h2 class="mb-4">Generated Link</h2>
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
                @isset($link)
                <div class="mb-3">
                    <input type="text" readonly name="link" value="{{$link}}" class="form-control" id="link" placeholder="Link">
                </div>
                <div class="mb-3">
                   <span id="copy" style="color: green"></span>
                </div>
                @endisset

              </div>

              @auth('admin')
              {{-- <input onclick="return doValidate();" class ="btn btn-success mb-3" value="Add"> --}}
              <button onclick="return copyText();" class="btn btn-dark mb-3 mt-3">Copy</button>
              <a href="/youth" type="button" class="btn btn-dark mb-3 mt-3" >CANCEL</a>
              @endauth

            </div>
            </form>
          </div>
        </div>
      </div>
</div>
  </section>
<x-foot/>

{{-- <script>
    function validate()
    {
        alert("Copied the text: " + copyText.value);
    }
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
<script>
    function copyText() {

  // Get the text field
  var copyText = document.getElementById("link");

  // Select the text field
  copyText.select();
  copyText.setSelectionRange(0, 99999); // For mobile devices

   // Copy the text inside the text field
  navigator.clipboard.writeText(copyText.value);

  // Alert the copied text
  document.getElementById('copy').innerHTML = 'Copied!';
  return;
//   alert("Copied the text: " + copyText.value);
}

 </script>
</html>


<!-- <section class="banner"></section>
<script type="text/javascript">
  window.addEventListener("scroll",function(){
    var nav = document.querySelector("nav");
    header.classList.toggle("sticky", window.scrollY & 0)
  })
</script> -->


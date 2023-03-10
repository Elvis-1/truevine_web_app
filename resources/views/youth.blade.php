<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/youth.css">
    {{-- @vite(["resources/css/youth.css"]) --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>TRUE VINE</title>
</head>
<body>
    <x-navbar/>

  <!-- section-body -->

  <section class="corner">
    <div class="mask h-100" style="background-color: rgba(0,0,0,0.6)">
      <div class="container">

        <div class="form">
          <form id="search" action="/search" method="get">
           <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="Search for member">
         </form>
        </div>
  {{-- flash message --}}
  <div class="row">
    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
@endif
         <div class="row">
        {{-- <div class="col-md-3 ">
          <div class="card">
            <img src={{ Vite::asset("resources/img/Rectangle20.png")}}  height="400" class="card-img-top" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>Bro. John Nwadia</h5>
              <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
            </div>
            </div>
          </div>
        </div> --}}
        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title mx-5 fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="coloumn">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal  my-5" alt="">
              </div>
              <div class="colounm">
                <div class="text">
                <h5>Name:</h5>
               <p>John</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- when search form is used --}}
        @isset($found_users)

        {{-- code for if there is no searched user --}}
         @if (!count($found_users) > 0)
        <div class="col-md-3">
          <div class="card">
            <img src="images/place.jpg" class="card-img-top" height="200" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>No User</h5>
              <a href="/youth" class="btn">Back</a>
            </div>
            </div>
          </div>
        </div>
        @endif

     {{-- if there is searched user --}}
       @foreach ($found_users as $found_user)
       <div class="col-md-3 ">
        <div class="card">
            @if ($found_user->photo  ==''|| empty($found_user->photo))
            <img src="{{asset("images/place.jpg")}}"   class="card-img-top" alt="...">
            @else
            <img src="{{ asset($found_user->photo)}} "   class="card-img-top" alt="...">
            @endif
          <div class="card-body text-center">
            <div class="card-body">
              <h5>{{$found_user->first_name}} {{$found_user->last_name}}</h5>
            <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$found_user->user_id}}">View</a>
          </div>
          </div>
        </div>
      </div>
        <!-- button tigger modal for searched user-->

        <div class="modal fade" id="staticBackdrop{{$found_user->user_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($found_user->photo  ==''|| empty($found_user->photo))
                    <img src="{{asset("images/place.jpg")}}"  width="190px"  height="170px" class="image-modal" alt="...">
                    @else
                    <img src="{{ asset($found_user->photo)}} "  width="190px"  height="170px" class="image-modal" alt="...">
                    @endif

                  <div class="text">
                  <h5>Name:</h5>
                 <p>{{$found_user->first_name}} {{$found_user->last_name}}</p>
                </div>
                <div class="text">
                 <h5>Department:</h5>
                 <p> {{$found_user->dept}}</p>
                </div>
                <div class="text">
                  <h5>Email:</h5>
                 <p>{{$found_user->email}}</p>
                </div>
                <div class="text">
                  <h5>Phone:</h5>
                 <p>{{$found_user->phone}}</p>
                </div>
                <div class="text">
                  <h5>Address:</h5>
                 <p>{{$found_user->address}}</p>
                </div>
                <div class="text">
                  <h5>Hobby:</h5>
                 <p>{{$found_user->hobby}}</p>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  {{-- <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button> --}}
                  <a href="/delete_member/{{$found_user->user_id}}" class="btn btn-danger" type="button" >Delete</a>
                  <a href="/edit_member/{{$found_user->user_id}}" type="button" >Edit</a>
                </div>
              </div>
            </div>
          </div>
      @endforeach
      @else
{{-- when search form is not used --}}
@isset($users)
    @foreach ($users as $user)
<div class="col-md-3 ">
    <div class="card">
         @if ($user->photo  ==''|| empty($user->photo ))
         <img src="{{asset("images/place.jpg")}}"   class="card-img-top" alt="...">
         @else
         <img src="{{ asset($user->photo)}} "   class="card-img-top" alt="...">
         @endif

      <div class="card-body text-center">
        <div class="card-body">
          <h5>{{$user->first_name}} {{$user->last_name}}</h5>
        <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$user->user_id}}">View</a>
      </div>
      </div>
    </div>
  </div>

             <!-- button tigger modal  for all users -->

             <div class="modal fade" id="staticBackdrop{{$user->user_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @if ($user->photo  ==''|| empty($user->photo ))

                            <img  src="{{asset("images/place.jpg")}}"  width="190px"  height="170px"  class="image-modal" alt="...">


                        @else

                            <img  src="{{ asset($user->photo)}} "   width="190px"  height="170px"  class="image-modal" alt="...">


                        @endif

                      <div class="text">
                      <h5>Name:</h5>
                     <p>{{$user->first_name}} {{$user->last_name}}</p>
                    </div>
                    <div class="text">
                     <h5>Department:</h5>
                     <p> {{$user->dept}}</p>
                    </div>
                    <div class="text">
                      <h5>Email:</h5>
                     <p>{{$user->email}}</p>
                    </div>
                    <div class="text">
                      <h5>Phone:</h5>
                     <p>{{$user->phone}}</p>
                    </div>
                    <div class="text">
                      <h5>Address:</h5>
                     <p>{{$user->address}}</p>
                    </div>
                    <div class="text">
                      <h5>Hobby:</h5>
                     <p>{{$user->hobby}}</p>
                    </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                      <a href="delete_member/{{$user->user_id}}" class="btn btn-danger" type="button" >Delete</a>
                      {{-- @auth('admin')
                      <a href="edit_member/{{$user->user_id}}" type="button" >Edit</a>
                      @endauth --}}
                      <a href="edit_member/{{$user->user_id}}" type="button" >Edit</a>
                    </div>
                  </div>
                </div>
              </div>

  @endforeach
  @endisset
   {{-- pagination for all users --}}
   <div class="d-flex justify-content-center">
    {{ $users->links() }}
</div>
@endisset

 {{-- pagination for searching users --}}
 @isset($found_users)
 <div class="d-flex justify-content-center">
     {{ $found_users->links() }}
 </div>
 @endisset
        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
                <div class="text">
                <h5>Name:</h5>
               <p>Fhinas Vincent</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="img/Rectangle 24.png"class="card-img-top" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>Bro. John Nwadia</h5>
              <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
            </div>
            </div>
          </div>
        </div> --}}

        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
                <div class="text">
                <h5>Name:</h5>
               <p>Fhinas Vincent</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="img/Rectangle 24.png"class="card-img-top" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>Bro. John Nwadia</h5>
              <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
            </div>
            </div>
          </div>
        </div> --}}

        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
                <div class="text">
                <h5>Name:</h5>
               <p>Fhinas Vincent</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <img src="img/Rectangle 24.png"class="card-img-top" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>Bro. John Nwadia</h5>
              <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
            </div>
            </div>
          </div>
        </div> --}}

        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
                <div class="text">
                <h5>Name:</h5>
               <p>Fhinas Vincent</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div> --}}

        {{-- <div class="col-md-3">
          <div class="card">
            <img src="img/Rectangle 24.png"class="card-img-top" alt="...">
            <div class="card-body text-center">
              <div class="card-body">
                <h5>Bro. John Nwadia</h5>
              <a href="#" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
            </div>
            </div>
          </div>
        </div>
        </div> --}}

        <!-- button tigger modal -->

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
                <div class="text">
                <h5>Name:</h5>
               <p>Fhinas Vincent</p>
              </div>
              <div class="text">
               <h5>Department:</h5>
               <p>Youth President</p>
              </div>
              <div class="text">
                <h5>Email:</h5>
               <p>example@gmail.com</p>
              </div>
              <div class="text">
                <h5>Phone:</h5>
               <p>+234 806 5779 798</p>
              </div>
              <div class="text">
                <h5>Address:</h5>
               <p>Fidiso estate abijo</p>
              </div>
              <div class="text">
                <h5>Hobby:</h5>
               <p>Praying, singing</p>
              </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
                <a href="sign.html" type="button" >Edit</a>
              </div>
            </div>
          </div>
        </div> --}}







      </div>
      </div>
    </div>
  </section>

  <x-foot/>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>


















<!--
<div class="mask h-100" style="background-color: rgba(0,0,0,0.6)">
  <div class="container">
    <div class="form">
       <form id="search" action="" method="get">
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Search for member">
      </form>
    </div>
    <div class="row pt-4 md">
      <div class="col-3 md-3">
        <div class="card" style="width: 14rem;">
          <img src="img/Rectangle 24.png"class="card-img-top" alt="...">
          <div class="card-body text-center">
            <div class="card-body">
              <h5>Bro. John Nwadia</h5>
            <a href="#" class="btn btn-primary ml-4" data-bs-toggle="modal" data-bs-target="#staticBackdrop">View</a>
          </div>
          </div>
        </div>
      </div>
       Button trigger modal
 <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Launch static backdrop modal
</button>
 Modal
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">About Me</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="img/Rectangle 24.png" width="190px"  height="170px" class="image-modal" alt="">
        <div class="text">
        <h5>Name:</h5>
       <p>Fhinas Vincent</p>
      </div>
      <div class="text">
       <h5>Department:</h5>
       <p>Youth President</p>
      </div>
      <div class="text">
        <h5>Email:</h5>
       <p>example@gmail.com</p>
      </div>
      <div class="text">
        <h5>Phone:</h5>
       <p>+234 806 5779 798</p>
      </div>
      <div class="text">
        <h5>Address:</h5>
       <p>Fidiso estate abijo</p>
      </div>
      <div class="text">
        <h5>Hobby:</h5>
       <p>Praying, singing</p>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Delete</button>
        <a href="sign.html" type="button" >Edit</a>
      </div>
    </div>
  </div>
</div> -->

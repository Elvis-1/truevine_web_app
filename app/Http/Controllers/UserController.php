<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\RouteNotFoundException;
use illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::orderByDesc('created_at')->simplePaginate(15);
        // if($request->has('name'))
        // {
        //     $users = User::where('first_name', 'like', '%'. $request->input('name').'%')->get();
        // }
        return view('youth',['users'=> $users]);
    }

    // public function login(LoginUserRequest $request)
    // {
    //     // $2y$10$cF0ljBVADVuLdR7UiuZDJuskPXlUraypyvp7INox7nUYPkyBcY62u
    //    $credentials = $request->validated();
    //    if(Auth::guard('user_login')->attempt($credentials))
    //    {
    //     $request->session()->regenerate();

    //     return redirect()->intended('/');
    //    }

    //    return back()->withErrors([
    //     'email' => 'The provided credentials do not match our records.',
    // ])->onlyInput('email');
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {


      $credentials = $request->validated();

      if(isset($credentials['image']))
      {
        $validated_image = $credentials['image'];
     //   $validated_image_name = $validated_image->hashName();
       $extension =   $validated_image->extension();

     //   $path = $validated_image->storeAs('images', $validated_image_name);
     //   $validated_image->move(public_path('images'), $validated_image_name);
         $path = $validated_image->storeAs('images', time().'.'.$extension);
       //  $path = $validated_image_name;
      }else{
        $path = '';
      }




      $user = User::create([
        'first_name'=>$credentials['first_name'],
        'last_name'=> $credentials['last_name'],
        'email'=> $credentials['email'],
        'phone'=> $credentials['phone'],
        'dept'=> $request->dept,
        'hobby'=>$request->hobby,
        'photo'=> $path,
        'address'=>  $credentials['address'],
      ]);

      if($user->user_id)
      {
        return redirect('/youth')->with('status','New User Added Successfully');
      }

      return back()->with('status','Not Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $found_users = User::where('first_name', 'like', '%'.$request->input('name') .'%')
        ->orWhere('last_name', 'like', '%'.$request->input('name'). '%')
        ->simplePaginate(15);


        return view('youth', ['found_users'=>$found_users]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit_view($user)
    {

        $user = User::find($user);

        return view('edit_member',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,$user)
    {

        if(Auth::guard('admin')->check())
        {
            $user = User::find($user);

            $credentials = $request->validated();
         //    $validated_image = $credentials['image'];
            if(!isset($credentials['image']) || empty( $credentials['image']))
            {
             $path = $user->photo;
            }else{
             $validated_image = $credentials['image'];
             $extension =   $validated_image->extension();
             Storage::delete($user->photo);

             $path = $validated_image->storeAs('images', time().'.'.$extension);
            }

            $user->first_name = $credentials['first_name'];
            $user->last_name = $credentials['last_name'];
            $user->email = $user->email;
            $user->phone =  $credentials['phone'];
            $user->dept =  $credentials['dept']?? $user->dept;
            $user->hobby =  $credentials['hobby']??$request->hobby;
            $user->photo = $path;
            $user->address =  $credentials['address']?? $user->address;

       if($user->save())
       {
         return redirect('youth')->with('status','Member updated');
       }
       return back()->with('status', 'Not Updated');
        }

        return redirect('youth')->with('status','Only admins can update members');



    }

    public function delete_view($id)
    {
      $user = User::find($id);
       return view('delete_member',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function delete($user)
    {
      if(Auth::guard('admin')->check())
      {
        $user =  User::find($user);
        Storage::delete($user->photo);
        $user->delete();
        return redirect('youth')->with('status','User deleted');
      }

      return redirect('youth')->with('status','Only admins can delete a user');

    }
}

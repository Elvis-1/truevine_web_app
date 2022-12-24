<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AdminGenerateLink;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\LoginAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginAdminRequest $request)
    {
        // $2y$10$cF0ljBVADVuLdR7UiuZDJuskPXlUraypyvp7INox7nUYPkyBcY62u
       $credentials = $request->validated();
       if(Auth::guard('admin')->attempt($credentials))
       {
        $request->session()->regenerate();

        return redirect()->intended('/');
       }

       return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
    }

    public function generate_link(Request $request)
    {
 if (Auth::guard('admin')->check())
         {
            $generate_link = new AdminGenerateLink;
            $generate_link->admin_id = Auth::guard('admin')->id();
            $generate_link->unique_string = uniqid('admin');
            $generate_link->link = URL::temporarySignedRoute(
                'generate', now()->addHours(30), ['id' => $generate_link->unique_string]
            );
            $generate_link->created_at = now();
            $generate_link->expired_at = now();
            $generate_link -> save();

            return view('copy_link',['link'=> $generate_link->link]); // admin should get the link through this view;
        }

        if (!$request->hasValidSignature()) {
            abort(401);
        }

        return view('add_member');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}

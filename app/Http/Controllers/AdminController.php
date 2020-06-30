<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('admin');
        $user = User::all();

        return view('admin', ['users' => $user]);
    }

    public function delete(User $user)
    {
        //
    }

    public function restore($trash)
    {
        //
    }
}

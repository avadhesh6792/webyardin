<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AppUser;
use App\Group;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bind = [];
        $bind['activeMenu'] = 'dashboard';
        $bind['pageTitle'] = 'Dashboard';
        return view('dashboard', $bind);
    }
    
    public function users(){
        $bind = [];
        $bind['users'] = AppUser::get();
        $bind['activeMenu'] = 'users';
        $bind['pageTitle'] = 'Users';
        return view('users', $bind);
    }
    
    public function groups(){
        $bind = [];
        $bind['groups'] = Group::get();
        $bind['activeMenu'] = 'groups';
        $bind['pageTitle'] = 'groups';
        return view('groups', $bind);
     }
}

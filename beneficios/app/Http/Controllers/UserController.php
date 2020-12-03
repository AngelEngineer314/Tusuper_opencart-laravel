<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Attendance;
use App\Household;
class UserController extends Controller
{
    /**
     * 
     * display dashboard. 
     * 
     * @param mixer  $request
     * 
     * */
    public function dashboard() {
        return view('dashboard');
    }
}

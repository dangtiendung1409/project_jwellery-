<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function users(){
        $users = User::paginate(10);
        return view('admin.User.listUser',compact('users'));
    }
}

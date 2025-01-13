<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class accountSettingController extends Controller
{
    public function profile(){
        return view('admin.AccountSetting.profile');
    }
}

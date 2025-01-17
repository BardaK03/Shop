<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::id())
        {
            $usertype=Auth()->user()->usertype;
            if($usertype=='user')
            {
                return  view('admin.products')
            }
            else if($usertype=='admin')
            {
                return  view('admin.products')
            }
        }

    }


}
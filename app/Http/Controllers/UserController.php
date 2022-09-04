<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use Illuminate\Foundation\Auth\User;
use App\Http\Resources\UserCollection;

class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Users', [
            'users'     =>  User::all()
        ]);
    }
}

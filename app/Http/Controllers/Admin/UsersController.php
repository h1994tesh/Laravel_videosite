<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\View;
class UsersController extends Controller {

    public function index() {
        $users = User::all();
        return \View::make('admin.users')->with('users', $users);
    }

}

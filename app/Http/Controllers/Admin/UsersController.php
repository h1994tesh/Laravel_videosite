<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\View;
use App\Role;
use App\Http\Requests\UserEditFormRequest;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller {

    public function index() {
        $users = User::all();
        return \View::make('admin.users')->with('users', $users);
    }
    public function edit($id){
        $user = User::where('r_id', $id)->firstOrFail();
        $roles = Role::all();
        $selectedRoles = $user->roles->lists('r_id')->toArray();
        $action = 'edit';
        return view('admin.create_user', compact('action', 'user', 'roles', 'selectedRoles'));
    }
    public function update($id, UserEditFormRequest $request){
        $user = User::where("r_id", $id)->firstOrFail();
        $user->r_name = $request->get("name");
        $user->r_email = $request->get("email");
        $user->password = Hash::make($request->get("password"));
        $user->save();
        $user->saveRoles($request->get('roles'));
        return redirect(action('Admin\UsersController@edit', $user->r_id))->with('status', 'The User has been updated!');
    }

}

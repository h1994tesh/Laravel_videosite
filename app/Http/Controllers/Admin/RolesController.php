<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Role;
use App\Http\Requests\RoleFormRequest;

class RolesController extends Controller {

    public function create() {
        return view('admin.roles_create');
    }

    public function store(RoleFormRequest $request) {
        $role = new Role(array(
            'name' => $request->get('name'),
            'display_name' => $request->get('disp_name'),
            'description' => $request->get('description')
        ));
        $role->save();
        return redirect('/admin/roles/create')->with('status', 'A role has been created!');
    }

    public function index(){
        $roles = Role::all();
        return view('admin.view_roles', compact('roles'));
    }
}

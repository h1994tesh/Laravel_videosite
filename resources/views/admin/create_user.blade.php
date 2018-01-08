@extends('admin.master')
@section('title','Create A New Role')
@section('content')
@if($action == "edit")
        @php
            $r_name = $user->r_name;
            $r_email = $user->r_email;
            $r_id = $user->r_id;
            $roles = $roles;
            $selectedRoles = $selectedRoles;
        @endphp
    @else
        @php
            $r_name = "";
            $r_email = "";
            $r_id = "";
            $roles = "";
            $selectedRoles = "";
        @endphp
@endif
<h2>Create A New Role</h2>
<form method="post">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach

    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    {!! csrf_field() !!}
    <div class="form-group">
        <label for="nm">Name</label>
        <input type="text" class="form-control" name="name" value="{!! $r_name !!}" id="nm">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" name="email" value="{!! $r_email !!}" id="email" placeholder="Enter email">
    </div>

    <div class="form-group">
        <label for="roles">Roles</label>
        <select id="roles" name="roles[]" class="form-control">
            <option value="">Choose...</option>
            @if(!$roles->isEmpty())
                @foreach($roles as $role)
                    <option value="{!! $role->id !!}" @if(in_array($role->id, $selectedRoles)) selected="selected" @endif >{!! $role->display_name !!}</option>
                @endforeach
            @endif
        </select>
    </div>

    <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="cpwd">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="cpwd" placeholder="Confirm Password">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


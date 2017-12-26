@extends('front.master')
@section('title','Register')
@section('content')
<h2>Register</h2>
<form method="post">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="nm">Name</label>
        <input type="text" class="form-control" name="name" id="nm" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="cpwd">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation" id="cpwd" placeholder="Confirm Password">
    </div>
    <div class="form-group">
        <label for="m">Gender</label><br/>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" id="m" value="m"> Male
            </label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                <input class="form-check-input" type="radio" name="gender" id="f" value="f"> Female
            </label>
        </div>
    </div>
    
        <div class="form-group col-md-4">
            <label for="cnt">Country</label>
            <select id="cnt" name="cnt" class="form-control">
                <option value="">Choose...</option>
                <option value="1">India</option>
                <option value="2">USA</option>
                <option value="3">Australia</option>
            </select>
        </div>
    
    <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection


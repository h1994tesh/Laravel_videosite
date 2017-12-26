@extends('front.master')
@section('title','Login')
@section('content')
<h2>Login</h2>
<form method="post">
    @foreach ($errors->all() as $error)
    <p class="alert alert-danger">{{ $error }}</p>
    @endforeach
    {!! csrf_field() !!}
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
        
    </div>
    <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" name="password" id="pwd" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-primary">Login</button>
</form>
@endsection


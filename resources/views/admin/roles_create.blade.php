@extends('admin.master')
@section('title','Create A New Role')
@section('content')
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
        <input type="text" class="form-control" name="name" id="nm">
    </div>
    <div class="form-group">
        <label for="disp_name">Display Name</label>
        <input type="text" class="form-control" name="disp_name" id="disp_name">
    </div>
    <div class="form-group">
        <label for="description" class="col-lg-2 control-label">Description</label>
        <div class="col-lg-10">
            <textarea class="form-control" rows="3" id="description" name="description"></textarea>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection


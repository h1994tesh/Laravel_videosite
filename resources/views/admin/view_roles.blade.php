@extends('admin.master')
@section('title','All roles')
@section('content')
<h2>All roles</h2>
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Display Name</th>
            <th scope="col">Description</th>
        </tr>
    </thead>
    <tbody>
        @if($roles->isEmpty())
        <tr>
            <th colspan="5" scope="row">No users</th>
        </tr>
        @else
        <?php $i = 1; ?>
        @foreach($roles as $role)
        <tr>
            <th scope="row"><?php echo $i; ?></th>
            <td>{!! $role->name !!}</td>
            <td>{!! $role->display_name !!}</td>
            <td>{!! $role->description !!}</td>
        </tr>
        <?php $i++; ?>
        @endforeach
        @endif
    </tbody>
</table>
@endsection


@extends('admin.master')
@section('title','Users')
@section('content')
<h2>Users List</h2>
<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Email</th>
            <th scope="col">Gender</th>
            <th scope="col">Country</th>
        </tr>
    </thead>
    <tbody>
        @if($users->isEmpty())
        <tr>
            <th colspan="5" scope="row">No users</th>
        </tr>
        @else
        <?php $i = 1; ?>
            @foreach($users as $user)
            <tr>
                <th scope="row"><?php echo $i; ?></th>
                <td>{!! $user->r_name !!}</td>
                <td>{!! $user->r_email !!}</td>
                <td>@if($user->r_gender == 1) Male @else "Female" @endif</td>
                <td>{!! $user->r_country !!}</td>
            </tr>
            <?php $i++; ?>
            @endforeach
        @endif
    </tbody>
</table>
@endsection


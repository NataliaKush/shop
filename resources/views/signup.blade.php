@extends('layouts.master')

@section('content')
    <h3>Login</h3>

    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Enter username">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="password1">Password</label>
            <input type="password" name="password1" class="form-control" id="password1" placeholder="Password">
        </div>
        <div class="form-group">
            <label for="password2">Retype Password</label>
            <input type="password" name="password2" class="form-control" id="password2" placeholder="Retype Password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection

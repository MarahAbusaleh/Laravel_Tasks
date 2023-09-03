@extends('Layout.master')

@section('title', 'Login')

@section('content')

    <br><br><br><br><br><br><br><br>
    
<center>

    <div class="card w-25">
    <div class="card-body ">
        <h1 class="card-title text-center">Login</h1>
        <form action="{{ route('LoginController') }}" method="GET">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-danger">Login</button>
            </div>
        </form>
    </div>
</div>
</center>


    <br><br><br><br><br><br><br><br>

@endsection
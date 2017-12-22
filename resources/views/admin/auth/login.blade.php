@extends('admin.layouts.login')

@section('title', 'Laravel login')

@section('content')

    <h2>Sign In</h2>
    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
        {{ csrf_field() }}
        <div class="username {{ $errors->has('email') ? ' has-error' : '' }}">
            <span class="username">Email:</span>
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
            @endif
            <div class="clearfix"></div>
        </div>
        <div class="password-agileits">
            <span class="username">Password:</span>
            <input id="password" type="password" class="form-control" name="password" required>

            @if ($errors->has('password'))
                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
            @endif

            <div class="clearfix"></div>
        </div>
        <div class="rem-for-agile">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me

            <a class="btn btn-link" href="{{ route('password.request') }}">
                Forgot Your Password?
            </a><br>
        </div>
        <div class="login-w3">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
        <div class="clearfix"></div>
    </form>
    <div class="back">
        <a href="{{ route('register') }}">Register</a>
    </div>
    <div class="footer">
        <p>&copy; 2017 LaraCMS . All Rights Reserved</p>
    </div>
@endsection

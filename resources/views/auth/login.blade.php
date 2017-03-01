@extends('layouts.app')

@section('content')
<!-- BEGIN LOGIN FORM -->
<form class="login-form" role="form" method="POST" action="{{ url('/login') }}">
    {{ csrf_field() }}
    <h3 class="form-title font-green">Sign In</h3>
    <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span> Enter any username and password. </span>
    </div>
    <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
        <label class="control-label visible-ie8 visible-ie9">账号</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="请输入手机号码" name="phone" value="{{ old('phone') }}" required autofocus/> </div>
    <div class="form-group">
        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
        <label class="control-label visible-ie8 visible-ie9">密码</label>
        <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="请输入密码" name="password" value="{{ old('password') }}" /> </div>
    <div class="form-actions">

        <button type="submit" class="btn green uppercase">Login</button>
        <label class="rememberme check mt-checkbox mt-checkbox-outline">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : ''}} />Remember
            <span></span>
        </label>
        <a href="{{ url('/password/reset') }}" class="forget-password">忘记密码?</a>
    </div>
    <div class="create-account">
        <p>
            <a href="{{ url('/register') }}" class="uppercase">注册账号</a>
        </p>
    </div>
</form>
@endsection

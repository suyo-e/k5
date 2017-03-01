@extends('layouts.app')

@section('content')
<form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
    {{ csrf_field() }}
    <h3 class="font-green">Sign Up</h3>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">手机号码</label>
        <input class="form-control placeholder-no-fix" type="text" placeholder="请输入手机号码" name="phone" value="{{ old('phone') }}" required autofocus/> 
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">昵称</label>

        <input id="name" type="text" class="form-control" name="name" placeholder="请输入昵称" value="{{ old('name') }}" required autofocus>

        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label class="control-label visible-ie8 visible-ie9">密码</label>
        <input id="password" type="password" class="form-control" placeholder="请输入密码" name="password" required>

        @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
        @endif
    </div>

    <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">重复密码</label>
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="请重复密码" required>
    </div>

    <div class="form-group">
        <div class="col-md-6 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                点击注册
            </button>
        </div>
    </div>
</form>

@endsection

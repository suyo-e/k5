@extends('layouts.dashboard')
@section('content')

@include('vendor.breadcrumb', array(
    'subtitle'=>'创建用户'
))

<form role="form" method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
    <div class="form-group">
        <label>手机号码</label>
        <input class="form-control" name="phone" value="{{ old('phone') }}">
    </div>
    <div class="form-group">
        <label>用户昵称</label>
        <input class="form-control" name="name" value="{{ old('name') }}">
    </div>
    <div class="form-group">
        <label>密码</label>
        <input class="form-control" name="password" value="{{ old('password') }}" type="password">
    </div>
<!--
    <div class="form-group">
        <label>用户头像</label>
        <input type="file" name="avatar" value="{{ old('avatar') }}">
    </div>
-->

    <input type="submit" />
</form>

@stop

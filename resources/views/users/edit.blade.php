@extends('layouts.dashboard')
@section('content')

@include('vendor.breadcrumb', array(
    'subtitle'=>'编辑用户'
))

<form role="form" method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
    {{ method_field('PUT') }}
    <div class="form-group">
        <label>手机号码</label>
        <input class="form-control" name="phone" value="{{ $user->phone }}">
    </div>
    <div class="form-group">
        <label>用户昵称</label>
        <input class="form-control" name="name" value="{{ $user->name }}">
    </div>
<!--
    <div class="form-group">
        <label>用户头像</label>
        <input type="file" name="avatar" value="{{ $user->avatar}}">
    </div>
-->

    <input type="submit" />
</form>

@stop

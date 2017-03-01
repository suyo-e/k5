@extends('layouts.dashboard')
@section('content')

@include('vendor.breadcrumb', array(
    'subtitle'=>'用户管理'
))


@section ('forms') 
    <select name="type">
        <option value="1">管理员</option>
        <option value="2">普通用户</option>
    </select>
@endsection
@section ('buttons')
    <a href="{{ route('users.create') }} " class="btn btn-success btn-sm">添加用户</a>
@endsection
@include('vendor.search', array('queries'=> array(
    'nickname'=>'用户名称',
    'phone'=>'手机号码'
)))

<table class="table table-bordered table-striped table-condensed flip-content">
    <thead>
        <tr>
            <th>#</th>
            <th>用户名</th>
            <th>手机号码</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone}}</td>
            <th>
                <a href="{{ route('users.edit', $user->id) }}">编辑</a> 
                <a href="{{ route('users.destroy', $user->id) }}">删除</a>
            </th>
        </tr>
        @endforeach
    </tbody>
</table>	
{{ $users->links() }}

@stop

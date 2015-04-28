@extends('layout')

@section('content')
    <h1>Dashboard</h1>

    <a href="{{url('manage')}}">Manage Users</a>

    <a href="{{url('logout')}}">Logout</a>
@stop
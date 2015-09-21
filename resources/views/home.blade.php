@extends('layouts.auth')

@section('content')
    <h1>guess</h1>

   {{$user = Auth::user()->name}}


@endsection
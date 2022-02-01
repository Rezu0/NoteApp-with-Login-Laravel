@extends('app.layouts')

@section('title', $title)

@section('content')
    <x-register title="{{ $title }}" username="username" email="email" password="password"></x-loginRegis>
@endsection
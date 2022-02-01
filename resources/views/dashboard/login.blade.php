@extends('app.layouts')

@section('title', $title)

@section('content')
    <x-login title="{{ $title }}" email="email" password="password"></x-login>
@endsection
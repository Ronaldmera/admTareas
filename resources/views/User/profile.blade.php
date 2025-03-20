@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <h1>Hola</h1>
    <img src="{{ auth()->user()->image_url }}" alt="Profile Image" width="150">







    @push('scripts')
    @endpush
@endsection

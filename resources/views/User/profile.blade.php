@extends('layouts.app')
@section('styles')
@endsection
@section('content')
    <div class="container-profile">
        <h1>Perfil De Usuario</h1>
        <img src="{{ auth()->user()->image_url }}" alt="Profile Image" width="150">
        <p>{{ $user->name }}</p>
        <p>{{ $user->email }}</p>
        <p>Fecha de Creacion: {{ $user->created_at->format('d-m-Y') }}</p>
    </div>
    @push('scripts')
    @endpush
@endsection

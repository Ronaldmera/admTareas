@extends('layouts.app')

@section('content')
    <div class="dashboard-container">
        <h1 class="dashboard-title">Bienvenido, {{ auth()->user()->name }}!</h1>

    </div>
@endsection

@extends('layouts.dashboard')

@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                <h1 class="card-title">Welcome, {{Auth::user()->name}}</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
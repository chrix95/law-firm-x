@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Client list</h4>
                    <a href="{{ route('home') }}">
                        <button class="btn btn-info btn-sm me-md-2" type="button">Back to home</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <clientlist-component :clients="{{ $clients }}"></clientlist-component>
            </div>
        </div>
    </div>
@endsection
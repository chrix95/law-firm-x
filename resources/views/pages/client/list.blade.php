@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-4">
                        <h4>Client list</h4>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ route('home') }}">
                            <button class="btn btn-info btn-sm me-md-2" type="button">Back to home</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <clientlist-component :clients="{{ $clients }}"></clientlist-component>
            </div>
        </div>
    </div>
@endsection
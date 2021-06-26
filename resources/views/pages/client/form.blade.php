@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card text-white bg-secondary">
            <div class="card-header">
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Add Client</h4>
                    <a href="{{ route('home') }}">
                        <button class="btn btn-light btn-sm me-md-2" type="button">Back to home</button>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <clientform-component></clientform-component>
            </div>
        </div>
    </div>
@endsection
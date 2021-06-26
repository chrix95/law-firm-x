@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mb-3" style="max-width: 768px;">
            <div class="row g-0">
              <div class="col-md-4 v-center">
                <img src="{{ asset($client->image) }}" class="img-fluid rounded-start" alt="{{ $client->firstname . ' ' . $client->lastname }}">
              </div>
              <div class="col-md-8 v-center">
                <div class="card-body">
                    <h5 class="d-flex justify-content-between card-title mb-0">
                        <span>{{ $client->firstname . ' ' . $client->lastname }}</span>
                        <a href="{{ route('home') }}" class="float-end">
                            <button class="btn btn-info btn-sm me-md-2" type="button">Back to home</button>
                        </a>
                    </h5>
                    <p class="card-text text-left">
                        <small class="text-muted">
                            <strong>Email: </strong> {{ $client->email }}
                        </small><br>
                        <small class="text-muted">
                            <strong>Date of Birth: </strong> {{ $client->dob }}
                        </small>
                    </p>
                    <p class="card-text text-left">
                        {{ $client->case_detail }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">
                            <strong>Legal counsel: </strong> {{ $client->legal_counsel }}</small> | 
                            <small class="text-muted">Date profiled {{ $client->created_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
@extends('layouts.app')
@section('content')
    <div class="links">
        <a href="{{ route('profile.add.client') }}">Profile new Client</a>
        <a href="{{ route('profile.list') }}">Client List</a>
    </div>
@endsection
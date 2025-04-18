@extends('adminlte::page')

@section('title', 'User Info')

@section('content_header')
    <h1>User informmation</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-primary text-white d-flex align-items-center justify-content-between">
        <h4 class="mb-0">{{ $user->first_name }} {{ $user->last_name }}</h4>
        @if ($user->avatar)
            <img src="{{ asset('storage/' . $user->avatar) }}" width="70" height="70" 
                 class="rounded-circle" style="object-fit: cover;">
        @else
            <span class="text-light small">No Avatar</span>
        @endif
    </div>
    <div class="card-body">
        <dl class="row">
            <dt class="col-sm-3">Email:</dt>
            <dd class="col-sm-9">{{ $user->email }}</dd>

            <dt class="col-sm-3">created_at:</dt>
            <dd class="col-sm-9">{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</dd>
        </dl>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection

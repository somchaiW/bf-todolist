@extends('adminlte::page')

@section('title', 'Edit User')

@section('content_header')
    <h1>Edit User</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            
            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
            </div>

            
            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
            </div>

            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
            </div>

           
            <div class="form-group">
                <label for="avatar">Upload Avatar</label>
                <input type="file" name="avatar" class="form-control">
                @if ($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" width="100" class="mt-2">
                @endif
            </div>

           
            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection

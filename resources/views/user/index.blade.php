@extends('adminlte::page')

@section('title', 'User list')

@section('content_header')
    <h1>User infomation</h1>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <thead class="bg-primary text-white">
                <tr>
                    <th>#</th>
                    <th>First name - Last name</th>
                    <th>Email</th>
                    <th>Create at</th>
                    <th>Manage</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $i => $user)
    <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</td>
        <td>
            <a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-sm">info</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">edit</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Confirm for delete?');">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm">delete</button>
            </form>
        </td>
    </tr>
    @if ($user->avatar)
        <img src="{{ asset('storage/' . $user->avatar) }}" width="100">
    @endif

@endforeach

            </tbody>
        </table>
    </div>
</div>
@endsection
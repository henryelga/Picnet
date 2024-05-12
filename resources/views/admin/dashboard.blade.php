@extends('layouts.app')
@section('content')
    <div class="adminContainer">
        <h1>Admin Dashboard</h1>
        <h3>Users</h3>

        <table class="dashboardTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="deleteUsersButton" type="submit"><img src="https://img.icons8.com/fluency-systems-filled/48/FA5252/trash.png" alt="delete icon"/></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

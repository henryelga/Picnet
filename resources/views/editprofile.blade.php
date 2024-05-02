<!DOCTYPE html>
<html>

<head>
    <title>Profile</title>
</head>

<body>
    <h1>Profile</h1>

    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="{{ $user->username }}" required>
        </div>

        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" required>
        </div>

        <div>
            <label for="bio">Bio:</label>
            <textarea id="bio" name="bio">{{ $user->bio }}</textarea>
        </div>

        <div>
            <label for="pfp">Profile Picture:</label>
            <input type="file" id="pfp" name="pfp">
            @if ($user->pfp)
                <img src="{{ asset('storage/' . $user->pfp) }}" alt="Profile Picture" width="100">
            @endif
        </div>

        <button type="submit">Update Profile</button>
    </form>
</body>

</html>

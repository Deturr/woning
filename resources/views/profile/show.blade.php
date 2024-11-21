<!-- resources/views/profile/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
</head>
<body>
    <h1>Your Profile</h1>
    <p>Welcome, {{ auth()->user()->name }}!</p>
    <p>Email: {{ auth()->user()->email }}</p>
    <p>Joined: {{ auth()->user()->created_at->format('d-m-Y') }}</p>

    <!-- Link to edit profile -->
    <a href="{{ route('profile.edit') }}">Edit Profile</a>
</body>
</html>
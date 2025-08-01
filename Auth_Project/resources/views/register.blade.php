<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color: red;">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/register">
        @csrf

        <div>
            <label>Name:</label>
            <input type="text" name="name" required>
        </div>
        <br>

        <div>
            <label>Email:</label>
            <input type="email" name="email" required>
        </div>
        <br>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>
        <br>

        <div>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" required>
        </div>
        <br>

        <button type="submit">Register</button>
    </form>
</body>
</html>

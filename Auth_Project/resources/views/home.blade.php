<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <a href="/register"> <button>Register</button></a>
    <a href="/login"><button>login</button></a>
    <form action="/logout" method="post">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
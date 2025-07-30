<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
</head>
<body>
    <h1>Student</h1>
    <table border="1" cellpadding="10">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
    </tr>
    @foreach ($students as $student )
    <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name}}</td>
        <td>{{ $student->email}}</td>
    </tr>
    
    @endforeach
    </table>
</body>
</html>
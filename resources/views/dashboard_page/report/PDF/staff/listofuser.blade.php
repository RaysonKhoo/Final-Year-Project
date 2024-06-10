<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="h2 mb-4 text-center" style="color: black">List of User</h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Phone Number</th>
                <th>Room Number</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $users as $info )
            <tr>
                <td>{{ $info->id }}</td>
                <td>{{ $info->name }}</td>
                <td>{{ $info->email }}</td>
                <td>{{ $info->role }}</td>
                <td>{{ $info->gender }}</td>
                <td>{{ $info->phone_number }}</td>
                <td>{{ $info->room_number }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

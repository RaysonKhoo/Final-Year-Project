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
    <h1 class="h2 mb-4 text-center" style="color: black">List of Review <i class="fas fa-box"></i></h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Rating</th>
                <th>Comment</th>
                <th>Tracking Number</th>
            </tr>
        </thead>
        <tbody>
            @if ($review)
            @foreach ( $review as $info )
            <tr class="text-center">
                <td>{{ $info->id }}</td>
                <td>{{ $info->name }}</td>
                <td>{{ $info->rating }}</td>
                <td>{{ $info->comment }}</td>
                <td>{{ $info->parcel->tracking_number }}</td>
            </tr>
            @endforeach
            @else
                <tr>
                    <td colspan="8">No feedback found.</td>
                </tr>
            @endif
        </tbody>
    </table>
</body>
</html>

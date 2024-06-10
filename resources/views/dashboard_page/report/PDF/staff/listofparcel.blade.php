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
    <h1 class="h2 mb-4 text-center" style="color: black">List of User Parcel <i class="fas fa-box"></i></h1>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date Received</th>
                <th>Receiver Name</th>
                <th>Tracking Number</th>
                <th>Room Number</th>
                <th>Phone Number</th>
                <th>Courier Name</th>
                <th>Parcel Status</th>
                <th>Time Selection</th>
            </tr>
        </thead>
        <tbody>
            @if ($parcel)
            @foreach ( $parcel as $data )
            <tr>
                <td>{{ $data->id }}</td>
                <td>{{ \Carbon\Carbon::parse($data->date_received)->format('d-m-Y') }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->tracking_number}}</td>
                <td>{{ $data->room_number }}</td>
                <td>{{ $data->phone_number }}</td>
                <td>{{ $data->courier_name}}</td>
                <td>{{ $data->status}}</td>
                <td>{{ $data->selection_time }}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="8">No Parcel Record Found.</td>
            </tr>
            @endif
        </tbody>
    </table>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Parking Lot Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Parking Lot Management</h1>
        
        <!-- Form to Create New Parking Lot -->
        <h2 class="mt-4">Create New Parking Lot</h2>
        <form action="/api/parking-lots" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Park Name:</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Location:</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Lat:</label>
                <input type="text" class="form-control" id="lat" name="lat">
            </div>

            <div class="mb-3">
                <label for="location" class="form-label">Long:</label>
                <input type="text" class="form-control" id="long" name="long">
            </div>

            <div class="mb-3">
                <label for="free_time_minutes" class="form-label">Free time(min):</label>
                <input type="number" class="form-control" id="free_time_minutes" name="free_time_minutes">
            </div>

            <div class="mb-3">
                <label for="rate_per_hour" class="form-label">Hourly Rate(Baht/hour):</label>
                <input type="number" class="form-control" id="rate_per_hour" name="rate_per_hour">
            </div>

            <input type="submit" class="btn btn-primary" value="Create">
        </form>
        
        <!-- Table to List All Parking Lots -->
        <h2 class="mt-5">All Parking Lots</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Lat</th>
                    <th>Long</th>
                    <th>Free time(min)</th>
                    <th>Hourly Rate(Baht/hour)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($parkingLot as $lot)
                <tr>
                    <td>{{ $lot['id'] }}</td>
                    <td>{{ $lot['name'] }}</td>
                    <td>{{ $lot['location'] }}</td>
                    <td>{{ $lot['lat'] }}</td>
                    <td>{{ $lot['long'] }}</td>
                    <td>{{ $lot['free_time_minutes'] }}</td>
                    <td>{{ $lot['rate_per_hour'] }}</td>
                    <td>
                        <form action="/api/parking-lots/delete/{{ $lot['id'] }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

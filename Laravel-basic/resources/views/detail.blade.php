
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Detail</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/css/app.css" rel="stylesheet">

    </head>
    <body>
        
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>OrderID</th>
                    <th>Employee</th>
                    <th>Order</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order as $order)
                <tr>
                    <td>{{$order->OrderID}}</td>
                    <td>{{$order->Name}}</td>
                    <td>{{$order->Ordername}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
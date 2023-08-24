<!DOCTYPE html>
<html lang="en">
    <head>
        <title>OrderList</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <h1>List of orders</h1>
        <table border="1">
            <thead>
                <tr bgcolor="yellow">
                    <th>OrderID</th>
                    <th>EmployeeID</th>
                    <th>Ordername</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{$order->orderID}}</td>
                    <td>{{$order->EmployeeID}}</td>
                    <td>{{$order->OrderName}}</td>
                    <td>{{$order->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{ route('addorder') }}" method="post">
        @csrf
        <div>
            <h1>Add order</h1>
            <label for="">Employee ID</label>
            <input type="text" name="EmployeeID">
            <br>
            <label for="">Order Name</label>
            <input type="text" name="OrderName">
            <br>
            <input type="submit" name="submit" value="save post">
            @if(session("success"))
                <b>{{session("success")}}</b>
            @endif
        </div>
        </form>      
        <form action="{{ route('deleteorder') }}" method='post'>
        @csrf
            <div>
                <h3>Delete order</h3>
                <label for="">Order ID</label>
                <input type="number" name="OrderID">
                <br>
                <input type="submit" name="submit" value="delete post">
                @if(session("success_delete"))
                <b>{{session("success_delete")}}</b>
                @endif
            </div>
        </form>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>

<br><br>
<table>
    <tr>
        <th>id</th>
        <th>customer id</th>
        <th>service id</th>
        <th>quantity</th>
        <th>total price</th>
        <th>status</th>
    </tr>
    @foreach ($orders as $_order )
        <tr>
            <td>{{$_order->id}}</td>
            <td>{{$_order->customer_id}}</td>
            <td>{{$_order->service_id}}</td>
            <td>{{$_order->quantity}}</td>
            <td>{{$_order->total}}</td>
            <td>{{$_order->status}}</td>
        </tr>
    @endforeach
</table>

</body>

</html>

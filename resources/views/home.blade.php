<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
</head>

<body>
<table>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>price</th>
        <th>phone</th>
        <th>address</th>
    </tr>
    @foreach ($services as $_service )
        <tr>
            <td>{{$_service->id}}</td>
            <td>{{$_service->name}}</td>
            <td>{{$_service->price}}</td>
            <td>{{$_service->phone}}</td>
            <td>{{$_service->address}}</td>
        </tr>
    @endforeach
</table>
{{$services->links()}}
</body>

</html>

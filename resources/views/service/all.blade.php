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
            <td>
                <form action="{{route('add.Order',$_service->id)}}" method="post">
                    <select name="payment_type" id="">
                        <option value="30%_cash">30% cash</option>
                        <option value="half_cash">half cash</option>
                    </select>
                    <button>reserve</button>
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>

<br><br>
{{$services->links()}}
</body>

</html>

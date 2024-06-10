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
                <form action="{{route('add.to.cart',$_service->id)}}" method="post">
                    <input type="number" min="0" placeholder="quantity" name="quantity">
                    <button>add</button>
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br><br>
<a href="{{route('all.carts')}}">
    <button>show carts</button></a>
<br><br>
{{--<form action="{{route('add.order',$_service->id)}}" method="post">--}}
{{--    <select name="status">--}}
{{--        <option value="active">active</option>--}}
{{--        <option value="cancelled">cancel</option>--}}
{{--    </select>--}}
{{--    <select name="payment_type">--}}
{{--        <option value="30%_cash">30% cash</option>--}}
{{--        <option value="half_cash">half cash</option>--}}
{{--        <option value="complete_cash">complete cash</option>--}}
{{--    </select>--}}
{{--    <button>submit</button>--}}
{{--    @csrf--}}
{{--</form>--}}
<br><br>
{{$services->links()}}
</body>

</html>

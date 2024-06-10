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
        <th>#</th>
        {{--        <th>customer id</th>--}}
        <th>service id</th>
        <th>quantity</th>
        <th>price</th>
        <th>action</th>
    </tr>
    @foreach ($carts as $_cart)
        <tr>
            <td>{{$_cart->id}}</td>
            <td>{{$_cart->service_id}}</td>
            <td>{{$_cart->quantity}}</td>
            <td>{{$_cart->price}}</td>
            <td>
                <form action="" method="post">
                    <button>delete</button>
                    @csrf
                </form>
            </td>
        </tr>
    @endforeach
</table>
<br><br>
<form action="{{route('add.Order')}}" method="post">
    <select name="payment_type" id="">
        <option value="30%_cash">30%_cash</option>
        <option value="half_cash">half_cash</option>
        <option value="complete_cash">complete_cash</option>
    </select>
    <select name="status" id="">
        <option value="active">active</option>
        <option value="cancelled">cancel</option>
    </select>
    <button>submit</button>
    @csrf
</form>

</body>

</html>

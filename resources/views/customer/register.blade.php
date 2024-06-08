<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
<form action="{{route('store.customer')}}" method="post">
    @csrf
    <label for="">name</label>
    <input type="text" name="name"><br><br>
    <label for="">family</label>
    <input type="text" name="family"><br><br>
    <label for="">email</label>
    <input type="email" name="email"><br><br>
    <label for="">password</label>
    <input type="text" name="password"><br><br>
    <label for="">phone</label>
    <input type="text" name="phone"><br><br>
    <label for="">address</label>
    <input type="text" name="address"><br><br>
    <button>submit</button>
</form>

</body>

</html>

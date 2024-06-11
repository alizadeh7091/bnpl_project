<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>payment</title>
</head>

<body>
<table>
    <tr>
        <td>installment number</td>
        <td>installment amount</td>
        <td>due date</td>
        <td>payment amount</td>
    </tr>
   @foreach($installments as $_installment)
        <tr>
            <td>{{$_installment->installment_number}}</td>
            <td>{{$_installment->installment_amount}}</td>
            <td>{{$_installment->due_date}}</td>
            <td>
                <form action="{{route('store.payment',$_installment->id)}}" method="post">
                    @method('put')
                    @csrf
                    <input type="number" name="amount">
                    <button>submit</button>
                </form>
            </td>

        </tr>
   @endforeach
</table>

</body>

</html>

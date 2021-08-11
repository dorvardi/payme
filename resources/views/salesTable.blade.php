<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
</head>
<body>
@csrf
    <table class="table">
        <tr class="title-table">
            <td>time</td>
            <td>Sale Number</td>
            <td>Description</td>
            <td>Amount</td>
            <td>Currency</td>
            <td>Payment Link</td>


        </tr>
    @foreach($sales as $sale)
            <tr>
                <td>{{$sale->time}}</td>
                <td>{{$sale->saleNumber}}</td>
                <td>{{$sale->description}}</td>
                <td>{{$sale->amount}}</td>
                <td>{{$sale->currency}}</td>
                <td><a href="{{$sale->link}}">{{$sale->link}}</a></td>
            </tr>

    @endforeach
    </table>


</body>
</html>
